<?php
/**
 * Template part for the contextual sidebar in single event
 *
 */

?>

<aside class="contextual-sidebar">
    <div class="event">
        <h2><?php echo __("Infos sur l'événement", 'sedoo-wpth-labs'); ?></h2>
        <div>
            <?php global $EM_Event;
            echo $EM_Event->output_single();
            ?>
        </div>
    </div> 
    <?php
        get_template_part( 'template-parts/single-author-event', 'page' );
    ?>        

</aside>