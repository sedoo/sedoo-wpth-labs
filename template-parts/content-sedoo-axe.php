<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Data-Terra
 */


?>
<a class="event-post" href="<?php the_permalink(); ?>"> 
    <div class="event-img">
        <?php if(has_post_thumbnail()){ ?>
            <?php the_post_thumbnail('thumbnail-plugin'); ?>
        <?php } else { ?>
            <img src="<?php echo get_template_directory_uri() . '/image/empty-mode-axe.svg'; ?>" alt="" />
        <?php } ?>
    </div>
    <h3><?php the_title(); ?></h3>
</a>    
