<?php
$frontId = get_option('page_on_front');

$title = get_field('pakage_section_title', $frontId);
$btnTitle = get_field('pakage_section_btn_title', $frontId);
$btnLink = get_field('pakage_section_btn_link', $frontId);

$courses = get_field('choose_pakages', $frontId);
?>

<div id="package" class="swiper-slide package-content">
    <div class="container">
        <?Php if ($title) : ?>
            <div class="section-title">
                <h2><?= $title ?></h2>
                <?Php if ($btnTitle) : ?>
                    <a href="<?= $btnLink ?>"><?= $btnTitle ?></a>
                <?php endif ?>
            </div>
        <?php endif ?>
        <?php if (is_array($courses) && count($courses) > 0) : ?>
            <div class="package-content">

                <?php
                foreach ($courses as $course) :
                    get_template_part(
                        '/templates/components/card-course',
                        null,
                        ['id' => $course->ID]

                    );
                endforeach;
                ?>

            </div>
        <?php endif; ?>
        <div class="breadcrumb-btn">
            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
            <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</div>