<?php
/*
Template Name: Evenements
*/
get_header(); 

//$format = get_post_format();
//$categories = get_the_terms( $post->ID, 'category');  

?>


	<div id="content-area">
		<main id="main" class="site-main" role="main">
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
			
				<section class="wrapper-layout">

                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'page' );


                        endwhile; // End of the loop.
                        ?>
                    
		        </section>

			</article>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

// get_sidebar();
get_footer();

?>