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
            function func_register_post_type($name, $slug, $icon, $menu)
            {
                $labels = array(
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
                );
                $args = [
                    'labels' => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui' => true,
                    'show_in_menu' => $menu,
                    'query_var' => true,
                    'rewrite' => array('slug' => $slug),
                    'exclude_from_search' => false,
                    'has_archive' => true,
                    'hierarchical' => false,
//                    'menu_position' = null,
                    'menu_icon' => $icon,
                    'supports' => array('title', 'editor', 'thumbnail')
                ];

                register_post_type($slug, $args);
            }


            /***************************** register faq post type */
            $faqName = "سوالات متداول";
            $faqSlug = "faq";
            $faqIcon = "dashicons-editor-help";
            $menu = true;
            func_register_post_type($faqName, $faqSlug, $faqIcon, $menu);

            /***************************** register Testimonial post type */
            $testimonialName = "نظرهمراه";
            $testimonialSlug = "testimonial";
            $testimonialIcon = "dashicons-format-quote";
            $menu = 'edit-comments.php';
            func_register_post_type($testimonialName, $testimonialSlug, $testimonialIcon, $menu);

            /***************************** register Course post type */
            $courseName = "دوره";
            $courseSlug = "course";
            $courseIcon = "dashicons-album";
            $menu = 'custom_club_affairs_menu';
            func_register_post_type($courseName, $courseSlug, $courseIcon, $menu);

            // **************************************register Coach post type
            $coachName = "مربی";
            $coachSlug = "coach";
            $coachIcon = "dashicons-businessman";
            func_register_post_type($coachName, $coachSlug, $coachIcon, $menu);

            /***************************** register student post type */
            $studentName = "هنرجو";
            $studentSlug = "student";
            $studentIcon = "dashicons-id";
            func_register_post_type($studentName, $studentSlug, $studentIcon, $menu);

            //***************************** register contact form post type
            $contactFormName = 'فرم تماس با ما';
            $contactFormSlug = "contact_form";
            $contactFormIcon = "dashicons-email-alt";
            $menu = 'custom_form_menu';
            func_register_post_type($contactFormName, $contactFormSlug, $contactFormIcon, $menu);

            //***************************** register course form post type
            $courseFormName = 'فرم ثبت نام ';
            $courseFormSlug = "course_form";
            $courseFormIcon = "dashicons-email-alt2";
            func_register_post_type($courseFormName, $courseFormSlug, $courseFormIcon, $menu);
        }


    }
}
