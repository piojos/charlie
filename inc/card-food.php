<?php

	while (have_rows('video')) {
		the_row();
		$fallback = get_sub_field('fallback');
	}
	$options = get_field('options');
	if(in_array('delivery', $options)) $canDeliver = ' yes';
	if(in_array('foodtruck', $options)) $canFoodtruck = ' yes';
	$price = get_field('prize');
	$estTime = get_field('delivery_time');
	$about = get_field('description');



?><a href="<?php the_permalink(); ?>" class="slide dish"><?php


if($fallback) { ?>
	<img src="<?php echo $fallback['sizes']['large']; ?>" alt="<?php echo $fallback['alt']; ?>"><?php
} ?><br>
	<span class="opts foodtruck<?php echo $canFoodtruck; ?>"></span>
	<?php if($price) {
		echo '<span class="price">'. $price . '</span>';
	} ?>
	<span class="opts delivery<?php echo $canDeliver; ?>"></span>
	<h3><?php the_title(); ?></h3>
</a>
