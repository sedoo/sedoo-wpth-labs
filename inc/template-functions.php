<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package labs_by_Sedoo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function labs_by_sedoo_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'labs_by_sedoo_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function labs_by_sedoo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'labs_by_sedoo_pingback_header' );

/**
 * Ajouter l'image à la une dans le flux RSS
 */

function labs_by_sedoo_rss_post_thumbnail($content) {
	global $post;
	$content ='';

	if(has_post_thumbnail($post->ID)) {
		$content = '<p>' . get_the_post_thumbnail($post->ID , 'full') . '</p>' . get_the_excerpt();
	}
	return $content;
}
add_filter('the_excerpt_rss', 'labs_by_sedoo_rss_post_thumbnail');
add_filter('the_content_feed', 'labs_by_sedoo_rss_post_thumbnail');

/**
 * automatically retrieve the first image from posts
 */

 // GET REMOTE FILESIZE
 // source : https://www.php.net/manual/fr/function.filesize.php#114952 
function labs_by_sedoo_remote_filesize($url) {
    static $regex = '/^Content-Length: *+\K\d++$/im';
    if (!$fp = @fopen($url, 'rb')) {
        return false;
    }
    if (
        isset($http_response_header) &&
        preg_match($regex, implode("\n", $http_response_header), $matches)
    ) {
        return (int)$matches[0];
    }
    return strlen(stream_get_contents($fp));
}

function labs_by_sedoo_catch_that_image() {
    global $post, $posts;
    $postType=get_post_type();
    $getIMG = '';
    $extFile="";
    // ob_start();
    // ob_end_clean();
    $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
    if (array_key_exists(0, $matches[1])) {
    $getIMG = $matches[1][0];
    }

    $current_siteurl = parse_url(get_site_url());
    $srcURL = parse_url($getIMG);

    $networkURL = parse_url(network_site_url());
    
    // check file size if not local
    // 
    if (!empty($getIMG)) {
        if (($srcURL['host']!==$current_siteurl['host']) && ($srcURL['host']!==$networkURL['host']) && (!empty($getIMG)) ) {
            $extIMG=$srcURL['scheme']."://".$srcURL['host'].$srcURL['path'];
            $extIMGsize=labs_by_sedoo_remote_filesize($extIMG);
            // if < 300000 > Ok let's display it
            if ($extIMGsize<300000) {
                $getIMG=$extIMG;
            } else {
                $extFile="TRUE";
            }
        }
    }

    // if no image or external image, load default SVG
    if((empty($getIMG))||($extFile=="TRUE")) {
        $getIMG = get_template_directory_uri() .'/images/empty-mode-'.$postType.'.svg';
    }
    $imgToShow='<img src="'.$getIMG.'" alt="" />';
    echo $imgToShow;
}

add_action( 'after_setup_theme', 'prefix_default_image_settings' );
function prefix_default_image_settings() {
update_option( 'image_default_align', 'center' );
update_option( 'image_default_link_type', 'none' );
update_option( 'image_default_size', 'medium' );
}

/******************************************************************
 * Afficher les archives des custom taxonomies
 * $categories = get_the_terms( $post->ID, 'category');  
 */

function sedoo_show_categories($categories, $slugRewrite) {
 
    if( $categories ) {
    ?>
    <div class="tag">
    <?php
        foreach( $categories as $categorie ) { 
        
            if ($categorie->slug !== "non-classe") {
                if ( (function_exists('pll_current_language')) && (pll_default_language() !== pll_current_language()) ) {
                    echo '<a href="'.site_url().'/'.pll_current_language().'/'.$slugRewrite.'/'.$categorie->slug.'" class="'.$categorie->slug.'">';
                } else {
                    echo '<a href="'.site_url().'/'.$slugRewrite.'/'.$categorie->slug.'" class="'.$categorie->slug.'">';
                }
                echo $categorie->name; 
                ?>
            </a>
        <?php 
            }
        }
    ?>
    </div>
  <?php
      } 
  }

/**
* Fix pagination on archive pages
*/
function sedoo_wpth_labs_content_before_posts() {
    global $wp_query;
    if ( (is_archive ()) && (!is_admin()) && (!is_post_type_archive( 'tribe_events' )) && (!is_tag ()) )
        $wp_query->set( 'posts_per_page', '1' );
        // $wp_query->set( 'posts_per_archive_page', '5');
    };
add_action('pre_get_posts', 'sedoo_wpth_labs_content_before_posts');

  /**
 * Prepare WP_Query for related content 
 * 
 */
function sedoo_wpth_labs_get_queried_content_arguments($post_type, $taxonomy, $term_slug, $tax_layout, $paged) {
    $args = array(
		'post_type'             => $post_type,
		'post_status'           => array( 'publish', 'private' ),
		'posts_per_page'        => 9, // -1 pour liste sans limite
        'paged'                 => $paged, 
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $term_slug,
			),
		),
	);
    sedoo_wpth_labs_get_queried_content($tax_layout, $args);
}

/**
 * Show related content
 * 
 */
function sedoo_wpth_labs_get_queried_content($tax_layout, $args) {
    $the_query = new WP_Query( $args );
    
    // Pagination fix
    $temp_query = $GLOBALS['wp_query'];
    $GLOBALS['wp_query'] = NULL;
    $GLOBALS['wp_query'] = $the_query;
    
    switch ($tax_layout) {
        case "grid":
            $listingClass = "post-wrapper";
            break;

        case "grid-noimage":
            $listingClass = "post-wrapper noimage";
            break;
        
        case "list":
            $listingClass = "content-list";
            break;
        
        case "list-full":
            $listingClass = "content-list";
            break;
             
        default:
            $listingClass = "post-wrapper";
    }
    
    ?>
		<section role="listNews" class="<?php echo $listingClass;?>">
            <?php
    if ( $the_query->have_posts() ) { 
		/* Start the Loop */
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            /*
            * Include the Post-Type-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
            */
            get_template_part( 'template-parts/content-archives', $tax_layout );
        endwhile;
        the_posts_navigation();
	} else {
        $the_query->set_404();
        status_header( 404 );
        nocache_headers();
        include( get_query_template( '404' ) );
        die();
	}
    // Reset main query object
    wp_reset_postdata();
    $GLOBALS['wp_query'] = NULL;
    $GLOBALS['wp_query'] = $temp_query;
	?>
	</section>
	<?php
}
/**
 * Show Table Of Content
 * 
 */
function sedoo_wpth_labs_display_sommaire($titre) {
    ?>
    <aside id="stickyMenu">
        <p><?php echo __('Summary', 'sedoo-wpth-labs'); ?></p>
		<nav role="sommaire">
			<ul id="tocList">
				
			</ul>
		</nav>
    </aside>
    <?php 
}

function sedoo_wpth_labs_test_if_post_thumbnail_and_display() {
    if (get_the_post_thumbnail()) {
    ?>
    <header id="cover">
        <?php the_post_thumbnail(); ?>
    </header>
    <?php 
    }
}

function sedoo_wpth_labs_display_title_on_top_on_mobile() {
    echo '<h1 class="onTop">'.get_the_title().'</h1>';
}

// function for remove seconds in date display (the events calendar, templates in tribe/events/v2/...)
function removeFromEnd($string, $stringToRemove) {
    $stringToRemoveLen = strlen($stringToRemove);
    $stringLen = strlen($string);
   
    $pos = $stringLen - $stringToRemoveLen;
    $out = substr($string, 0, $pos);

    return $out;
}