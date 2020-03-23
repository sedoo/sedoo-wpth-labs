<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aeris
 */

get_header(); 

$format = get_post_format();
$categories = get_the_category();
$terms=array();
if (is_array($categories) || is_object($categories))
{
  foreach ($categories as $term_slug) {        
     array_push($terms, $term_slug->slug);
  }
}

while ( have_posts() ) : the_post();

?>
	<div id="primary" class="content-area <?php echo esc_html( $categories[0]->slug );?>">
        <?php
            if ( has_post_thumbnail() ) {
        ?>
            <header id="cover">
                <?php the_post_thumbnail('cover'); ?>
            </header>
        <?php 
        }
        ?>
        <div class="wrapper-layout">
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <div>
                            <p>
                            <?php $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                echo esc_html( $categories[0]->name );   
                            }; ?>
                            </p>
                            <p class="post-meta"><?php the_date(); ?></p>
                        </div>
                    </header>
                    <section>
                        <?php the_content(); ?>
                    </section>
                    <?php if (get_field("sources")){ ?>
                    <footer class="sources">
                        <h2><?php echo __('Sources', 'sedoo-wpth-labs'); ?> :</h2>
                        <p><?php the_field("sources") ?></p>
                    </footer>
                    <?php } ?>
                </article>
            </main><!-- #main -->
            <?php 
            $ajout_auteur = get_field('ajouteur_auteur');
            $select_lauteur_array = get_field( 'select_lauteur' ); 
            if ( (get_field('ajouteur_auteur')) || (get_field('labstools_show_sidebar')) )  {
            get_template_part('template-parts/contextual-sidebar-single'); 
            }
            ?>
        </div>
        <footer class="read-more-article">
            <div>
            <?php
            $args = array(
                'post_type'             => 'post',
                'post_status'           => array( 'publish' ),
                'posts_per_page'        => '2',           
                'post__not_in'          => array(get_the_ID()), 
                'orderby'               => 'date',
                'order'                 => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $terms,
                    ),
                ),
            );
            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) {  
            ?>
                <h2><?php echo __("D'autres actualités sur le même thème", 'sedoo-wpth-labs'); ?> :</h2>
                <div class="post-loop">
                <?php                
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        $titleItem=mb_strimwidth(get_the_title(), 0, 80, '...');  
                        ?>
                        <a class="post-preview" href="<?php the_permalink(); ?>">   
                            <div>
                                <h3 title="<?php the_title(); ?>"><?php echo $titleItem; ?></h3>
                            </div>
                            <div class="post-img">
                                <?php if (get_the_post_thumbnail()) {
                                    the_post_thumbnail(array(790, 240, true));
                                } else {
                                    if (catch_that_image() ==  "no_image" ){
                                         ?>
                                        <img class="object-fit-contain" src="<?php echo get_template_directory_uri() .'/images/empty-mode-post.svg'; ?>" alt="" />
                                    <?php 
                                    } else {
                                        echo '<img src="';
                                        echo catch_that_image();
                                        echo '" alt="" />'; 
                                    }
                                }
                                ?>
                            </div>
                        </a>
                    <?php
                    }
                ?>            
               </div>
            <?php
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>     
            </div>
        </footer>
        <?php get_template_part('template-parts/nav-box'); ?>
	</div><!-- #primary -->
<?php
endwhile; // End of the loop.
 
get_footer();
