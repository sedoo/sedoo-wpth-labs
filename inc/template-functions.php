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

function labs_by_sedoo_catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "no_image";
  }
  return $first_img;
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
                if ( (function_exists('pll_current_language')) ) {
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
 * Prepare WP_Query for related content 
 * 
 */
function sedoo_wpth_labs_get_queried_content_arguments($post_type, $taxonomy, $term_slug, $tax_layout, $paged) {
     
    $args = array(
		'post_type' => $post_type,
		// 'post_type' 			=> 'sfdsd',
		'post_status'           => array( 'publish' ),
		'posts_per_page'        => 9,            // -1 pour liste sans limite
		'paged'					=> $paged,
		// 'post__not_in'          => array($postID),    //exclu le post courant
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
	// var_dump($the_query);
	// The Loop
	if ( $the_query->have_posts() ) { 
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
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			
			/*
			* Include the Post-Type-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Type name) and that will be used instead.
			*/
			get_template_part( 'template-parts/content', $tax_layout );


		endwhile;

		the_posts_navigation();

	} else {
		$no_result_text = get_field('no_results_text_tax', get_the_id());	
		// get_template_part( 'template-parts/content', 'none' );
		?>
		<p><?php echo $no_result_text; ?></p>
		<?php

	}
	?>
	</section>
	<?php
}