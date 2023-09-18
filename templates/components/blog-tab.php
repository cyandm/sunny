<?php $frontId = get_option('page_on_front');
$categories = get_field('choose_category', $frontId);
?>
<div class="blog-tab">
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
</div>

<!-- ---------------------------------------mobile tab -->

<div class="blog-tab-mobile">
    <select name="" id="cat-select-mobile">
        <?php
        $key = 1;
        foreach ($categories as $cat) : ?>
            <option value="<?= $cat->slug ?>"><?= $cat->name ?></option>
        <?php $key++;
        endforeach; ?>
    </select>
</div>