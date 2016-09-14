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
        <?php wp_footer() ?>
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-84162235-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
    </body>
</html>
