<?php

	$options = get_sub_field('options');

?>
<div class="block ranking<?php echo blockClass($options); ?>">
	<h2 class="shadow"><?php the_sub_field('title'); ?></h2><?php

	if(have_rows('critic')) : ?>

	<ul><?php
		while (have_rows('critic')) {
			the_row();
			$logo = get_sub_field('logo');
			$star = get_sub_field('rate');



			?>
			<li>
				<a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('name'); ?>"><?php
			if($logo) { ?>
				<img src="<?php echo $logo['url']; ?>"><?php

			}
				?>
					<div class="rating four half"><?php

						for ($x = 1; $x <= floor($star); $x++) {
							echo '<span>★</span>';
						}

						if(strpos($star,".") !== false){
							echo '<span class="half">★</span>';
						}


					?>
						<div class="numbers"><?php the_sub_field('rate'); ?> / 5</div>
					</div>
				</a>
			</li><?php
		} ?>

	</ul><?php
	endif;
	?>
</div>
