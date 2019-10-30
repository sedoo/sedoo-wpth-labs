<?php
/**
 * Template part for the contextual sidebar in single
 *
 */

?>
<?php if(get_field('temps_lecture') == 1 or get_field('select_lauteur') && ($ajout_auteur === 'interne')) { ?>
<aside class="contextual-sidebar">
    <?php if(wp_is_mobile()){
    
    } else { ?>
    <?php // table_content ( value )
    if (get_field( 'temps_lecture' ) == 'oui'):
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
    <?php endif; ?>
    <?php     
        if ( is_active_sidebar( 'sommaire-single' ) ) {
    ?>
    <div class="summary">
	   <?php dynamic_sidebar( 'sommaire-single' ); ?>
    </div>
    <?php 
           } 
        } 
    ?>
    <?php
        get_template_part( 'template-parts/single-author', 'page' );
    ?>        
</aside>
<?php } else { } ?>