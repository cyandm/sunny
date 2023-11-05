<?php
$featureSlider = get_field( "about_slider_1", get_queried_object_id() );

?>

<section class="features container">
	<div class="swiper" id="aboutFeatureSlider">
		<div class="swiper-wrapper">
			<?php foreach ( $featureSlider as $key => $feature_slide ) :
				if ( $feature_slide['about_slider_image'] ) : ?>
					<div class="swiper-slide">
						<div class="img-wrapper">
							<?= wp_get_attachment_image( $feature_slide['about_slider_image'], 'full' ) ?>
						</div>
						<div class="content">
							<div class="title-and-navigation">
								<?php printf( '<h2>%s</h2>', __( 'ورزشی برای لایف استایل بهتر', 'sunny' ) ) ?>

								<div class="swiper-navigation panels-navigation i" id="aboutFeatureNavigation">
									<i id="Next" class="icon-arrow-single-big mirrorX"></i>
									<i id="Prev" class="icon-arrow-single-big "></i>
								</div>

							</div>
							<h3>
								<?= $feature_slide['about_sub_title'] ?>
							</h3>
							<p>
								<?= $feature_slide['about_slider_description'] ?>
							</p>
						</div>
					</div>
				<?php endif; endforeach; ?>
		</div>
	</div>
</section>