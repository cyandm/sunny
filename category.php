<?php
$pageId = get_queried_object_id();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
    'post_type' => 'post',
    'posts_per_page' => 999,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'terms' => $pageId,
        ],
    ],
];

$allBlogs = new WP_Query($args);


/* Template Name: blogs overview Page */ ?>

<?php get_header(); ?>

<main id="blogs-overview" class="blogs-overview-page">

    <?php get_template_part('templates/pages/blog/hero-blog'); ?>
    <div class="blog-section">
        <div class="container">
            <div class="front-blog-content overview-blog-content">
                <?php
                get_template_part('./templates/components/blog-tab');
                if ($allBlogs->have_posts()) :
                ?>
                    <article class="blogs-row">
                        <div class="blog-page-row-blog ">

                            <div class="row-blog show-blog-page">
                                <?php while ($allBlogs->have_posts()) {
                                    $allBlogs->the_post();

                                    get_template_part(
                                        '/templates/components/card-blog',
                                        null,
                                        ['id' => get_the_ID()]
                                    );
                                } ?>

                            </div>

                        </div>

                    </article>
                <?php
                else :
                    get_template_part(
                        'templates/components/empty-overview',
                        null,
                    );
                endif;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>