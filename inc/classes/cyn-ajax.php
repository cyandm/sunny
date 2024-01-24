<?php

if (!class_exists('cyn_ajax')) {

    class cyn_ajax
    {

        function __construct()
        {
            add_action('wp_ajax_contact_form', [$this, 'handle_contact_form']);
            add_action('wp_ajax_nopriv_contact_form', [$this, 'handle_contact_form']);

            add_action('wp_ajax_course_form', [$this, 'course_form']);
            add_action('wp_ajax_nopriv_course_form', [$this, 'course_form']);

            add_action('wp_ajax_cyn_shopping_form', [$this, 'cyn_shopping_form']);
            add_action('wp_ajax_nopriv_cyn_shopping_form', [$this, 'cyn_shopping_form']);
        }



        public function handle_contact_form()
        {


            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {


                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                //sanitize
                $sanitized_username = sanitize_text_field($name);
                $sanitized_email = sanitize_email($email);
                $sanitized_comment = sanitize_text_field($message);

                // Put the sanitized fields into an array
                $sanitized_array = array(
                    'name' => $sanitized_username,
                    'email' => $sanitized_email,
                    'message' => $sanitized_comment
                );

                //                  check array
                if (!empty($sanitized_array['name']) && !empty($sanitized_array['email']) && !empty($sanitized_array['message'])) {

                    //----------------------------------------------------- contact page id

                    $contact_page_id = get_posts([
                        'post_type' => 'page',
                        'fields' => 'ids',
                        'nopaging' => true,
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/contact-us.php'
                    ]);


                    $adminEmail = get_field("website_email", $contact_page_id[0]);
                    $emailTemplate = get_field("email_template", $contact_page_id[0]);
                    $emailFrom = get_field("email_from", $contact_page_id[0]);
                    $placedEmail = $emailTemplate;

                    $placedEmail = str_replace("{name}", $sanitized_array['name'], $placedEmail);
                    $placedEmail = str_replace("{email}", $sanitized_array['email'], $placedEmail);
                    $placedEmail = str_replace("{message}", $sanitized_array['message'], $placedEmail);
                    $placedEmail = str_replace("{website}", get_bloginfo('name'), $placedEmail);


                    wp_insert_post([
                        'post_title' => $sanitized_array['name'] . " - " . $sanitized_array['email'],
                        'post_content' => $placedEmail,
                        'post_type' => 'contact_form',
                        'post_status' => 'private',
                        'post_author' => 1,
                        'meta_input' => [
                            'contact_form_info' => $sanitized_array,
                        ],
                    ]);

                    $headers[] = "Content-type: text/html; harset=iso-8859-1" . "\r\n";
                    $headers[] = "From: " . $emailFrom . " <no-reply@" . $_SERVER['SERVER_NAME'] . ">";
                    $headers[] = "MIME-Version: 1.0" . "\r\n";
                    //Admin email
                    wp_mail($adminEmail, $sanitized_array['name'] . " - " . $sanitized_array['email'], $placedEmail, $headers);
                    //Customer email
                    /*  wp_mail($inputs['email'], $inputs['name'] . " - " . $inputs['email'], $placedEmail, $headers);*/

                    wp_send_json([
                        'success' => true,
                        'message' => 'پیام با موفقیت ارسال شد. '
                    ]);
                } else {
                    // Error: One of the fields is empty

                    wp_send_json([
                        'success' => false,
                        'message' => 'has error',

                    ]);
                }
            } else {
                // Error: Data is not sent
                wp_send_json([
                    'success' => false,
                    'message' => 'Data is not sent',

                ]);
            }
        }


        public function course_form()
        {
            if (isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone']) && isset($_POST['date']) && isset($_POST['course_id'])) {


                $name = $_POST['name'];
                $lastName = $_POST['last_name'];
                $phone = $_POST['phone'];
                $date = $_POST['date'];
                $courseId = $_POST['course_id'];

                //sanitize
                $sanitized_name = sanitize_text_field($name);
                $sanitized_last_name = sanitize_text_field($lastName);
                $sanitized_phone = sanitize_text_field($phone);
                $sanitized_date = sanitize_text_field($date);
                $sanitized_course_id = absint($courseId); //      Sanitizes as a positive integer

                // Put the sanitized fields into an array
                $sanitized_array = [
                    'name' => $sanitized_name,
                    'last_name' => $sanitized_last_name,
                    'phone' => $sanitized_phone,
                    'date' => $sanitized_date,
                    'course_id' => $sanitized_course_id

                ];

                //                  check array
                if (!empty($sanitized_array['name']) && !empty($sanitized_array['last_name']) && !empty($sanitized_array['phone']) && !empty($sanitized_array['date']) && !empty($sanitized_array['course_id'])) {

                    //---------------------------contact page id
                    $contact_page_id = get_posts([
                        'post_type' => 'page',
                        'fields' => 'ids',
                        'nopaging' => true,
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/course.php'
                    ]);


                    $adminEmail = get_field("website_email", $contact_page_id[0]);
                    $emailTemplate = get_field("email_template", $contact_page_id[0]);
                    $emailFrom = get_field("email_from", $contact_page_id[0]);
                    $placedEmail = $emailTemplate;

                    $placedEmail = str_replace("{name}", $sanitized_array['name'], $placedEmail);
                    $placedEmail = str_replace("{last_name}", $sanitized_array['last_name'], $placedEmail);
                    $placedEmail = str_replace("{phone}", $sanitized_array['phone'], $placedEmail);
                    $placedEmail = str_replace("{birth_day}", $sanitized_array['date'], $placedEmail);
                    $placedEmail = str_replace("{course_name}", get_the_title($sanitized_array['course_id']), $placedEmail);
                    $placedEmail = str_replace("{website}", get_bloginfo('name'), $placedEmail);


                    wp_insert_post([
                        'post_title' => $sanitized_array['name'] . " - " . $sanitized_array['email'],
                        'post_content' => $placedEmail,
                        'post_type' => 'course_form',
                        'post_status' => 'private',
                        'post_author' => 1,
                        'meta_input' => [
                            'course_registration_info' => $sanitized_array,
                        ],

                    ]);


                    // send email
                    $headers[] = "Content-type: text/html; harset=iso-8859-1" . "\r\n";
                    $headers[] = "From: " . $emailFrom . " <no-reply@" . $_SERVER['SERVER_NAME'] . ">";
                    $headers[] = "MIME-Version: 1.0" . "\r\n";
                    //Admin email
                    wp_mail($adminEmail, $sanitized_array['name'] . " - " . $sanitized_array['last_name'], $placedEmail, $headers);
                    //Customer email
                    /*  wp_mail($inputs['email'], $inputs['name'] . " - " . $inputs['email'], $placedEmail, $headers);*/

                    wp_send_json([
                        'success' => true,
                        'message' => 'ثبت نام با موفقیت انجام شد. '
                    ]);
                } else {
                    // Error: One of the fields is empty

                    wp_send_json([
                        'success' => false,
                        'message' => 'has error',

                    ]);
                }
            } else {
                // Error: Data is not sent
                wp_send_json([
                    'success' => false,
                    'message' => 'Data is not sent',

                ]);
            }
        }

        public function cyn_shopping_form()
        {
            if (!wp_verify_nonce($_POST['_nonce'], 'ajax-nonce'))
                return wp_send_json_error(['verify_nonce' => false], 403);

            $data = $_POST['data'];
            $dbData = array(
                'user_name' => sanitize_text_field($data['name']),
                'user_last_name' => sanitize_email($data['last-name']),
                'user_phone' => sanitize_text_field($data['phone']),
                'product' => sanitize_text_field($data['product'])
            );

            $msg_content = "
                نام: " .  $dbData['user_name'] . "\n
                نام خانوادگی: " . $dbData['user_last_name'] . "\n
                شماره: " . $dbData['user_phone'] . " \n
                محصول: " . $dbData['product'] . "
            ";
            $new_post = array(
                'post_type' => $GLOBALS["shopping_submit_form-post-type"],
                'post_title' => $dbData['user_name'],
                'post_content' => $msg_content,
                'post_status' => 'publish',
                'post_author' => 1,
            );

            $insert_post = wp_insert_post($new_post);

            if (is_wp_error($insert_post))
                return wp_send_json_error(['insert_row' => false], 500);

            $send_email = wp_mail(
                'amirtanazzoh@gmail.com',
                'new form from: ' . $dbData['user_name'],
                $msg_content
            );

            if ($send_email == false)
                return wp_send_json_error(['send_email' => false], 500);

            return wp_send_json(['success' => true], 201);
        }
    }
}
