<?php
if( function_exists('acf_add_local_field_group') ):

/**
 * OPTIONS GLOBALES DU THEME
 */

// activation des options
acf_add_local_field_group(array(
	'key' => 'group_5d6e44395feac',
	'title' => 'Theme informations',
	'fields' => array(
		array(
			'key' => 'field_5d6e446cc090d',
			'label' => 'ajout options',
			'name' => 'ajout_options',
			'type' => 'checkbox',
			'instructions' => 'Cocher les options à afficher dans les réglages du thème.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'contact' => 'Contact et Localisation',
				'reseaux' => 'Réseaux Sociaux',
				'partenaires' => 'Partenaires',
				'annuaire' => 'Annuaire',
				'calendar' => 'Calendrier',
				'options'	=> 'Options du thème'
			),
			'allow_custom' => 0,
			'default_value' => array(
			),
			'layout' => 'vertical',
			'toggle' => 0,
			'return_format' => 'value',
			'save_custom' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'theme-informations',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5d6e4d122e2c9',
	'title' => 'Annuaire Settings',
	'fields' => array(
		array(
			'key' => 'field_5ec2846a3a2d6',
			'label' => 'URL page annuaire',
			'name' => 'url_page_annuaire',
			'type' => 'page_link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'page',
			),
			'taxonomy' => '',
			'allow_null' => 0,
			'allow_archives' => 0,
			'multiple' => 0,
		),
		array(
			'key' => 'field_5d6e4d1d7d654',
			'label' => 'Lien Annuaire',
			'name' => 'lien_annuaire',
			'type' => 'url',
			'instructions' => 'Insérer le lien vers l\'application d\'annuaire du laboratoire',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-annuaire',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5dadb18624429',
	'title' => 'Calendar Settings',
	'fields' => array(
		array(
			'key' => 'field_5dadb1927d6d8',
			'label' => 'URL Calendrier',
			'name' => 'url_calendar',
			'type' => 'url',
			'instructions' => 'Ajouter le lien vers la page événement',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-calendrier',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5d6e45131ccd4',
	'title' => 'Location Settings',
	'fields' => array(
		array(
			'key' => 'field_5ec283ff3a2d5',
			'label' => 'Lier avec la page d\'accès',
			'name' => 'url_page_access',
			'type' => 'page_link',
			'instructions' => 'Les informations ci-dessous s\'afficheront sur la page en relation',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'page',
			),
			'taxonomy' => '',
			'allow_null' => 0,
			'allow_archives' => 0,
			'multiple' => 0,
		),
		array(
			'key' => 'field_5db6f28ec9561',
			'label' => 'Affichage à droite',
			'name' => 'display_map_shortcut',
			'type' => 'true_false',
			'instructions' => 'Souhaitez-vous affichez les informations de contact et la carte sur le bord droite de l\'écran ?',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5d95af7a91861',
			'label' => 'Information géographiques du Laboratoire',
			'name' => 'location_repeater',
			'type' => 'repeater',
			'instructions' => 'Saisir les infos relatives à une adresse de laboratoire',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5d6e4556b87f7',
					'label' => 'Nom du Laboratoire',
					'name' => 'nom_laboratoire',
					'type' => 'text',
					'instructions' => 'Saisir le nom du laboratoire',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5d6e457fb87f8',
					'label' => 'Adresse du laboratoire',
					'name' => 'adresse',
					'type' => 'textarea',
					'instructions' => 'Saisir l\'adresse du laboratoire',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => 4,
					'new_lines' => 'br',
				),
				array(
					'key' => 'field_5d6e461b92f71',
					'label' => 'Contact au sein du laboratoire',
					'name' => 'contact_laboratoire',
					'type' => 'text',
					'instructions' => 'Saisir le nom du contact au sein du laboratoire',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5d6e463092f72',
					'label' => 'Téléphone du contact',
					'name' => 'telephone_contact',
					'type' => 'text',
					'instructions' => 'Saisir le téléphone du contact au sein du laboratoire',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5d88c18b0b677',
					'label' => 'Fax',
					'name' => 'fax_contact',
					'type' => 'text',
					'instructions' => 'Saisir le numéro de fax',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5d6e464492f73',
					'label' => 'Adresse mail du contact',
					'name' => 'mail_contact',
					'type' => 'email',
					'instructions' => 'Saisir l\'adresse email du contact',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_5db6f2234981c',
					'label' => 'Affichage carte',
					'name' => 'display_map',
					'type' => 'true_false',
					'instructions' => 'Souhaitez-vous afficher la carte ?',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array(
					'center_lat' => 53.5507112,
					'center_lng' => 10.0001335,
					'zoom' => 12,
					'key' => 'field_5d6e465a92f74',
					'label' => 'Map',
					'name' => 'map',
					'type' => 'open_street_map',
					'instructions' => 'Renseignez l\'adresse du laboratoire',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5db6f2234981c',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'osm',
					'layers' => array(
						0 => 'OpenStreetMap.HOT',
					),
					'allow_map_layers' => 1,
					'height' => 400,
					'max_markers' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-contact-et-localisation',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5d6e4caf573e6',
	'title' => 'Partenaires Settings',
	'fields' => array(
		array(
			'key' => 'field_5d6e4cc5424e1',
			'label' => 'Partenaires',
			'name' => 'partenaires',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5d6e4ce0424e2',
					'label' => 'Lien Partenaire',
					'name' => 'lien_partenaire',
					'type' => 'url',
					'instructions' => 'Saisir le lien vers le site du partenaire',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5d6e4cf4424e3',
					'label' => 'Logo Partenaire',
					'name' => 'logo_partenaire',
					'type' => 'image',
					'instructions' => 'Téléverser le logo du partenaire',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'full',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-partenaires',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5d6e4c5dc9201',
	'title' => 'Social Settings',
	'fields' => array(
		array(
			'key' => 'field_5d6e4c78e8243',
			'label' => 'Réseaux Sociaux',
			'name' => 'reseaux_sociaux',
			'type' => 'repeater',
			'instructions' => 'Ajouter autant des réseaux sociaux dans le footer',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5d6e4c93e8244',
					'label' => 'Lien Réseau Social',
					'name' => 'lien_reseau_social',
					'type' => 'url',
					'instructions' => 'Saisir le lien vers le réseau social',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-reseaux-sociaux',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


/**
 * COLOR PALETTE 
 * */
acf_add_local_field_group(array(
	'key' => 'group_5efd951c0a8bf',
	'title' => 'Complementary Colors',
	'fields' => array(
		array(
			'key' => 'field_5efd9539079ff',
			'label' => 'Add color to theme palette',
			'name' => 'theme_palet_color',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'sedoo_color_repeater',
			),
			'collapsed' => '',
			'min' => 5,
			'max' => 5,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5efd959407a00',
					'label' => 'Couleur',
					'name' => 'added_theme_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
		array(
			'key' => 'field_5efeefd81e5d6',
			'label' => 'Gestion de la palette',
			'name' => 'mode_de_calcul',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'select_calcul_method',
			),
			'choices' => array(
				'triade' => 'Triade',
				'tetrade' => 'Tetrade',
				'analogic' => 'Analogic',
				'contrast' => 'Contraste',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5efedf57077bc',
			'label' => '',
			'name' => 'Regénérer',
			'type' => 'button_group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => 'btn_regenerate_palette',
			),
			'choices' => array(
				'regenerer' => 'Regenerer',
			),
			'allow_null' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/**
 * COLOR FOR MESSAGES 
 * */
acf_add_local_field_group(array(
	'key' => 'group_5eff161ad0d6b',
	'title' => 'Colors messages',
	'fields' => array(
		array(
			'key' => 'field_5eff162073dc0',
			'label' => 'Green color',
			'name' => 'green_color',
			'type' => 'color_picker',
			'instructions' => 'Used for success messages.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#4caf50',
		),
		array(
			'key' => 'field_5eff164f73dc2',
			'label' => 'Orange color',
			'name' => 'orange_color',
			'type' => 'color_picker',
			'instructions' => 'Used for prevention messages.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#ff9800',
		),
		array(
			'key' => 'field_5eff163f73dc1',
			'label' => 'Red color',
			'name' => 'red_color',
			'type' => 'color_picker',
			'instructions' => 'Used for warning messages.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#f44336',
		),
		array(
			'key' => 'field_5eff167973dc3',
			'label' => 'Blue color',
			'name' => 'blue_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#2196f3',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/**
 * COLOR CUSTOM 
 * */
acf_add_local_field_group(array(
	'key' => 'group_5eff10015098f',
	'title' => 'Custom colors',
	'fields' => array(
		array(
			'key' => 'field_5eff103e6e8cc',
			'label' => 'Customs colors',
			'name' => 'ajout_de_couleurs',
			'type' => 'repeater',
			'instructions' => 'Add here customs colors to use when editing content.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 5,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5eff104c6e8cd',
					'label' => 'Color',
					'name' => 'sedoo_select_custom_color',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/** 
 * HEADER OPTIONS
 */

acf_add_local_field_group(array(
	'key' => 'group_5f11a0f3a031c',
	'title' => 'Header',
	'fields' => array(
		array(
			'key' => 'field_5f6da0eb5ac37',
			'label' => 'Main menu default layout',
			'name' => 'sedoo_labs_main_menu_layout',
			'type' => 'select',
			'instructions' => 'Choose default layout for menu...',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'grid' => 'Grid menu (default)',
				'flyout' => 'Flyout menu',
				'flyoutH' => 'Flyout menu horizontal level 2',
			),
			'default_value' => array(
				0 => 'grid:Grid menu',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5f11a0f9c01a3',
			'label' => 'Mettre une image en avant par défaut ?',
			'name' => 'sedoo_img_defaut_yesno',
			'type' => 'true_false',
			'instructions' => 'Si une image par défaut est activée, toutes les pages seront dotées d\'une image par défaut servant de bandeau en haut.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f11a17dc01a4',
			'label' => 'Choix de l\'image',
			'name' => 'sedoo_labs_default_cover_url',
			'type' => 'image',
			'instructions' => 'Format 1600*462 optimal.',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f11a0f9c01a3',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'cover',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-options',
			),
		),
	),
	'menu_order' => 3,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/**
 * MENU LAYOUT      				>>> FAUSSE BONNE IDEE !!
 * add class on 1st level item
 */
// acf_add_local_field_group(array(
// 	'key' => 'group_5e6f8bc4af8a4',
// 	'title' => 'Menu layout options',
// 	'fields' => array(
// 		array(
// 			'key' => 'field_5f7ea9d2e8913',
// 			'label' => 'Layout menu',
// 			'name' => 'sedoo_labs_layout_menu',
// 			'type' => 'select',
// 			'instructions' => '',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array(
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'choices' => array(
// 				'flyout' => 'Flyout vertical',
// 				'flyoutH' => 'Flyout horizontal',
// 				'grid' => 'Grid',
// 			),
// 			'default_value' => false,
// 			'allow_null' => 1,
// 			'multiple' => 0,
// 			'ui' => 0,
// 			'return_format' => 'value',
// 			'ajax' => 0,
// 			'placeholder' => '',
// 		),
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'nav_menu_item',
// 				'operator' => '==',
// 				'value' => 'location/primary-menu',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// 	'active' => true,
// 	'description' => '',
// ));

/**
 * FOOTER OPTIONS
 */
acf_add_local_field_group(array(
	'key' => 'group_5ebaa92f9edaf',
	'title' => 'Footer',
	'fields' => array(
		array(
			'key' => 'field_5ebab36e2427e',
			'label' => 'Images & colors',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5f1197056d8fc',
			'label' => 'Replace footer logo by another image ?',
			'name' => 'sedoo_labs_footer_replace_logo',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5f11972f6d8fd',
			'label' => 'Image',
			'name' => 'sedoo_labs_image_in_footer',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f1197056d8fc',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5f1197496d8fe',
			'label' => 'Url du lien',
			'name' => 'sedoo_labs_footer_url_image',
			'type' => 'url',
			'instructions' => 'l\'image n\'est pas clicable si aucune url est renseignée',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f1197056d8fc',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5ebaa93e884bd',
			'label' => 'Footer background SVG',
			'name' => 'footer_background_svg',
			'type' => 'image',
			'instructions' => 'Only format SVG format allowed',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => 'svg',
		),
		array(
			'key' => 'field_5ebab3882427f',
			'label' => 'Footer color',
			'name' => 'footer_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#F2F2F2',
		),
		array(
			'key' => 'field_5ebac5bd14139',
			'label' => 'Footer text color',
			'name' => 'footer_text_color',
			'type' => 'color_picker',
			'instructions' => 'If you choose a colored background, please choose a light color for you typography.
Please refer to those <a href="https://material.io/design/color/text-legibility.html#text-types">Guide lines</a>.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#222222',
		),
		array(
			'key' => 'field_5ebabdc5e8c8d',
			'label' => 'Informations',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5ebabdd6e8c8e',
			'label' => 'Show copyright',
			'name' => 'footer_show_copyright',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5ebabe69e8c8f',
			'label' => 'Copyright text',
			'name' => 'footer_copyright_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ebabdd6e8c8e',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '© Copyright',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-options',
			),
		),
	),
	'menu_order' => 4,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/**
 * LANGAGE OPTIONS
 */
if (function_exists('pll_the_languages')) {
	acf_add_local_field_group(array(
		'key' => 'group_5ec291beb375f',
		'title' => 'Langage options',
		'fields' => array(
			array(
				'key' => 'field_5ec291ce8ba92',
				'label' => 'Affichage des drapeaux à droite dans les raccourcis',
				'name' => 'display_lang_shortcut',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-theme-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
}
/**
 * SOURCE OF ARTICLE 
 * only for post (single.php)
 */

acf_add_local_field_group(array(
	'key' => 'group_5d6fb5f77ca9f',
	'title' => 'Sources page articles',
	'fields' => array(
		array(
			'key' => 'field_5d6fb628b251a',
			'label' => 'Sources',
			'name' => 'sources',
			'type' => 'textarea',
			'instructions' => 'Saisir les sources de l\'article',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'br',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/***
 * CHAMPS AUTEUR
 */
acf_add_local_field_group(array(
	'key' => 'group_5d6faffd00cb6',
	'title' => 'Champs additionnels auteurs',
	'fields' => array(
		array(
			'key' => 'field_5d6fb014d56e1',
			'label' => 'Current position',
			'name' => 'poste',
			'type' => 'text',
			'instructions' => 'Provide your current position / poste dans l\'institution',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d6fb025d56e2',
			'label' => 'Photo',
			'name' => 'photo_auteur',
			'type' => 'image',
			'instructions' => 'Upload your photo',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'edit',
			),
		),
		array(
			array(
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'register',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/**
 * TABLE OF CONTENT
 */

acf_add_local_field_group(array(
	'key' => 'group_5d763c9864edf',
	'title' => 'Table des matières',
	'fields' => array(
		array(
			'key' => 'field_5d763caf8246e',
			'label' => 'Table des Matières',
			'name' => 'table_content',
			'type' => 'checkbox',
			'instructions' => 'Afficher la table des matières ?',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'toc' => 'afficher',
			),
			'allow_custom' => 0,
			'default_value' => array(
			),
			'layout' => 'vertical',
			'toggle' => 0,
			'return_format' => 'value',
			'save_custom' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'default',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sedoo-research-team',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sedoo-platform',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'ces',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sedoo-sno',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sedoo-axe',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sedoo-project',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5d6faf894c203',
	'title' => 'Sélection auteur',
	'fields' => array(
		array(
			'key' => 'field_5d6fafaccec98',
			'label' => 'Ajouter auteur',
			'name' => 'ajouteur_auteur',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'interne' => 'Afficher un auteur du laboratoire',
				'externe' => 'Mentionner un auteur / intervenant extérieur',
			),
			'default_value' => array(
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5d6fafcccec99',
			'label' => 'Selectionner l\'auteur',
			'name' => 'select_lauteur',
			'type' => 'user',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5d6fafaccec98',
						'operator' => '==',
						'value' => 'interne',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'role' => '',
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'array',
		),
		array(
			'key' => 'field_5d96f05c8037d',
			'label' => 'Photo auteur extérieur',
			'name' => 'photo_auteur_exterieur',
			'type' => 'image',
			'instructions' => 'Téléverser la photo de l\'auteur',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5d6fafaccec98',
						'operator' => '==',
						'value' => 'externe',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5d96f0a18037e',
			'label' => 'Nom de l\'auteur extérieur',
			'name' => 'nom_de_lauteur_exterieur',
			'type' => 'text',
			'instructions' => 'Saisir le nom de l\'auteur',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5d6fafaccec98',
						'operator' => '==',
						'value' => 'externe',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d96f0be8037f',
			'label' => 'Poste de l\'auteur',
			'name' => 'poste_de_lauteur',
			'type' => 'text',
			'instructions' => 'Saisir le poste occupé par l\'auteur',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5d6fafaccec98',
						'operator' => '==',
						'value' => 'externe',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d96f0fc80380',
			'label' => 'A propos de l\'auteur',
			'name' => 'a_propos_auteur',
			'type' => 'textarea',
			'instructions' => 'Saisir l\'à propos de l\'auteur',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5d6fafaccec98',
						'operator' => '==',
						'value' => 'externe',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 4,
			'new_lines' => 'br',
		),
		array(
			'key' => 'field_5d96f13280381',
			'label' => 'Site internet auteur',
			'name' => 'site_internet_auteur',
			'type' => 'url',
			'instructions' => 'Saisir le lien vers le site de l\'auteur',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5d6fafaccec98',
						'operator' => '==',
						'value' => 'externe',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'event',
			),
		),
		array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tribe_events',
            ),
        ),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));


endif;
?>