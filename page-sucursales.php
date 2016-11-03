<?php get_header(); ?>

<div class="block">
<?php if( have_rows('map-pins') ): ?>
	<div class="acf-map">
		<?php while ( have_rows('map-pins') ) : the_row();

			$location = get_sub_field('location');

			?>
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				<h4><?php the_sub_field('title'); ?></h4>
				<p class="address"><?php echo $location['address']; ?></p>
				<?php // <p>the_sub_field('description'); </p> ?>
			</div>
	<?php endwhile; ?>
	</div>
<?php endif; ?>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG3l_pG-5BMKnGDpYenf_eUgVSy0wtPes"></script>
<script src="<?php bloginfo('template_url'); ?>/js/map-sucursales.js"></script>

<div class="block location tabs push_top push_bot">
	<img src="http://placehold.it/240x90&text=FOODIE">
	<img src="http://placehold.it/300x90&text=MR.BROWN">
	<img src="http://placehold.it/240x90&text=FOODTRUCK">
</div>

<section id="content" class="location content slider">
	<div class="slide">
		<div class="wrap">
			<div class="info">
				<h2>MR. BROWN </h2>
				<p>Nuestro legado más claro: Comida desenfadada con estilo. Comé como a Mr. Brown le gustaría que pruebes sus recetas.</p>
			</div>
			<div class="faq">
				<h3>¿Tienen servicio a domicilio?</h3>
				<p>Solo en los foodies bro, revisa el menú de foodies <a href="#">aquí</a>.</p>
			</div>
			<div class="tour">
				<iframe style="border:0"  src="https://www.google.com/maps/embed?pb=!1m0!3m2!1ses-419!2smx!4v1467232476784!6m8!1m7!1sRNiYgvT-dzQAAAQvOzevIQ!2m2!1d25.6868143302259!2d-100.3766458226108!3f298.54260953890486!4f2.5782313206379257!5f0.7820865974627469&scrollwheel=false" width="600" height="600" frameborder="0" scrolling="no"></iframe>
			</div>
		</div>
		<ul class="wrap joints">
			<li>
				<h3>San Jerónimo</h3>
				<a href="tel:81439291">8143 9291</a>

				<p>Av. Anillo Periferico
				1300  San Jerónimo
				Plaza Platino
				Monterrey</p>

				<a href="#" class="button">Direcciones</a>
			</li>
			<li>
				<h3>San Nicolás</h3>
				<a href="tel:8335 3383">8335 3383</a>

				<p>Av. Manuel L. Barragán
				550 Col. Residencial Anáhuac
				San Nicolás de los Garza</p>

				<a href="#" class="button">Direcciones</a>
			</li>
			<li>
				<h3>Garza Sada</h3>
				<a href="tel:81439291">8143 9291</a>

				<p>Av. Eugenio
				Garza Sada 1892
				Monterrey</p>

				<a href="#" class="button">Direcciones</a>
			</li>
			<li>
				<h3>Cd. de México</h3>
				<a href="tel:55340450">5534 0450</a>

				<p>Plaza Portal
				Lomas Estrella,
				Tercer Piso
				CDMX, México</p>

				<a href="#" class="button">Direcciones</a>
			</li>
			<li>
				<h3>Garza Sada</h3>
				<a href="tel:81439291">8143 9291</a>

				<p>Av. Eugenio
				Garza Sada 1892
				Monterrey</p>

				<a href="#" class="button">Direcciones</a>
			</li>
			<li>
				<h3>Cd. de México</h3>
				<a href="tel:55340450">5534 0450</a>

				<p>Plaza Portal
				Lomas Estrella,
				Tercer Piso
				CDMX, México</p>

				<a href="#" class="button">Direcciones</a>
			</li>
		</ul>
	</div>
</section>

<?php get_footer(); ?>
