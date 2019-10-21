<?php
/**
 * The template for displaying the searchform screen
 *
 */

?>
<div class="overlay calendar">
    <div class="wrapper">  
        <?php the_field('shortcode_calendrier', 'option'); ?>
    </div>
    <div class="close">
        <label for="closeLocation"><?php echo __('Fermer', 'sedoo-wpth-labs'); ?></label>
        <button id="closeLocation">
            <span></span>
            <span></span>
        </button>
    </div>
</div>
