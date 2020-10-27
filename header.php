<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labs_by_Sedoo
 */

// var_dump($mainMenuLayout);
// switch ($mainMenuLayout) {
//     case "classic":
//         $mainMenuClass = "menu".$mainMenuLayout;
//         break;
//     case "flyout":
//         $mainMenuClass = "menu".$mainMenuLayout;
//         break;
    // case 2:
    //     echo "i égal 2";
    //     break;
// }

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:400,400i,600,700&display=swap" rel="stylesheet">  -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'labs-by-sedoo' ); ?></a>
	<header id="masthead" class="site-header">
        <div class="wrapper">
        <?php
        if ( wp_is_mobile() ) {
        ?>
            <label for="menu-trigger" id="trigger" class="menu-trigger">Open/Close Menu</label>
        <?php
        } 
        ?>      
            <div class="site-branding">
                <?php the_custom_logo(); ?>
            </div><!-- .site-branding -->

        <?php
        if ( wp_is_mobile() ) {
            // responsive menu
        ?>  
            <input type="checkbox" id="menu-trigger">  
            <nav id="responsive-menu" class="mp-menu">
                <?php                     
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'menu_id'        => 'mobile-menu',
                    'depth'        => '3',
                    'container_class'   => 'mp-level',
                    'container_aria_label' => 'Menu principal / Main menu',
                ) ); 
                ?>
            </nav>
        <?php
        } else {
        ?>            
            <div class="nav-container">
            <?php if (has_nav_menu('top-menu')) { 
                ?>
                    <nav id="top-header">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'top-menu',
                            'menu_id'        => 'ul-top-menu',
                            'depth'        => '1',
                        ) );
                    ?>
                    </nav>
                <?php
                } ?>
                

                <nav id="primary-navigation" class="main-navigation" role="navigation" aria-label="Menu principal / Main menu">
                    <?php                     
                    wp_nav_menu( array(
                        'theme_location' => 'primary-menu',
                        'menu_id'        => 'primary-menu',
                        'depth'        => '3',
                        'container_aria_label' => 'Menu principal / Main menu',
                    ) ); 
                    ?>
                    <!-- <button class="burger">
                        <div class="burger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <label for="burger"><?php //echo __('Menu', 'sedoo-wpth-labs'); ?></label>
                    </button> -->
                </nav>
            </div>
        <?php
        }
        ?> 
            
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
