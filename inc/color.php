<?php

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//////////////////
// REGISTER COLORS IN GUTENBERG PALETTE FOR PAGE AND POST EDITION
//////
if(function_exists('get_field')) {

	function sedoo_colorselect_and_palette_creation() {
	
		////////////
		// Creating first color array from main, secondary and message
		/////
		$couleurs = array(
			array( 'name' => 'Main color', 'slug'  => 'main_color', 'color' => labs_by_sedoo_main_color() ),
			array( 'name' => 'Secondary color', 'slug'  => 'secondary_color', 'color' => labs_by_sedoo_main_color_secondary() ),
			array( 'name' => 'Blue', 'slug'  => 'blue', 'color' => get_field('blue_color', 'option') ),
			array( 'name' => 'Green', 'slug'  => 'green', 'color' => get_field('green_color', 'option') ),
			array( 'name' => 'Orange', 'slug'  => 'orange', 'color' => get_field('orange_color', 'option')  ),
			array( 'name' => 'Red', 'slug'  => 'red', 'color' => get_field('red_color', 'option') ),
		);
		
		////////////
		// Then add the choosen colors to the colors array (custom color bloc)
		/////
		$couleurs_options_choose  = get_field('ajout_de_couleurs', 'option');
		$numero_couleur = 1;
		if( $couleurs_options_choose ) {
			foreach( $couleurs_options_choose as $couleur ) {
				// if yes then I add them to the color table I created in this file ($couleurs)
				$ligne_couleur = array( 'name' => 'Couleur selectionnée '.$numero_couleur, 'slug'  => 'couleur_selectionnee_'.$numero_couleur, 'color' => $couleur['sedoo_select_custom_color'] );
				array_push($couleurs, $ligne_couleur);
				update_option('options_ajout_de_couleurs_'.$numero_couleur.'_color', $couleur['sedoo_select_custom_color'], '', 'no');
				$numero_couleur++;
			}
		}
		
		////////////
		// Then add the generated palette to the colors array
		/////
		$couleurs_options  = get_field('theme_palet_color', 'option');
		$numero_couleur = 1;
		if( $couleurs_options && is_array($couleurs_options)) {
			foreach( $couleurs_options as $couleur ) {
				// if yes then I add them to the color table I created in this file ($couleurs)
				$ligne_couleur = array( 'name' => 'Couleur palette '.$numero_couleur, 'slug'  => 'couleur_ajoutee_'.$numero_couleur, 'color' => $couleur['added_theme_color'] );
				array_push($couleurs, $ligne_couleur);
				
				$numero_couleur++;
			}
		}
	
		////////////
		// Loading my color array to the gutenberg palette
		/////
		add_theme_support( 'editor-color-palette', $couleurs );
	}

	add_action( 'after_setup_theme', 'sedoo_colorselect_and_palette_creation' );
}


////////////////
// save color from js for theme option
/////////
add_action( 'wp_ajax_sedoo_colorgeneration_theme_colors', 'sedoo_colorgeneration_theme_colors' );
add_action( 'wp_ajax_nopriv_sedoo_colorgeneration_theme_colors', 'sedoo_colorgeneration_theme_colors' );

function sedoo_colorgeneration_theme_colors() {
  
	$color1 = '#'.$_POST['color1'];
	$color2 = '#'.$_POST['color2'];
	$color3 = '#'.$_POST['color3'];
	$color4 = '#'.$_POST['color4'];
	$color5 = '#'.$_POST['color5'];

	if($_POST['siteid']) {
		$siteid = $_POST['siteid'];
	} else {
		$siteid = get_current_blog_id();
	}
    ////////////
    // change blog to be able to save options
    /////
	switch_to_blog($siteid);
	// if no color palet option then create them
	if(!get_option('options_theme_palet_color')){
		add_option('options_theme_palet_color', 5, '', 'no');
		add_option('_options_theme_palet_color', 'field_5efd9539079ff', '', 'no');
		add_option('options_theme_palet_color_0_added_theme_color', $color1);
		add_option('_options_theme_palet_color_0_added_theme_color', 'field_5efd959407a00', '', 'no');
		add_option('options_theme_palet_color_1_added_theme_color', $color2);
		add_option('_options_theme_palet_color_1_added_theme_color', 'field_5efd959407a00', '', 'no');
		add_option('options_theme_palet_color_2_added_theme_color', $color3);
		add_option('_options_theme_palet_color_2_added_theme_color', 'field_5efd959407a00', '', 'no');
		add_option('options_theme_palet_color_3_added_theme_color', $color4);
		add_option('_options_theme_palet_color_3_added_theme_color', 'field_5efd959407a00', '', 'no');
		add_option('options_theme_palet_color_4_added_theme_color', $color5);
		add_option('_options_theme_palet_color_4_added_theme_color', 'field_5efd959407a00', '', 'no');
	} else {
		var_dump(get_option('options_theme_palet_color_0_added_theme_color'));
		update_option('options_theme_palet_color_0_added_theme_color', $color1);
		var_dump(get_option('options_theme_palet_color_0_added_theme_color'));
		update_option('options_theme_palet_color_1_added_theme_color', $color2);
		update_option('options_theme_palet_color_2_added_theme_color', $color3);
		update_option('options_theme_palet_color_3_added_theme_color', $color4);
		update_option('options_theme_palet_color_4_added_theme_color', $color5);
	}
	wp_die();
}

////////////////
// get main color in js (used by users for regenerate their palette)
/////////
add_action( 'wp_ajax_labs_by_sedoo_ajax_get_main_color', 'labs_by_sedoo_ajax_get_main_color' );
function labs_by_sedoo_ajax_get_main_color(){
    $code_color = get_theme_mod( 'labs_by_sedoo_color_code' );
	echo $code_color;
	wp_die(); // this is required to terminate immediately and return a proper response
}

////////////////
// hook before the form in theme informations to embed colorwheel.js (used for calculate colors)
/////////
function sedoo_load_color_javascript() {
	wp_enqueue_script( 'labs-by-sedoo-load-colorwheel', get_template_directory_uri() . '/js/colorwheel.js' );
}
add_action( 'admin_enqueue_scripts', 'sedoo_load_color_javascript' );
function acf_load_color_field_choices( $field ) {
	return $field;
}
add_filter('acf/load_field/name=theme_palet_color', 'acf_load_color_field_choices');
////////////////
// get color for css in inc/color.php  (numcolor is the numero of the color (from 0 to 4))
/////////
function get_site_color($num_color) {
	$color = get_option('options_theme_palet_color_'.$num_color.'_added_theme_color');
	return $color;
}
////////
// Get color added from user 
/////
function get_site_color_custom($num_color) {
	$color = get_option('options_ajout_de_couleurs_'.$num_color.'_color');
	return $color;
}


////////////////
// load color in css
/////////
// function labs_sedoo_add_color_to_theme() {
// 	}
// 	add_action( 'wp_head', 'labs_sedoo_add_color_to_theme');

?>