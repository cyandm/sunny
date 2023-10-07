<?php
$frontId = get_option('page_on_front');

$title = get_field('contacts_section_title', $frontId);
$btnTitle = get_field('contacts_section_btn_title', $frontId);
$btnLink = get_field('contacts_section_btn_link', $frontId);

$whatsappTitle = get_field('whatsapp_title', $frontId);
$whatsappLink = get_field('whatsapp_link', $frontId);
$instagramTitle = get_field('instagram_title', $frontId);
$instagramLink = get_field('instagram_link', $frontId);
$telegramTitle = get_field('telegram_title', $frontId);
$telegramLink = get_field('telegram_link', $frontId);

$TitleTel = get_field('call_number_title', $frontId);
$number1 = get_field('call_number_1', $frontId);
$number2 = get_field('call_number_2', $frontId);
$managementTitle = get_field('collection_management_title', $frontId);
$managementTitleTel = get_field('collection_management_title_tel', $frontId);
$workingHours = get_field('working_hours_text', $frontId);

$addressTitle = get_field('contact_section_address_title', $frontId);
$address = get_field('contact_section_address', $frontId);
$mapTitle = get_field('contact_section_map_address_title', $frontId);
$mapLinks = get_field('contact_map_repeater', $frontId);


?>
<div id="front-contact" class="swiper-slide front-contact-section">
    <div class="container  padding-top">
        <?Php if ($title) : ?>
            <div class="section-title">
                <h2><?= $title ?></h2>
                <?Php if ($btnTitle) : ?>
                    <a href="<?= $btnLink ?>"><?= $btnTitle ?></a>
                <?php endif ?>
            </div>
        <?php endif ?>


        <div class="front-contact-content">
            <div class="contact-box-right">
                <div class="info">
                    <?php if ($whatsappTitle) : ?>
                        <a href="<?= $whatsappLink ?>"><?= $whatsappTitle ?><i class="icon-whatsapp"></i></a>
                    <?php endif;
                    if ($instagramTitle) : ?>
                        <a href="<?= $instagramLink ?>"><?= $instagramTitle ?><i class="icon-insta"></i></a>

                    <?php endif;
                    if ($telegramTitle) : ?>
                        <a href="<?= $telegramLink ?>"><?= $telegramTitle ?><i class="icon-telegram"></i></a>
                    <?php endif; ?>
                </div>
                <div class="images">
                    <img src="<?= get_stylesheet_directory_uri() ?>/imgs/social.png" alt="shocial">
                </div>
            </div>

            <div class="contact-box-left">
                <div class="info">
                    <div class="numbers">
                        <div>
                            <?php
                            if ($TitleTel) :
                            ?>
                                <h4><?= $TitleTel ?></h4>
                            <?php endif;

                            if ($number1) :
                            ?>
                                <a href="tel:<?= $number1 ?>"><?= $number1 ?></a>
                            <?php endif;

                            if ($number2) :
                            ?>
                                <a href="tel:<?= $number2 ?>"><?= $number2 ?></a>
                            <?php endif; ?>
                        </div>
                        <div>

                            <?php
                            if ($managementTitle) :
                            ?>
                                <h4><?= $managementTitle ?></h4>
                            <?php endif;
                            if ($managementTitleTel) :
                            ?>
                                <a href="tel:<?= $managementTitleTel ?>"><?= $managementTitleTel ?></a>
                            <?php endif; ?>

                        </div>

                    </div>
                    <?php
                    if ($workingHours) :
                    ?>
                        <p class="text"><?= $workingHours ?></p>
                    <?php endif; ?>
                </div>
                <div class="images">
                    <img src="<?= get_stylesheet_directory_uri() ?>/imgs/phone.png" alt="tel">
                </div>
            </div>
            <div class="contact-box-wide">
                <div class="info">
                    <?php
                    if ($addressTitle) :
                    ?>
                        <h4><?= $addressTitle ?></h4>
                    <?php endif;
                    if ($address) : ?>
                        <p class="address"><?= $address ?></p>
                    <?php endif;
                    if ($mapTitle) : ?>
                        <h4 class="map-title"><?= $mapTitle ?></h4>
                    <?php endif; ?>
                    <div class="maps-link">
                        <?php foreach ($mapLinks as $map) : ?>
                            <a href="<?= $map['map_link'] ?>"><?= wp_get_attachment_image($map['map_image'], 'thumbnail', false, []); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="images">
                    <img src="<?= get_stylesheet_directory_uri() ?>/imgs/map.png" alt="map">
                </div>
            </div>
        </div>
        <div class="breadcrumb-btn">
            <a href="" class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i> بازگشت به اول</a>
            <a href="" class="btn-left home-main-slider-prev">فروشگاه<i class="icon-arrow-side-left"></i></a>
        </div>

    </div>
</div>