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