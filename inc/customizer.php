<?php
/**
 * labs by Sedoo Theme Customizer
 *
 * @package labs_by_Sedoo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function labs_by_sedoo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'labs_by_sedoo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'labs_by_sedoo_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'labs_by_sedoo_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function labs_by_sedoo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function labs_by_sedoo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function labs_by_sedoo_customize_preview_js() {
	wp_enqueue_script( 'labs-by-sedoo-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'labs_by_sedoo_customize_preview_js' );




/******************************************************************
* CONVERTISSEUR DE COULEUR HEX > RGB
*
* source : https://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/

function hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
  }




/**************************************************************************************************************
*  Ajout du controleur de couleur personnalisée dans le customizer
*
*  source : https://codex.wordpress.org/Plugin_API/Action_Reference/customize_register
*/

function labs_by_sedoo_customize_color( $wp_customize )
{
   //All our sections, settings, and controls will be added here
       // remove the 'colors' section
   $wp_customize->remove_section('colors');

   //1. Define a new section (if desired) to the Theme Customizer
 	$wp_customize->add_section('labs_by_sedoo_color_scheme', array(
        'title'    => __('Theme options', 'theme-aeris'),
        'description' => '',
        'priority' => 30,
    ));


    //  =================================
    //  = Select Box pour theme color   =
    //  =================================
     $wp_customize->add_setting('labs_by_sedoo_main_color', array(
        'default'        => 'custom',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));

	//  ==================================
    //  = Text Input Main color code     =
    //  ==================================
    $wp_customize->add_setting('labs_by_sedoo_color_code', array(
        'default'        => '#CCC',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'labs_by_sedoo_color_code', array(
        'label'      => __('Couleur principale', 'labs_by_sedoo'),
        'section'    => 'labs_by_sedoo_color_scheme',
        'settings'   => 'labs_by_sedoo_color_code',
    )));

    //  =======================================
    //  = Text Input text color code     =
    //  =======================================
    $wp_customize->add_setting('labs_by_sedoo_text_color_code', array(
        'default'        => '#FFF',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
    $wp_customize->add_setting('labs_by_sedoo_color_code_secondary', array(
        'default'        => '#FFF',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'labs_by_sedoo_color_code_secondary', array(
        'label'      => __('Couleur secondaire du thème', 'labs_by_sedoo'),
        'section'    => 'labs_by_sedoo_color_scheme',
        'settings'   => 'labs_by_sedoo_color_code_secondary',
    )));

	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'labs_by_sedoo_text_color_code', array(
        'label'      => __('Couleur des textes sur les blocks utilisant la couleur dominante', 'labs_by_sedoo'),
        'section'    => 'labs_by_sedoo_color_scheme',
        'settings'   => 'labs_by_sedoo_text_color_code',
    )) );

}
add_action( 'customize_register', 'labs_by_sedoo_customize_color' );


/*****
* 
* Main code couleur en fonction du choix utilisateur
* 
*/

function labs_by_sedoo_main_color(){
    $code_color = get_theme_mod( 'labs_by_sedoo_color_code' );

    return $code_color;
}

function labs_by_sedoo_main_color_secondary(){
    $code_color = get_theme_mod( 'labs_by_sedoo_color_code_secondary' );

    return $code_color;
}

/*****
* 
* chargement du code couleur selectionné ou saisi
* 
*/

function labs_by_sedoo_color_style() {
	
	// if (get_theme_mod('labs_by_sedoo_main_color') == "custom" ) {
	// 	$code_color = get_theme_mod( 'labs_by_sedoo_color_code' );
	// }
	// else {
	// 	$code_color	= get_theme_mod( 'labs_by_sedoo_main_color' );
	// }

    $code_color=labs_by_sedoo_main_color();
    $code_color_sec=labs_by_sedoo_main_color_secondary();
    $rgb_color = hex2rgb($code_color); // array 0 => r , 1 => g, 2 => b
    
    if (!get_theme_mod('labs_by_sedoo_text_color_code')) {
        $hover_text_color="#FFFFFF";
    } else {
        $hover_text_color=get_theme_mod('labs_by_sedoo_text_color_code');
    }

	?>
         <style type="text/css">
             
             :root {
                --theme-color: <?php echo $code_color;?>;
                --theme-color-rgba: rgba(<?php echo $rgb_color[0].",".$rgb_color[1].",".$rgb_color[2].",.8)"; ?>);
                --second-theme-color: <?php echo $code_color_sec;?>;
                --hover-textcolor: <?php echo $hover_text_color;?>;
                --component-color: <?php echo $code_color;?>;
                --hover-text-component-color: <?php echo $hover_text_color;?>;
                --green-color: <?php echo get_field('green_color', 'option'); ?>;
                --blue-color: <?php echo get_field('blue_color', 'option'); ?>;
                --orange-color: <?php echo get_field('orange_color', 'option'); ?>;
                --red-color: <?php echo get_field('red_color', 'option'); ?>;
                --palette-color-1: <?php echo get_site_color(0); ?>;
                --palette-color-2: <?php echo get_site_color(1); ?>;
                --palette-color-3: <?php echo get_site_color(2); ?>;
                --palette-color-4: <?php echo get_site_color(3); ?>;
                --palette-color-5: <?php echo get_site_color(4); ?>;
                --custom-color-1: <?php echo get_site_color_custom(1); ?>;
                --custom-color-2: <?php echo get_site_color_custom(2); ?>;
                --custom-color-3: <?php echo get_site_color_custom(3); ?>;
                --custom-color-4: <?php echo get_site_color_custom(4); ?>;
                --custom-color-5: <?php echo get_site_color_custom(5); ?>;
            }
            
            <?php
            if ($mainMenuLayout = "grid") {
                if (( function_exists( 'get_field' ) ) && ( get_field('sedoo_labs_grid_menu_color', 'option') == "coloredGrid" )) {                    
                ?>
                    nav[id="primary-navigation"].grid.coloredGrid ul li a:hover,
                    .grid.coloredGrid ul[id="primary-menu"] .menu-item:hover .sub-menu
                    {
                        background: var(--theme-color);
                    }
                    nav[id="primary-navigation"].grid.coloredGrid ul li a:hover,
                    .grid.coloredGrid ul[id="primary-menu"] .menu-item:hover .sub-menu a
                    {
                        color: #FFF;
                    }
                <?php
                }
            
                if (( function_exists( 'get_field' ) ) &&(get_field('sedoo_labs_grid_menu_columns', 'option') !== 5)) {
                ?>
                .grid ul[id="primary-menu"] .menu-item .sub-menu {
                    grid-template-columns: repeat(<?php echo get_field('sedoo_labs_grid_menu_columns', 'option');?>, 1fr);       
                }                               
                <?php
                } 
            }
            ?>

         </style>
    <?php
}
add_action( 'wp_head', 'labs_by_sedoo_color_style');

?>