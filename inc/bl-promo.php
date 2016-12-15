<?php

	// Get fallbacks
	if(have_rows('promo_fallback')) {
		while (have_rows('promo_fallback')) {
			the_row();
			$fallbackDay = get_sub_field('day');
			$fallbackbNight = get_sub_field('day');
		}
	}

	// Get today's Promos
	$time = current_time('H');
	$day = strtolower(current_time('D'));
	$dayCheck = 'promo_'.$day;

	if(have_rows($dayCheck)) {
		while (have_rows($dayCheck)) {
			the_row();
			$todayDay = get_sub_field('day');
			$todayNite = get_sub_field('night');
		}
	}

	// Check for today
	if(daytime(0) == 'day') {
		if($todayDay) {
			$post_objects = $todayDay;
		} elseif($fallbackDay) {
			$post_objects = $fallbackDay;
		}
	} else {
		if($todayNight) {
			$post_objects = $todayNight;
		} elseif($fallbackbNight) {
			$post_objects = $fallbackbNight;
		}
	}

	// Check for today
	if( $post_objects ): ?>

	<section id="promos"><?php
		foreach( $post_objects as $post):
			setup_postdata($post);
			$options = get_field('options');
			$imgTitle = get_field('img_title');
			$imgMain = get_field('img_main');
			$link = get_field('link');

			while(have_rows('bg')) {
				the_row();
				$bgOpts = get_sub_field('options');
				$bgCol1 = get_sub_field('color');
				$bgCol2 = get_sub_field('color_end');
				$bgImgD = get_sub_field('image');
				$bgImgM = get_sub_field('image_mobile');
			}

			if($bgOpts == 'solid') { 			//  : Color Sólido
				$addedOptions = 'background:'.$bgCol1;
			} elseif($bgOpts == 'linear') { 	//  : Degradado Linear
				$addedOptions = 'background: '.$bgCol1.';
				background: -moz-linear-gradient(top,  '.$bgCol1.' 0%, '.$bgCol2.' 100%);
				background: -webkit-linear-gradient(top,  '.$bgCol1.' 0%, '.$bgCol2.' 100%);
				background: linear-gradient(to bottom,  '.$bgCol1.' 0%, '.$bgCol2.' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$bgCol1.', endColorstr='.$bgCol2.',GradientType=0 ); ';

			} elseif($bgOpts == 'radial') { 	//  : Degradado Radial
				$addedOptions = 'background: '.$bgCol1.';
				background: -moz-radial-gradient(center, ellipse cover, '.$bgCol1.' 0%, '.$bgCol2.' 100%);
				background: -webkit-radial-gradient(center, ellipse cover, '.$bgCol1.' 0%, '.$bgCol2.' 100%);
				background: radial-gradient(ellipse at center, '.$bgCol1.' 0%, '.$bgCol2.' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$bgCol1.', endColorstr='.$bgCol2.',GradientType=1 );';

			} elseif($bgOpts == 'img') { 		//  : Imagen completa
				$addedOptions = 'background-image: url('.$bgImgD['url'].'); background-size: cover; background-position: center;';
			} elseif($bgOpts == 'pattern') { 		//  : Patrón de fondo
				$addedOptions = 'background-image: url('.$bgImgD['url'].'); background-size: initial; background-position: center;';
			}
			// echo $bgOpts.'<br>';
			// echo $addedOptions;
			?>

		<div class="block<?php echo blockClass($options) .' '. $bgOpts;?>" <?php echo 'style="'.$addedOptions.'"'?>><?php

			if($link) { ?>
				<a href="<?php echo $link; ?>" title="<?php the_title(); ?>" class="wrap"><?php
			} else { ?>
				<div class="wrap"><?php
			}

			if($imgTitle) { ?>
				<div class="title"><img src="<?php echo $imgTitle['sizes']['large']; ?>" alt="<?php echo $imgTitle['alt']; ?>"></div><?php
			}

			if($imgMain) { ?>
				<div class="burger"><img src="<?php echo $imgMain['url']; ?>" alt="<?php echo $imgMain['alt']; ?>"></div><?php
			} ?>

				<div class="caption">
					<?php the_field('caption'); ?>
				</div><?php

			if($link) { ?>
				</a><?php
			} else { ?>
				</div><?php
			} ?>
		</div><?php
		endforeach; ?>

	</section><?php
	wp_reset_postdata();
	endif;


/*
		<!-- no_text: No text, removes the inline-style bottom margin from images & no .wrap on content -->
		<!-- back_cover back_center -->
		<div class="content">
			<div style="text-align:center;">
				<img src="http://placehold.it/1000x500&text=LARGE">
			</div>
		</div>
	</div> */ ?>
