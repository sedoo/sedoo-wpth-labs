<?php
/**
 * Single Event Title Template Part
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/single-event/title.php
 *
 * See more documentation about our Blocks Editor templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 4.7.2
 *
 */
?>
<?php
if ( has_post_thumbnail() ) {
?>
	<header id="cover">
		<?php the_post_thumbnail('cover'); ?>
	</header>
<?php 
}
?>
<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' );?>
<div class="tag">
<?php
$terms = get_the_terms( get_the_id(), 'tribe_events_cat');
foreach ($terms as $term) {
    echo "<a href='".get_term_link($term->term_id)."' class=\"".$term->slug."\">".$term->name."</a>";
}
?>
</div>

