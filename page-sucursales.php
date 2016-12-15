<?php get_header(); ?>

<div class="mapping">
<?php if( have_rows('cities') ) :


		// Controls ?>
	<ul class="control"><?php
		while (have_rows('cities')) {
			the_row(); ?>
			<li><a href="#ct<?php the_sub_field('city'); ?>"><?php the_sub_field('city'); ?></a></li><?php
		} ?>
	</ul>
	<div class="maps"><?php


		// Cities
		while (have_rows('cities')) : the_row();
			$city = get_sub_field('city');
			if(have_rows('map-pins')) : ?>
		<div class="acf-map" id="ct<?php echo $city; ?>"><?php
			while ( have_rows('map-pins') ) : the_row();

				$location = get_sub_field('location');

				?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
					<h4><?php the_sub_field('title'); ?></h4>
					<p class="address"><?php echo $location['address']; ?></p><?php
	/*				<img src="<?php the_sub_field('icon'); ?>" >
					<p>the_sub_field('description'); </p> */ ?>
				</div><?php
			endwhile; ?>
		</div><?php
			endif;
		endwhile;	?>
	</div>
<?php endif; ?>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG3l_pG-5BMKnGDpYenf_eUgVSy0wtPes"></script>
<script src="<?php bloginfo('template_url'); ?>/js/map-sucursales.js"></script><?php


	// Tabs

	$n = 1;

	if(have_rows('business')) : ?>
<div class="block location tabs push_top push_bot"><?php
		while (have_rows('business')) {
			the_row();
			$name = get_sub_field('name');
			$dayIcon = get_sub_field('img_day');
			$nightIcon = get_sub_field('img_night');

			if($dayIcon) { ?>
	<a href="#tabC<?php echo $n++; ?>" class="hint--top" data-hint="<?php echo $name; ?>">
		<img src="<?php
			if(strpos(daytime(), 'night') !== false) {
				echo $nightIcon['url'];
			} else {
				echo $dayIcon['url'];
			}?>" alt="<?php
				if(!$name) {
					echo $imgHuge['alt'];
				} else {
					echo $name;
				} ?>">
	</a><?php
			}
			// else {} 		If Night
		}?>
	<div class="pointer"></div>
</div><?php

	endif;




	// Content

	$o = 1;
	if(have_rows('business')) : ?>
<section id="content" class="location content slider"><?php
		while (have_rows('business')) :
			the_row(); ?>
	<div class="slide" id="tabC<?php echo $o++;?>">
		<div class="wrap">
			<div class="info">
				<h2><?php the_sub_field('name'); ?> </h2>
				<?php the_sub_field('about'); ?>
			</div>
			<div class="faq">
				<?php the_sub_field('details'); ?>
			</div><?php

			if(have_rows('tours')) { ?>
			<div class="tour"><?php
				while (have_rows('tours')) {
					the_row();
					// the_sub_field('name');
					the_sub_field('embed');
				} ?>
			</div><?php
			}

			?>
		</div><?php

		if (have_rows('directions')) : ?>
		<ul class="wrap joints"><?php
			while (have_rows('directions')) {
				the_row(); ?>
			<li><?php the_sub_field('info'); ?></li><?php
			}?>
		</ul><?php
		endif;

		?>
	</div><?php
		endwhile; ?>
</section><?php
	endif;


	get_footer(); ?>
