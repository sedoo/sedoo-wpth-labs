<?php
function mytheme_setup_theme_supported_features() {
	add_theme_support( 'editor-color-palette',
		array(
			array( 'name' => 'blue', 'slug'  => 'blue', 'color' => '#f44336' ),
			array( 'name' => 'red', 'slug'  => 'red', 'color' => '#f44336' ),
			array( 'name' => 'green', 'slug'  => 'green', 'color' => '#48ADD8' ),
			array( 'name' => 'orange', 'slug'  => 'orange', 'color' => '#48ADD8' ),
		)
	);
}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );
?>