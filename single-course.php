<?php  ?>

<?php get_header();

$class_id = get_the_ID();
$class_properties = null !== get_field('class_properties', $class_id) ? get_field('class_properties', $class_id) : '';
$second_class_thumbnail = null !== get_field('second_class_thumbnail', $class_id) ? get_field('second_class_thumbnail', $class_id) : '';


$other_classes = new WP_Query([
    'post_type' => 'course',
    'posts_per_page' => 3,
    'post__not_in' => [$class_id],
]);

?>
<main class="single-course-page container">
    <?php get_template_part('/templates/components/notifications/successful');
    ?>
    <?php
    get_template_part('/templates/components/popup/submit', 'shopping', ['id' => $class_id, 'type' => 'class-register']);
    ?>
    <?php get_template_part('/templates/components/back-btn'); ?>

    <section class="class-details-explain">
        <h1 class=""><?= get_the_title() ?></h1>
        <div class="class-thumbnail-group">
            <div class="class-thumbnail"> <?php the_post_thumbnail('full') ?> </div>
            <div class="class-thumbnail"><?= wp_get_attachment_image($second_class_thumbnail, 'full') ?> </div>
        </div>
        <div class="class-detail-group">
            <div class="class-description">
                <h2>توضیحات کلاس</h2>
                <div> <?= get_the_content() ?> </div>
            </div>
            <?php if (count(array_filter($class_properties)) > 0) : ?>
                <div class="class-detail">
                    <div class="detail-group-wrapper">
                        <?php if (!empty($class_properties['coach_name'])) : ?>
                            <div class="detail-property">
                                <p class="property-name">نام مربی</p>
                                <div class="property-value"><?= $class_properties['coach_name'] ?></div>
                            </div>
                        <?php endif ?>
                        <?php if (!empty($class_properties['sessions_count'])) : ?>
                            <div class="detail-property">
                                <p class="property-name">تعداد جلسات</p>
                                <div class="property-value"><?= $class_properties['sessions_count'] ?></div>
                            </div>
                        <?php endif ?>
                        <?php if (!empty($class_properties['class_date']) || !empty($class_properties['class_days'])) : ?>
                            <div class="detail-property times-and-days">
                                <p class="property-name">روز و ساعت</p>
                                <div class="property-value">
                                    <?php if (!empty($class_properties['class_days'])) : ?>
                                        <div><?= $class_properties['class_days']  ?></div>
                                    <?php endif ?>
                                    <?php if (!empty($class_properties['class_date'])) : ?>
                                        <div><?= $class_properties['class_date']  ?></div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (!empty($class_properties['class_price'])) : ?>
                            <div class="detail-property">
                                <p class="property-name">شهریه</p>
                                <div class="property-value"><?= $class_properties['class_price'] ?> تومان</div>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="btn-wrapper">
                        <div class="btn-submit-component"> ثبت نام</div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
    <?php if ($other_classes->have_posts()) : ?>
        <section class="other-classes">
            <h2>دیگر کلاسها</h2>
            <div class="classes-wrapper">

                <?php while ($other_classes->have_posts()) {
                    $other_classes->the_post();
                    get_template_part('templates/components/card', 'classes');
                } ?>
            </div>

        </section>
    <?php endif;
    wp_reset_postdata();
    ?>

</main>



<?php get_footer() ?>