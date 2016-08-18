<?php
/***
 *  Install Add-ons
 *
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */

// Fields
function sem_register_acf_fields()
{
	if ( ! class_exists('acf_field_repeater') )
		include_once(IRON_PARENT_DIR.'/inc/acf-addons/acf-repeater/repeater.php');

	if ( ! class_exists('acf_field_widget_area') )
		include_once(IRON_PARENT_DIR.'/inc/acf-addons/acf-widget-area/widget-area-v4.php');
		
	if ( ! class_exists('acf_field_date_time_picker') )
		include_once(IRON_PARENT_DIR.'/inc/acf-addons/acf-field-date-time-picker/date_time_picker-v4.php');
	
	//if ( ! class_exists('acf_field_gallery') )
	//	include_once(IRON_PARENT_DIR.'/inc/acf-addons/acf-gallery/acf-gallery.php');

}

add_action('acf/register_fields', 'sem_register_acf_fields');


if($_SERVER['HTTP_HOST'] != "stamco.sem" AND $_SERVER['HTTP_HOST'] != "stamco.magneet.it"){
	define( 'ACF_LITE', true );
	die("Live ACF word ingeladen. Zet dit uit bij live gang in themes/stamco/inc/custom-fields.php:39");
	if(function_exists("register_field_group")){
		register_field_group(array (
			'id' => 'acf_agenda',
			'title' => 'Agenda',
			'fields' => array (
				array (
					'key' => 'field_5773e35c82043',
					'label' => 'Begin Datum en tijd',
					'name' => 'begin_datum_en_tijd',
					'type' => 'date_time_picker',
					'required' => 1,
					'show_date' => 'true',
					'date_format' => 'm/d/y',
					'time_format' => 'h:mm tt',
					'show_week_number' => 'false',
					'picker' => 'select',
					'save_as_timestamp' => 'true',
					'get_as_timestamp' => 'true',
				),
				array (
					'key' => 'field_5773e38c82044',
					'label' => 'Eind Datum en tijd',
					'name' => 'eind_datum_en_tijd',
					'type' => 'date_time_picker',
					'show_date' => 'true',
					'date_format' => 'm/d/y',
					'time_format' => 'h:mm tt',
					'show_week_number' => 'false',
					'picker' => 'select',
					'save_as_timestamp' => 'true',
					'get_as_timestamp' => 'true',
				),
				array (
					'key' => 'field_5773e3ab82045',
					'label' => 'Locatie',
					'name' => 'locatie',
					'type' => 'google_map_extended',
					'required' => 1,
					'scrollwheel' => 1,
					'center_lat' => '-7.60786',
					'center_lng' => '110.20375',
					'zoom' => 17,
					'height' => 400,
				),
				array (
					'key' => 'field_5773e3c282046',
					'label' => 'Locatie Naam',
					'name' => 'locatie_naam',
					'type' => 'text',
					'instructions' => 'De naam van de locatie. Het liefst zoals deze op Google staat.',
					'required' => 1,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5773e3f282047',
					'label' => 'Locatie Adres',
					'name' => 'locatie_adres',
					'type' => 'text',
					'instructions' => 'Zoals deze op google staat. Vaak als: naam, straat 77, 8302AA, stad, Nederland',
					'required' => 1,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5773e42882048',
					'label' => 'Locatie Website',
					'name' => 'locatie_website',
					'type' => 'text',
					'instructions' => 'Website van de locatie',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5773e43882049',
					'label' => 'Locatie eigen agenda',
					'name' => 'locatie_eigen_agenda',
					'type' => 'text',
					'instructions' => 'Soms heeft de locatie ook een eigen agenda online staan. Vul hier de URL van het zelfde evenement. ',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5773e45a8204a',
					'label' => 'Prijs',
					'name' => 'prijs',
					'type' => 'number',
					'instructions' => 'In euro, zonder euro teken en decimalen scheiden met een punt. Je kunt bijvoorbeeld invullen: 5 of 5.50',
					'required' => 1,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_5773e4828204b',
					'label' => 'Is er een kortingsprijs beschikbaar?',
					'name' => 'is_er_een_kortingsprijs_beschikbaar',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'field_5773e4b48204c',
					'label' => 'Kortingsprijs',
					'name' => 'Kortingsprijs',
					'type' => 'number',
					'instructions' => '<b>Vul hier de <em>kortings</em>prijs in,</b> in euro, zonder euro teken en decimalen scheiden met een punt. Je kunt bijvoorbeeld invullen: 5 of 5.50',
					'required' => 1,
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5773e4828204b',
								'operator' => '==',
								'value' => '1',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_5773e4ef8204d',
					'label' => 'Kortingsprijs url',
					'name' => 'kortingsprijs_url',
					'type' => 'text',
					'instructions' => 'Is er online meer informatie beschikbaar, of verkoop van kortingskaartjes? Vul hier dan de URL van in!',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5773e50c8204e',
					'label' => 'Facebook URL',
					'name' => 'facebook_url',
					'type' => 'text',
					'instructions' => 'Is er een Facebook evenement? Vul hier dan de URL in!',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post_type_agenda',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'default',
				'hide_on_screen' => array (
					0 => 'custom_fields',
					1 => 'discussion',
					2 => 'comments',
					3 => 'tags',
					4 => 'send-trackbacks',
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_video',
			'title' => 'Video',
			'fields' => array (
				array (
					'key' => 'field_5773e5e9966c5',
					'label' => 'Video URL',
					'name' => 'video_url',
					'type' => 'text',
					'instructions' => 'Voer hier de URL van de video in!',
					'required' => 1,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5773e5fa966c6',
					'label' => 'Is een YouTube video',
					'name' => 'is_een_youtube_video',
					'type' => 'true_false',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5773e610966c7',
								'operator' => '!=',
								'value' => '1',
							),
						),
						'allorany' => 'all',
					),
					'message' => '',
					'default_value' => 0,
				),
				array (
					'key' => 'field_5773e610966c7',
					'label' => 'Is een facebook video',
					'name' => 'is_een_facebook_video',
					'type' => 'true_false',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_5773e5fa966c6',
								'operator' => '!=',
								'value' => '1',
							),
						),
						'allorany' => 'all',
					),
					'message' => '',
					'default_value' => 0,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post_type_videos',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'side',
				'layout' => 'default',
				'hide_on_screen' => array (
					0 => 'permalink',
					1 => 'excerpt',
					2 => 'custom_fields',
					3 => 'discussion',
					4 => 'comments',
					5 => 'author',
					6 => 'format',
					7 => 'send-trackbacks',
				),
			),
			'menu_order' => 0,
		));
	}
}