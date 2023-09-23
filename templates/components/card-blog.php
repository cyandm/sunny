<?php
$post_id = '';
if ($args['id']) {
    $post_id = $args['id'];
}

$str = get_the_content($post_id);
$string = preg_replace('/\s+/', ' ', trim($str));
$countWords = count(explode(" ", $str));
$studyTime = $countWords / 200;

?>
<div class="cart-blog">
    <div class="img-cart-blog">
        <a href="<?php the_permalink($post_id) ?>">

            <?php $thumbnail_id = get_post_thumbnail_id($post_id); ?>
            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
        </a>
    </div>
    <div class="content-cart-blog">
        <a href="<?php the_permalink($post_id) ?>">
            <h3><?= get_the_title($post_id); ?></h3>
        </a>

        <div class="description">
            <?php the_excerpt($post_id); ?>
        </div>
    </div>
    <div class="info-cart-blog">
        <p class="study-time">زمان مطالعه <span><?= round($studyTime); ?></span> دقیقه</p>


        <div class="blog-date"> <?= get_the_date('Y/m/d', $post_id); ?></div>
    </div>
</div>