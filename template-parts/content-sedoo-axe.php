<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Data-Terra
 */

$titleItem=mb_strimwidth(get_the_title(), 0, 40, '...');  

?>
<a class="event-post" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
    <div class="event-img">
        <?php if(has_post_thumbnail()){ ?>
            <?php the_post_thumbnail('thumbnail-plugin'); ?>
        <?php } else { ?>
            <img src="<?php echo get_template_directory_uri() . '/images/empty-mode-axe.svg'; ?>" alt="" />
        <?php } ?>
    </div>
    <h3><?php echo $titleItem; ?></h3>
</a>    
