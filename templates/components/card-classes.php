<?php
$class_id = get_the_ID();
$class_properties = null !== get_field('class_properties', $class_id) ? get_field('class_properties', $class_id) : '';

$class_level = get_the_terms($class_id, 'course-tag');

?>
<div class="classes-card">
    <h3 class="class-title"> <?php the_title() ?></h3>
    <?php if (!empty($class_properties['class_date']) || !empty($class_properties['class_days'])) : ?>
        <div class="time-and-days">
            <?php if (!empty($class_properties['class_days'])) : ?>
                <div><?= $class_properties['class_days']  ?></div>
            <?php endif ?>
            <?php if (!empty($class_properties['class_date'])) : ?>
                <div><?= $class_properties['class_date']  ?></div>
            <?php endif ?>
        </div>
    <?php endif ?>
    <?php if (!empty($class_level)) {
        echo '<div class="tag-wrapper">';
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
    }
    ?>
    <?php if (!empty($class_properties['coach_name'])) : ?>
        <div class="class-coach">مربی : <?= $class_properties['coach_name'] ?></div>
    <?php endif ?>
    <a href="<?php the_permalink() ?>" class="btn-submit-component">
        جزئیات کلاس و ثبت نام
    </a>
</div>