<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
$postType=get_post_type();
$term_displayed=$args['term_displayed'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <a href="<?php the_permalink(); ?>"></a>
	<header class="entry-header">
        <?php 
        // if (isset($postThumbnail)){ echo $postThumbnail; }
        ?>
        <figure>
            <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('thumbnail-loop');
            } else {
                labs_by_sedoo_catch_that_image();                
            }?>            
        </figure>

        <?php
        if ($term_displayed == 1 && $term_displayed != false) {
        ?>
            <?php 
            $categories = get_the_category();
            if (( ! empty( $categories ) )&&(!is_archive())) {
                echo "<p>".esc_html( $categories[0]->name )."</p>";   
            }; ?>
            
        <?php
        }
        ?>
        <?php
            // Tribe event condition 
            if ( 'tribe_events' === $postType ){
                $terms = get_the_terms( get_the_id(), 'tribe_events_cat');
                if (! empty($terms)){
                    foreach ($terms as $term) {
                        echo "<p>".$term->name."</p>";
                    }
                }
            }
            ?>
	</header><!-- .entry-header -->
    <div class="group-content">
        <div class="entry-content">
            <h4><?php the_title(); ?></h4>
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
        <footer class="entry-footer">
            <?php
            if ( 'post' === get_post_type() ) :
                ?>
                <p><?php the_date('m.d.Y') ?></p>
            <?php endif;?>
            <?php
            if ( 'tribe_events' === get_post_type() ) :
                ?>
                <p><?php echo tribe_get_start_date(get_the_ID(), false, 'd M Y - g:i'); ?></p>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'sedoo-wpth-labs'); ?> →</a>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-->