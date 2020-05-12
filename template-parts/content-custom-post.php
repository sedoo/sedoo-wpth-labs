<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sedoo-wpth-labs
 */


?>

<a class="event-post" href="#_EVENTURL">   
    <figure class="event-img">
        <?php 
        if (get_the_post_thumbnail()) {
            the_post_thumbnail('thumbnail-plugin');
        } ?>
    </figure>
    <h3><?php the_title(); ?></h3>
</a>    