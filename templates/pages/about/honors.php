<?php
$honorSlider = get_field( "honor_slider", get_queried_object_id() );



?>

<section class='honors'>
	<div class="title container">
		<?php printf( '<h2>%s</h2>', get_field( 'honor_title_section' ) ) ?>
	</div>

	<div class="swiper" id="aboutHonorSlider">
		<div class="swiper-wrapper">

			<?php
			if ( $honorSlider ) :
				foreach ( $honorSlider as $key => $slide ) :
					if ( $slide['image_box'] !== false ) : ?>
						<div class="swiper-slide">
							<div class='img-wrapper'>
								<?= wp_get_attachment_image( $slide['image_box'], 'full' ) ?>
							</div>
							<div class="caption">
								<?= $slide['image_title'] ?>
							</div>
						</div>
					<?php endif; endforeach; endif; ?>
		</div>
	</div>
</section>