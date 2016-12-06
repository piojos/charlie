<?php

	get_header();
	while (have_posts()) : the_post();

	while (have_rows('video')) {
		the_row();
		$fallback = get_sub_field('fallback');
	}
	$options = get_field('options');
	if($options) {
		if(in_array('delivery', $options)) $canDeliver = ' yes';
		if(in_array('foodtruck', $options)) $canFoodtruck = ' yes';
	}
	$price = get_field('prize');
	$estTime = get_field('delivery_time');
	$defTime = get_field('delivery_fallback', 'options');
	$about = get_field('description'); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="wrap tight">

			<div class="food modal">
				<div class="img"><?php
				if($fallback) { ?>
					<img src="<?php echo $fallback['sizes']['food']; ?>" alt="<?php echo $fallback['alt']; ?>"><?php
				} else { ?>
					<img src="http://placehold.it/570x450&text=MUCHO+RICO" alt="No image"><?php
				}?>
				</div>
				<div class="info">
					<h1><?php the_title(); ?></h1>

					<div class="options"><?php

					if($price) {
						echo '<div class="pricetag">'. $price . '</div>';
					}

					if($canDeliver) { ?>
						<div class="opts delivery">
							<img src="<?php bloginfo('template_url'); ?>/img/icon-moto-yellow.svg" width="40" />
							<span>Disfrutala en</span><br><?php
						if($estTime){
							echo $estTime;
						} else {
							echo $defTime;
						} ?>
						</div><?php
					}

					if($canFoodtruck) { ?>
						<div class="opts truck">
							<img src="<?php bloginfo('template_url'); ?>/img/icon-truck-yellow.svg" width="60" />
							<span>FOOD <br>
							Truck</span>
						</div><?php
					} ?>
					</div>
					<div class="about">
						<p>Pan artesanal, glasse balsámico, piña, cebolla frita, carne mr. brown, mayo chipotle, lechuga, tomate y queso provolone. <br>
						<strong>Incluye</strong> 🍟.</p>
					</div>
				</div>
			</div>

		</div>
	</article><?php

	endwhile;
	get_footer(); ?>
