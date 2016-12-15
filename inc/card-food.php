<?php

	if(daytime(0) == 'day') {
		$video = 'video';
	} else {
		$video = 'video_nite';
	}

	while (have_rows($video)) {
		the_row();
		$mp4 = get_sub_field('mp4');
		$webm = get_sub_field('webm');
		$fallback = get_sub_field('fallback');
	}
	$options = get_field('options');
	if($options) {
		if(in_array('delivery', $options)) $canDeliver = ' yes';
		if(in_array('foodtruck', $options)) $canFoodtruck = ' yes';
	}
	$price = get_field('prize');
	$estTime = get_field('delivery_time');
	$about = get_field('description');



?><a href="<?php the_permalink(); ?>" class="slide dish<?php if($canDeliver) echo ' delivery'; if($canFoodtruck) echo ' foodtruck'; ?>"><?php

if($mp4 OR $webm) : ?>
	<video poster="<?php echo $fallback['sizes']['food']; ?>" playsinline autoplay muted loop><?php
	if($webm) { ?>
		<source src='<?php echo $webm[url]; ?>' type='video/webm'><?php
	}

	if($mp4) { ?>
		<source src='<?php echo $mp4[url]; ?>' type='video/mp4'><?php
	} ?>
	</video><?php
elseif($fallback) : ?>
	<img src="<?php echo $fallback['sizes']['food']; ?>" alt="<?php echo $fallback['alt']; ?>"><?php
else : ?>
	<img src="http://placehold.it/380x300&text=MUCHO+RICO" alt="No image"><?php
endif; ?><br>
	<span class="opts foodtruck<?php echo $canFoodtruck; ?>"></span>
	<?php if($price) {
		echo '<span class="pricetag">'. $price . '</span>';
	} ?>
	<span class="opts delivery<?php echo $canDeliver; ?>"></span>
	<h3><?php the_title(); ?></h3>
</a>
