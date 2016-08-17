<?php get_header(); ?>
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
<?php get_footer(); ?>