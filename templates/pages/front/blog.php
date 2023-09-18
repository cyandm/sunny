<?php
$frontId = get_option('page_on_front');
$title = get_field('blog_section_title', $frontId);
$btnTitle = get_field('blog_section_btn_title', $frontId);
$btnLink = get_field('blog_section_link_btn', $frontId);
$categories = get_field('choose_category', $frontId);
?>

<section id="blog" class="blog-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="section-title">
                <h2><?= esc_html($title) ?></h2>
                <?php if ($btnTitle && $btnLink) : ?>
                    <a href="<?= esc_url($btnLink) ?>"><?= esc_html($btnTitle) ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="front-blog-content">
            <?php get_template_part('./templates/components/blog-tab'); ?>

            <article>
                <?php
                $num = 1;
                foreach ($categories as $cat) :
                    $termID = $cat->term_id;
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'tax_query' => [
                            [
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => $termID,
                                'operator' => 'IN',
                            ],
                        ],
                    ];
                    $allBlogs = new WP_Query($args);

                    if ($allBlogs->have_posts()) :
                        ?>
                        <div class="row-blog <?= esc_attr($cat->slug) ?> <?= ($num === 1) ? 'active-blogs' : ''; ?>">
                            <?php while ($allBlogs->have_posts()) :
                                $allBlogs->the_post();
                                get_template_part(
                                    '/templates/components/card-blog',
                                    null,
                                    ['id' => get_the_ID()]
                                );
                            endwhile; ?>
                        </div>
                    <?php endif;
                    $num++;
                endforeach;
                ?>
            </article>
        </div>
        <div class="breadcrumb-btn">
            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
            <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</section>
