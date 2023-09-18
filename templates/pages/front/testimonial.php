<?php
$frontId = get_option('page_on_front');
$title = get_field('testimonial_section_title', $frontId);
?>

<section id="testimonial" class="testimonial-section">
    <div class="container">

        <?php if ($title) : ?>
            <div class="section-title">
                <h2><?= esc_html($title) ?></h2>
            </div>
        <?php endif; ?>

    </div>
    <div class="container">
        <div class="front-testimonial-content">
            <div class="video-container " data-id="">
                <div class="video-popup">
                    <video controls >
                        <source src="" type="video/mp4">
                    </video>
                    <button class="close-popup">&#10006;</button>';
                </div>
                <i class=""></i>
                    <?= wp_get_attachment_image($person['video_img'], 'full', false, []); ?>

            </div>
            <div class="testimonial-content">
                <div class="person_info " data-id="">
                    <div class="person-name">عنوان سکشن</div>

                    <div class="person-description">
                        متن توضیحات سکشن اینجا قرار می‌گیرد.
                    </div>
                </div>
                <div class="other-person-content">
                    <h3></h3>
                    <div class="swiper testimonial-slider">
                        <div class="swiper-wrapper">
                            <?php
                            $num = 1;
                            foreach ($testimonials as $key => $person) : ?>
                                <div class="swiper-slide person-img testimonial-<?= $num ?>" data-id="">
<!--                                    <i class="icon-play"></i>-->
                                    <?= wp_get_attachment_image($person['video_img'], 'full', false, []); ?>
                                </div>
                                <?php $num++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="breadcrumb-btn">
            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
            <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</section>

