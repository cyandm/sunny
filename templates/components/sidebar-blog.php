<?php
$post_id = get_queried_object_id();
$currentCat = get_the_category($post_id);
$blogs = get_field('choose_recommended_blog', $post_id);

$blog_page_id = get_posts([
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/blogs.php'
]);

$post = get_post($post_id);

?>
<div class="sidebar">
    <a href="<?= get_permalink($blog_page_id[0]) ?>" class="back-btn" id="back-btn"><i class="icon-arrow-right"></i></a>
    <div class="search-cat">
        <?php
        // search-blog-form template
        get_template_part(
            'templates/components/search-form'
            , null, ['menu-mobile' => false]
        ); ?>


        <?php get_template_part(
            'templates/components/category-list',
            null,
        ); ?>

    </div>


    <?php if ($post->post_content) : ?>
        <div class="quick-access">
            <h4>در این مقاله خواهید خواند</h4>
            <ul class="scroll-list">

            </ul>
        </div>
    <?php endif;

    if (is_array($blogs) && count($blogs) > 0) : ?>
        <div class="recommended-blogs">
            <h5>شاید بپسندید</h5>

            <div class="pin-blog-sidebar">
                <?php foreach ($blogs as $blog) :
                    get_template_part(
                        'templates/components/card-blog',
                        null,
                        ['id' => $blog->ID]
                    );
                endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</div>