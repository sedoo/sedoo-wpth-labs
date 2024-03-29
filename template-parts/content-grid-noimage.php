<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

    <a href="<?php the_permalink(); ?>"></a>
    <div class="group-content">
        <div class="entry-content">
            <h4><?php the_title(); ?></h4>
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
        <footer class="entry-footer">
            <?php
            if ( 'post' === get_post_type() ) :
                ?>
                <p><?php the_date('d.m.Y') ?></p>
            <?php endif; ?>
            <?php
            if ( 'tribe_events' === get_post_type() ) :
                ?>
                <p><?php echo tribe_get_start_date(get_the_ID(), false, 'd M Y - g:i'); ?></p>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'sedoo-wpth-labs'); ?> →</a>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-->