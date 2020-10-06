<?php

// Enqueue Javascript files
function labs_load_javascript_files() {

    wp_enqueue_script('labs_global', get_template_directory_uri() . '/js/main-child.js', array('jquery'), '', true );
    
    wp_enqueue_script('labs_slick', get_template_directory_uri() . '/js/slick.js', array('jquery'), '', true );
    wp_enqueue_script('labs_toc', get_template_directory_uri() . '/js/toc.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'labs_load_javascript_files' );
?>