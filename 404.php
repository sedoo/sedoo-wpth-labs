<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package labs_by_Sedoo
 */

get_header();
?>

	<div id="primary" class="content-area wrapper">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="page-content">

					<div class="sedoo_404">
						<h1>404</h1>
						<p> <?php  esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'labs-by-sedoo' ); ?></p>
						<div class="searchform_404">
							<?php 
								get_search_form();
								if(!is_user_logged_in()) {
							?>
								<a href="<?php echo wp_login_url(); ?>"> Connexion </a>
							<?php 
								}
							?>
						</div>
					</div>
					<hr />
					<div class="row row_404">
						<?php
						the_widget( 'WP_Widget_Recent_Posts' );
						?>
						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'labs-by-sedoo' ); ?></h2>
							<ul>
								<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
								?>
							</ul>
						</div><!-- .widget -->

						<?php
						/* translators: %1$s: smiley */
						$labs_by_sedoo_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'labs-by-sedoo' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$labs_by_sedoo_archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
