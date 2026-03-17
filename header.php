<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(); ?><?php if(wp_title('', false)) { echo ' :'; } ?><?php bloginfo('name'); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<!-- Londing Icons -->

	<div class="loader">
		<div class="loader_inner"></div>
	</div>

	<!-- Data for Section Header -->

	<?php 
		// Get post type "Sections"
		$post_type = 'landing_sections';
		$header_section = get_page_by_path('header-section', OBJECT, $post_type);

		$header_bg = '';
		$svg_logo  = '';
		$hero_name = '';
		$hero_title = '';

		if($header_section) {
			// Get URL of featured image for header background
			$header_bg = get_the_post_thumbnail_url($header_section->ID, 'full');

			// Header Custom Fields
			$svg_logo  = get_post_meta($header_section->ID, 'svg_logo', true);
			$hero_name = get_post_meta($header_section->ID, 'hero_name', true);
			$hero_title = get_post_meta($header_section->ID, 'hero_title', true);
		}

	?>


	<!-- Header + Effect Parallax -->

	<header class="main_head main_color_bg" data-parallax="scroll" data-image-src="<?php echo esc_url($header_bg); ?>" data-z-index="1">

		<!-- Logo Inkscape -->

		<div class="logo_container">
			<?php 
				if($svg_logo) {
					echo $svg_logo;
				}
			?>
		</div>

		<!-- Bootstrap -->

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<!-- Menu Design -->

					<button class="toggle_mnu">
						<span class="sandwich">
							<span class="sw-topper"></span>
							<span class="sw-bottom"></span>
							<span class="sw-footer"></span>
						</span>
					</button>

					<!-- Nav Menu -->

					<nav class="top_mnu">
						<?php
							if(has_nav_menu('header_menu')) {
								wp_nav_menu( array(
									'theme_location' => 'header_menu',
									'container'      => false,
									'items_wrap'      => '<ul>%3$s</ul>'
								));
							} else {
								echo '<ul><li><a href="#">Создайте меню в админке</a></li></ul>';
							}
						?>
					</nav>
				</div>	
			</div>
		</div>

		<!-- Nickname Center -->

		<div class="top_wrapper">
			<div class="top_descr">
				<div class="top_centered">
					<div class="top_text">
						<?php if($hero_name): ?>
							<h1><?php echo esc_html($hero_name); ?></h1>
						<?php endif; ?>

						<?php if($hero_title): ?>
							<p><?php echo esc_html($hero_title); ?></p>
						<?php endif; ?>
					</div> 
				</div>
			</div>
		</div>
	</header>
