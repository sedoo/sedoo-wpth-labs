<!-- Navigation post précédent et suivant avec thumbnail -->
<?php 

$prevPost = get_previous_post();
$nextPost = get_next_post();
$max_length = 75;


if($prevPost) {
$prev = get_previous_post()->ID;
$title = get_the_title( $prev );
$post_name = mb_strlen( $title ) > $max_length ? mb_substr( $title, 0, $max_length ) . ' ..' : $title;
?>
    <div class="nav-box previous">
         <a href="<?php echo get_the_permalink($prevPost); ?>" class="nav-box-chevron"><img src="<?php echo get_template_directory_uri() . '/images/chevron.svg'; ?>" alt="<"/><span class="label">Article précédent</span></a>
        <?php if (wp_is_mobile()){
        
        } else { ?>
         <div class="card-nav">
            <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(300, 120) );?>
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
        <a href="<?php echo get_the_permalink($nextPost); ?>" class="nav-box-chevron"><span class="label">Article suivant</span><img src="<?php echo get_template_directory_uri() . '/images/chevron.svg'; ?>" alt=">"/></a>
        <?php if (wp_is_mobile()){
        
        } else { ?>
        <div class="card-nav">
            <?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(300, 120) );?>
            <?php $titleItem=mb_strimwidth(get_the_title(), 0, 100, '...');  ?>
            <?php next_post_link('%link',"<div class='nav-box-img'>$nextthumbnail</div>  <p>$post_name</p>", FALSE); ?>
        </div>
        <?php } ?>
    </div>
<?php }
wp_reset_postdata();
?>