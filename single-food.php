<?php

	get_header();
	if (have_posts()) : while (have_posts()) : the_post();

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

					if(daytime(0) == 'day') {
						$iconColor = 'yellow';
					} else {
						$iconColor = 'black';
					}

					if($price) {
						echo '<div class="pricetag">'. $price . '</div>';
					}


					if($canDeliver AND $canFoodtruck) echo '<div class="both">';

					if($canDeliver) { ?>
						<div class="opts delivery">
							<img src="<?php bloginfo('template_url'); ?>/img/icon-moto-<?php echo $iconColor; ?>.svg" width="40" />
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
							<img src="<?php bloginfo('template_url'); ?>/img/icon-truck-<?php echo $iconColor; ?>.svg" width="60" />
							<span>FOOD <br>
							Truck</span>
						</div><?php
					}

					if($canDeliver AND $canFoodtruck) echo '</div>';


					?>
					</div>
					<div class="about">
						<?php the_field('description'); ?>
					</div>
				</div>
			</div>

		</div>
	</article><?php

	endwhile; endif;
	get_footer(); ?>
