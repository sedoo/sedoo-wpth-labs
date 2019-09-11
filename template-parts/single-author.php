<?php
/**
 * Template part for displaying author
 *
 */
    $select_lauteur_array = get_field( 'select_lauteur' ); 
?>
<?php if ( get_field('select_lauteur')){ ?>
<div class="post-author">
    <h2>Auteur de la publication</h2>
    <div>
        <div>
            <?php if ( get_field( 'photo_auteur', 'user_'.$select_lauteur_array['ID']) ) { ?>
            <div class="img-author" style="background-image: url(<?php the_field( 'photo_auteur', 'user_'.$select_lauteur_array['ID'] ); ?>);">
            </div>
            <?php } ?>
        </div>
        <div>
            <p><b><?php echo $select_lauteur_array['display_name']; ?></b></p>
            <p><?php the_field('poste', 'user_'.$select_lauteur_array['ID']) ?></p>
            <h3>À propos de l'auteur</h3>
            <p class="author-description">
                <?php echo $select_lauteur_array['user_description'];?>
            </p> 
        </div>
   </div>
</div>
<?php } ?>