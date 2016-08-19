	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'archive-thumb' ); ?>
			<article class="large-3 columns vastgoed--home">
				<div class="vastgoed--featured-image" style="background-image: url('<?php echo $image[0]; ?>')"><a href="<?php the_permalink()?>" class="vastgoed--featured-image__overlay">&nbsp;</a></div>
				<h4 class="vastgoed--home__title"> <a href="<?php echo get_permalink(); ?>"> <i class="m-icon icon--ui__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/media/images/sprites/ui.svg#arrow" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg></i><?php echo get_the_title(); ?></a></h4>
				<p clas"vastgoed--home__information"><?php echo get_field('card_informatie'); ?></p>
				<hr class="vastgoed--bar">
			</article>