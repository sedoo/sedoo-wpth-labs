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
if (( function_exists( 'get_field' ) ) && (get_field('sedoo_labs_main_menu_layout', 'option'))) {
    $mainMenuLayout = get_field('sedoo_labs_main_menu_layout', 'option'); //field_5f6da0eb5ac37
} else {
    $mainMenuLayout = "grid";
}
$classesMainMenu = $mainMenuLayout;

if ($mainMenuLayout = "grid") {
    if (( function_exists( 'get_field' ) ) && (get_field('sedoo_labs_grid_menu_color', 'option'))) {
        $sedoo_labs_grid_menu_color = get_field('sedoo_labs_grid_menu_color', 'option');
    } else {
        $sedoo_labs_grid_menu_color = "coloredGrid";
    }
    $classesMainMenu .= " ".$sedoo_labs_grid_menu_color;
}

if (( function_exists( 'get_field' ) ) && (get_field('sedoo_labs_header_appearance', 'option'))) {
    $classesHeader = get_field('sedoo_labs_header_appearance', 'option');
} else {
    $classesHeader = "whiteHeader";
}

if (( function_exists( 'get_field' ) ) && (get_field('sedoo_labs_theme_ambiance', 'option'))) {
    $ambiance=get_field('sedoo_labs_theme_ambiance', 'option');
} else {
    $ambiance="lightmode";
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="description" content="<?php if (( function_exists( 'get_field' ) ) && ( get_field('sedoo_labs_metadescription', 'option') )) {
        the_field('sedoo_labs_metadescription', 'option');
    } 
    ?>">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="<?php echo get_template_directory_uri() . '/assets/MultiLevelPushMenu/js/modernizr.custom.js';?>"></script>
</head>

<body <?php body_class($ambiance); ?>>
<div id="page" class="site <?php if ( wp_is_mobile() ) {echo "mobile";}?>">
<?php
if ( wp_is_mobile() ) {
    // responsive menu
?>  <div class="mp-pusher" id="mp-pusher">
<?php }
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'labs-by-sedoo' ); ?></a>
	<header id="masthead" class="site-header <?php echo $classesHeader;?>">
        <div class="wrapper">
        <?php
        if ( wp_is_mobile() ) {
        ?>
            <p>
                <a href="#" id="trigger" class="menu-trigger">                    
                    <span class="bar top"></span>
                    <span class="bar middle"></span>
                    <span class="bar bottom"></span>
                </a>
            </p> 
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
            <nav id="mp-menu" class="mp-menu">
                <?php         
                if (has_nav_menu('mobile-menu')) {
                    wp_nav_menu( array(
                        'theme_location' => 'mobile-menu',
                        'menu_id'        => 'mobile-menu',
                        'depth'        => '3',
                        'container_class'   => 'mp-level',
                        'container_aria_label' => 'Menu principal / Main menu',
                        'walker' => new Sedoo_Push_Menu_Walker(),
                        )
                    );
                } else {
                    wp_nav_menu( array(
                        'theme_location' => 'primary-menu',
                        'menu_id'        => 'mobile-menu',
                        'depth'        => '3',
                        'container_class'   => 'mp-level',
                        'container_aria_label' => 'Menu principal / Main menu',
                        'walker' => new Sedoo_Push_Menu_Walker(),
                        ) 
                    ); 
                }
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

                <nav id="primary-navigation" class="main-navigation <?php echo $classesMainMenu;?>" role="navigation" aria-label="Menu principal / Main menu">
                    <?php                     
                    wp_nav_menu( array(
                        'theme_location' => 'primary-menu',
                        'menu_id'        => 'primary-menu',
                        'depth'        => '3',
                        'container_aria_label' => 'Menu principal / Main menu',
                    ) ); 
                    ?>
                </nav>
            </div>
        <?php
        }
        ?> 
            
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
