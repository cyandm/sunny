<?php

// echo '<pre dir="ltr">';
// var_export( $honorSlider );
// echo '</pre>';
// wp_die();
?>

<section class="management">
	<div class="separator">
	</div>
	<div class="container">
		<div class="img-wrapper">
			<?= wp_get_attachment_image( get_field( 'management_feature_img' ), 'full' ) ?>
		</div>
		<div class="content">
			<?php printf( '<h2>%s</h2>', get_field( 'title_management' ) ) ?>
			<?php printf( '<h3>%s</h3>', get_field( 'slogan' ) ) ?>
			<?php printf( '<p>%s</p>', get_field( 'content_management' ) ) ?>
		</div>
	</div>
	<div class="separator down">
	</div>
</section>