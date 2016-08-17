<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		if(get_field('soort') == "simple"){
			get_template_part('templates/'. get_post_type() .'/head', 'simple' );
		}elseif(get_field('soort') == "image"){
			get_template_part('templates/'. get_post_type() .'/head', 'image' );
		}elseif(get_field('soort') == "slider"){
			get_template_part('templates/'. get_post_type() .'/head', 'slider' );
		}else{
			get_template_part('templates/'. get_post_type() .'/head' );
		}
		
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div class="container"><p id="breadcrumbs">U bent hier: ','</p></div>');
		}
		
		if(get_field('enable_sidebar') == true){
			get_template_part('templates/'. get_post_type() .'/body', 'sidebar' );
		}else{
			get_template_part('templates/'. get_post_type() .'/body', 'no_sidebar' );
		}
		
		endwhile; else : 
			get_template_part('templates/'. get_post_type() .'/notfound' );	
		endif; ?>
<?php get_footer(); ?>