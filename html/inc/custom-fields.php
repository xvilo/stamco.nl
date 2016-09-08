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
	die("Live ACF word ingeladen. Zet dit uit bij live gang in themes/comfort/inc/custom-fields.php:39");
	if(function_exists("register_field_group"))
{
	register_field_group(array (
			'id' => 'acf_header-opties',
			'title' => 'Header Opties',
			'fields' => array (
				array (
					'key' => 'field_57b31ef767177',
					'label' => 'Titel',
					'name' => 'title',
					'type' => 'select',
					'required' => 1,
					'choices' => array (
						'yes' => 'Gebruik generieke titel',
						'no' => 'Kies eigen titel',
					),
					'default_value' => 'yes : Gebruik generieke tite',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_57b31f5867178',
					'label' => 'Titel',
					'name' => 'title-text',
					'type' => 'text',
					'instructions' => 'Titel Text',
					'required' => 1,
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_57b31ef767177',
								'operator' => '==',
								'value' => 'no',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_57b31ea267176',
					'label' => 'Soort',
					'name' => 'soort',
					'type' => 'select',
					'choices' => array (
						'simple' => 'Simpel',
						'image' => 'Achtergrond afbeelding',
						'slider' => 'Slider',
					),
					'default_value' => 'simple : Simpel',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_57b31f8267179',
					'label' => 'Afbeelding',
					'name' => 'afbeelding',
					'type' => 'image',
					'instructions' => 'Header afbeelding. Deze moet minimaal 180x1920 pixels groot zijn.',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_57b31ea267176',
								'operator' => '==',
								'value' => 'image',
							),
						),
						'allorany' => 'all',
					),
					'save_format' => 'object',
					'preview_size' => 'full',
					'library' => 'all',
				),
				array (
					'key' => 'field_57b327a5be450',
					'label' => 'Slider',
					'name' => 'slider',
					'type' => 'wpp_acf_revolution_slider',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_57b31ea267176',
								'operator' => '==',
								'value' => 'slider',
							),
						),
						'allorany' => 'all',
					),
					'disable' => array (
						0 => 0,
					),
					'allow_null' => 0,
					'multiple' => 0,
					'hide_disabled' => 0,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 1,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'vastgoedaanbod',
						'order_no' => 0,
						'group_no' => 2,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_image-gallery',
			'title' => 'image gallery',
			'fields' => array (
				array (
					'key' => 'field_57b5b3f58a1a6',
					'label' => 'Gallerij',
					'name' => 'gallerij',
					'type' => 'gallery',
					'instructions' => 'Upload hier de afbeeldingen voor een gallerij!',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
						'order_no' => 0,
						'group_no' => 1,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'vastgoedaanbod',
						'order_no' => 0,
						'group_no' => 2,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_vastgoed',
			'title' => 'Vastgoed',
			'fields' => array (
				array (
					'key' => 'field_57b58d7e44f5f',
					'label' => 'Extra informatie',
					'name' => 'extra_informatie',
					'type' => 'repeater',
					'instructions' => 'Vul hier de extra informatie in! ',
					'sub_fields' => array (
						array (
							'key' => 'field_57b58db044f60',
							'label' => 'titel',
							'name' => 'titel',
							'type' => 'text',
							'instructions' => 'De titel',
							'required' => 1,
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'html',
							'maxlength' => '',
						),
						array (
							'key' => 'field_57b58dc444f61',
							'label' => 'Info',
							'name' => 'info',
							'type' => 'text',
							'instructions' => 'De informatie',
							'required' => 1,
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'html',
							'maxlength' => '',
						),
					),
					'row_min' => '',
					'row_limit' => '',
					'layout' => 'table',
					'button_label' => 'Voeg toe',
				),
				array (
					'key' => 'field_57b58df644f62',
					'label' => 'Card informatie',
					'name' => 'card_informatie',
					'type' => 'text',
					'instructions' => 'Dit is de extra informatie regel voor een overzichtspagina',
					'required' => 1,
					'default_value' => '360 m<sup>2<sup>',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_57b5a9cf2afa5',
					'label' => 'Subtitle',
					'name' => 'subtitle',
					'type' => 'text',
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
						'value' => 'vastgoedaanbod',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_sidebar-option',
			'title' => 'Sidebar option',
			'fields' => array (
				array (
					'key' => 'field_57b427fca4f19',
					'label' => 'Sidebar inschakelen',
					'name' => 'enable_sidebar',
					'type' => 'true_false',
					'instructions' => 'Schakel de sidebar in.',
					'message' => '',
					'default_value' => 1,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
						'order_no' => 0,
						'group_no' => 1,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'vastgoedaanbod',
						'order_no' => 0,
						'group_no' => 2,
					),
				),
			),
			'options' => array (
				'position' => 'side',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 1,
		));
	}
}