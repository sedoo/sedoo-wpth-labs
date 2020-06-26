<?php
/*
Template Name: debug
*/
// Description (slogan)

get_header();

$args = array(
    'post_type' => 'tribe_events',
    'posts_per_page' => -1,
    'post_status' => array('publish', 'draft'),
);
$query = new WP_Query($args);
if ($query->have_posts() ) : 
    echo '<ul>';
while ( $query->have_posts() ) : $query->the_post();
echo 'a';
    echo '<li>';
    $date1bug = get_post_meta(get_the_ID(), '_EventStartDate', true);
    $date2bug = get_post_meta(get_the_ID(), '_EventEndDate', true);

    $date1ok = get_post_meta(get_the_ID(), '_EventStartDateUTC', true);
    $date2ok = get_post_meta(get_the_ID(), '_EventEndDateUTC', true);

    if($date1bug == '') {
        update_post_meta( get_the_ID(), '_EventStartDate', $date1ok);
    }
    if($date2bug == '') {
        update_post_meta( get_the_ID(), '_EventEndDate', $date2ok);
    }

    echo '</li>';
endwhile;
echo '</ul>';
wp_reset_postdata();
endif;
get_footer();
?>