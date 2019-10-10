<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

?>

<article id="post-<?php the_ID(); ?>" class="post grid-item">
    <a href="<?php the_permalink(); ?>"></a>
	<header class="entry-header">
        <figure>
            <?php 
            if (get_the_post_thumbnail()) {
                the_post_thumbnail(array(400, 235));
            } ?>
        </figure>
        <p>
        <?php     $categories = get_the_category();
            if ( ! empty( $categories ) ) {
            echo esc_html( $categories[0]->name );   
        }; ?>
        </p>
	</header><!-- .entry-header -->
    <div class="group-content">
        <div class="entry-content">
            <h2><?php the_title(); ?></h2>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-->
