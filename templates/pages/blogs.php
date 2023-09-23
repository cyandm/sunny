<?php
$pageId = get_queried_object_id();
$blogSliders = get_field('blog_overview_hero_section', $pageId);
$categories = get_terms(
    array(
        'taxonomy' => 'category',
        'hide_empty' => false
    )
);


/* Template Name: blogs overview Page */ ?>

<?php get_header(); ?>

<main id="blogs-overview" class="blogs-overview-page">

    <?php if ($blogSliders['hero_slider_1']['hero_slider_image']) : ?>

        <div class="blog-page-slider swiper-container">
            <div class="swiper-wrapper">

                <?php foreach ($blogSliders as $slide) : ?>
                    <div class="swiper-slide blog-slide">
                        <div class="content">
                            <div class="blog-hero-title">
                                <h1><?= $slide['hero_slider_title'] ?></h1>
                                <h4><?= $slide['hero_title_sub_title'] ?></h4>
                                <p class="description-slide"><?= $slide['slider_description'] ?></p>
                                <a href="<?= $slide['btn_page_link'] ?>" class="btn-link">مشاهده آموزش</a>
                            </div>
                            <div class="image-box">
                                <div class="blog-circle"></div>
                                <?= wp_get_attachment_image($slide['hero_slider_image'], 'full', false, []); ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif ?>

    <div class="blog-section">
        <div class="container">

            <div class="front-blog-content overview-blog-content">
                <?php
                get_template_part('./templates/components/blog-tab');
                ?>
                <article class="blogs-row">

                    <?php
                    $num = 1;
                    foreach ($categories as $cat) :

                        $termID = $cat->term_id;
                        $Args = [
                            'post_type' => "post",
                            'posts_per_page' => 2,
                            'tax_query' => [
                                [
                                    'taxonomy' => 'category',
                                    'field'    => 'term_id',
                                    'terms'     => $termID,
                                    'operator'  => 'IN'
                                ]
                            ]
                        ];
                        $allBlogs = new WP_Query($Args); ?>
                        <div class="blog-page-row-blog <?= $cat->slug ?> <?= ($num == 1) ? 'active-blogs' : ''; ?>">

                            <?php
                            if ($allBlogs->have_posts()) : ?>
                                <div class="row-blog active-blogs ">
                                    <?php while ($allBlogs->have_posts()) {
                                        $allBlogs->the_post();

                                        get_template_part(
                                            '/templates/components/card-blog',
                                            null,
                                            ['id' => get_the_ID()]
                                        );
                                    } ?>

                                </div>
                            <?php
                                echo '<div class="pagination">';
                                echo paginate_links(array(
                                    'total' => $allBlogs->max_num_pages,
                                    'current' => $paged,
                                    'prev_text' => false,
                                    'next_text' => false,
                                    'end_size' => 1,
                                    'mid_size' => 1,
                                ));
                                echo '</div>';
                            else :
                                get_template_part(
                                    'templates/components/empty-overview',
                                    null,
                                );
                            endif;
                            wp_reset_query();
                            ?>
                        </div>
                    <?php
                        $num++;
                    endforeach;
                    ?>
            </div>

            </article>
        </div>
    </div>
</main>
<?php get_footer(); ?>