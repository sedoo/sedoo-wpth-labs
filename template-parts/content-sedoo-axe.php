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
        <?php if(has_post_thumbnail()){ ?>
        <div class="event-img">
            <?php the_post_thumbnail('thumbnail-plugin'); ?>
        </div>
        <?php } ?>
        <h3><?php the_title(); ?></h3>
</a>    
