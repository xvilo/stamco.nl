<?php get_header(); ?>
         <!-- Start the Loop. -->
			 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				 if(get_field('soort') == "simple"){
			?>
			<section class="page-header">
				<div class="container">
					<h1 class="page-header--title">
						<?php 
						if(get_field('title') == 'no'){ 
							echo get_field('title-text');
						}else{
							the_title();
						}
						?></h1>
				</div>
			</section>
			<?php
		}elseif(get_field('soort') == "image"){
			?>
			<section class="page-header__image" style="background-image: url('<?php echo get_field('afbeelding')['url'] ?>')">
				<div class="container">
					<h1 class="page-header--title">
						<?php 
						if(get_field('title') == 'no'){ 
							echo get_field('title-text');
						}else{
							the_title();
						}
						?></h1>
				</div>
			</section>
			<?php
		}elseif(get_field('soort') == "slider"){
			?> <?php
			echo get_field('slider');	
			?> <?php
		}else{
			?>
			<section class="page-header">
				<div class="container">
					<h1 class="page-header--title">
						<?php 
						if(get_field('title') == 'no' or get_field('title') != false){ 
							echo get_field('title-text');
						}else{
							the_title();
						}
						?></h1>
				</div>
			</section>
			<?php
		}
	?>
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<div class="container"><p id="breadcrumbs">U bent hier: ','</p></div>');
		} ?>			 	<!-- Test if the current post is in category 3. -->
			 	<!-- If it is, the div box is given the CSS class "post-cat-three". -->
			 	<!-- Otherwise, the div box is given the CSS class "post". -->
		<div class="container">
			 	<?php if ( in_category( '3' ) ) : ?>
			 		<div class="post-cat-three">
			 	<?php else : ?>
			 		<div class="post">
			 	<?php endif; ?>
			
			
			 	<!-- Display the Title as a link to the Post's permalink. -->
			
			 	<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			
			
			 	<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
			
			 	<small><?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?></small>
			
			
			 	<!-- Display the Post's content in a div box. -->
			
			 	<div class="entry">
			 		<?php the_content(); ?>
			 	</div>
			
			
			 	<!-- Display a comma separated list of the Post's Categories. -->
			
			 	<p class="postmetadata"><?php _e( 'Posted in' ); ?> <?php the_category( ', ' ); ?></p>
			 	</div> <!-- closes the first div box -->
			
			
			 	<!-- Stop The Loop (but note the "else:" - see next line). -->
			
			 <?php endwhile; else : ?>
			
					<section class="page-header">
							<div class="container">
								<h1 class="page-header--title">Pagina niet gevonden...</h1>
							</div>
						</section>
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<div class="container"><p id="breadcrumbs">U bent hier: ','</p></div>');
					} ?>
					
					<div class="container">
						<h3>De opgevraagde pagina is niet gevonden</h3>
						<br>
						<p><strong>Wat kunt u doen?</strong></p>
						<ul class="list--bullet">
							<li>Check of u de URL juist heeft ingevoerd in de adres balk</li>
							<li><a href="/">Klik hier</a> om terug te gaan naar de homepage</li>
						</ul>
					</div>
			 	<!-- REALLY stop The Loop. -->
			 <?php endif; ?>
</div>
<?php get_footer(); ?>