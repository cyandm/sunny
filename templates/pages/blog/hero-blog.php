<?php
$blog_page_id = get_posts([
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/blogs.php'
]);


$blogSliders = get_field('blog_overview_hero_section', $blog_page_id[0]);

if ($blogSliders && $blogSliders['hero_slider_1']['hero_slider_image']) : ?>

    <div class="blog-page-slider swiper-container" dir="ltr">
        <div class="swiper-wrapper">

            <div class="overly first"></div>
            <div class="overly second"></div>
            <div class="overly third"></div>

            <?php foreach ($blogSliders as $key => $slide) : ?>
                <div class="swiper-slide blog-slide <?= ($key == 'hero_slider_1') ? 'first-slide' : 'second-slide' ?>">
                    <div class="content container">
                        <div class="blog-hero-title">
                            <div class="translate-animation">
                                <h1><?= $slide['hero_slider_title'] ?></h1>
                            </div>
                            <div class="translate-animation">
                                <h4><?= $slide['hero_title_sub_title'] ?></h4>
                            </div>
                            <div class="translate-animation">
                                <p class="description-slide"><?= $slide['slider_description'] ?></p>
                            </div>
                            <div class="translate-animation">
                                <div> <a href="<?= $slide['btn_page_link'] ?>" class="btn-link">مشاهده آموزش</a></div>

                            </div>
                        </div>
                        <div class="image-box">
                            <div class="blog-circle circle-animation"></div>
                            <div class="img image-animate">

                                <?= wp_get_attachment_image($slide['hero_slider_image'], 'full', false, []); ?>

                            </div>
                        </div>
                        <?php if ($key == 'hero_slider_1') : ?>
                            <div class="translate-animation">
                                <div class="next-slider swiper-button-next">
                                    <i class="icon-arrow-side-right"></i>
                                    <div>
                                        <h3><?= $blogSliders['hero_slider_2']['hero_slider_title'] ?></h3>
                                        <?= wp_get_attachment_image($blogSliders['hero_slider_2']['hero_slider_image'], 'thumbnail', false, []); ?>
                                    </div>

                                </div>
                            </div>

                        <?php else : ?>
                            <div class="translate-animation">
                                <div class="prev-slider swiper-button-prev ">
                                    <?= wp_get_attachment_image($blogSliders['hero_slider_1']['hero_slider_image'], 'thumbnail', false, []); ?>
                                    <div>
                                        <h3><?= $blogSliders['hero_slider_1']['hero_slider_title'] ?></h3>
                                        <i class="icon-arrow-side-left"></i>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
<?php endif ?>