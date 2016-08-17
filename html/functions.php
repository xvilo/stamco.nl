<?php 
@define( 'IRON_PARENT_DIR', get_template_directory() );
@define( 'IRON_CHILD_DIR',  get_stylesheet_directory() );
	
@define( 'IRON_PARENT_URL', get_template_directory_uri() );
@define( 'IRON_CHILD_URL',  get_stylesheet_directory_uri() );

$iron_post_types = array();
$iron_query = (object) array();
$use_dashicons = floatval($wp_version) >= 3.8;

require_once('inc/advanced-custom-fields/acf.php');
include('inc/custom-fields.php');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

register_sidebar($args = array(
	'name'          => sprintf( __( 'Sidebar' )),
	'id'            => "sidebar",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="sidebar--widget sidebar--widget__%2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h3 class="sidebar--widget__title">',
	'after_title'   => "</h3>\n",
));