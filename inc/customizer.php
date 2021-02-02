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
                --theme-color:<?php echo $code_color;?>;
                --second-theme-color:<?php echo $code_color_sec;?>;
                --hover-textcolor:<?php echo $hover_text_color;?>;
            }

            .post:hover .group-content .entry-content h2,
            ul[id="shortcuts"] li:hover button,
            ul[id="shortcuts"] li:hover a,
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
            .post-wrapper .event-post:hover h3
            /* .summary #ez-toc-container .ez-toc-list li a:hover,
            .summary #ez-toc-container .ez-toc-title-container .ez-toc-title-toggle a:hover i */
			{
				color: <?php echo $code_color;?>;
			}

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
            /* .overlay.location .wrapper .slick-dots .slick-active button::after, */
            .wp-block-button .wp-block-button__link,
            .posts-navigation a,
            .ui-widget-header,
            .page-links span.current,
            .wrapper-layout .social-list a:hover::before, 
            .cn-button, 
            .btn_footer_local:hover
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
            

            /* AGENDA */
            .tribe-common .tribe-common-c-btn, .tribe-common a.tribe-common-c-btn, .tribe-common--breakpoint-medium.tribe-events .tribe-events-c-view-selector--tabs .tribe-events-c-view-selector__list-item--active .tribe-events-c-view-selector__list-item-link::after, .tribe-events .datepicker .day.active, .tribe-events .datepicker .day.active.focused, .tribe-events .datepicker .day.active:focus,
            .tribe-events .datepicker .day.active:hover,
            .tribe-events .datepicker .month.active,
            .tribe-events .datepicker .month.active.focused,
            .tribe-events .datepicker .month.active:focus,
            .tribe-events .datepicker .month.active:hover,
            .tribe-events .datepicker .year.active,
            .tribe-events .datepicker .year.active.focused,
            .tribe-events .datepicker .year.active:focus,
            .tribe-events .datepicker .year.active:hover,
            .tribe-events .tribe-events-c-ical__link:active,
            .tribe-events .tribe-events-c-ical__link:focus,
            .tribe-events .tribe-events-c-ical__link:hover,
            .tribe-events .tribe-events-c-view-selector__button::before {
                background : <?php echo $code_color;?>;
            }
            
            .tribe-common .tribe-common-c-btn:active, .tribe-common a.tribe-common-c-btn:active,
            .tribe-common .tribe-common-c-btn:focus, .tribe-common .tribe-common-c-btn:hover, .tribe-common a.tribe-common-c-btn:focus, .tribe-common a.tribe-common-c-btn:hover {
                background:<?php echo $code_color_sec; ?>;
            }

            .tribe-events .tribe-events-c-ical__link::before {
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12'%3E%3Cpath d='M6 1v10m5-5H1' fill='none' fill-rule='evenodd' stroke='rgb(<?php echo $rgb_color[0].",".$rgb_color[1].",".$rgb_color[2].")" ?>' stroke-linecap='square' stroke-width='1.5'/%3E%3C/svg%3E");
            }

            .tribe-events .tribe-events-c-ical__link {
                color:<?php echo $code_color;?>;
                border-color: <?php echo $code_color;?>;
            }
            @keyframes a {
                50% {
                    background-color:<?php echo $code_color;?>
                }
            }

            <?php
            if ($mainMenuLayout = "grid") {
                if ( get_field('sedoo_labs_grid_menu_color', 'option') == "coloredGrid" ) {                    
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
            
                if (get_field('sedoo_labs_grid_menu_columns', 'option') !== 5) {
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