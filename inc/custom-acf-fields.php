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
			'key' => 'field_5d6e4d1d7d654',
			'label' => 'Lien Annuaire',
			'name' => 'lien_annuaire',
			'type' => 'url',
			'instructions' => 'Insérer le lien vers l\'annuaire du laboratoire',
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
	'key' => 'group_5d6faffd00cb6',
	'title' => 'Champs additionnels auteurs',
	'fields' => array(
		array(
			'key' => 'field_5d6fb014d56e1',
			'label' => 'Poste au sein du laboratoire',
			'name' => 'poste',
			'type' => 'text',
			'instructions' => 'Saisir le poste au sein du laboratoire',
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
			'label' => 'Photo auteur',
			'name' => 'photo_auteur',
			'type' => 'image',
			'instructions' => 'Téléverser la photo de l\'auteur',
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

acf_add_local_field_group(array(
	'key' => 'group_5d6e45131ccd4',
	'title' => 'Location Settings',
	'fields' => array(
		array(
			'key' => 'field_5db6f28ec9561',
			'label' => 'Affichage à droite',
			'name' => 'display_shortcut',
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
			'default_value' => '#FFFFFF',
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