<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<section class="page-header" style="background-image: url('<?php echo get_template_directory_uri() ?>/media/images/page-header.jpg')">
		<div class="container">
			<h1 class="page-header--title"><?php the_title(); ?></h1>
		</div>
	</section>
	
				<?php the_content(); ?>
			
		<?php endwhile; else : ?>
			
			
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			
			
	<!-- REALLY stop The Loop. -->
	<?php endif; ?>
<?php get_footer(); ?>