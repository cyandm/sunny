<?php
/* Template Name: Video overview Page */

#region php
$page_id = get_queried_object_id();

$main_title = get_field( "latest_videos_title", $page_id );
$video_sliders = get_field( "video-sliders", $page_id );

$title_part2 = get_field( "video_title_part_2", $page_id );
$testimonial_videos = get_field( "choose_testimonial_videos", $page_id );

$title_part3 = get_field( "video_title_part_3", $page_id );
$coaches_videos = get_field( "choose_coach_videos", $page_id );

$students_title = get_field( 'students_title', $page_id );
$students_videos = get_field( 'students_videos', $page_id );
#endregion


#region test
// echo '<pre dir="ltr">';


// wp_die();
#endregion
?>

<?php get_header(); ?>
<main class="video-page" id="video-page">

	<section class="slider-video-section ">
		<div class="container">
			<?Php if ( $main_title ) : ?>
				<div class="section-title">
					<h2>
						<?= $main_title ?>
					</h2>
				</div>
			<?php endif; ?>
		</div>
		<div class="video-slider container">
			<div class="swiper video-overview-slider">
				<div class="swiper-wrapper">
					<?php foreach ( $video_sliders as $video ) :
						if ( $video['img_bg_video'] && $video['video_file'] ) : ?>

							<div class="swiper-slide">
								<div class="slide-video-content video-part-content slide-video-popup">
									<?= wp_get_attachment_image( $video['img_bg_video'], 'full', false, [] ); ?>

									<svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57"
										fill="none">
										<circle cx="28" cy="28.3101" r="27.5" fill="#FEFFFF" stroke="#E8E9EA" />
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M37.6563 26.4524L24.004 18.0773C22.518 17.1662 20.5883 18.2147 20.5883 19.9354V36.6834C20.5883 38.4041 22.518 39.4547 24.004 38.5415L37.6541 30.1664C39.0562 29.3103 39.0562 27.3106 37.6563 26.4524Z"
											fill="#1A212A" />
									</svg>

									<div class="text-content">
										<h3>
											<?= $video['video_title'] ?>
										</h3>
										<span>
											<?= $video['video_description'] ?>
										</span>
									</div>
									<video class="video" controls>
										<source src="<?= $video['video_file'] ?>" type="video/mp4">
									</video>
								</div>
							</div>
						<?php endif;
					endforeach; ?>
				</div>

			</div>
		</div>
	</section>

	<section class="testimonial-video-section">
		<div class="container">
			<?Php if ( $title_part2 ) : ?>
				<div class="section-title">
					<h2>
						<?= $title_part2 ?>
					</h2>
				</div>
			<?php endif; ?>

			<div class="video-row">
				<?php foreach ( $testimonial_videos as $videoItem ) :

					$video = get_field( "video_file", $videoItem->ID );
					$img = get_field( "video_image_cover", $videoItem->ID );
					$title = get_field( "video_title", $videoItem->ID );
					$description = get_field( "video_description_overview", $videoItem->ID );


					if ( $video ) : ?>
						<div class="video-part-content slide-video-popup">


							<?= wp_get_attachment_image( $img, 'full', false, [] ); ?>

							<svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
								<circle cx="28" cy="28.3101" r="27.5" fill="#FEFFFF" stroke="#E8E9EA" />
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M37.6563 26.4524L24.004 18.0773C22.518 17.1662 20.5883 18.2147 20.5883 19.9354V36.6834C20.5883 38.4041 22.518 39.4547 24.004 38.5415L37.6541 30.1664C39.0562 29.3103 39.0562 27.3106 37.6563 26.4524Z"
									fill="#1A212A" />
							</svg>

							<div class="text-content">
								<?php if ( $title ) : ?>
									<h3>
										<?= $title ?>
									</h3>

								<?php endif;
								if ( $description ) : ?>
									<span>
										<?= $description ?>
									</span>
								<?php endif; ?>

							</div>
							<video class="video" controls>
								<source src="<?= $video ?>" type="video/mp4">
							</video>
						</div>
						<?php
					endif;
				endforeach; ?>
			</div>
		</div>
	</section>

	<section class="coaches-video-section">
		<div class="container">
			<?Php if ( $title_part3 ) : ?>
				<div class="section-title">
					<h2>
						<?= $title_part3 ?>
					</h2>
				</div>
			<?php endif; ?>

			<div class="video-row">

				<?php foreach ( $coaches_videos as $videoCoach ) :

					$video2 = get_field( "attach_coach_video", $videoCoach->ID );
					$img2 = get_field( "video_image_cover", $videoCoach->ID );
					$title2 = get_field( "video_title", $videoCoach->ID );
					$description2 = get_field( "video_description_overview", $videoCoach->ID );
					if ( $video2 ) : ?>
						<div class="video-part-content slide-video-popup">


							<?= wp_get_attachment_image( $img2, 'full', false, [] ); ?>

							<svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
								<circle cx="28" cy="28.3101" r="27.5" fill="#FEFFFF" stroke="#E8E9EA" />
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M37.6563 26.4524L24.004 18.0773C22.518 17.1662 20.5883 18.2147 20.5883 19.9354V36.6834C20.5883 38.4041 22.518 39.4547 24.004 38.5415L37.6541 30.1664C39.0562 29.3103 39.0562 27.3106 37.6563 26.4524Z"
									fill="#1A212A" />
							</svg>

							<div class="text-content">
								<?php if ( $title2 ) : ?>
									<h3>
										<?= $title2 ?>
									</h3>

								<?php endif;
								if ( $description2 ) : ?>
									<span>
										<?= $description2 ?>
									</span>
								<?php endif; ?>

							</div>
							<video class="video" controls>
								<source src="<?= $video2 ?>" type="video/mp4">
							</video>
						</div>
						<?php
					endif;
				endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( $students_title && $students_videos ) : ?>
		<section class="students-video-section">
			<div class="container">
				<div class="section-title">
					<h2>
						<?= $students_title ?>
					</h2>
				</div>

				<div class="video-row">
					<?php foreach ( $students_videos as $student_id ) :
						$student_name = get_the_title( $student_id );
						$student_video_src = get_field( 'add_film_or_images', $student_id )['choose_film_img_1']['add_film'];
						$student_video_cover = get_field( 'add_film_or_images', $student_id )['choose_film_img_1']['film_cover_image'];
						$student_video_desc = get_field( 'add_film_or_images', $student_id )['choose_film_img_1']['description_attachment_content'];

						?>

						<div class="video-part-content slide-video-popup">


							<?= wp_get_attachment_image( $student_video_cover, []) ?>

							<svg xmlns="http://www.w3.org/2000/svg" width="56" height="57" viewBox="0 0 56 57" fill="none">
								<circle cx="28" cy="28.3101" r="27.5" fill="#FEFFFF" stroke="#E8E9EA" />
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M37.6563 26.4524L24.004 18.0773C22.518 17.1662 20.5883 18.2147 20.5883 19.9354V36.6834C20.5883 38.4041 22.518 39.4547 24.004 38.5415L37.6541 30.1664C39.0562 29.3103 39.0562 27.3106 37.6563 26.4524Z"
									fill="#1A212A" />
							</svg>

							<div class="text-content">
								<?php if ( $student_name ) : ?>
									<h3>
										<?= $student_name ?>
									</h3>

								<?php endif;
								if ( $student_video_desc ) : ?>
									<span>
										<?= $student_video_desc ?>
									</span>
								<?php endif; ?>

							</div>
							<video class="video" controls>
								<source src="<?= $student_video_src ?>" type="video/mp4">
							</video>
						</div>

					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer() ?>