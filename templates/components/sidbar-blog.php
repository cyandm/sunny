<?php
$post_id = get_queried_object_id();
$currentCat = get_the_category($post_id);
?>
<div class="sidebar">
    <?php
    $post = get_post($post_id); ?>
    <?php if ($post->post_content) : ?>
        <div class="quick-access">
            <h4>در این مقاله خواهید خواند</h4>
            <ul class="scroll-list">

            </ul>
        </div>
    <?php endif;
    ?>
    <div class="sidbar-main-content">
        <?php
        // search-blog-form template
        get_template_part(
            'templates/components/search-blog-form',
            null,
        ); ?>
        <div class="categories-side">
            <h5>دسته بندی ها </h5>
            <?php get_template_part(
                'templates/components/category-list',
                null,
            ); ?>
        </div>
        <h5>بیشتر خوانده شده </h5>
        <?php
        $args = [
            'post_type' => 'post',
            'posts_per_page' => 99999,
            'tag' => 'special',
            'tax_query' =>
            [
                'taxonomy' => 'category',
                'terms' => $currentCat[0]->term_id,
                'field' => 'id',
            ],
        ];
        $blogs = get_posts($args);

        if (is_array($blogs) && count($blogs) > 0) : ?>
            <div class="pin-blog-sidebar">
                <?php foreach ($blogs as $blog) :
                    set_query_var('id', $blog->ID);
                    get_template_part(
                        'templates/components/pin-blog-cart',
                        null,
                    );
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>