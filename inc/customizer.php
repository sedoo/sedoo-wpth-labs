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
    $wp_customize->add_setting('labs_by_sedoo_text_color_code_secondary', array(
        'default'        => '#FFF',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'labs_by_sedoo_text_color_code', array(
        'label'      => __('Couleur des textes sur les blocks utilisant la couleur dominante', 'labs_by_sedoo'),
        'section'    => 'labs_by_sedoo_color_scheme',
        'settings'   => 'labs_by_sedoo_text_color_code',
    )) );

	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'labs_by_sedoo_color_code', array(
        'label'      => __('Couleur secondaire du thème', 'labs_by_sedoo'),
        'section'    => 'labs_by_sedoo_color_scheme',
        'settings'   => 'labs_by_sedoo_text_color_code_secondary',
    )));


    //  =======================================
    //  = Text Input Link hover color code     =
    //  =======================================
//    $wp_customize->add_setting('labs_by_sedoo_link_hover_color_code', array(
//        'default'        => '#009FDE',
//        'capability'     => 'edit_theme_options',
//        'type'           => 'theme_mod',
// 
//    ));
//
//	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'labs_by_sedoo_link_hover_color_code', array(
//        'label'      => __('Couleur de survol des liens', 'labs_by_sedoo'),
//        'section'    => 'labs_by_sedoo_color_scheme',
//        'settings'   => 'labs_by_sedoo_link_hover_color_code',
//    )) );


    //  =============================
    //  = Checkbox breadcrumb       =
    //  =============================
    $wp_customize->add_setting('labs_by_sedoo_breadcrumb', array(
        'default'        => 'false',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));

	$wp_customize->add_control('labs_by_sedoo_breadcrumb', array(
        'label'      => __('Afficher le fil d\'ariane sur les pages', 'labs_by_sedoo'),
        'section'    => 'labs_by_sedoo_color_scheme',
        'settings'   => 'labs_by_sedoo_breadcrumb',
        'type'       => 'checkbox',
    ));

	//  =============================
    //  = Text Input copyright     =
    //  =============================
    $wp_customize->add_setting('labs_by_sedoo_copyright', array(
        'default'        => 'Pôle Aeris '.date('Y').' - Service de données OMP (SEDOO)',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
 
    ));

	$wp_customize->add_control('labs_by_sedoo_copyright', array(
        'label'      => __('© Copyright', 'labs_by_sedoo'),
        'section'    => 'labs_by_sedoo_color_scheme',
        'settings'   => 'labs_by_sedoo_copyright',
    ));

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

	$rgb_color = hex2rgb($code_color); // array 0 => r , 1 => g, 2 => b
    
	?>
         <style type="text/css">
             
            .post:hover .group-content .entry-content h2,
            ul[id="shortcuts"] li:hover button,
            ul[id="shortcuts"] li:hover a,
            nav[id="burger-navigation"] .overlay .slick-slide .menu-item a:hover,
            .footer-menu ul[id="primary-menu"] .menu-item a,
            .footer-categories li a:hover,
            .read-more-article .post-loop .post-preview:hover h3,
            .wrapper-content a, 
            .wrapper-layout a,
            .fullwidth a,
            .copyright .wrapper.site-info a,
            .search-form .search-submit:hover,
            .search-form .search-field:focus,
            .search-form .search-field:active,
            body a.btn:hover,
            .page-template-template-evenements .event-post:hover,
            .author-card > div:first-child > div:last-child p a:hover,
            .search-annuaire input[type="search"]:focus,
            .search-annuaire button:hover,
            .single-event .wrapper-layout header .post-meta,
            .posts-navigation a:hover,
            .wpfc-calendar-wrapper .fc .ui-state-active,
            .post-wrapper .event-post:hover h3,
            .summary #ez-toc-container .ez-toc-list li a:hover,
            .summary #ez-toc-container .ez-toc-title-container .ez-toc-title-toggle a:hover i
			{
				color: <?php echo $code_color;?>;
			}

			nav[id="primary-navigation"] ul li:hover a,
            ul[id="primary-menu"] .menu-item .sub-menu,
            ul[id="shortcuts"] li,
            .post .entry-header p,
            .post-horizontal .entry-header p,
            .social-list li a:hover::before,
            .read-more-article h2,
            .nav-box .nav-box-chevron,
            .wrapper-content a:hover,
            .wrapper-layout a:hover,
            ::selection,
            -moz-::selection,
            .copyright .wrapper.site-info a:hover,
            body a.btn,
            .search-form .search-submit,
            div[id="em-wrapper"] h2,
            .author-card > div:first-child > div:not(.img-author),
            .search-annuaire button,
            .overlay.location .wrapper .slick-dots .slick-active button::after,
            .wp-block-button .wp-block-button__link,
            .posts-navigation a,
            .ui-widget-header,
            .page-links span.current,
            .wrapper-layout .social-list a:hover::before          
            {
                background: <?php echo $code_color;?>;
			}
            
            .social-list li a:hover::before,
            .search-form .search-field:focus,
            .search-form .search-field:active,
            aside[id="stickyMenu"],
            .bobinette,
            .search-annuaire input[type="search"]:focus,
            .ui-widget-header,
            .page-links span.current
            {
                 border-color: <?php echo $code_color;?>;
            }

            a:hover,
			a:focus,
            a:active,
            aside[id="stickyMenu"] [id="tocList"] li.active a,
            .post-wrapper.sedoo-labtools-listCPT article > a:hover {
				color: <?php echo $code_color;?>;
			}

            #desc_overlay {
                background-color: rgba(<?php echo $rgb_color[0].",".$rgb_color[1].",".$rgb_color[2].",.8)"; ?>;
            }
             
            ul[id="shortcuts"] li:hover path, 
            ul[id="shortcuts"] li:hover rect:not(.size), 
            ul[id="shortcuts"] li:hover line{
                fill: <?php echo $code_color;?>!important;
            }
             .bobinette svg polyline{
                 stroke: <?php echo $code_color; ?>;
             }
            

         </style>
    <?php

}
add_action( 'wp_head', 'labs_by_sedoo_color_style');

// Fonction renvoyant les valeurs du customizer "Options du thème / Ambiance & Display mode
function labs_by_sedoo_bodyAttribute() {
    
    if( get_theme_mod( 'labs_by_sedoo_ambiance' ) == "dark") {
        // wp_enqueue_style('labs_by_sedoo_ambiance', get_bloginfo('template_directory') . '/css/dark.css');
        $classes['ambiance'] = "darkTheme";
    } else {
        $classes['ambiance'] = "lightTheme";
    }

	// le if == "value1" est une vieillerie, non supprimable !! tous les vieux sites sont parametrés avec cette valeur... bref, j'avais codé comme un con...
	if(( get_theme_mod( 'labs_by_sedoo_box' ) == "value1") || (get_theme_mod( 'labs_by_sedoo_box' ) == "box")) {
        $classes['box'] = "boxes";
	    // wp_enqueue_style('theme-aeris-box', get_bloginfo('template_directory') . '/css/boxes.css');
    }else {
        $classes['box'] = "nobox";
    }
    return $classes;
}


?>