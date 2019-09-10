<?php
/**
 * The template for displaying the searchform screen
 *
 */

?>
<div class="overlay annuaire">
    <iframe src="<?php the_field('lien_annuaire', 'option'); ?>"></iframe>
    <div class="close">
        <label for="closeLocation">Fermer</label>
        <button id="closeLocation">
            <span></span>
            <span></span>
        </button>
    </div>
</div>
