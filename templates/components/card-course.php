<?php
$post_id = '';
if ($args['id']) {
    $post_id = $args['id'];
}
$bgColor = get_field('course_color', $post_id);
$courseLength = get_field('course_length', $post_id);
$courseFee = get_field('course_fee', $post_id);
$classSessions = get_field('class_sessions', $post_id);

?>
<div class="course-card <?= $bgColor ?>">
    <div class="course-info-card">
        <div>
            <?php if ($courseLength): ?>
                <h3><?= $courseLength ?></h3>
            <?php endif;
            if ($courseFee): ?>
                <span><?= $courseFee ?></span>
            <?php endif; ?>

        </div>
        <div>
            <?php if ($classSessions): ?>
            <span><?= $classSessions?></span>
            <?php endif; ?>
        </div>

    </div>
    <div class="course-img-card">
        <div class="circle"></div>
        <div class="img-shadow">
            <?php $thumbnail_id = get_post_thumbnail_id($post_id); ?>
            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
            <div class="shadow"></div>
        </div>
    </div>
</div>