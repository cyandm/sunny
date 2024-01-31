<?php /* Template Name: Front Page */ ?>

<?php get_header(); ?>


<main class="front-page" id="front-page">

	<?php
	get_template_part('templates/pages/front/hero');
	get_template_part('templates/pages/front/about');
	get_template_part('templates/pages/front/testimonial');
	get_template_part('templates/pages/front/classes');
	get_template_part('templates/pages/front/faq');
	get_template_part('templates/pages/front/packages');
	get_template_part('templates/pages/front/shop');
	get_template_part('templates/pages/front/blog');
	get_template_part('templates/pages/front/contacts');
	?>

</main>
<!--</main>-->
<?php get_footer(); ?>