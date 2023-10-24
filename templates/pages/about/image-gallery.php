<?php
$pageId = get_queried_object_id();
$galleryTitle = get_field('honor_title_section', $pageId);
$imagesGallery = get_field('about_slider_3', $pageId);
?>

<div class="swiper-slide gallery-slider" id="about-gallery">

    <div class="container ">
        <div class="gallery-title">
            <h2><?= $galleryTitle ?></h2>
        </div>
        <div class="contain">
            <?php foreach ($imagesGallery as $image) :
                if ($image['image'] != "") : ?>
                    <div class="gallery-box">
                        <?= wp_get_attachment_image($image['image'], 'full', false, []); ?>
                    </div>
            <?php endif;
            endforeach; ?>

            <div class="gallery-images-popup">

                <div class="gallery-slider swiper container">
                    <i class="icon-close close-gallery-popup"></i>
                    <div class="swiper-wrapper">
                        <?php foreach ($imagesGallery as $image) :
                            if ($image['image'] != "") : ?>
                                <div class="swiper-slide">

                                    <?= wp_get_attachment_image($image['image'], 'full', false, []); ?>

                                </div>
                        <?php endif;
                        endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

</div>