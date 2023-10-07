<?php
$frontId = get_option('page_on_front');
$heroSliders = get_field('front_page_hero_section', $frontId);
?>

<div class="swiper-slide">

    <div class="home-nested-slider swiper-container" dir="ltr">
        <div class="swiper-wrapper">
            <?php
            $num = 1;
            foreach ($heroSliders as $heroSlide) : ?>
                <div id="<?= ($num == 1) ? 'first-slide' : '' ?>" class="slide swiper-slide slide panel full-screen <?= $heroSlide['hero_slider_bg_color'] ?>">

                    <div class="row">
                        <div class="container slide-container">
                            <div class="shape  <?= $heroSlide['hero_slider_shape'] ?>"></div>
                            <div class="content-hero-slide">
                                <div class="title">

                                    <?php if ($heroSlide['hero_slider_title'] == 'two_color') : ?>
                                        <span class="white-text"><?= $heroSlide['hero_title_two_color_part_1'] ?></span>
                                        <span class="black-text"><?= $heroSlide['hero_title_two_color_part_2'] ?></span>
                                        <span class="white-text"><?= $heroSlide['hero_title_two_color_part_3'] ?></span>
                                    <?php elseif ($heroSlide['hero_slider_title'] == 'one_color') : ?>
                                        <span class="black-text"><?= $heroSlide['hero_title_one_color'] ?></span>
                                    <?php endif; ?>

                                </div>
                                <div class="hero-img">
                                    <?= wp_get_attachment_image($heroSlide['hero_slider_image'], 'full', false, []); ?>
                                </div>
                                <!-- <div class="shadow"></div> -->
                            </div>

                            <div class="panels-navigation">

                                <?php if ($num == 1) : ?>
                                    <div class="nav-panel home-nested-next"><i class="icon-arrow-single-big"></i>
                                    </div>
                                <?php elseif ($num == count($heroSliders)) : ?>
                                    <div class="nav-panel home-nested-prev"><i class="icon-arrow-single-big"></i></div>
                                <?php else : ?>
                                    <div class="nav-panel home-nested-prev"><i class="icon-arrow-single-big"></i></div>
                                    <div class="nav-panel home-nested-next"><i class="icon-arrow-single-big"></i>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="pagination-btn">
                                <span class="numbers">
                                    <span class="this-slide-num">0<?= $num ?></span>
                                    <span class="line"></span>
                                    <span class="all-slide">03</span>
                                </span>
                                <div class="home-main-slider-next next-btn">چرا ریتمیک؟<i class="icon-arrow-side-right"></i>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            <?php $num++;
            endforeach; ?>

        </div>

    </div>
</div>