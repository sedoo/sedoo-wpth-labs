<?php
/**
 * The template for displaying the searchform screen
 *
 */

if ( get_field('display_shortcut', 'option') == 'oui'){
?>
<div class="overlay location">
    <?php the_custom_logo(); ?>
    <div class="wrapper">  
        <?php if( have_rows('location_repeater', 'option') ): ?>
        <?php while( have_rows('location_repeater', 'option')): the_row();
            $nom_labo = get_sub_field('nom_laboratoire', 'option');
            $adresse_labo = get_sub_field('adresse', 'option');
            $contact_labo = get_sub_field('contact_laboratoire', 'option');
            $tel_contact = get_sub_field('telephone_contact', 'option');
            $fax_contact = get_sub_field('fax_contact', 'option');
            $mail_contact = get_sub_field('mail_contact', 'option');
            $map = get_sub_field('map', 'option');
            $display_map = get_sub_field('display_map', 'option');
        ?>
        <div class="location-repeat">
            <div class="information-location">    
                <div>
                    <p><b><?php echo $nom_labo; ?></b></p>
                    <address><?php echo $adresse_labo; ?></address>
                    <p><b><?php echo $contact_labo; ?></b></p>
                    <p>Tel : <a href="tel:<?php echo $tel_contact; ?>"><?php echo $tel_contact; ?></a></p>
                    <?php if($fax_contact) { ?>
                        <p>Fax : <?php echo $fax_contact; ?></p>
                    <?php } ?>
                    <p><a href="mailto:<?php echo $mail_contact; ?>"><?php echo $mail_contact; ?></a></p>
                </div>
            </div>
            <?php if($display_map == 'oui') { ?>
                <div class="leaflet-container">
                    <?php echo $map; ?>
                </div>
            <?php } ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        
    </div>
    <div class="close">
        <label for="closeLocation"><?php echo __('Fermer', 'sedoo-wpth-labs'); ?></label>
        <button id="closeLocation">
            <span></span>
            <span></span>
        </button>
    </div>
</div>
<?php } ?>