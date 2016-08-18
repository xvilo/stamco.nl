		<div class="container ">
			<main class="main-page">
				<?php if (has_post_thumbnail( get_the_ID() ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
					<div class="vastgoed--featured-image" style="background-image: url('<?php echo $image[0]; ?>')">
					</div>
					<?php endif; ?>
				<?php the_content(); ?>
				<ul class="vastgoed--description__list">
					<?php foreach (get_field('extra_informatie') as $info){
						?>
					<li> <span class="vastgoed--description__item"><?php echo $info['titel'] ?>:</span> <?php echo $info['info'] ?></li>
						<?php
					}?>
				</ul>
				<?php get_template_part('gallery') ?>	
			</main>
		</div>