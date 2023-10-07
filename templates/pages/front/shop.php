<?php
$frontId = get_option('page_on_front');

$title = get_field('shop_section_title', $frontId);
$btnTitle = get_field('shop_section_btn_title', $frontId);
$btnLink = get_field('shop__section_btn_link', $frontId);


?>
<div id="shop" class="swiper-slide shop-section">
    <div class="container  padding-top">
        <?Php if ($title) : ?>
            <div class="section-title">
                <h2><?= $title ?></h2>
                <?Php if ($btnTitle) : ?>
                    <a href="<?= $btnLink ?>"><?= $btnTitle ?></a>
                <?php endif ?>
            </div>
        <?php endif ?>

        <div class="shop-content">

        </div>
        <div class="breadcrumb-btn">
            <a href="" class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i> راه های ارتباطی</a>
            <a href="" class="btn-left home-main-slider-prev"> کلاس ها <i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</div>