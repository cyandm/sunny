<?php
if (!class_exists('cyn_form')) {
    class cyn_form
    {
        function __construct()
        {
            add_action('init', [$this, 'cyn_course_form_admin_view']);
            add_action('init', [$this, 'cyn_contact_form_admin_view']);
        }

        public function cyn_course_form_admin_view()
        {
            add_filter('manage_course_form_posts_columns', 'course_filter_posts_columns');
            function course_filter_posts_columns($columns)
            {
                $columns['name'] = __('نام هنرجو');
                $columns['last_name'] = __('نام خانوادگی', 'smashing');
                $columns['tel'] = __('شماره تماس', 'smashing');
                $columns['birth_day'] = __('تاریخ تولد', 'smashing');
                $columns['course_name'] = __('نام دوره ثبت نام شده ', 'smashing');
                return $columns;
            }

            add_action('manage_course_form_posts_custom_column', 'course_course_form_column', 10, 2);
            function course_course_form_column($column, $post_id)
            {
                $registrationData = get_post_meta($post_id, 'course_registration_info', true);

                if ($column === 'name') {
                    echo $registrationData['name'];
                } elseif ($column === 'last_name') {
                    echo $registrationData['last_name'];
                } elseif ($column === 'tel') {
                    echo $registrationData['phone'];
                } elseif ($column === 'birth_day') {
                    echo $registrationData['date'];
                } elseif ($column === 'course_name') {
                    echo get_the_title($registrationData['course_id']);
                }
            }
        }

        public function cyn_contact_form_admin_view()
        {
            add_filter('manage_contact_form_posts_columns', 'callback_filter_posts_columns');
            function callback_filter_posts_columns($columns)
            {
                $columns['name'] = __('نام ارسال کننده پیام ');
                $columns['email'] = __(' ایمیل');
                $columns['message'] = __('متن پیام ارسالی ');
                return $columns;
            }

            add_action('manage_contact_form_posts_custom_column', 'callback_contact_form_column', 10, 2);
            function callback_contact_form_column($column, $post_id)
            {
                $contactFormInfo = get_post_meta($post_id, 'contact_form_info', true);

                if ($column === 'name') {
                    echo $contactFormInfo['name'];
                } elseif ($column === 'email') {
                    echo $contactFormInfo['email'];
                } elseif ($column === 'message') {
                    echo $contactFormInfo['message'];
                }
            }
        }
    }
}
