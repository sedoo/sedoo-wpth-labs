<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

?>

<article id="post-<?php the_ID(); ?>" class="post">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="group-content">
        <div class="entry-content">
            
            <?php the_excerpt(); ?>
            <p class="date"><?php the_date('M / d / Y') ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-->
