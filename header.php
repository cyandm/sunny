<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<?php wp_body_open() ?>

	<header class=container "<?= (is_front_page() || is_category('category')) ? 'header-white' : '' ?>">
		<div class="header-large-view">
			<div class="menu-column">
				<?php the_custom_logo() ?>
				<?php wp_nav_menu(['theme_location' => 'header']);
				?>
			</div>
			<div class="btn-column">
				<?php get_template_part('templates/components/search-form');  ?>
				<a href="" class="sing-up-btn"><i class=""></i>ثبت نام آنلاین</a>
				<a href="" class="profile-btn"><i class=""></i></a>

			</div>
			<div class="header-mobile"></div>
	</header>