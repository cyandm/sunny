<?php
$frontId = get_option('page_on_front');
$title = get_field('coach_section_title', $frontId);
$topStudentTitle = get_field('top_student_title', $frontId);

$args = array(
    'post_type' => 'coach',
    'posts_per_page' => 999,
    'orderby' => 'date',
    'order' => 'DESC',
);
$coaches = new WP_Query($args);


/* Template Name: Coaches overview Page */ ?>

<?php get_header(); ?>

<main class="coaches-overview">

    <div class="coaches">

        <?Php if ($title) : ?>
            <div class="section-title container">
                <h2><?= $title ?></h2>
            </div>
        <?php endif ?>
        <div class="coaches-blocks">
            <?php if ($coaches->have_posts()) :

                while ($coaches->have_posts()) {

                    $coaches->the_post(); ?>
                    <div class="classes-content container">
                        <div class="front-coach-img">
                            <div class="img-content <?= get_field('bg_image_color', get_the_ID()) ?>">
                                <?= wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'full', false, []);
                                ?>
                            </div>

                        </div>
                        <div class="front-coach-content">
                            <h3><?= get_the_title() ?></h3>
                            <div class="nav-btn"></div>
                            <div class="description">
                                <?= get_field('description_text', get_the_ID()) ?>
                            </div>

                            <?php if ($topStudentTitle) : ?>
                                <h4><?= $topStudentTitle ?></h4>
                            <?php endif;
                            $topStudents = get_field('choose_students', get_the_ID());

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

            <?php  }
            endif;
            wp_reset_query();
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>