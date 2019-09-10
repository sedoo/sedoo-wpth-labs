<?php
/**
 * The template for displaying the searchform screen
 *
 */

?>
<div class="overlay location">
    <div class="wrapper">     
        <div class="information-location">
            <?php 

                $image = get_field('logo_laboratoire', 'option');

                if( !empty($image) ): ?>

                    <img class="grey-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
            <p><b><?php the_field('nom_laboratoire', 'option'); ?></b></p>
            <address><?php the_field('adresse', 'option'); ?></address>
            <p><b><?php the_field('contact_laboratoire', 'option'); ?></b></p>
            <p><a href="tel:<?php the_field('telephone_contact', 'option'); ?>"><?php the_field('telephone_contact', 'option'); ?></a></p>
            <p><a href="mailto:<?php the_field('mail_contact', 'option'); ?>"><?php the_field('mail_contact', 'option'); ?></a></p>
        </div>
        <?php the_field('map_shortcode', 'option'); ?>
        <div class="close">
            <label for="closeLocation">Fermer</label>
            <button id="closeLocation">
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</div>
