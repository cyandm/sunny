<?php
$frontId = get_option('page_on_front');

$startSliders = get_field('slider_start_section', $frontId);


?>

<div class="swiper-slide start-section">

    <div class="home-nested-slider swiper-container" dir="ltr">
        <div class="swiper-wrapper">
            <?php
            $num = 1;
            foreach ($startSliders as $Slide) : ?>
                <div id="start-<?= $num ?>" class=" swiper-slide slide panel2 full-screen">
                    <div class="row">
                        <div class="container">
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
                                <div class="start-text">
                                    <div class="start-text-title">
                                        <h2><?= $Slide['start_slider_title'] ?></h2>
                                    </div>
                                    <div class="panels-navigation">
                                        <div class="panels-navigation ">
                                            <?php if ($num == 1) : ?>
                                                <div class="swiper-button-next next"><i class="icon-arrow-single-big"></i></div>
                                            <?php elseif ($num == count($startSliders)) : ?>

                                                <div class="swiper-button-prev prv"><i class="icon-arrow-single-big"></i></div>
                                            <?php else : ?>
                                                <div class="swiper-button-next next"><i class="icon-arrow-single-big"></i></div>
                                                <div class="swiper-button-prev prv"><i class="icon-arrow-single-big"></i></div>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                    <div class="start-description">
                                        <?= $Slide['start_slider_description'] ?>
                                    </div>
                                    <a href="" class="start-text-btn"> ادامه مطلب<i class="icon-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="breadcrumb-btn">
                                <div class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i>مربی ها و هنرجوها
                                </div>
                                <div class="home-main-slider-prev btn-left">اسلایدر<i class="icon-arrow-side-left"></i>
                                </div>

                                <!-- <a href="#start-<?= ($num == count($startSliders)) ? $num - 1 : $num + 1 ?>" class="btn-right"><i class="icon-arrow-side-right"></i>مربی ها و هنرجوها</a>
                                <a href="#panel-3" class="btn-left">اسلایدر<i class="icon-arrow-side-left"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php $num++;
            endforeach; ?>

        </div>
    </div>
</div>