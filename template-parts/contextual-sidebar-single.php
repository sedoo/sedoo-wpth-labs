<?php
/**
 * Template part for the contextual sidebar in single
 *
 */
$ajout_auteur = get_field('ajouteur_auteur');
$select_lauteur_array = get_field( 'select_lauteur' ); 
// $toc = do_shortcode("[toc]");
//$author = get_field('select_lauteur') && ($ajout_auteur == true);
//$reading_time = get_field('temps_lecture') == 1;
?>
<?php if( (get_field('temps_lecture') == 1) || (get_field('select_lauteur')) || (get_field('ajouteur_auteur')) ) { ?>
<aside class="contextual-sidebar">
    <?php 
    if( function_exists('sedoo_labtools_show_categories') ){
    $themes = get_the_terms( $post->ID, 'sedoo-theme-labo');  
    // var_dump($themes);
    $themeSlugRewrite = "sedoo-theme-labo";
        if (is_array($themes)) {
        echo "<h2>".__('Thematique(s)', 'sedoo-wpth-labs')."</h2>";
        sedoo_labtools_show_categories($themes, $themeSlugRewrite);
        }

    $platform = get_the_terms( $post->ID, 'sedoo-platform-tag');  
    $platformSlugRewrite = "sedoo-platform-tag";
        if (is_array($platform)) {
        echo "<h2>".__('Plateforme(s)', 'sedoo-wpth-labs')."</h2>";
        sedoo_labtools_show_categories($platform, $platformSlugRewrite);
        }
    
    $axe = get_the_terms( $post->ID, 'sedoo-axe-tag');  
    $axeSlugRewrite = "sedoo-axe-tag";
        if (is_array($axe)) {
        echo "<h2>".__('Axe(s)', 'sedoo-wpth-labs')."</h2>";
        sedoo_labtools_show_categories($axe, $axeSlugRewrite);
        }
    }
    ?>
    <?php if(wp_is_mobile()){
    
    } else { ?>
        <?php // table_content ( value )
        if (get_field( 'temps_lecture' ) == 1) {
        ?>
        <div class="reading-time">
            <h2><?php echo __('Temps de lecture', 'sedoo-wpth-labs'); ?></h2>
            <div class="eta-container">
                <div class="eta"></div>
                <div class="progress-bar">
                    <div></div>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php 
    }        
    if ( get_field('ajouteur_auteur')) {
        get_template_part( 'template-parts/single-author', '' );
    }
    ?>    
    
    
</aside>
<?php 
} else { } 
?>