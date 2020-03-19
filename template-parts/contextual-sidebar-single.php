<?php
/**
 * Template part for the contextual sidebar in single
 *
 */

/**
* TO DO LIST
* Dans wppl_labtools, ajout d'une option afficher CTX, + choix
* modifier condition d'affichage du aside
*/
$ajout_auteur = get_field('ajouteur_auteur');
$select_lauteur_array = get_field( 'select_lauteur' ); 
?>
<?php if( (get_field('select_lauteur')) || (get_field('ajouteur_auteur')) ) { ?>
<aside class="contextual-sidebar">
    
    <?php 
    if ( get_field('ajouteur_auteur')) {
        get_template_part( 'template-parts/single-author', '' );
    }  
    
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
</aside>
<?php 
}
?>