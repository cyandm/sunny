<?php
/**
 * Template Name: Contact Page
 */

 get_header();
?>

<main class="contact-page" id="contact-page">
<div class="contact-row container padding-top">
    <div class="contact-img">
        <?php
        get_template_part('imgs/svg/contact-svg');?>
    </div>
    <div class="contact-page-form">
        <h2>تماس با ما</h2>
        <span>برای ارتباط با پشتیبانی  پیام بفرستید</span>
        <form method="post" action="" id="contact_form">
            <div class="form-input">

                <i class=""></i>
                <input type="text" name="email" id="email" placeholder=" ایمیل شما">
            </div>
            <div class="form-input">
                <i class="icon-user"></i>
                <input type="text" name="name" id="name" placeholder=" نام شما ">

            </div>
            <div class="form-input form-textarea">
                <i class="icon-message"></i>
                <textarea name="message" id="message" rows="7" maxlength="65525"
                          placeholder=" متن پیام"></textarea>
            </div>
            <div class="form-btn">

                <button id="submit_form"  data-callback="ContactForm" type="submit"><i
                            class="icon-send"></i>ارسال پیام
                </button>
            </div>
        </form>
        <div class="form-message success" id="success_message"></div>
        <div class="form-message fail" id="fail_message"></div>
    </div>
</div>
</main>


<?php get_footer() ?>