<?php
$title = get_field('blog_section_title', $frontId);




/* Template Name: Course overview Page */ ?>

<?php get_header(); ?>

<main class="course-overview-page" id="course-page">

    <?php get_template_part('templates/pages/course/hero'); ?>
    <div class="all-course-overview">
        <?Php if ($title) : ?>
            <div class="section-title">
                <h2><?= $title ?></h2>

            </div>
        <?php endif ?>
        <div class="course-row">

        </div>

    </div>
    <div class="ticker-section">
        <?Php if ($title) : ?>
            <div class="section-title-sub">
                <h2><?= $title ?></h2>
                <span>روی مقاله مد نظرت کلیک کن</span>
            </div>
        <?php endif ?>

        <div class="ticker">
            <ul>
                <li><span></span><i class="icon-arrow-right"></i></li>
            </ul>
        </div>
    </div>
</main>

<?php get_footer(); ?>