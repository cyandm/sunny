<?php
$post_id = get_queried_object_id();

$currentCat = get_the_category($post_id);

$terms = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false
));

$blog_page_id = get_posts([
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/blogs.php'
]);

 ?>


<!-- ------------------------------------for mobile view-->
<div class="cat-list-mobile">
    <select class="mobile-cat" id="mobile-category-list">
        <option id="all" value="<?= get_permalink($blog_page_id[0])?>">همه</option>
        <?php foreach ($terms as $key => $term) : ?>
            <?php if ($key < 8): ?>
                <option <?= ( $currentCat[0]->term_id == $term->term_id) ? 'selected' : '' ?> value="<?= get_term_link($term->term_id) ?>">
                    <?= $term->name ?></option>
            <?php
            endif;
        endforeach; ?>
    </select>
</div>

    <div class="categories-list">
        <ul>
            <li id="all" class=""><a href="<?= get_permalink($blog_page_id[0])?>">همه</a></li>
            <?php foreach ($terms as $key => $term) : ?>
                <?php if ($key < 8): ?>
                    <li class="<?= ($term->term_id == $currentCat[0]->term_id) ? 'active' : '' ?>"><a
                            href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a></li>
                <?php
                endif;
            endforeach; ?>
        </ul>
    </div>



