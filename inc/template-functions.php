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