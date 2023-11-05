<?php





/* Template Name: About Page */

get_header(); ?>

<main id="about-page" class="about-page">


	<?php get_template_part( '/templates/pages/about/features' ) ?>
	<?php get_template_part( '/templates/pages/about/history' ) ?>
	<?php get_template_part( '/templates/pages/about/honors' ) ?>
	<?php get_template_part( '/templates/pages/about/management' ) ?>


</main>

<?php get_footer(); ?>