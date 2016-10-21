<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<!-- <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script> -->

	</head>
	<body <?php body_class(); ?>>

	<header class="header clear" role="banner">
		<div class="dt_nav wrap">
			<a href="<?php echo home_url(); ?>">Promos</a>
			<a href="<?php echo home_url(); ?>">Menú</a>
			<a href="<?php echo home_url(); ?>" class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="random hide">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo-circle-black.svg" alt="Logo" class="real">
			</a>
			<a href="<?php echo home_url(); ?>">Sucursales</a>
			<a href="<?php echo home_url(); ?>">Mr. Brown?</a>
		</div>
		<div class="mobile bar hide">
			<a href="<?php echo home_url(); ?>" class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="real">
			</a>
			<h1 class="breadcrumbs">Inicio / Promos</h1>
		</div>
		<nav class="nav mobile hide" role="navigation">
			<a href="<?php echo home_url(); ?>">Promos</a>
			<a href="<?php echo home_url(); ?>">Menú</a>
			<a href="<?php echo home_url(); ?>">Sucursales</a>
			<a href="<?php echo home_url(); ?>">Mr. Brown?</a>
			<a href="<?php echo home_url(); ?>" class="sub">Únete al Team</a>
			<a href="<?php echo home_url(); ?>" class="sub">Contacto</a>
		</nav>
	</header>
	<div class="mobile sub_nav hide">
		<a href="#" class="currentId">Promos</a>
		<ul>
			<li><a href="#">Something Else</a></li>
			<li><a href="#">Something Else</a></li>
			<li><a href="#">Something Else</a></li>
			<li><a href="#">Something Else</a></li>
		</ul>
	</div>
