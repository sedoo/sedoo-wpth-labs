<?php 

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
    'page_title' 	=> 'Theme settings',
    'menu_title'	=> 'Theme settings',
    'menu_slug' 	=> 'theme-informations',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'position'      => '60.1',
	));
    
    $options_theme = get_field('ajout_options', 'option');

    // Actif par défaut
    // if( $options_theme && in_array('options', $options_theme) ) {
    	acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme options',
            'menu_title'	=> 'Theme options',
            'parent_slug'	=> 'theme-informations',
        ));
    // }
    
    if( $options_theme && in_array('contact', $options_theme) ) {    
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Contact and Location Settings',
            'menu_title'	=> 'Contact et localisation',
            'parent_slug'	=> 'theme-informations',
        ));
    }
    
    if( $options_theme && in_array('reseaux', $options_theme) ) {
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Social Settings',
            'menu_title'	=> 'Réseaux Sociaux',
            'parent_slug'	=> 'theme-informations',
        ));
    }

    // Ajouté dans les options du footer active par défaut
    // if( $options_theme && in_array('partenaires', $options_theme) ) {
    //     acf_add_options_sub_page(array(
    //         'page_title' 	=> 'Theme Partenaires Settings',
    //         'menu_title'	=> 'Partenaires',
    //         'parent_slug'	=> 'theme-informations',
    //     ));
    // }
    
    if( $options_theme && in_array('annuaire', $options_theme) ) {
    	acf_add_options_sub_page(array(
            'page_title' 	=> 'Annuaire Settings',
            'menu_title'	=> 'Annuaire',
            'parent_slug'	=> 'theme-informations',
        ));
    }
    if( $options_theme && in_array('calendar', $options_theme) ) {
    	acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Calendar',
            'menu_title'	=> 'Calendrier',
            'parent_slug'	=> 'theme-informations',
        ));
    }   
}