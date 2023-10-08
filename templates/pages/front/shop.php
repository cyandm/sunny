<?php
$frontId = get_option('page_on_front');
$title = get_field('shop_section_title', $frontId);
$btnTitle = get_field('shop_section_btn_title', $frontId);
$btnLink = get_field('shop__section_btn_link', $frontId);

$newQueryArgs = array(
    'post_type' => 'product',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
);
$allProducts = new WP_Query($newQueryArgs);
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
        <?php endif;

        ?>

        <div class="shop-content">
            <?php
            if ($allProducts->have_posts()) :
                while ($allProducts->have_posts()) :
                    $allProducts->the_post();
                    wc_get_template_part('content', 'product');

                endwhile;
            endif;

            wp_reset_postdata(); ?>

        </div>


        <div class="breadcrumb-btn">
            <a href="" class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i> راه های ارتباطی</a>
            <a href="" class="btn-left home-main-slider-prev"> کلاس ها <i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</div>