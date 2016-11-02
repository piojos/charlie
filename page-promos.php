<?php get_header(); ?>

<section id="promos">
	<div class="block promo simple">
		<a href="#" title="Promo title"> <!-- target="_blank" if external link -->
			<img src="http://placehold.it/1280x500/ff0066&text=HUGE" class="huge">
			<img src="http://placehold.it/1000x500/ff0066&text=LARGE" class="large">
			<img src="http://placehold.it/800x500/ff0066&text=MOBILE" class="mobile">
		</a>
	</div>


	<div class="block promo complex push_top push_bot no_text back_cover" style="background-image:url(http://placehold.it/80x40/ff00ff/00ff00&text=tile)">
		<!-- no_text: No text, removes the inline-style bottom margin from images & no .wrap on content -->
		<!-- back_cover back_center -->
		<div class="content">
			<div style="text-align:center;">
				<img src="http://placehold.it/1000x500&text=LARGE">
			</div>
		</div>
	</div>


	<div class="block promo complex pad_top pad_bot" style="background-color:#FFB6C1">
		<!-- style="background-image:url(http://placehold.it/80x40&text=tile)" -->
		<!-- back_cover back_center back_tile: style="background-image:url(tile.jpg)" -->
		<div class="wrap content">
			<div style="text-align:center;">
				<p><strong>MIÉRCOLES</strong></p>
				<p class="condensed">PAPAS, TEPACHE Y MEZCAL</p>
				<img src="http://placehold.it/300x240&text=MOBILE">
				<p><strong>TODO EL DÍA</strong></p>
			</div>
		</div>
	</div>
</section>


<div class="block separator push_top push_bot">
	<div class="wrap">
		<hr>
	</div>
</div>


<div class="block explore push_bot" id="explora">
	<h2>EXPLORA MR. BROWN EN</h2>
	<div class="locations">
		<a href="#">Colinas</a>
		<a href="#">Garza Sada</a>
		<a href="#" class="current">San Nicolás</a>
	</div>
	<div class="slider wrap">
		<div class="slide">
			<div class="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses-419!2smx!4v1467232476784!6m8!1m7!1sRNiYgvT-dzQAAAQvOzevIQ!2m2!1d25.6868143302259!2d-100.3766458226108!3f298.54260953890486!4f2.5782313206379257!5f0.7820865974627469" width="600" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="contact">
				<h3>Sucursal
				San Nicolás</h3>
				<br>
				<a href="tel:83353383">83.35.33.83</a><br>
				<br>
				Av. Manuel L. Barragán <br>
				550 Col. Residencial Anáhuac <br>
				San Nicolás de los Garza <br>
				<br>
				<a href="#">+ Ver en Google Maps</a>
			</div>
		</div>
	</div>
</div>


<div class="block food" id="ahorita">
	<img src="http://placehold.it/1280x500&text=EL%20MENU" class="large">
	<img src="http://placehold.it/600x300&text=MOBILE%20MENU" class="mobile">
	<h2>Chido para ahorita</h2>
	<?php get_template_part('inc/slider', 'food'); ?>
	<a href="#" class="gotomenu">CHECA <u>TODO</u> EL MENU</a>
</div>


<div class="block ranking push_top push_bot pad_top pad_bot">
	<h2 class="shadow">Todos hablan de mi</h2>
	<ul>
		<li>
			<a href="#" title="Mr Brown's Yelp Profile Rating">
				<img src="http://placehold.it/180x100&text=YELP">
				<div class="rating four half">
					<span>★</span> <span>★</span> <span>★</span> <span>★</span> <span class="half">★</span>
					<div class="numbers">4.5 / 5</div>
				</div>
			</a>
		</li>
		<li>
			<a href="#" title="Mr Brown's Trip Advisor Profile Rating">
				<img src="http://placehold.it/180x100&text=TRIP">
				<div class="rating four half">
					<span>★</span> <span>★</span> <span>★</span> <span>★</span>
					<div class="numbers">4 / 5</div>
				</div>
			</a>
		</li>
		<li>
			<a href="#" title="Mr Brown's Facebook Profile Rating">
				<img src="http://placehold.it/180x100&text=FB">
				<div class="rating four half">
					<span>★</span> <span>★</span> <span>★</span> <span>★</span> <span class="half">★</span>
					<div class="numbers">4.5 / 5</div>
				</div>
			</a>
		</li>
	</ul>
</div>

<?php get_footer(); ?>
