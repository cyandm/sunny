<?php
$frontId = get_option('page_on_front');

$title = get_field('coach_section_title', $frontId);
$btnTitle = get_field('coach_section_btn_title', $frontId);
$btnLink = get_field('coach_section_btn_link', $frontId);

$coches = get_field('choose_coches', $frontId);
$topStudentTitle = get_field('top_student_title', $frontId);

?>
<section id="classes" class="full-screen">
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
                <?php foreach ($coches as $coche) :
                    if (is_array($coches) && count($coches) > 0) : ?>
                        <div class="swiper-slide">
                            <div class="front-coach-img">
                                <div class="shape top-circle"></div>
                                <div class="img">
                                    <?= wp_get_attachment_image(get_post_thumbnail_id($coche->ID), 'full', false, []);
                                    ?>
                                    <div class="img-shadow"></div>
                                </div>
                            </div>
                            <div class="front-coach-content">
                                <h3><?= $coche->post_title ?></h3>

                                <div class="description">
                                    <?= $coche->post_content ?>
                                </div>

                                <?php if ($topStudentTitle) : ?>
                                    <h4><?= $topStudentTitle ?></h4>
                                <?php endif;
                                $topStudents = get_field('choose_students', $coche->ID);

                                if (is_array($topStudents) && count($topStudents) > 0) : ?>

                                    <div class="studets-row">
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
                    <?php endif; ?>

                <?php endforeach; ?>



            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="breadcrumb-btn">
            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i>سوالات متداول</a>
            <a href="" class="btn-left">چرا ریتمیک<i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</section>