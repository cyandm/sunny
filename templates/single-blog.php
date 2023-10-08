<?php
$post_id = get_queried_object_id();
$blog = get_post($post_id);

$currentCat = get_the_category($post_id);
$post = get_post($post_id);

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


                <div class="all-content">
                    <h1><?= get_the_title($post_id) ?></h1>
                    <div class="blog-img-single">
                        <?php $thumbnail_id = get_post_thumbnail_id($post_id); ?>
                        <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
                    </div>

                    <!--                    mobile quick access-->
                    <?php if ($post->post_content) : ?>
                        <div class="quick-access">
                            <h4>در این مقاله خواهید خواند</h4>
                            <ul class="scroll-list-mobile">

                            </ul>
                        </div>
                    <?php endif;

                    if ($blog->post_content) : ?>

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

                </div>
            </div>
        </div>
    </section>
</main>