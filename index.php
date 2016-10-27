<?php get_header(); ?>

<section id="promos">
	<div class="block promo simple">
		<a href="#" title="Promo title"> <!-- target="_blank" if external link -->
			<img src="http://placehold.it/1280x500/0f0f0f/ff00ff&text=HUGE" class="huge">
			<img src="http://placehold.it/1000x500/0f0f0f/ff00ff&text=LARGE" class="large">
			<img src="http://placehold.it/800x500/0f0f0f/ff00ff&text=MOBILE" class="mobile">
		</a>
	</div>


	<div class="block promo complex push_top push_bot no_text back_cover" style="background-image:url(http://placehold.it/80x40/ff00ff/00ff00&text=tile)">
		<!-- no_text: No text, removes the inline-style bottom margin from images -->
		<!-- back_cover back_center -->
		<div class="wrap content">
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
	<!-- wrap optional -->
	<div class="wrap">
		<hr>
	</div>
</div>


<div class="block explore" id="explora">
	<h2>EXPLORA MR. BROWN EN</h2>
	<div class="locations">
		<a href="#">Colinas</a>
		<a href="#">Garza Sada</a>
		<a href="#" class="current">San Nicolás</a>
	</div>
	<div class="slider">
		<div class="slide">
			<div class="mapa">
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
	<img src="http://placehold.it/1280x800&text=HUGE" class="huge">
	<img src="http://placehold.it/100x700&text=LARGE" class="large">
	<h2>Chido para ahorita</h2>
	<div class="slider">
		<a class="slide dish">
			<img src="http://placehold.it/380x300&text=SANDWICH">
			<span class="price">95</span>
			<h3>Club Sandwich</h3>
		</a>
		<a class="slide dish">
			<img src="http://placehold.it/380x300&text=PIZZA">
			<span class="price">125</span>
			<h3>Don Mario Pizza</h3>
		</a>
		<a class="slide dish">
			<img src="http://placehold.it/380x300&text=BURGER">
			<span class="price">100</span>
			<h3>Toreados Burger</h3>
		</a>
	</div>
	<a href="gotomenu">CHECA <u>TODO</u> EL MENU</a>
</div>


<div class="block ranking">
	<h2>Todos hablan de mi</h2>
	<ul>
		<li>
			<img src="http://placehold.it/180x100&text=YELP">
			<div class="rating four half">
				<span></span> <span></span> <span></span> <span></span> <span class="half"></span>
				<div class="numbers">4.5 / 5</div>
			</div>
		</li>
		<li>
			<img src="http://placehold.it/180x100&text=TRIP">
			<div class="rating four half">
				<span></span> <span></span> <span></span> <span></span> <span class="half"></span>
				<div class="numbers">4.5 / 5</div>
			</div>
		</li>
		<li>
			<img src="http://placehold.it/180x100&text=FB">
			<div class="rating four half">
				<span></span> <span></span> <span></span> <span></span> <span class="half"></span>
				<div class="numbers">4.5 / 5</div>
			</div>
		</li>
	</ul>
</div>

<?php get_footer(); ?>
