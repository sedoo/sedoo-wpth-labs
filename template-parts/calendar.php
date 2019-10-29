<?php
/**
 * The template for displaying the searchform screen
 *
 */

?>
<?php 
$display_calendar = get_field('display_calendar', 'option');
if($display_calendar == 'oui') { 
?>
<div class="overlay calendar">
    <div class="wrapper">  
        <?php echo WP_FullCalendar::calendar($args); ?>
    </div>
    <div class="close">
        <label for="closeLocation"><?php echo __('Fermer', 'sedoo-wpth-labs'); ?></label>
        <button id="closeLocation">
            <span></span>
            <span></span>
        </button>
    </div>
</div>
<?php } else {
    
} ?>