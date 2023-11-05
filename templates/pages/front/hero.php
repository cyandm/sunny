<?php
$frontId = get_option( 'page_on_front' );
$heroSliders = get_field( 'front_page_hero_section', $frontId );
?>

<div id="start-home">

	<div id="heroSlider" class="swiper-container home-nested-slider hero-section" dir="ltr">
		<div class="swiper-wrapper">
			<?php
			$num = 1;
			foreach ( $heroSliders as $heroSlide ) : ?>
				<div id="<?= ( $num == 1 ) ? 'first-slide' : '' ?>"
					class="slide swiper-slide slide panel full-screen <?= $heroSlide['hero_slider_bg_color'] ?> slide-hero-<?= $num ?>"
					data-slide-id="<?= $num ?>">

					<div class="row">
						<div class="container slide-container">
							<div class="shape  <?= $heroSlide['hero_slider_shape'] ?>"></div>
							<div class="content-hero-slide">
								<div class="title">

									<?php if ( $heroSlide['hero_slider_title'] == 'two_color' ) : ?>
										<span class="white-text">
											<?= $heroSlide['hero_title_two_color_part_1'] ?>
										</span>
										<span class="black-text">
											<?= $heroSlide['hero_title_two_color_part_2'] ?>
										</span>
										<span class="white-text">
											<?= $heroSlide['hero_title_two_color_part_3'] ?>
										</span>
									<?php elseif ( $heroSlide['hero_slider_title'] == 'one_color' ) : ?>
										<span class="black-text">
											<?= $heroSlide['hero_title_one_color'] ?>
										</span>
									<?php endif; ?>

								</div>
								<div class="hero-img">
									<?= wp_get_attachment_image( $heroSlide['hero_slider_image'], 'full', false, [] ); ?>
								</div>
								<!-- <div class="shadow"></div> -->
							</div>

							<div class="panels-navigation">

								<div class="nav-panel home-nested-prev"><i class="icon-arrow-single-big"></i></div>
								<div class="nav-panel home-nested-next"><i class="icon-arrow-single-big"></i>
								</div>


							</div>


						</div>
					</div>
					<div class="mobile-next-bg gradiant-<?= $num ?>">

					</div>
				</div>
				<?php $num++;
			endforeach; ?>

		</div>

	</div>
</div>