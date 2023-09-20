<?php
$frontId = get_option('page_on_front');

$heroSliders = get_field('front_page_hero_section', $frontId);

?>

<div class="swiper-slide">

    <div class="home-nested-slider swiper-container">
        <div class="swiper-wrapper">
            <?php
            $num = 1;
            foreach ($heroSliders as $heroSlide) : ?>
                <div id="panel-<?= $num ?>" class="slide swiper-slide slide panel full-screen <?= $heroSlide['hero_slider_bg_color'] ?>">
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
                                <div class="shadow"></div>
                            </div>
                            <div class="panels-navigation">
                                <?php if ($num == 1) : ?>
                                    <div class="nav-panel next" data-sign="plus"><a href="#panel-<?= $num + 1 ?>" class="anchor"><i class="icon-arrow-single-big"></i>next</a>
                                    </div>
                                <?php elseif ($num == count($heroSliders)) : ?>
                                    <div class="nav-panel prv" data-sign="minus"><a href="#panel-<?= $num - 1 ?>" class="anchor"><i class="icon-arrow-single-big"></i>prv</a></div>
                                <?php else : ?>
                                    <div class="nav-panel prv" data-sign="minus"><a href="#panel-<?= $num - 1 ?>" class="anchor"><i class="icon-arrow-single-big"></i>prv</a></div>
                                    <div class="nav-panel next" data-sign="plus"><a href="#panel-<?= $num + 1 ?>" class="anchor"><i class="icon-arrow-single-big"></i>next</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $num++;
            endforeach; ?>

        </div>

    </div>
</div>