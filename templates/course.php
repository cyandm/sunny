<?php
$page_id = get_queried_object_id();
// $main_title = get_field('course_main_title', $page_id);
$tickerTitle = get_field('ticker_title', $page_id);
$tickerSubTitle = get_field('ticker_sub_title', $page_id);
$tickers = get_field('ticker_text_slider', $page_id);
$class_PDF = null !== get_field('classes_pdf', $page_id) ? get_field('classes_pdf', $page_id) : '#';

// $args = array(
// 	'post_type' => 'course',
// 	'post_status' => 'publish',
// 	'posts_per_page' => -1,
// );

// $courses = get_posts($args);

/* Template Name: Course overview Page */


$cats = get_categories([
	'taxonomy' => 'course-cat',
	'hide_empty' => true,
]);


$classes = new WP_Query([
	'post_type' => 'course',
]);

$cats_name_group = [];
$cats_id_group = [];
foreach ($cats as $cat) {
	array_push($cats_name_group, $cat->name);
	array_push($cats_id_group, $cat->term_id);
}




?>

<?php get_header(); ?>

<!-- <main class="course-overview-page" id="course-page">

	<?php //get_template_part( 'templates/pages/course/course-hero' ); 
	?>
	<div class="all-course-overview" id="courses">
		<?Php //if ( $main_title ) : 
		?>
			<div class="section-title">
				<h2>
					<?php // echo $main_title 
					?>
				</h2>
			</div>
		<?php // endif 
		?>
		<div class="course-row">
			<?php
			/* foreach ( $courses as $key => $course ) :

				get_template_part(
					'templates/pages/course/course-block',
					null,
					[ 
						'id' => $course->ID,
						'key' => $key
					]
				);

			endforeach; */
			?>

		</div>

	</div>
	<div class="ticker-section">
		<?php // if ($tickerTitle) : 
		?>
			<div class="section-title-sub">
				<h2>
					<?php // echo $tickerTitle 
					?>
				</h2>
				<span>
					<?php // echo $tickerSubTitle 
					?>
				</span>
			</div>
		<?php // endif;

		//if ($tickers) : 
		?>

			<div class="ticker ticker-container">
				<ul class="ticker-custom">
					<?php // foreach ($tickers as $ticker) :
					//if ($ticker['label'] != '') : 
					?>
							<li>
								<a href="<?php // echo $ticker['link'] 
											?>"><span>
										<?php // echo $ticker['label'] 
										?>
									</span><i class="icon-arrow-right"></i></a>
							</li>
							<?php
							//endif;
							//endforeach; 
							?>
					<?php //foreach ($tickers as $ticker) :
					//if ($ticker['label'] != '') : 
					?>
							<li>
								<a href="<?php // echo $ticker['link'] 
											?>"><span>
										<?php // echo $ticker['label'] 
										?>
									</span><i class="icon-arrow-right"></i></a>
							</li>
							<?php
							//endif;
							//endforeach; 
							?>
					<?php //foreach ($tickers as $ticker) :
					//if ($ticker['label'] != '') : 
					?>
							<li>
								<a href="<?php // echo $ticker['link'] 
											?>"><span>
										<?php // echo $ticker['label'] 
										?>
									</span><i class="icon-arrow-right"></i></a>
							</li>
							<?php
							//endif;
							//endforeach; 
							?>
				</ul>
			</div>
		<?php //endif; 
		?>
	</div>
</main> -->

<main class="courses-page">
	<section class="course-container container">
		<div class="btn-class-and-title">
			<h2>همه کلاس ها</h2>
			<a href="<?php if (!empty($class_PDF)) echo $class_PDF;
						else echo '#' ?>" <?php if (!empty($class_PDF)) echo 'download' ?> class="btn-submit-component"><i class="icon-book-blog"></i> دانلود pdf کلاس ها </a>
		</div>
		<?php if (count(array_filter($cats_name_group)) > 0) : ?>
			<div class="class-categories">
				<?php for ($i = 0; $i < count($cats_id_group); $i++) : ?>
					<div class="<?php if ($i === 0) echo 'active' ?> category-class" data-tab="<?php echo $i ?>"><?= $cats_name_group[$i] ?></div>
				<?php endfor ?>
			</div>
			<div class="class-card-container">
				<?php foreach ($cats_id_group  as $index => $cat_id) : ?>
					<?php if ($classes->have_posts()) :

						$classes_query = new WP_Query([
							'post_type' => 'course',
							'tax_query' => [
								[
									'taxonomy' => 'course-cat',
									'field' => 'term_id',
									'terms' => $cat_id
								]
							]
						]);
						if ($classes_query->have_posts()) : ?>
							<div class="class-card-wrapper <?php if ($index === 0) echo 'active' ?>" data-tab="<?php echo $index ?>">

								<?php while ($classes_query->have_posts()) {
									$classes_query->the_post();
									get_template_part('templates/components/card', 'classes');
								} ?>
							</div>
						<?php
						endif;
						wp_reset_postdata();
						?>

					<?php endif ?>
				<?php endforeach ?>
			</div>

		<?php endif ?>
		<div></div>
	</section>

</main>

<?php get_footer(); ?>