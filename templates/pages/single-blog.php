<?php
$post_id = get_queried_object_id();
$blog = get_post($post_id);

$currentCat = get_the_category($post_id);

$blogs = get_field('choose_course-blog', $post_id);
?>
<main class="main single-blog">
    <section class="single-blog">
        <div class="container main-container">

            <div class="blog-content ">
                <?php
                get_template_part(
                    'templates/components/sidebar-blog',
                    null,
                );
                ?>
                <div class="all-content container">
                    <h1 class="h2"><?= get_the_title($post_id) ?></h1>
                    <div class="blog-img-single">
                        <?= wp_get_attachment_image(get_field('blog_main_img', $post_id), 'full', false, []); ?>
                    </div>

                    <?php if ($blog->post_content) : ?>
                        <div class="content-single" id="content-single">
                            <?= get_the_content(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="blog-comments">
                        <div class="single-comment-number">
                            <h6><span> <?php echo get_comments_number($post_id); ?></span> دیدگاه</h6>
                        </div>
                        <?php comments_template(); ?>
                    </div>
                    <?php
                    if (is_array($blogs) && count($blogs) > 0) : ?>
                        <div class="mobile-recommended-blogs">
                            <h5>شاید بپسندید</h5>

                            <div class="pin-blog-sidebar">
                                <?php foreach ($blogs as $blog) :
                                    set_query_var('id', $blog->ID);
                                    get_template_part(
                                        'templates/components/card-blog',
                                        null,
                                    );
                                endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>