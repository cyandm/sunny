<?php
$menuMobile = '';
if ($args['menu-mobile']) {
    $menuMobile = $args['menu-mobile'];
}
?>
<div class="form-search <?= ($menuMobile)?'menu-mobile':''?>">
    <form role="search" method="get" id="searchform" action="<?= get_bloginfo('url') ?>">
        <div>
            <i class="icon-search"></i>

            <input type="text" value="" name="s" id="s" placeholder="جستجو سریع">
        </div>
    </form>
</div>