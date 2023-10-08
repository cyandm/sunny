<?php
$frontId = get_option('page_on_front');
$title = get_field('coach_section_title', $frontId);
$btnTitle = get_field('coach_section_btn_title', $frontId);
$btnLink = get_field('coach_section_btn_link', $frontId);
$coaches = get_field('choose_coaches', $frontId);
$topStudentTitle = get_field('top_student_title', $frontId);

?>
<div class="swiper-slide classes-slide">
    <div class="container padding-top">
        <?Php if ($title) : ?>
            <div class="section-title">
                <h2><?= $title ?></h2>
                <?Php if ($btnTitle) : ?>
                    <a href="<?= $btnLink ?>"><?= $btnTitle ?></a>
                <?php endif ?>
            </div>
        <?php endif ?>
        <div class="swiper coach-slider">
            <div class="swiper-wrapper">
                <?php if (is_array($coaches) && count($coaches) > 0) :
                    foreach ($coaches as $coach) : ?>
                        <div class="swiper-slide classes-content">
                            <div class="front-coach-img">
                                <div class="img-content <?= get_field('bg_image_color', get_the_ID()) ?>">
                                    <?= wp_get_attachment_image(get_post_thumbnail_id($coach->ID), 'full', false, []);
                                    ?>
                                </div>
                            </div>

                            <div class="front-coach-content">
                                <h3><?= $coach->post_title ?></h3>
                                <div class="nav-btn"></div>
                                <div class="description">
                                    <?= get_field('description_text', $coach->ID) ?>
                                </div>

                                <?php if ($topStudentTitle) : ?>
                                    <h4><?= $topStudentTitle ?></h4>
                                <?php endif;
                                $topStudents = get_field('choose_students', $coach->ID);

                                if (is_array($topStudents) && count($topStudents) > 0) : ?>


                                    <div class="students-row">
                                        <div class="students-slider swiper">
                                            <div class="swiper-wrapper sliders-wrapper">
                                                <?php foreach ($topStudents as $student) : ?>
                                                    <div class="student-info swiper-slide">

                                                        <?= wp_get_attachment_image(get_post_thumbnail_id($student->ID), 'full', false, []); ?>

                                                        <div class="achievement-description">
                                                            <h6><?= get_the_title($student->ID) ?></h6>
                                                            <span><?= get_field('achievement_description', $student->ID) ?></span>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                <?php endforeach;
                endif; ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="breadcrumb-btn">
            <a href="" class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i>سوالات متداول</a>
            <a href="" class="btn-left home-main-slider-prev">چرا ریتمیک<i class="icon-arrow-side-left"></i></a>
        </div>

        <?Php if ($btnTitle) : ?>
            <div class="section-btn">
                <a href="<?= $btnLink ?>"><?= $btnTitle ?></a>
            </div>
        <?php endif ?>
    </div>
</div>