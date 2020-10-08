<?php
/******************************************************************
* REDIRECT AFTER LOGIN
*/
function theme_aeris_login_redirect( $redirect_to, $request, $user ){
	return home_url();
  }
  add_filter( 'theme_aeris_login_redirect', 'login_redirect', 10, 3 );

/******************************************************************
* SHORTCODE TO HIDE EMAIL
*/
function sedoo_labs_shortcode_mail_sedoo($atts, $content){
	
  return $content.'<i class="hide">NO SPAM -- FILTER</i>@<i class="hide">NO SPAM -- FILTER</i>'.$atts['domain'];
}
add_shortcode('hmail','sedoo_labs_shortcode_mail_sedoo');

/*** ADD CLASS TO ITEM MENU  */
add_filter('wp_nav_menu_objects', 'sedoo_labs_wp_nav_menu_objects', 10, 2);

function sedoo_labs_wp_nav_menu_objects( $items, $args ) {
	
	// check Main menu layout
	// choice : classic (default), flyout
	if (get_field('sedoo_labs_main_menu_layout', 'option')) {
		$mainMenuLayout = get_field('sedoo_labs_main_menu_layout', 'option'); //field_5f6da0eb5ac37
	} else {
		$mainMenuLayout = "grid";
	}
	// loop
	foreach( $items as &$item ) {
		$menuLayout = get_field('sedoo_labs_layout_menu', $item);
		
		if ($item->menu_item_parent == 0) {
			if ( $menuLayout ) {
				array_push($item->classes, $menuLayout);
				// $item->classes = $menuLayout;
			}
			else {
				// add default value
				array_push($item->classes, $mainMenuLayout);
			}
		}
		
	}
	// return
	return $items;
}

?>