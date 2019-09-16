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
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="wrapper-layout">
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
        <?php // table_content ( value )
        if (get_field( 'table_content' )):
        ?>
        <aside id="stickyMenu" class="open">
            <div>
                <p>Sommaire</p>
                <nav role="sommaire">
                    <ol id="tocList">
                    </ol>
                </nav>
                <button class="bobinette">
                </button>
            </div>
        </aside>
        <?php endif; ?>
	</div><!-- #primary -->
<?php

get_sidebar();
get_footer();
