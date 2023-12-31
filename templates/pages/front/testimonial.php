<?php
$frontId = get_option( 'page_on_front' );
$title = get_field( 'testimonial_section_title', $frontId );
$testimonials = get_field( 'testimonial_choose', $frontId ); ?>

<div class="testimonial-section" id="testimonial-section">
	<div class="container padding-top height-slide">
		<?php if ( $title ) : ?>
			<div class="section-title">
				<h2>
					<?= esc_html( $title ) ?>
				</h2>
			</div>
		<?php endif; ?>

		<div class="front-testimonial-content">
			<div class="video-container">

				<?php foreach ( $testimonials as $key => $video ) :
					$videoSrc = get_field( 'video_file', $video->ID );
					if ( $videoSrc && get_post_thumbnail_id( $video->ID ) ) : ?>
						<div class="video-content  <?= ( $key == 0 ) ? 'active' : '' ?>" data-id="<?= $video->ID ?>">
							<?php $thumbnail_id = get_post_thumbnail_id( $video->ID ); ?>
							<?= wp_get_attachment_image( $thumbnail_id, 'full', false, [] ); ?>

							<i class="icon-play play-video" id="play-video"></i>

							<video id="mainVideo" controls>
								<source src="<?= $videoSrc ?>" type="video/mp4">
							</video>
						</div>
						<?php
					endif;
				endforeach; ?>
			</div>

			<div class="testimonial-content">
				<div class="info-row">
					<?php foreach ( $testimonials as $key => $video ) : ?>
						<div class="person_info  <?= ( $key == 0 ) ? 'active' : '' ?>" data-id="<?= $video->ID ?>">
							<div class="person-name">
								<?= $video->post_title ?>
							</div>

							<div class="person-description">
								<?= get_field( 'testimonial_person_description', $video->ID ); ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="other-person-content">

					<h3>نظر های دیگر</h3>
					<div class="slider">
						<div class="swiper testimonial-slider">
							<div class="swiper-wrapper">
								<?php
								foreach ( $testimonials as $key => $person ) :
									if ( get_field( 'video_file', $person->ID ) && get_post_thumbnail_id( $video->ID ) ) :
										?>
										<div class="swiper-slide person-img  <?= ( $key == 0 ) ? 'active' : '' ?>"
											data-id="<?= $person->ID ?>">

											<?php $thumbnail_id = get_post_thumbnail_id( $person->ID ); ?>
											<?= wp_get_attachment_image( $thumbnail_id, 'full', false, [] ); ?>
										</div>
										<?php
									endif;

								endforeach; ?>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>




	</div>

</div>