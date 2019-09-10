<?php
/**
 * Template part for the contextual sidebar in single event
 *
 */

?>

<aside class="contextual-sidebar">
    <div class="event">
        <h2>Infos sur l'événement</h2>
        <div>
            <?php global $EM_Event;
            echo $EM_Event->output_single();
            ?>
        </div>
    </div> 
    <?php
        get_template_part( 'template-parts/single-author', 'page' );
    ?>        

</aside>