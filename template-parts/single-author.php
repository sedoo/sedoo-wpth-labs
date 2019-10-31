<?php
/**
 * Template part for displaying author
 *
 */
    $ajout_auteur = get_field('ajouteur_auteur');
    $select_lauteur_array = get_field( 'select_lauteur' ); 
?>

<?php if ( get_field('select_lauteur') && ($ajout_auteur === 'interne')) { ?>
<div class="post-author">
    <h2><?php echo __("Auteur de la publication", 'sedoo-wpth-labs'); ?></h2>
    <div>
        <div>
<!--            <a href="<?php echo get_author_posts_url($select_lauteur_array['ID'], $select_lauteur_array['user_nicename'] ); ?>">-->
                <?php if ( get_field( 'photo_auteur', 'user_'.$select_lauteur_array['ID']) ) { ?>
                <div class="img-author">
                    <?php 

                    $image = get_field('photo_auteur', 'user_'.$select_lauteur_array['ID']);

                    if( !empty($image) ): ?>

                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                    <?php endif; ?>                
                </div>
                <?php } ?>
<!--            </a>-->
        </div>
        <div>
<!--            <a href="<?php echo get_author_posts_url($select_lauteur_array['ID'], $select_lauteur_array['user_nicename'] ); ?>">-->
                <p><b><?php echo $select_lauteur_array['display_name']; ?></b></p>
<!--            </a>-->
            <p><?php the_field('poste', 'user_'.$select_lauteur_array['ID']) ?></p>
            <h3><?php echo __("À propos de l'auteur", 'sedoo-wpth-labs'); ?></h3>
            <p class="author-description">
                <?php echo $select_lauteur_array['user_description'];?>
            </p> 
<!--            <a href="<?php echo get_author_posts_url($select_lauteur_array['ID'], $select_lauteur_array['user_nicename'] ); ?>" class="btn"><?php echo __("En savoir plus sur l'auteur", 'sedoo-wpth-labs'); ?></a>-->
        </div>
   </div>
</div>
<?php } ?>



<?php if ($ajout_auteur === 'externe'){ ?>
<div class="post-author">
    <h2><?php echo __("Auteur de la publication", 'sedoo-wpth-labs'); ?></h2>
    <div>
        <?php if( get_field('photo_auteur_exterieur')){ ?>
        <div>
            <div class="img-author">
                <?php 

                $image = get_field('photo_auteur_exterieur');

                if( !empty($image) ): ?>

                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                <?php endif; ?>
            </div>
        </div>
        <?php } ?>
        <div>
            <p><b><?php the_field('nom_de_lauteur_exterieur'); ?></b></p>
            <p><?php the_field('poste_de_lauteur'); ?></p>
            <?php if( get_field('a_propos_auteur') ){ ?>
            <h3><?php echo __("À propos de l'auteur", 'sedoo-wpth-labs'); ?></h3>
            <p class="author-description">
                <?php the_field('a_propos_auteur'); ?>
            </p> 
            <?php } ?>
            <?php if( get_field('site_internet_auteur') ){ ?>
                <a href="<?php the_field('site_internet_auteur'); ?>" class="btn" target="_blank"><?php echo __("En savoir plus sur l'auteur", 'sedoo-wpth-labs'); ?></a>
            <?php } ?>
        </div>
   </div>
</div>
<?php } ?>
