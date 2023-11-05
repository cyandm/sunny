<?php
$frontId = get_option( 'page_on_front' );

$title = get_field( 'pakage_section_title', $frontId );
$btnTitle = get_field( 'pakage_section_btn_title', $frontId );
$btnLink = get_field( 'pakage_section_btn_link', $frontId );

$courses = get_field( 'choose_pakages', $frontId );
?>

<div id="package" class=" package-content">
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
		<?php if ( is_array( $courses ) && count( $courses ) > 0 ) : ?>
			<div class="package-slider swiper-container container">
				<div class="package-content swiper-wrapper">

					<?php
					foreach ( $courses as $course ) : ?>
						<div class="swiper-slide">
							<?php
							get_template_part(
								'/templates/components/card-course',
								null,
								[ 'id' => $course->ID ]

							);
							?>
						</div>
						<?php
					endforeach;
					?>

				</div>
			</div>
		<?php endif; ?>


		<?Php if ( $btnTitle ) : ?>
			<div class="section-btn">
				<a href="<?= $btnLink ?>">
					<?= $btnTitle ?>
				</a>
			</div>
		<?php endif ?>
	</div>
</div>