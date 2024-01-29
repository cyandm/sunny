<?php  ?>

<?php get_header();


$class_id = get_the_ID();
$class_properties = null !== get_field('class_properties', $class_id) ? get_field('class_properties', $class_id) : '';
$second_class_thumbnail = null !== get_field('second_class_thumbnail', $class_id) ? get_field('second_class_thumbnail', $class_id) : '';
$third_class_thumbnail = null !== get_field('third_class_thumbnail', $class_id) ? get_field('third_class_thumbnail', $class_id) : '';


$other_classes = new WP_Query([
    'post_type' => 'course',
    'posts_per_page' => 3,
    'post__not_in' => [$class_id],
]);
$class_level = get_the_terms($class_id, 'course-tag');

?>
<main class="single-course-page ">

    <div class="container">
        <?php
        get_template_part('/templates/components/popup/submit', 'shopping', ['id' => $class_id, 'type' => 'class-register']);
        ?>
        <?php get_template_part('/templates/components/notifications/successful'); ?>

        <section class="class-details-explain">
            <h1 class=""><?= get_the_title() ?></h1>
            <div class="class-thumbnail-group">
                <?php if (!empty($third_class_thumbnail)) :  ?>
                    <div class="class-thumbnail thumbnail1"> <?= wp_get_attachment_image($third_class_thumbnail, 'full') ?> </div>
                <?php endif ?>

                <?php if (!empty($second_class_thumbnail)) : ?>
                    <div class="class-thumbnail thumbnail2"><?= wp_get_attachment_image($second_class_thumbnail, 'full') ?> </div>
                <?php endif ?>
            </div>
            <div class="class-detail-group">
                <div class="class-description">
                    <h2>توضیحات کلاس</h2>
                    <?php if (!empty(get_the_content())) : ?>

                        <div> <?= get_the_content() ?> </div>
                    <? else : ?>
                        <div>برای این کلاس توضیحاتی ارائه نشده است !</div>

                    <?php endif ?>
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
                            <?php if (!empty($class_level)) {
                                echo '<div class="detail-property">';
                                echo '<p class="property-name"> سطح کلاس</p>';
                                echo '<div class="tag-wrapper property-value">';

                                foreach ($class_level as $level) {
                                    switch ((string)($level->name)) {
                                        case 'قهرمانی':
                                            printf('<div class="%s">%s</div>', 'purple', $level->name);
                                            break;
                                        case 'پیشرفته':
                                            printf('<div class="%s">%s</div>', 'orange', $level->name);
                                            break;
                                        case 'نیمه پیشرفته':
                                            printf('<div class="%s">%s</div>', 'green', $level->name);
                                            break;

                                        case 'مبتدی':
                                            printf('<div class="%s">%s</div>', 'blue', $level->name);
                                            break;
                                        default:
                                            printf('<div class="%s">%s</div>', 'red', $level->name);
                                            break;
                                    }
                                }
                                echo '</div>';

                                echo '</div>';
                            }
                            ?>
                            <?php if (!empty($class_properties['class_price'])) : ?>
                                <div class="detail-property">
                                    <p class="property-name ">شهریه</p>
                                    <div class="property-value price"><?= $class_properties['class_price'] ?> تومان</div>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="btn-wrapper">
                            <div class="btn-submit-component" id="btnRegister"> ثبت نام</div>
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
    </div>
    <?php get_template_part('templates/components/ticker') ?>

</main>



<?php get_footer() ?>