<?php
$pageId = get_queried_object_id();

$image = get_field('course_hero_img', $pageId);
$imageTitle1 = get_field('image_title_1', $pageId);
$imageTitle2 = get_field('image_title_2', $pageId);
$imageTitle3 = get_field('image_title_3', $pageId);

$courseHeroTitle = get_field('course_hero_title', $pageId);
$courseHeroDescription = get_field('course_hero_description', $pageId);

$btnTitle = get_field('course_hero_title_btn', $pageId);
$btnLink = get_field('course_hero_link_btn', $pageId);

?>

<div class="course-hero container">
    <div class="image-animate">
        <span class="img-title-1"><?= $imageTitle1 ?></span>
        <span class="img-title-2"><?=$imageTitle2 ?></span>
        <span class="img-title-3"><?= $imageTitle3 ?></span>

            <div class="bg"></div>

            <?= wp_get_attachment_image($image, 'full', false, []); ?>


    </div>
    <div class="hero-content">
        <?php if ($courseHeroTitle): ?>
            <h1><?= $courseHeroTitle ?></h1>
        <?php endif;
        if ($courseHeroDescription): ?>
            <p class="description"><?= $courseHeroDescription ?></p>
        <?php endif; ?>
        <div class="hero-btn">
            <a href="<?= $btnLink ?>"><i class="icon-arrow-right"></i><?= $btnTitle ?></a>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="158" height="228" viewBox="0 0 158 228" fill="none">
        <path d="M58.0221 1.72915C-34.7128 46.1733 1.36423 148.947 58.0218 163.773C141.143 185.525 157.564 101.827 110.543 85.6128C70.239 71.715 14.5504 161.405 96.2143 205.102C118.179 216.855 156.693 226.063 156.693 226.063" stroke="#0B68DF" stroke-width="2" stroke-linecap="round"/>
    </svg>
</div>