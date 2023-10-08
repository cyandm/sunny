<?php
$frontId = get_option('page_on_front');
$title = get_field('blog_section_title', $frontId);
$btnTitle = get_field('blog_section_btn_title', $frontId);
$btnLink = get_field('blog_section_link_btn', $frontId);
$categories = get_field('choose_category', $frontId);
?>

<div id="blog-section" class="swiper-slide blog-section">
    <div class="container  padding-top">
        <?Php if ($title) : ?>
            <div class="section-title">
                <h2><?= $title ?></h2>
                <?Php if ($btnTitle) : ?>
                    <a href="<?= $btnLink ?>"><?= $btnTitle ?></a>
                <?php endif ?>
            </div>
        <?php endif ?>

        <div class="front-blog-content">
            <?php
            get_template_part('./templates/components/blog-tab');
            ?>
            <article>
                <?php
                $num = 1;
                foreach ($categories as $cat) :

                    $termID = $cat->term_id;
                    $Args = [
                        'post_type' => "post",
                        'posts_per_page' => 3,
                        'tax_query' => [
                            [
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'     => $termID,
                                'operator'  => 'IN'
                            ]
                        ]
                    ];
                    $allBlogs = new WP_Query($Args);

                    if ($allBlogs->have_posts()) : ?>
                        <div class="row-blog row-blog-front <?= $cat->slug ?> <?= ($num == 1) ? 'active-blogs' : ''; ?>">
                            <?php while ($allBlogs->have_posts()) {
                                $allBlogs->the_post();

                                get_template_part(
                                    '/templates/components/card-blog',
                                    null,
                                    ['id' => get_the_ID()]
                                );
                            } ?>

                        </div>
                    <?php endif;  ?>
                <?php
                    $num++;
                endforeach; ?>
        </div>
        <div class="breadcrumb-btn">
            <a href="" class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i> نظر همراهان</a>
            <a href="" class="btn-left home-main-slider-prev"> <i class="icon-arrow-side-left"></i>سوالات متداول</a>
        </div>


        <?Php if ($btnTitle) : ?>
            <div class="section-btn">
                <a href="<?= $btnLink ?>"><?= $btnTitle ?></a>
            </div>
        <?php endif ?>

        </article>
    </div>
</div>