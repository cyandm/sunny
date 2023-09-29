<?php
$pageId = get_queried_object_id();
$mainTitle = get_field('course_main_title', $pageId);
$tickerTitle = get_field('ticker_title', $pageId);
$tickerSubTitle = get_field('ticker_sub_title', $pageId);
$tickers = get_field('ticker_title_group', $pageId);

$args = array(
    'post_type' => 'course',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$courses = get_posts($args);



/* Template Name: Course overview Page */ ?>

<?php get_header(); ?>

<main class="course-overview-page" id="course-page">

    <?php get_template_part('templates/pages/course/course-hero'); ?>
    <div class="all-course-overview container">
        <?Php if ($mainTitle) : ?>
            <div class="section-title">
                <h2><?= $mainTitle ?></h2>
            </div>
        <?php endif ?>
        <div class="course-row">
            <?php
            foreach ($courses as $course):

                get_template_part(
                    'templates/pages/course/course-block',
                    null,
                    ['id' => $course->ID]
                );

            endforeach;
            ?>

        </div>

        </div>
        <div class="ticker-section container">
            <?Php if ($tickerTitle) : ?>
                <div class="section-title-sub">
                    <h2><?= $tickerTitle ?></h2>
                    <span><?= $tickerSubTitle ?></span>
                </div>
            <?php endif;

            if ($tickers):?>

                <div class="ticker">
                    <ul>
                        <?php foreach ($tickers as $ticker): ?>
                            <li><span><?= $ticker['ticker_title'] ?></span><i class="icon-arrow-right"></i></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </main>

<?php get_footer(); ?>




