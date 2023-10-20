<?php $frontId = get_option('page_on_front');
$courses_page_id = get_posts([
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/course.php'
]);

$video_page_id = get_posts([
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/video-landing.php'
]);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    <script type='text/javascript'>
        var ajax_var = {
            url: `<?php echo admin_url('admin-ajax.php') ?>`,
            nonce: `<?php echo wp_create_nonce('ajax-nonce') ?>`
        }
    </script>
</head>

<body>
    <?php wp_body_open();

    $blog_page_id = get_posts([
        'post_type' => 'page',
        'fields' => 'ids',
        'nopaging' => true,
        'meta_key' => '_wp_page_template',
        'meta_value' => 'templates/blogs.php'
    ]);
    ?>

    <header class="<?= (is_front_page() || get_queried_object_id() == $blog_page_id[0] || get_queried_object()->taxonomy == 'category') ? '' : 'header-white' ?>">
        <div class="container header-large-view">
            <div class="menu-column">
                <?php the_custom_logo() ?>
                <?php wp_nav_menu(['theme_location' => 'header']);
                ?>
            </div>
            <div class="btn-column">
                <?php get_template_part('templates/components/search-form', null, ['menu-mobile' => false]); ?>
                <a href="<?= the_permalink($video_page_id[0]);?>" class="sing-up-btn"><i class="icon-play"></i>مشاهده ویدیوها</a>
                <a href="<?= the_permalink($courses_page_id[0]);?>#courses" class="profile-btn"><i class="icon-note-book"></i></a>

            </div>
        </div>

        <div class="container header-mobile">
            <div class="hamburger-menu">

                <i class="icon-hamberger"></i>
            </div>
            <div class="mobile-menu">
                <div class="mobile-menu-detail">
                    <div class="logo-close-btn">
                        <?php get_template_part('templates/components/search-form', null, ['menu-mobile' => true]); ?>
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

            <a href="" class="sing-up-btn"><i class="icon-note-book"></i>ثبت نام آنلاین</a>

        </div>
    </header>