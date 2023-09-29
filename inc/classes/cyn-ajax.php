<?php

if (!class_exists('cyn_ajax')) {

    class cyn_ajax
    {

        function __construct()
        {
            add_action('wp_ajax_contact_form', [$this, 'handle_contact_form']);
            add_action('wp_ajax_nopriv_contact_form', [$this, 'handle_contact_form']);


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

                        wp_insert_post(array(
                            'post_title' => $sanitized_array['name'] . " - " . $sanitized_array['email'],
                            'post_content' => $placedEmail,
                            'post_type' => 'contact_form',
                            'post_status' => 'private',
                            'post_author' => 1
                        ));
                        $headers[] = "Content-type: text/html; harset=iso-8859-1" . "\r\n";
                        $headers[] = "From: " . $emailFrom . " <no-reply@" . $_SERVER['SERVER_NAME'] . ">";
                        $headers[] = "MIME-Version: 1.0" . "\r\n";
                        //Admin email
                        wp_mail($adminEmail, $sanitized_array['name'] . " - " . $sanitized_array['email'], $placedEmail, $headers);
                        //Customer email
                        /*  wp_mail($inputs['email'], $inputs['name'] . " - " . $inputs['email'], $placedEmail, $headers);*/

                        wp_send_json(array(
                            'success' => true,
                            'message' => 'پیام با موفقیت ارسال شد. '
                        ));
                    } else {
                        // Error: One of the fields is empty

                        wp_send_json(array(
                            'success' => false,
                            'message' => 'has error',

                        ));
                    }
                }
             else {
                // Error: Data is not sent
                wp_send_json(array(
                    'success' => false,
                    'message' => 'Data is not sent',

                ));
            }
        }


    }
}
