<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div class="block food template pad_bot push_bot">
		<section id="baguettes">
			<h2>Entradas</h2>
			<?php get_template_part('inc/slider', 'food'); ?>
		</section>
		<section id="baguettes">
			<h2>Ensaladas</h2>
			<div class="notes content">
				<img class="alignleft" src="http://placehold.it/36">
				<strong>AYUDAR TE DEJARÁ UN BUEN SABOR DE BOCA</strong><br>
				Por cada burger marcada, Mr. Brown dona $5 pesos a la Asociación Down Monterrey.
			</div>
			<?php get_template_part('inc/slider', 'food'); ?>
		</section>
		<section id="baguettes">
			<h2>Burritos</h2>
			<?php get_template_part('inc/slider', 'food'); ?>
		</section>
		<section id="baguettes">
			<h2>Pizzas</h2>
			<?php get_template_part('inc/slider', 'food'); ?>
		</section>
		<section id="baguettes">
			<h2>Baguettes</h2>
			<?php get_template_part('inc/slider', 'food'); ?>
		</section>
	</div>

<?php get_footer(); ?>
