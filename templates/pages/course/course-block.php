<?php
$post_id = '';
if ($args['id']) {
    $post_id = $args['id'];
}
$description = get_field('course_excerpt', $post_id);
$startTerm = get_field('start_new_term', $post_id);
$classCapacity = get_field('class_capacity', $post_id);
$bgColor = get_field('course_color', $post_id);
?>

<div class="course-block <?= $bgColor ?>">
    <div class="course-info">

        <div class="course-info-content">
            <div class="title">
                <h3><?= get_the_title($post_id) ?></h3><span><?= get_field('course_level', $post_id) ?></span>
            </div>
            <div class="content">
                <?php if ($startTerm) : ?>
                <div class="details-mobile"><span class="title-name">شروع ترم جدید:<i class=""></i></span>
                    <span><?= $startTerm ?></span>
                </div>
                <?php endif;

                 if ($description) : ?>
                    <div class="description"><?= $description ?></div>
                <?php endif; ?>
                <div class="detail">
                    <?php if ($startTerm) : ?>
                        <div class="details-large-view"><span class="title-name">شروع ترم جدید:<i class=""></i></span>
                            <span><?= $startTerm ?></span>
                        </div>
                    <?php endif;
                    if ($classCapacity) : ?>
                        <div><span class="title-name">ظرفیت کلاس:<i class=""></i></span><span><?= $classCapacity ?></span></div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="btn">
                <a href="<?= get_field('call_to _us_btn', $post_id) ?>">تماس با ما </a>
            </div>
        </div>
        <div class="course-img">

            <?php $thumbnail_id = get_post_thumbnail_id($post_id); ?>
            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
        </div>
    </div>

    <div class="course-form-block <?= $bgColor ?>">

        <span class="show-form"><span>ثبت نام</span><i class="icon-arrow-right"></i></span>
        <?php
        get_template_part(
            '/templates/pages/course/course-form',
            null,
            ['id' => $post_id]
        );
        ?>
    </div>
</div>