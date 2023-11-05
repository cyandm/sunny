<?php
$frontId = get_option( 'page_on_front' );
$title = get_field( 'coach_section_title', $frontId );
$btnTitle = get_field( 'coach_section_btn_title', $frontId );
$btnLink = get_field( 'coach_section_btn_link', $frontId );
$coaches = get_field( 'choose_coaches', $frontId );
$topStudentTitle = get_field( 'top_student_title', $frontId );

?>
<div class=" classes-slide" id="coaches-front-slide">
	<div class="container padding-top height-slide">
		<?Php if ( $title ) : ?>
			<div class="section-title">
				<h2>
					<?= $title ?>
				</h2>
				<?Php if ( $btnTitle ) : ?>
					<a href="<?= $btnLink ?>">
						<?= $btnTitle ?>
					</a>
				<?php endif ?>
			</div>
		<?php endif ?>
		<div class="swiper coach-slider">
			<div class="swiper-wrapper">
				<?php if ( is_array( $coaches ) && count( $coaches ) > 0 ) :
					foreach ( $coaches as $coach ) : ?>
						<div class="swiper-slide classes-content coaches-content-slide">
							<div class="front-coach-img">
								<div class="img-content <?= get_field( 'bg_image_color', $coach->ID ) ?>">
									<?= wp_get_attachment_image( get_post_thumbnail_id( $coach->ID ), 'full', false, [] );
									?>
								</div>
								<?php
								$coachVideo = get_field( 'attach_coach_video', $coach->ID );

								if ( $coachVideo ) : ?>
									<div class="video-content popup-play-video-classes " id="play-video">
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
										<?= $coach->post_title ?>
									</h3>
									<div class="nav-btn">

										<div class="panels-navigation ">
											<div class="coach-slider-next next"><i class="icon-arrow-single-big"></i>
											</div>
											<div class="coach-slider-prev prv"><i class="icon-arrow-single-big"></i>
											</div>

										</div>
									</div>
									<div class="description">
										<?= get_field( 'description_text', $coach->ID ) ?>
									</div>
								</div>

								<div class="gallery">
									<?php
									$imagesFilms = get_field( 'add_film_or_images', $coach->ID );

									if ( $imagesFilms['choose_film_img_1']['add_image'] || $imagesFilms['choose_film_img_1']['add_film'] !== false ) :

										$topStudentTitle && printf( '<h4>%s</h4>', $topStudentTitle ); ?>

										<div class="students-row">
											<div class="students-slider swiper" dir="ltr">
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
																			<circle cx="28" cy="28.3101" r="27.5" fill="#FEFFFF"
																				stroke="#E8E9EA" />
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
											[ 'id' => $coach->ID ]
										);

									endif;
									?>
								</div>
							</div>
						</div>
					<?php endforeach;
				endif; ?>

			</div>
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>


		<?Php if ( $btnTitle ) : ?>
			<div class="section-btn">
				<a href="<?= $btnLink ?>">
					<?= $btnTitle ?>
				</a>
			</div>
		<?php endif ?>
	</div>
</div>