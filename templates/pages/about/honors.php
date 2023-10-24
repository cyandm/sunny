<?php
$pageId = get_queried_object_id();
$honorTitle = get_field('honor_title_section', $pageId);
$honorSlider = get_field('about_slider_2', $pageId);
?>

<div class="swiper-slide honors-slider" id="about-honors">
    <div class="container ">
        <div class="honors-title">
            <h2><?= $honorTitle ?></h2>
        </div>
        <div class="contain">
            <?php foreach ($honorSlider as $honorSlide) :
                if ($honorSlide['image_box'] != "") : ?>
                    <div class="honors-box">
                        <?= wp_get_attachment_image($honorSlide['image_box'], 'full', false, []); ?>
                        <div class="info">
                            <h3><?= $honorSlide['image_title'] ?></h3>
                            <span><?= $honorSlide['image_date'] ?></span>
                        </div>
                    </div>


            <?php
                endif;
            endforeach; ?>
            <div class="honors-images-popup">

                <div class="honors-slider swiper container">
                    <i class="icon-close close-honors-popup"></i>
                    <div class="swiper-wrapper">
                        <?php foreach ($honorSlider as $item) :
                            if($item['image_box'] != "") : ?>
                                <div class="swiper-slide">
                                    <?= wp_get_attachment_image($item['image_box'], 'full', false, []); ?>
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