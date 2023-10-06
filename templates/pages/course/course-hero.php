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
<div class="overly first"></div>
<div class="overly second"></div>
<div class="overly third"></div>
<div class="course-hero container">

    <div class="image-animate">
        <span class="img-title-animation img-title-1"><?= $imageTitle1 ?></span>
        <span class="img-title-animation img-title-2"><?= $imageTitle2 ?></span>
        <span class="img-title-animation img-title-3"><?= $imageTitle3 ?></span>

        <div class="bg bg-top-radius"></div>

        <?= wp_get_attachment_image($image, 'full', false, []); ?>
    </div>
    <div class="hero-content">


        <?php if ($courseHeroTitle) : ?>
            <h1><?= $courseHeroTitle ?></h1>
        <?php endif;
        if ($courseHeroDescription) : ?>
            <p class="description"><?= $courseHeroDescription ?></p>
        <?php endif; ?>

        <span class="star-svg"> <svg xmlns="http://www.w3.org/2000/svg" width="70" height="74" viewBox="0 0 70 74" fill="none">
                <path d="M17.6224 44.7611C19.4056 44.2389 21.6504 43.8839 25.5944 39.9575C28.4373 37.1274 29.38 28.8825 29.5538 21.9965C29.6165 28.429 30.4196 32.6478 30.7343 34.0053C31.1258 35.6944 32.1399 39.5816 34.4056 41.4195C37.2378 43.7168 39.7552 44.4478 43.3217 45.1788C46.1748 45.7635 55.6294 46.2578 60 46.4319C58.1469 46.4667 53.2238 46.5781 48.3566 46.7451C43.4895 46.9122 39.6154 48.0678 38.2867 48.6248C36.9231 49.2513 33.7343 51.2772 31.8881 54.3681C30.042 57.4591 29.3706 68.744 29.2657 74C29.1608 70.7976 28.7413 64.6018 28.7413 64.2885C28.7413 63.9752 29.4755 56.4566 25.3846 52.1752C21.2937 47.8938 18.6713 47.8938 15.9441 47.3717C13.8497 46.9707 4.8312 46.2539 0.286559 46.028C0.162801 46.0234 0.0677483 46.0187 0 46.0142C0.0933799 46.0186 0.188937 46.0232 0.286559 46.028C1.12088 46.0594 3.25982 46.0869 7.13287 46.0142C11.5804 45.9306 15.979 45.144 17.6224 44.7611Z" fill="#FFF48D" />
                <path d="M44.5734 17.6549C45.6434 17.3451 46.9902 17.1345 49.3566 14.8053C51.0624 13.1264 51.628 8.2354 51.7323 4.15044C51.7699 7.96637 52.2517 10.469 52.4406 11.2743C52.6755 12.2763 53.2839 14.5823 54.6434 15.6726C56.3427 17.0354 57.8531 17.469 59.993 17.9027C61.7049 18.2496 67.3776 18.5428 70 18.646C68.8881 18.6667 65.9343 18.7327 63.014 18.8319C60.0937 18.931 57.7692 19.6165 56.972 19.9469C56.1538 20.3186 54.2406 21.5204 53.1329 23.354C52.0252 25.1876 51.6224 31.882 51.5594 35C51.4965 33.1003 51.2448 29.4248 51.2448 29.2389C51.2448 29.0531 51.6853 24.5929 49.2308 22.0531C46.7762 19.5133 45.2028 19.5133 43.5664 19.2035C42.3098 18.9657 36.8987 18.5405 34.1719 18.4065C34.0977 18.4037 34.0406 18.4009 34 18.3982C34.056 18.4008 34.1134 18.4036 34.1719 18.4065C34.6725 18.425 35.9559 18.4414 38.2797 18.3982C40.9483 18.3487 43.5874 17.882 44.5734 17.6549Z" fill="#FFF48D" />
            </svg></span>
        <div class="hero-btn">
            <a href="<?= $btnLink ?>"><i class="icon-arrow-right"></i><?= $btnTitle ?></a>
        </div>
    </div>
    <span class="line-svg">
  <svg xmlns="http://www.w3.org/2000/svg" width="77" height="113" viewBox="0 0 77 113" fill="none">
    <path id="arrowPath" d="M31.1391 4.63865C-8.95528 23.8543 6.64279 68.2888 31.1389 74.6992C67.0765 84.1035 74.1764 47.9163 53.8467 40.9061C36.4211 34.8973 12.3439 73.6754 47.6516 92.5678C57.1482 97.6492 73.7999 101.63 73.7999 101.63" stroke="#0B68DF" stroke-width="2" stroke-linecap="round" />
    <path id="arrowHead" d="M62.6121 105.689C66.685 103.598 70.8285 101.852 75.8942 102.438C71.4809 100.639 69.037 94.838 68.4728 92.0733" stroke="#0B68DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
</svg>
    </span>

</div>