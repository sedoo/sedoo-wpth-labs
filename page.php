<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

get_header();
$query_object = get_queried_object();
// if ($query_object->post_type) {
    $page_id = get_queried_object_id();
// }
$title = get_the_title($page_id);
?>
    <?php
    if (get_the_post_thumbnail()) {
    ?>
        <header id="cover">
            <?php the_post_thumbnail('cover'); ?>
        </header>
    <?php 
    }
    ?>
    <?php 
    // Show title first on mobile
    if (get_field( 'table_content' )) {
        sedoo_wpth_labs_display_title_on_top_on_mobile();
    }
    ?>
	<div id="primary" class="content-area wrapper <?php if (get_field( 'table_content' )) {echo " tocActive";}?>">
        <?php // table_content ( value ) 
        if (get_field( 'table_content' )) {
            sedoo_wpth_labs_display_sommaire('Sommaire');
        } ?>
        <main id="main" class="site-main">
            
            <div class="wrapper-content">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </div>
		</main><!-- #main -->
        
	</div><!-- #primary -->
<?php

get_footer();
