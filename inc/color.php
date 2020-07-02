<?php

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mytheme_setup_theme_supported_features() {

	// I create my first color table with primary secondary and some others
	$couleurs = array(
		array( 'name' => 'Main color', 'slug'  => 'main_color', 'color' => labs_by_sedoo_main_color() ),
		array( 'name' => 'Secondary color', 'slug'  => 'secondary_color', 'color' => labs_by_sedoo_main_color_secondary() ),
		array( 'name' => 'blue', 'slug'  => 'blue', 'color' => '#2196f3' ),
		array( 'name' => 'green', 'slug'  => 'green', 'color' => '#4caf50' ),
		array( 'name' => 'orange', 'slug'  => 'orange', 'color' => '#ff9800' ),
		array( 'name' => 'red', 'slug'  => 'red', 'color' => '#f44336' ),
	);


	// then I look in my theme if there are any colors set in the theme setting
	$couleurs_options  = get_field('theme_palet_color', 'option');
	$numero_couleur = 1;
	if( $couleurs_options ) {
		foreach( $couleurs_options as $couleur ) {
			// if yes then I add them to the color table I created line 11 of this file
			$ligne_couleur = array( 'name' => 'Couleur ajoutée '.$numero_couleur, 'slug'  => 'couleur_ajoutee_'.$numero_couleur, 'color' => $couleur['added_theme_color'] );
			array_push($couleurs, $ligne_couleur);
			$numero_couleur++;
		}
	}

    add_theme_support( 'editor-color-palette', $couleurs );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );


// load color in css

function labs_sedoo_add_color_to_theme() {
	?>
		<style type="text/css">
			.has-main-color-background-color {
				background-color : <?php echo labs_by_sedoo_main_color(); ?>;
			}
			.has-secondary-color-background-color {
				background-color : <?php echo labs_by_sedoo_main_color_secondary(); ?>;
			}
			.has-green-background-color {
				background-color : #4caf50;
			}
			.has-blue-background-color {
				background-color : #2196f3;
			}
			.has-green-background-color {
				background-color : #4caf50;
			}
			.has-orange-background-color {
				background-color : #ff9800;
			}
			.has-red-background-color {
				background-color : #f44336;
			}
	
			.has-couleur-ajoutee-1-background-color {
				background-color : <?php echo get_site_color(0); ?>;
			}
			.has-couleur-ajoutee-2-background-color {
				background-color : <?php echo get_site_color(1); ?>;
			}
			.has-couleur-ajoutee-3-background-color {
				background-color : <?php echo get_site_color(2); ?>;
			}
			.has-couleur-ajoutee-4-background-color {
				background-color : <?php echo get_site_color(3); ?>;
			}
			.has-couleur-ajoutee-5-background-color {
				background-color : <?php echo get_site_color(4); ?>;
			}
	

			.has-main-color-color {
				color : <?php echo labs_by_sedoo_main_color(); ?>;
			}
			.has-secondary-color-color {
				color : <?php echo labs_by_sedoo_main_color_secondary(); ?>;
			}
			.has-blue-color {
				color : #2196f3;
			}
			.has-green-color {
				color : #4caf50;
			}
			.has-orange-color {
				color : #ff9800;
			}
			.has-red-color {
				color : #f44336;
			}

			.has-couleur-ajoutee-1-color {
				color : <?php echo get_site_color(0); ?>;
			}
			.has-couleur-ajoutee-2-color {
				color : <?php echo get_site_color(1); ?>;
			}
			.has-couleur-ajoutee-3-color {
				color : <?php echo get_site_color(2); ?>;
			}
			.has-couleur-ajoutee-4-color {
				color : <?php echo get_site_color(3); ?>;
			}
			.has-couleur-ajoutee-5-color {
				color : <?php echo get_site_color(4); ?>;
			}
	
		</style>
	<?php
	}
	add_action( 'wp_head', 'labs_sedoo_add_color_to_theme');

?>