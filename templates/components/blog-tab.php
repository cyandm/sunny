<?php
$frontId = get_option('page_on_front');
$categories = get_field('choose_category', $frontId);

$blog_page_id = get_posts([
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/blogs.php'
]);
?>

<div class="blog-tab">

    <?php
    if (get_queried_object_id() == $blog_page_id[0] || get_queried_object()->taxonomy == 'category') : ?>
        <ul>
            <?php
            $key = 1;
            foreach ($categories as $cat) : ?>
                <li class="category-tab <?= ($key == 1) ? 'active-cat' : ''; ?>" data-slug="<?= $cat->slug ?>">

                    <a href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></a>
                </li>
            <?php $key++;
            endforeach; ?>
        </ul>
    <?php
        get_template_part('templates/components/search-form', null, ['menu-mobile' => false]);

    else : ?>
        <ul>
            <?php
            $key = 1;
            foreach ($categories as $cat) : ?>
                <li class="category-tab <?= ($key == 1) ? 'active-cat' : ''; ?>" data-slug="<?= $cat->slug ?>">
                    <?= $cat->name ?>
                </li>
            <?php $key++;
            endforeach; ?>
        </ul>
    <?php
    endif; ?>



</div>

<!-- ---------------------------------------mobile tab -->

<div class="blog-tab-mobile"> <?php
                                if (get_queried_object_id() == $blog_page_id[0]) :
                                    get_template_part('templates/components/search-form', null, ['menu-mobile' => false]);
                                endif; ?>


    <select name="" id="cat-select-mobile" class="cat-select-mobile">
        <?php
        $key = 1;
        foreach ($categories as $cat) : ?>
            <option value="<?= $cat->slug ?>"><?= $cat->name ?></option>
        <?php $key++;
        endforeach; ?>
    </select>
</div>