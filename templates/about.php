<?php
$pageId = get_queried_object_id();
$stickySlider = get_field('sticky_slider', $pageId);

/* Template Name: About Page */

get_header(); ?>

<main id="about-page" class="about-page">
    <div class="overly first"></div>
    <div class="overly second"></div>
    <div class="overly third"></div>

    <div class="about-page-slider swiper" dir="ltr">

        <div class="swiper-wrapper">
            <?php
            get_template_part('templates/pages/about/about-sunny');
            get_template_part('templates/pages/about/honors');
            get_template_part('templates/pages/about/image-gallery');
            get_template_part('templates/pages/about/manager-slide');
            ?>
        </div>

        <div class="video-content" data-id=" ">
            <img src="<?= get_stylesheet_directory_uri() ?>/imgs/video.png" alt="video">

            <i class="icon-play play-video" id="play-video"></i>
            <div class="video-popup">
                <video id="mainVideo" controls>
                    <source src="<?= get_field('video_about', $pageId) ?>" type="video/mp4">
                </video>
            </div>
        </div>

        <!-- Fixed bottom section -->
        <div class="fixed-section">

            <div class="container">
                <?php if (is_array($stickySlider) && count($stickySlider) > 0) : ?>
                    <div thumbsSlider="" class="swiper about-thumbnail-slider">
                        <div class="swiper-wrapper fixed-columns">

                            <?php foreach ($stickySlider as $key => $slider) : ?>
                                <div class="column swiper-slide <?= ($key == 'slider_thumbnail_2') ? 'remove-slide' : '' ?>">
                                    <?= wp_get_attachment_image($slider['about_slider_image'], 'thumbnail', false, []); ?>
                                    <div>
                                        <h4><?= $slider['about_slider_title'] ?></h4><i class="icon-arrow-side-left"></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="video-circle">
                <div class="circle">
                    <i class="fa fa-play"></i>
                </div>
            </div>
            <!-- Add a div for the animated line -->

        </div>

    </div>

</main>

<?php get_footer(); ?>