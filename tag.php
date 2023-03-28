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
$affichage_portfolio = get_field('sedoo_affichage_en_portfolio', $term);
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
			<?php
			// if portfolio then display it, if not just do the normal script
			if($affichage_portfolio != true) { 
			?>
				<section role="listNews" class="content-list">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content-list', get_post_type() );

				endwhile;

				the_posts_navigation();

				?>
				</section>
			<?php
			} else {
				// LOAD PORTFOLIO DISPLAY FUNCTION FROM PLUGIN
				archive_do_portfolio_display($term);
			}
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
