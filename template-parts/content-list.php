<?php
/**
 * Template part for displaying posts - simple list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
$term_displayed=$args['term_displayed'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('listpages_list'); ?>>
<?php //the_permalink(); ?>
	<header class="entry-header">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
	</header><!-- .entry-header -->
    <div class="group-content">
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-->