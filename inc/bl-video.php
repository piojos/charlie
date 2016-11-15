<?php /*
<div class="block video">
	<!-- video -->
</div> */

if(have_rows('intro')) :
	while(have_rows('intro')) { the_row();
		$fallback = get_sub_field('fallback');
		$webm = get_sub_field('webm');
		$mp4 = get_sub_field('mp4');
	}
else :
	$fallback = get_sub_field('fallback');
	$webm = get_sub_field('webm');
	$mp4 = get_sub_field('mp4');
endif;

 ?>
<div class="block video"><?php
	// <pre>
	// 	print_r($fallback);
	// 	print_r($webm);
	// 	print_r($mp4);
	// </pre> ?>
	<video poster='<?php echo $fallback[url]; ?>' playsinline autoplay muted loop >
		<source src='<?php echo $webm[url]; ?>' type='video/webm'>
		<source src='<?php echo $mp4[url]; ?>' type='video/mp4'>
	</video>
</div>
