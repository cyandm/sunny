<?php
$frontId = get_option('page_on_front');

$title = get_field('shop_section_title', $frontId);
$btnTitle = get_field('shop_section_btn_title', $frontId);
$btnLink = get_field('shop__section_btn_link', $frontId);


?>
<section id="shop" class="shop-section">
    <div class="container">
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
        <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
        <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
    </div>
    </div>
</section>