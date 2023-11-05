<?php
$historySlider = get_field( "history_slider", get_queried_object_id() );



?>

<section class="history container">
	<div class="swiper" id="aboutHistorySlider">
		<div class="swiper-wrapper">
			<?php if ( $historySlider !== null ) :
				foreach ( $historySlider as $key => $history_slide ) :
					if ( $history_slide['about_slider_image'] ) : ?>
						<div class="swiper-slide">
							<div class="img-wrapper">
								<?= wp_get_attachment_image( $history_slide['about_slider_image'], 'full' ) ?>
							</div>
							<div class="content">
								<div class="title-and-navigation">
									<?php printf( '<h2>%s</h2>', __( 'تاریخچه سانی', 'sunny' ) ) ?>

									<div class="swiper-navigation panels-navigation i" id="aboutHistoryNavigation">
										<i id="Next" class="icon-arrow-single-big mirrorX"></i>
										<i id="Prev" class="icon-arrow-single-big "></i>
									</div>

								</div>
								<h3>
									<?= $history_slide['about_sub_title'] ?>
								</h3>
								<p>
									<?= $history_slide['about_slider_description'] ?>
								</p>
							</div>
						</div>
					<?php endif; endforeach; endif; ?>
		</div>
	</div>
</section>