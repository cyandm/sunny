<?php
$pageId = get_queried_object_id();
$galleryTitle = get_field('honor_title_section', $pageId);
$imagesGallery = get_field('about_slider_4', $pageId);

?>

<div class="swiper-slide gallery-slider">

    <div class="container ">
        <div class="gallery-title">
            <h2><?= $galleryTitle ?></h2>
        </div>
        <div class="contain">
            <?php foreach ($imagesGallery as $image): ?>
                <div class="gallery-box">
                    <?= wp_get_attachment_image($image['image'], 'full', false, []); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
