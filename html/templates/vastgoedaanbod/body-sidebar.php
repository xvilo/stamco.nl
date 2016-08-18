		<div class="container clearfix">
			<main class="main-page__sidebar">
				<?php if (has_post_thumbnail( get_the_ID() ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
					<div class="vastgoed--featured-image" style="background-image: url('<?php echo $image[0]; ?>')">
					</div>
					<?php endif; ?>
				<?php the_content(); ?>
				<dl class="vastgoed--description__list">
					<dt class="vastgoed--description__item">Item</dt>
					<dd class="vastgoed--description__desc">Omschrijving van item is hier te vinden!</dd>
				</dl>
			</main>
			<aside class="main-sidebar">
				<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar' ); ?>
				<?php endif; ?>
			</aside>
		</div>