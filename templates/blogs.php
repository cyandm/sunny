<?php
/* Template Name: blogs overview Page */ ?>

<?php get_header(); ?>

<main id="blogs-overview" class="blogs-overview-page">
    <div class="blogs-hero-section">
        <div class="blog-hero-slider swiper-container">
            <div class="swiper-slider"></div>
        </div>
    </div>
    </div>




    <div id="blog" class="swiper-slide blog-section">
        <div class="container">
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
                            <div class="row-blog <?= $cat->slug ?> <?= ($num == 1) ? 'active-blogs' : ''; ?>">
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

            </article>
        </div>
    </div>
</main>