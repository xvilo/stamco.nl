		<div class="container clearfix">
			<main class="main-page__sidebar">
				<?php the_content(); ?>
			</main>
			<aside class="main-sidebar">
				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar' ); ?>
				<?php endif; ?>
			</aside>
		</div>