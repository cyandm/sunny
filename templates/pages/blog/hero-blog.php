<?php
$pageId = get_queried_object_id();
$blogSliders = get_field('blog_overview_hero_section', $pageId);

if ($blogSliders && $blogSliders['hero_slider_1']['hero_slider_image']) : ?>

    <div class="blog-page-slider swiper-container" dir="ltr">
        <div class="swiper-wrapper">

            <?php foreach ($blogSliders as $key => $slide) : ?>
                <div class="swiper-slide blog-slide <?= ($key == 'hero_slider_1') ? 'first-slide' : 'second-slide' ?>">
                    <div class="content container">
                        <div class="blog-hero-title">
                            <h1><?= $slide['hero_slider_title'] ?></h1>
                            <h4><?= $slide['hero_title_sub_title'] ?></h4>
                            <p class="description-slide"><?= $slide['slider_description'] ?></p>
                            <a href="<?= $slide['btn_page_link'] ?>" class="btn-link">مشاهده آموزش</a>
                        </div>
                        <div class="image-box">
                            <div class="blog-circle"></div>
                            <?= wp_get_attachment_image($slide['hero_slider_image'], 'full', false, []); ?>

                        </div>
                        <?php if ($key == 'hero_slider_1'): ?>
                            <div class="next-slider swiper-button-next">
                                <i class="icon-arrow-side-right"></i>
                                <div><h3><?= $blogSliders['hero_slider_2']['hero_slider_title'] ?></h3>
                                    <?= wp_get_attachment_image($blogSliders['hero_slider_2']['hero_slider_image'], 'thumbnail', false, []); ?>
                                </div>

                            </div>

                        <?php else: ?>

                            <div class="prev-slider swiper-button-prev">
                                <?= wp_get_attachment_image($blogSliders['hero_slider_1']['hero_slider_image'], 'thumbnail', false, []); ?>
                                <div><h3><?= $blogSliders['hero_slider_1']['hero_slider_title'] ?></h3>
                                    <i class="icon-arrow-side-left"></i>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
<?php endif ?>
