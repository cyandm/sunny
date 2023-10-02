<?php
$pageId = get_queried_object_id();
$mainTitle = get_field('course_main_title', $pageId);
$tickerTitle = get_field('ticker_title', $pageId);
$tickerSubTitle = get_field('ticker_sub_title', $pageId);
$tickers = get_field('ticker_text_slider', $pageId);

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
    <div class="all-course-overview">
        <?Php if ($mainTitle) : ?>
            <div class="section-title">
                <h2><?= $mainTitle ?></h2>
            </div>
        <?php endif ?>
        <div class="course-row">
            <?php
            foreach ($courses as $course) :

                get_template_part(
                    'templates/pages/course/course-block',
                    null,
                    ['id' => $course->ID]
                );

            endforeach;
            ?>

        </div>

    </div>
    <div class="ticker-section">
        <?Php if ($tickerTitle) : ?>
            <div class="section-title-sub">
                <h2><?= $tickerTitle ?></h2>
                <span><?= $tickerSubTitle ?></span>
            </div>
        <?php endif;

        if ($tickers) : ?>

            <div class="ticker ticker-container">
                <ul class="ticker-custom">
                    <?php foreach ($tickers as $ticker) :
                        if ($ticker != '') : ?>
                            <li><span><?= $ticker ?></span><i class="icon-arrow-right"></i></li>
                    <?php
                        endif;
                    endforeach; ?>
                    <?php foreach ($tickers as $ticker) :
                        if ($ticker != '') : ?>
                            <li><span><?= $ticker ?></span><i class="icon-arrow-right"></i></li>
                    <?php
                        endif;
                    endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>