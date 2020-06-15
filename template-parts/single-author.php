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
    <h2><?php 
    if (get_post_type() == "tribe_events") {
        $typeOfUser = __('Speaker', 'sedoo-wpth-labs');
    } else {
        $typeOfUser = __('Author', 'sedoo-wpth-labs');
    }
    echo $typeOfUser; ?>
    </h2>
    <div>
        <div>
           <a href="<?php echo get_author_posts_url($select_lauteur_array['ID'], $select_lauteur_array['user_nicename'] ); ?>">
                <?php if ( get_field( 'photo_auteur', 'user_'.$select_lauteur_array['ID']) ) { ?>
                <div class="img-author">
                    <?php 

                    $image = get_field('photo_auteur', 'user_'.$select_lauteur_array['ID']);

                    if( !empty($image) ): 
                        $size='medium';
                        $thumb= $image['sizes'][$size];
                        ?>
                    <figure>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo $image['alt']; ?>" />
                    </figure>
                    <?php endif; ?>                
                </div>
                <?php } ?>
           </a>
        </div>
        <div>
           <a href="<?php echo get_author_posts_url($select_lauteur_array['ID'], $select_lauteur_array['user_nicename'] ); ?>">
                <p><b><?php echo $select_lauteur_array['user_firstname']; ?> <?php echo $select_lauteur_array['user_lastname']; ?></b></p>
           </a>
            <p><?php the_field('poste', 'user_'.$select_lauteur_array['ID']) ?></p>
            <?php 
            if ($select_lauteur_array['user_description']) {
            ?>
            <h3><?php echo __("About", 'sedoo-wpth-labs'); ?></h3>
            <p class="author-description">
                <?php echo $select_lauteur_array['user_description'];?>
            </p> 
            <?php
            }
            ?>
           <a href="<?php echo get_author_posts_url($select_lauteur_array['ID'], $select_lauteur_array['user_nicename'] ); ?>" class="btn"><?php echo __("Learn more", 'sedoo-wpth-labs'); ?></a>
        </div>
   </div>
</div>
<?php } ?>



<?php if ($ajout_auteur === 'externe'){ ?>
<div class="post-author">
    <h2>
    <?php
    if (get_post_type() == "tribe_events") {
        $typeOfUser = __('Speaker', 'sedoo-wpth-labs');
    } else {
        $typeOfUser = __('Author', 'sedoo-wpth-labs');
    }
    echo $typeOfUser; 
    ?>    
    </h2>
    <div>
        <?php if( get_field('photo_auteur_exterieur')){ ?>
        <div>
            <div class="img-author">
                <?php 

                $image = get_field('photo_auteur_exterieur');

                if( !empty($image) ):
                    $size='medium';
                    $thumb= $image['sizes'][$size];
                    ?>
                <figure>
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo $image['alt']; ?>" />
                </figure>
                <?php endif; ?>
            </div>
        </div>
        <?php } ?>
        <div>
            <p><b><?php the_field('nom_de_lauteur_exterieur'); ?></b></p>
            <p><?php the_field('poste_de_lauteur'); ?></p>
            <?php if( get_field('a_propos_auteur') ){ ?>
            <h3><?php echo __("About", 'sedoo-wpth-labs'); ?></h3>
            <p class="author-description">
                <?php the_field('a_propos_auteur'); ?>
            </p> 
            <?php } ?>
            <?php if( get_field('site_internet_auteur') ){ ?>
                <a href="<?php the_field('site_internet_auteur'); ?>" class="btn" target="_blank"><?php echo __("Learn more", 'sedoo-wpth-labs'); ?></a>
            <?php } ?>
        </div>
   </div>
</div>
<?php } ?>
