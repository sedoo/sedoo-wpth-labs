<?php
/**
 * The template for displaying the searchform screen
 *
 */
$options_theme = get_field('ajout_options', 'option');
if( $options_theme && in_array('annuaire', $options_theme) ) {
?>
<div class="overlay annuaire">
    <iframe src="<?php the_field('lien_annuaire', 'option'); ?>"></iframe>
    <div class="close">
        <label for="closeLocation"><?php echo __('Fermer', 'sedoo-wpth-labs'); ?></label>
        <button id="closeLocation">
            <span></span>
            <span></span>
        </button>
    </div>
</div>
<?php } ?>