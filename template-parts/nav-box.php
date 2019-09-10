<!-- Navigation post précédent et suivant avec thumbnail -->
<?php 

$prevPost = get_previous_post();
$nextPost = get_next_post();

if($prevPost) {?>
    <div class="nav-box previous">
         <a href="<?php echo get_the_permalink($prevPost); ?>" class="nav-box-chevron"><img src="/wordpress/wp-content/themes/aeris-child/image/chevron.svg" alt="<"/><span class="label">Article précédent</span></a>
        <?php if (wp_is_mobile()){
        
        } else { ?>
         <div class="card-nav">
            <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array() );?>
            <?php previous_post_link('%link',"<div class='nav-box-img'>$prevthumbnail</div>  <p>%title</p>", FALSE); ?>
         </div>
        <?php } ?>

    </div>

<?php } 

if($nextPost) {?>
    <div class="nav-box next">
        <a href="<?php echo get_the_permalink($nextPost); ?>" class="nav-box-chevron"><span class="label">Article suivant</span><img src="/wordpress/wp-content/themes/aeris-child/image/chevron.svg" alt=">"/></a>
        <?php if (wp_is_mobile()){
        
        } else { ?>
        <div class="card-nav">
            <?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array() );?>
            <?php next_post_link('%link',"<div class='nav-box-img'>$nextthumbnail</div>  <p>%title</p>", FALSE); ?>
        </div>
        <?php } ?>
    </div>
<?php } ?>