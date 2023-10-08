<?php
$frontId = get_option('page_on_front');
$startSliders = get_field('slider_start_section', $frontId);
?>
<div class="swiper-slide start-section">

    <div class="home-nested-slider swiper-container" dir="ltr">
        <div class="swiper-wrapper start-wrapper">
            <?php
            $num = 1;
            foreach ($startSliders as $Slide) :
                if ($Slide['start_slider_image'] != "" && $Slide['start_slider_title'] != "") :

            ?>
                    <div id="start-<?= $num ?>" class=" swiper-slide slide panel2 full-screen <?= ($Slide['start_slider_shape'] == 'diamond') ? 'diamond' : '' ?>">
                        <div class="row">
                            <div class="container">
                                <div class="arrow-svg arrow-large-view">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="110" height="340" viewBox="0 0 110 340" fill="none">
                                        <g id="Group 19">
                                            <path id="Vector 13" d="M17.7607 0C-44.9793 36.5 -61.3934 204.804 3.02052 236.5C97.5205 283 137.76 186.5 85.2605 155.5C40.2602 128.928 -48.6102 223 38.7607 295.5C62.2605 315 106.26 335.5 106.26 335.5" stroke="#67D6F9" stroke-width="2" stroke-linecap="round" />
                                            <path id="Vector 14" d="M69.5205 338.5C82.0205 335 94.5205 332.5 108.26 337C97.0205 329.5 93.5205 312 93.5205 304" stroke="#67D6F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="start-content">
                                    <div class="start-img">
                                        <div class="shape <?= $Slide['start_slider_shape'] ?>"></div>
                                        <?= wp_get_attachment_image($Slide['start_slider_image'], 'full', false, []); ?>

                                        <div class="video-content" data-id=" ">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/imgs/video.png" alt="video">

                                            <i class="icon-play play-video" id="play-video"></i>
                                            <div class="video-popup">
                                                <video id="mainVideo" controls>
                                                    <source src="<?= $Slide['start_slider_video'] ?>" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrow-svg arrow-mobile">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="144" viewBox="0 0 64 144" fill="none">
                                            <g id="Group 399">
                                                <path id="Vector 13" d="M24.3915 1C-1.9278 16.3117 -8.8135 86.9149 18.208 100.211C57.8506 119.718 74.731 79.2363 52.7075 66.2319C33.83 55.0852 -3.45094 94.548 33.2009 124.962C43.059 133.142 61.5169 141.741 61.5169 141.741" stroke="#67D6F9" stroke-width="2" stroke-linecap="round" />
                                                <path id="Vector 14" d="M46.1045 143C51.3482 141.532 56.5919 140.483 62.3557 142.371C57.6407 139.225 56.1724 131.883 56.1724 128.527" stroke="#67D6F9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="start-text">
                                        <div class="start-text-title">
                                            <h2><?= $Slide['start_slider_title'] ?></h2>
                                        </div>
                                        <div class="panels-navigation ">
                                            <?php if ($num == 1) : ?>
                                                <div class="home-nested-next next"><i class="icon-arrow-single-big"></i>
                                                </div>
                                            <?php elseif ($num == count($startSliders)) : ?>

                                                <div class="home-nested-prev prv"><i class="icon-arrow-single-big"></i>
                                                </div>
                                            <?php else : ?>
                                                <div class="home-nested-next next"><i class="icon-arrow-single-big"></i>
                                                </div>
                                                <div class="home-nested-prev prv"><i class="icon-arrow-single-big"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="start-description">
                                            <?= $Slide['start_slider_description'] ?>
                                        </div>
                                        <a href="" class="start-text-btn"> ادامه مطلب<i class="icon-arrow-right"></i></a>
                                    </div>
                                </div>

                                <div class="breadcrumb-btn">
                                    <div class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i>مربی
                                        ها و هنرجوها
                                    </div>
                                    <div class="home-main-slider-prev btn-left">اسلایدر<i class="icon-arrow-side-left"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php $num++;
                endif;
            endforeach; ?>

        </div>
    </div>
</div>