		<footer class="page-footer">
			<div class="container">
				<div class="page-footer--logo"><a href="<?php echo site_url(); ?>"><i class="m-icon icon--ui__stamco_logo_big"><svg><use xlink:href="<?php echo get_template_directory_uri() ?>/media/images/sprites/ui.svg#stamco_logo_big" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg></i></a></div>
				<div class="page-footer--logo__clear"><a href="<?php echo site_url(); ?>"><i class="m-icon icon--ui__stamco_logo_clear"><svg><use xlink:href="<?php echo get_template_directory_uri() ?>/media/images/sprites/ui.svg#stamco_logo_clear" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg></i></a></div>
				<?php if ( is_active_sidebar( 'footer' ) ) : ?>
					<div class="page-footer--menu">
						<?php dynamic_sidebar( 'footer' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</footer>
		</div>
        <!-- <script async src="<?php echo get_template_directory_uri() ?>/media/javascripts/svg4everybody.js"></script>
        <script async src="<?php echo get_template_directory_uri() ?>/media/javascripts/jquery.stickykit.min.js"></script>
        <script async src="<?php echo get_template_directory_uri() ?>/media/javascripts/photoswipe-ui-default.min.js"></script>
        <script async src="<?php echo get_template_directory_uri() ?>/media/javascripts/photoswipe.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/media/javascripts/jquery.js"><\/script>')</script>
        <script async src="<?php echo get_template_directory_uri() ?>/media/javascripts/app.js"></script> -->
        <?php wp_footer() ?>
    </body>
</html>
