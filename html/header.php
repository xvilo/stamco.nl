<!DOCTYPE html>
<html lang="en" class="modernizr-no-js">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8" />

        <link rel="preconnect" href="//ajax.googleapis.com" />

        <meta http-equiv="cleartype" content="on" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta name="msapplication-tap-highlight" content="no" />
        <meta name="description" content="" />

        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/media/stylesheets/app.css" />
        <script src="<?php echo get_template_directory_uri() ?>/media/javascripts/modernizr.js"></script>
        <?php echo wp_head() ?>
    </head>
    <body <?php body_class(); ?>>
		<header class="main-header">
			<div class="container">
			    <div class="header-logo">
				    <i class="icon icon--ui__stamco_logo_big"><svg><use xlink:href="<?php echo get_template_directory_uri() ?>/media/images/sprites/ui.svg#stamco_logo_big" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg></i>
			    </div>
			    <nav class="header-menu">
				    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			    </nav>
			</div>
		</header>