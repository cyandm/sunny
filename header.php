<?php $frontId = get_option('page_on_front'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <header class= "<?= (is_front_page() || is_category('category')) ? 'header-white' : '' ?>">
        <div class="container header-large-view">
            <div class="menu-column">
                <?php the_custom_logo() ?>
                <?php wp_nav_menu(['theme_location' => 'header']);
                ?>
            </div>
            <div class="btn-column">
                <?php get_template_part('templates/components/search-form'); ?>
                <a href="" class="sing-up-btn"><i class="icon-note-book"></i>ثبت نام آنلاین</a>
                <a href="" class="profile-btn"><i class="icon-user"></i></a>

            </div>
        </div>

        <div class="container header-mobile">
            <div class="hamburger-menu">

                <i class="icon-hamberger"></i>
            </div>
            <div class="mobile-menu">
                <div class="mobile-menu-detail">
                    <div class="logo-close-btn">
                        <?php get_template_part('templates/components/search-form'); ?>
                        <div class="mobile-logo-contain">
                            <?php the_custom_logo() ?>
                        </div>
                        <div class="icon-close-div">
                            <i class="icon-close" id="close-menu"></i>
                        </div>
                    </div>
                    <div class="menu-contain">
                        <?php wp_nav_menu(['theme_location' => 'header']); ?>

                    </div>
                    <?php get_template_part('templates/components/footer-social'); ?>
                </div>
            </div>


            <div class="btn-contain">

            </div>
        </div>
    </header>