<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */
$term = get_queried_object();
$cover = get_field( 'tax_image', $term);
get_header();
?>

	<div id="content-area" class="wrapper archives">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<?php
			if ( !empty($cover)) {
					$coverStyle = "background-image:url(".$cover['url'].")";
				
				// else {
				// 	$coverStyle = "border-top:5px solid ".$code_color.";height:auto;";
				// }
				?>
				
				<header id="cover" class="page-header" style="<?php echo $coverStyle;?>">
					
				</header><!-- .page-header -->
				<?php
				}
				?>	
				<h1 class="page-title">
					<?php
					single_cat_title('', true);
					?>
				</h1>
				<?php
				if (get_the_archive_description()) {
					the_archive_description( '<div class="archive-description">', '</div>' );
				}
			?>
            
            <section role="listNews" class="content-list">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-list', get_post_type() );


			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
