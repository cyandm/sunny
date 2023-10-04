<?php
$pageId = get_queried_object_id();
$categories = get_terms(
    array(
        'taxonomy' => 'category',
        'hide_empty' => false
    )
);


/* Template Name: blogs overview Page */ ?>

<?php get_header(); ?>

<main id="blogs-overview" class="blogs-overview-page">

    <?php
    get_template_part('templates/pages/blog/hero-blog');
    ?>

    <div class="blog-section">
        <div class="container">

            <div class="front-blog-content overview-blog-content">
                <?php
                get_template_part('./templates/components/blog-tab');
                ?>
                <article class="blogs-row">

                    <?php
                    $num = 1;
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    foreach ($categories as $cat) :

                        $termID = $cat->term_id;
                        $Args = [
                            'post_type' => "post",
                            'posts_per_page' => 2,
                            'paged' => $paged,
                            'tax_query' => [
                                [
                                    'taxonomy' => 'category',
                                    'field'    => 'term_id',
                                    'terms'     => $termID,
                                    'operator'  => 'IN'
                                ]
                            ]
                        ];;
                        $allBlogs = new WP_Query($Args); ?>
                        <div class="blog-page-row-blog <?= $cat->slug ?> <?= ($num == 1) ? 'active-blogs' : ''; ?>">

                            <?php
                            if ($allBlogs->have_posts()) : ?>
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