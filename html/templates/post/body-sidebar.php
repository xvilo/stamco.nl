		<div class="container">
			<main class="main-page main-page">
				<?php the_content(); ?>
				<?php get_template_part('gallery') ?>	
			</main>
			<aside class="main-sidebar">
				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar' ); ?>
				<?php endif; ?>
			</aside>
		</div>