<!-- Navigation post précédent et suivant avec thumbnail -->
<?php 

$prevPost = get_previous_post();
$nextPost = get_next_post();
$max_length = 70;
$defaultIMG = '<img src="'.get_template_directory_uri() .'/images/empty-mode-post.svg'.'" alt="" />';

if($prevPost) {
$prev = get_previous_post()->ID;
$title = get_the_title( $prev );
$post_name = mb_strlen( $title ) > $max_length ? mb_substr( $title, 0, $max_length ) . ' ..' : $title;
?>
    <div class="nav-box previous">
         <a href="<?php echo get_the_permalink($prevPost); ?>" class="nav-box-chevron"><img src="<?php echo get_template_directory_uri() . '/images/chevron.svg'; ?>" alt="<"/><span class="label"><?php echo __("Previous post", 'sedoo-wpth-labs'); ?></span></a>
        <?php if (wp_is_mobile()){
        
        } else { ?>
         <div class="card-nav">
            <?php 
            if (get_the_post_thumbnail($prevPost->ID)) {
                $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(300, 120) );
            } else {
                $prevthumbnail = $defaultIMG;              
            }?> 
            <?php previous_post_link('%link',"<div class='nav-box-img'>$prevthumbnail</div>  <p>$post_name</p>", FALSE); ?>
         </div>
        <?php } ?>

    </div>

<?php } 

if($nextPost) {
$next = get_next_post()->ID;
$title = get_the_title( $next );
$post_name = mb_strlen( $title ) > $max_length ? mb_substr( $title, 0, $max_length ) . ' ..' : $title;
?>
    <div class="nav-box next">
        <a href="<?php echo get_the_permalink($nextPost); ?>" class="nav-box-chevron"><span class="label"><?php echo __("Next post", 'sedoo-wpth-labs'); ?></span><img src="<?php echo get_template_directory_uri() . '/images/chevron.svg'; ?>" alt=">"/></a>
        <?php if (wp_is_mobile()){
        
        } else { ?>
        <div class="card-nav">
            <?php $titleItem=mb_strimwidth(get_the_title(), 0, 100, '...');  ?>
            <?php 
            if (get_the_post_thumbnail($nextPost->ID)) {
                $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(300, 120) );
            } else {
                $nextthumbnail = $defaultIMG;              
            }?>
            <?php next_post_link('%link',"<div class='nav-box-img'>$nextthumbnail</div>  <p>$post_name</p>", FALSE); ?>
        </div>
        <?php } ?>
    </div>
<?php }
wp_reset_postdata();
?>