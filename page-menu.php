<?php
	get_header();


	// $categories = get_categories();
	// print_r($categories);

	$cover = get_field('img_big');
	$coverMobile = get_field('img_mobile');
	$coverHuge = get_field('img_huge');
	$dishTypes = get_field('dish_types');
	$notes = get_field('notes'); // repeater


	$selCats = array();
	$selNotes = array();
	foreach ($notes as $note) {
		$selCats[] = $note['select'];
		$selNotes[] = $note['note']; // 🐞 : Will only show first Note
	}


	// Cover (opcional)
	if($cover) : ?>
		<div class="block promo simple no_text"><?php
		if($coverHuge) { ?>
			<img src="<?php echo $coverHuge['url']; ?>" class="huge" alt="<?php echo $coverHuge['alt']; ?>"><?php
		} ?>
		<img src="<?php echo $cover['sizes']['large']; ?>" class="<?php if($coverHuge) { echo 'large'; } else { echo 'both'; } ?>"><?php
		if($coverMobile) { ?>
			<img src="<?php echo $coverMobile['url']; ?>" class="mobile" alt="<?php echo $coverMobile['alt']; ?>"><?php
		} else { ?>
			<img src="<?php echo $cover['sizes']['medium']; ?>" class="mobile" alt="<?php echo $cover['alt']; ?>"><?php
		} ?>
		</div><?php
	endif;


	// Sidebar
	get_sidebar();


	// Platillos
	if( $dishTypes ): ?>
	<div class="block food template pad_bot push_bot"><?php
		foreach( $dishTypes as $term ):
			$thisID = $term->term_id;
			// print_r($term);
			?>
			<section id="<?php echo $term->slug; ?>">
				<h2><?php echo $term->name; ?></h2><?php
				if($selCats) {
					if(in_array($thisID, $selCats)) { ?>
				<div class="notes content">
					<?php echo $selNotes[0]; // 🐞  ?>
				</div><?php
					}
				}
				get_template_part('inc/slider', 'food'); ?>
			</section>

		<?php endforeach; ?>
	</div>
	<div class="food modal fly"></div><?php
	endif;


	get_footer(); ?>
