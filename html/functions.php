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
include('inc/custom-posttypes.php');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu', 'magneet-online' ));
}
add_action( 'init', 'register_my_menu' );

register_sidebar($args = array(
	'name'          => sprintf( __( 'Sidebar', 'magneet-online' )),
	'id'            => "sidebar",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="sidebar--widget sidebar--widget__%2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h3 class="sidebar--widget__title">',
	'after_title'   => "</h3>\n",
));

register_sidebar($args = array(
	'name'          => sprintf( __( 'Footer', 'magneet-online' )),
	'id'            => "footer",
	'description'   => '1 Regel text voor in de footer. Deze MAG NIET meerdere widgets bevatten!',
	'class'         => '',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => "",
));


function sample_admin_notice__success() {
    global $current_user;
    get_currentuserinfo();
    $admin_usr = "magneet_admin";
    $curr_user = $current_user->user_nicename;
    if($curr_user == $admin_usr){
	    ?>
	    <div class="notice notice-warning">
	        <p><?php _e( "Thema aanpassingen gelieve te doen in de PHP, SASS en Coffeescript files op de <a href='https://bitbucket.org/magneetonline/stamco' target='_blank'>bitbucket repository.</a> <br><small>Deze melding is alleen te zien voor {$admin_usr}</small>");?></p>
	    </div>
	    <?php
	}
}
add_action( 'admin_notices', 'sample_admin_notice__success' );

// check if post content is empty
function category_id_class() {
	global $post;
	if($post->post_content == ""){
		$classes[] = 'empty-post';
	}else{
		$classes[] = 'non-empty-post';
	}
	return $classes;
}

add_filter('body_class', 'category_id_class');

function blokken_func( $atts ){
	$type = 'vastgoedaanbod';
	$html .= "<div class\"row\">";
	$args=array(
	  'post_type' => $type,
	  'post_status' => 'publish',
	  'posts_per_page' => 4,
	  'caller_get_posts'=> 1);
	
	$my_query = null;
	$my_query = new WP_Query($args);
	
	if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
			$html .= "
			<article class=\"large-3 columns vastgoed--home\">
				<div class=\"vastgoed--featured-image\" style=\"background-image: url('".$image[0]."')\"></div>
				<h4 class=\"vastgoed--home__title\"> <i class=\"m-icon icon--ui__arrow\"><svg><use xlink:href=\"".get_template_directory_uri()."/media/images/sprites/ui.svg#arrow\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"></use></svg></i>".get_the_title()."</h4>
				<p clas\"vastgoed--home__information\">".get_field('card_informatie')."</p>
			</article>";
		endwhile;
	}
	wp_reset_query();
	
	$html .= "</div>";
	return $html;
}
add_shortcode( 'blokken', 'blokken_func' );