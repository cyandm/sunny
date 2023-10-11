<?php
$coachId = '';
if ($args['id']) {
    $coachId = $args['id'];
}
$topStudents = get_field('choose_students', $coachId);
?>
<div class="students-row-popup">
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