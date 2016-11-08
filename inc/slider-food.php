<?php

	// when on home
	$ftd_food = get_sub_field('selected_food');


	if( $ftd_food ): ?>
<div class="slider wrap"><?php
	foreach( $ftd_food as $post):
		setup_postdata($post);
	get_template_part('inc/card', 'food'); 
	endforeach; ?>
</div><?php
	wp_reset_postdata();
	endif; ?>
