<?php

function labs_by_sedoo_reusable_menu_display( $type, $args ) {
	if ( 'wp_block' !== $type ) { return; }
	$args->show_in_menu = true;
	$args->_builtin = false;
	// Pour changer l'intitulé du menu, c'est ci-dessous
	// Remplacez 'Blocs réutilisables' par esc_html__( 'Reusable blocks', 'textdomain' ) 
	// en remplaçant "textdomain" par le Text Domain de votre thème si votre thème est internationalisé
	// et que vous souhaitez traduire cet élément de menu pour un site multilingue
	$args->labels->name = 'Blocs réutilisables';
	$args->labels->menu_name = 'Blocs réutilisables';
	$args->menu_icon = 'dashicons-screenoptions';
	$args->menu_position = 90;
}
add_action( 'registered_post_type', 'labs_by_sedoo_reusable_menu_display', 10, 2 );

?>