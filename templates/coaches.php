<?php
$page_id = get_queried_object_id();
$title = get_field( 'main_title', $page_id );
$topStudentTitle = get_field( 'slider_content_title', $page_id );

$args = array(
	'post_type' => 'coach',
	'posts_per_page' => 999,
	'orderby' => 'menu_order',
	'order' => 'DESC',
);
$coaches = new WP_Query( $args );


/* Template Name: Coaches overview Page */?>

<?php get_header(); ?>

<main class="coaches-overview">

	<div class="coaches">

		<?Php if ( $title ) : ?>
			<div class="section-title container">
				<h2>
					<?= $title ?>
				</h2>
			</div>
		<?php endif ?>
		<div class="coaches-blocks">
			<?php if ( $coaches->have_posts() ) :

				while ( $coaches->have_posts() ) {

					$coaches->the_post(); ?>
					<div class="classes-content container coaches-content-slide">
						<div class="front-coach-img">
							<div class="img-content <?= get_field( 'bg_image_color', get_the_ID() ) ?>">
								<?= wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), 'full', false, [] );
								?>
							</div>

							<?php
							$coachVideo = get_field( 'attach_coach_video', get_the_ID() );

							if ( $coachVideo ) : ?>
								<div class="video-content popup-play-video-classes" id="play-video">
									<!-- <img src="<?= get_stylesheet_directory_uri() ?>/imgs/video.png" alt="video"> -->

									<div class="bg-icon-color"></div>
									<i class="icon-play play-video"></i>
									<div class="tooltip-text">مشاهده ویدیو</div>
									<div class="video-popup">

										<video id="mainVideo" controls>
											<source src="<?= $coachVideo ?>" type="video/mp4">
										</video>
									</div>
								</div>
							<?php endif ?>

						</div>
						<div class="front-coach-content">
							<div class="content">
								<h3>
									<?= get_the_title() ?>
								</h3>
								<div class="description">
									<?= get_field( 'description_text', get_the_ID() ) ?>
								</div>
							</div>

							<div class="gallery">
								<?php
								$imagesFilms = get_field( 'add_film_or_images', get_the_ID() );
								if ( is_array( $imagesFilms ) && count( $imagesFilms ) > 0 ) :
									if ( $topStudentTitle ) : ?>
										<h4>
											<?= $topStudentTitle ?>
										</h4>
									<?php endif;

									?>

									<div class="students-row">
										<div class="students-slider swiper">
											<div class="swiper-wrapper sliders-wrapper">
												<?php


												foreach ( $imagesFilms as $content ) :
													if ( $content['add_image'] || $content['add_film'] ) :
														?>
														<div class="student-info swiper-slide student-image">
															<?php if ( $content['film_or_img'] == 'film' && $content['film_cover_image'] ) { ?>
																<div class="add-video-content">
																	<?= wp_get_attachment_image( $content['film_cover_image'], 'full', false, [] ); ?>

																	<svg xmlns="http://www.w3.org/2000/svg" width="56" height="57"
																		viewBox="0 0 56 57" fill="none">
																		<circle cx="28" cy="28.3101" r="27.5" fill="#FEFFFF" stroke="#E8E9EA" />
																		<path fill-rule="evenodd" clip-rule="evenodd"
																			d="M37.6563 26.4524L24.004 18.0773C22.518 17.1662 20.5883 18.2147 20.5883 19.9354V36.6834C20.5883 38.4041 22.518 39.4547 24.004 38.5415L37.6541 30.1664C39.0562 29.3103 39.0562 27.3106 37.6563 26.4524Z"
																			fill="#1A212A" />
																	</svg>
																</div>
															<?php }
															if ( $content['film_or_img'] == 'img' && $content['add_image'] ) {

																echo wp_get_attachment_image( $content['add_image'], 'full', false, [] );
															} ?>

														</div>
														<?php
													endif;
												endforeach; ?>

											</div>
										</div>
									</div>

									<!-- slider popup  -->
									<?php
									get_template_part(
										'/templates/components/student-row-popup',
										null,
										[ 'id' => get_the_ID() ]
									);

								endif;
								?>
							</div>
						</div>
					</div>

				<?php }

				wp_reset_query();
			endif;
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>