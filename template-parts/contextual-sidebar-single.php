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
<?php if( (get_field('temps_lecture') == 1) || (get_field('select_lauteur') && ($ajout_auteur == true)) ) { ?>
<aside class="contextual-sidebar">
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
    if ( get_field('select_lauteur')) {
        get_template_part( 'template-parts/single-author', 'page' );
    }
    ?>    
    
    
</aside>
<?php } else { } ?>