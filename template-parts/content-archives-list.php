<?php
/**
 * Template part for displaying posts - simple list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
<?php //the_permalink(); ?>
	<header class="entry-header">
		
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

	</header><!-- .entry-header -->
    <div class="group-content">
        <div class="entry-content">
            
            <?php the_excerpt(); ?>
            <p class="date"><?php the_date('d.m.Y') ?>
            
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-->
