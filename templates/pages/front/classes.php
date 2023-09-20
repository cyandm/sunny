<?php
$frontId = get_option('page_on_front');

$title = get_field('coach_section_title', $frontId);
$btnTitle = get_field('coach_section_btn_title', $frontId);
$btnLink = get_field('coach_section_btn_link', $frontId);

$coaches = get_field('choose_coaches', $frontId);
$topStudentTitle = get_field('top_student_title', $frontId);

?>
<div class="swiper-slide classes-slide">
    <div class="container">
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
                        <div class="swiper-slide">
                            <div class="front-coach-img">
                                <div class="img-content">
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
                                        <?php foreach ($topStudents as $student) : ?>
                                            <div class="student-info">
                                                <?= wp_get_attachment_image(get_post_thumbnail_id($student->ID), 'full', false, []);
                                                ?>
                                            </div>
                                        <?php endforeach; ?>
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
            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i>سوالات متداول</a>
            <a href="" class="btn-left">چرا ریتمیک<i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</div>