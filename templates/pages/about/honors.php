<?php
$pageId = get_queried_object_id();
$honorTitle = get_field('honor_title_section', $pageId);
$honorSlider = get_field('about_slider_2', $pageId);
?>

<div class="swiper-slide honors-slider">
    <div class="container ">
        <div class="honors-title">
            <h2><?= $honorTitle ?></h2>
        </div>
        <div class="contain">
            <?php foreach ($honorSlider as $honorSlider) :
                if ($honorSlider['image_box'] != "") : ?>
                    <div class="honors-box">
                        <?= wp_get_attachment_image($honorSlider['image_box'], 'full', false, []); ?>
                        <div class="info">
                            <h3><?= $honorSlider['image_title'] ?></h3>
                            <span><?= $honorSlider['image_date'] ?></span>
                        </div>
                    </div>
            <?php
                endif;
            endforeach; ?>
        </div>
    </div>

</div>