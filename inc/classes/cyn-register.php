<?php

if (!class_exists('cyn_register')) {
    class cyn_register
    {
        function __construct()
        {
            add_action('init', [$this, 'cyn_post_type_register']);
            add_action('init', [$this, 'cyn_register_admin_menu']);
        }

        //**************************************** add menu in admin menu
        public function cyn_register_admin_menu()
        {
            function cyn_add_custom_menus()
            {

                add_menu_page(
                    'فرم ها',
                    'فرم ها',
                    'manage_options',
                    'custom_form_menu',
                    'custom_form_callback',
                    'dashicons-editor-help',
                    25

                );

                add_menu_page(
                    'امور باشگاه',
                    'امور باشگاه',
                    'manage_options',
                    'custom_club_affairs_menu',
                    'custom_club_affairs_callback',
                    'dashicons-groups',
                    26

                );
            }

            function custom_form_callback()
            {

                echo '<h2>فرم ها</h2>';
            }


            add_action('admin_menu', 'cyn_add_custom_menus');
        }

        //************************************ register post type
        public function cyn_post_type_register()
        {
            function cyn_register_post_type($name, $slug, $icon, $menu)
            {
                $labels = [
                    'name' => $name,
                    'singular_name' => $name,
                    'menu_name' => $name,
                    'name_admin_bar' => $name,
                    'add_new' => 'افزودن ' . $name,
                    'add_new_item' => 'افزودن ' . $name . ' جدید',
                    'new_item' => $name . ' جدید',
                    'edit_item' => 'ویرایش ' . $name,
                    'view_item' => 'دیدن ' . $name,
                    'all_items' => 'همه ' . $name . ' ها',
                    'search_items' => 'جستجو ' . $name,
                    'not_found' => $name . ' پیدا نشد',
                    'not_found_in_trash' => $name . ' پیدا نشد'
                ];

                $args = [
                    'labels' => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui' => true,
                    'show_in_menu' => $menu,
                    'query_var' => true,
                    'rewrite' => ['slug' => $slug],
                    'exclude_from_search' => false,
                    'has_archive' => true,
                    'hierarchical' => false,
                    //                    'menu_position' = null,
                    'menu_icon' => $icon,
                    'supports' => ['title', 'editor', 'thumbnail'],

                ];


                register_post_type($slug, $args);
            }


            /***************************** register faq post type */
            cyn_register_post_type("سوالات متداول", "faq", "dashicons-editor-help", true);

            /***************************** register Testimonial post type */
            cyn_register_post_type("نظرهمراه", "testimonial", "dashicons-format-quote", 'edit-comments.php');

            /***************************** register Course post type */
            cyn_register_post_type("دوره", "course", "dashicons-album", "custom_club_affairs_menu");

            // **************************************register Coach post type
            cyn_register_post_type("مربی", "coach", "dashicons-businessman", "custom_club_affairs_menu");

            /***************************** register student post type */
            cyn_register_post_type("هنرجو", "student", "dashicons-id", "custom_club_affairs_menu");

            //***************************** register contact form post type
            cyn_register_post_type(" فرم تماس با ما", "contact_form", "dashicons-email-alt", "custom_form_menu");

            //***************************** register course form post type
            cyn_register_post_type("فرم ثبت نام ", "course_form", "dashicons-email-alt2", "custom_form_menu");
        }
    }
}
