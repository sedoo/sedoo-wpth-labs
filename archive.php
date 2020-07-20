<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

get_header();

// get the current taxonomy term
$term = get_queried_object();
$code_color=labs_by_sedoo_main_color();
$tax_layout = get_field('tax_layout', $term);
$cover = get_field( 'tax_image', $term);
$no_result_text = get_field('no_results_text_tax');	
$affichage_portfolio = get_field('sedoo_affichage_en_portfolio', $term);
?>

	<div id="content-area" class="wrapper archives">
		<main id="main" class="site-main">
		<?php
		if ( !empty($cover)) {
				$coverStyle = "background-image:url(".$cover['url'].")";
			} else {
				$coverStyle = "border-top:5px solid ".$code_color.";height:auto;";
			}
			?>
			
			<header id="cover" class="page-header" style="<?php echo $coverStyle;?>">
							
			</header><!-- .page-header -->
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
			if($affichage_portfolio != true) { // if portfolio then display it, if not just do the normal script
				/**
				 * WP_Query pour lister tous les types de posts
				 */
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				/* sedoo_wpth_labs_get_queried_content_arguments(post_types, taxonomy, slug, display, paged) */
				sedoo_wpth_labs_get_queried_content_arguments(array('post', 'page'), 'category', $term->slug, $tax_layout, $paged);
			} else {
				?>
				<script>
					ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
				</script>
				<style>
					.sedoo_port_action_btn li:hover {
						background-color: <?php echo $code_color; ?> !important;
					}

					.sedoo_port_action_btn li.active {
						background-color: <?php echo $code_color; ?> !important;
					}
				</style>
				<?php 
				archive_do_portfolio_display($term);
			}
        
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();