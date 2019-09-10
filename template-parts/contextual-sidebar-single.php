<?php
/**
 * Template part for the contextual sidebar in single
 *
 */
    if ( ! is_active_sidebar( 'sommaire-single' ) ) {
            return;
    }
?>

<aside class="contextual-sidebar">
    <?php if(wp_is_mobile){
    
    } else { ?>
    <div class="reading-time">
        <h2>Temps de lecture</h2>
        <div class="eta-container">
            <div class="eta"></div>
            <div class="progress-bar">
                <div></div>
            </div>
        </div>
    </div>
    <div class="summary">
	   <?php dynamic_sidebar( 'sommaire-single' ); ?>
    </div>
    <?php } ?>
    <?php
        get_template_part( 'template-parts/single-author', 'page' );
    ?>        
</aside>