<?php
$frontId = get_option('page_on_front');
$faqTitle = get_field('title_faq_section', $frontId);
$allFaqs = get_field('choose_faqs', $frontId);
$faqImg = get_field('image_faq_section', $frontId);

?>

<div class="swiper-slide faq-section">
    <div class="container  padding-top">
        <?Php if ($faqTitle) : ?>
            <div class="section-title">
                <h2>
                    <?= $faqTitle ?>
                </h2>
            </div>
        <?php endif; ?>
        <div class="faq-content">
            <div class="faq-drop-down">
                <?php
                $accordionNum = 1;
                foreach ($allFaqs as $faq) :
                    if (is_array($allFaqs) && count($allFaqs) > 0) : ?>
                        <div class="accordion <?= ($accordionNum == 1) ? 'show' : '' ?>">
                            <div class="question">
                                <span><?= $faq->post_title ?></span>
                                <i class="icon-arrow-single-big"></i>
                            </div>
                            <div class="answer">
                                <?= (strlen($faq->post_content) > 800) ? substr($faq->post_content, 0, 800) . '...' : $faq->post_content; ?>
                            </div>
                        </div>
                <?php endif;
                    $accordionNum++;
                endforeach; ?>
            </div>
            <div class="faq-img">
                <?= wp_get_attachment_image($faqImg, 'full', false, []);
                ?>
            </div>

        </div>
        <div class="breadcrumb-btn">
            <a href="" class="home-main-slider-next btn-right"><i class="icon-arrow-side-right"></i> مقالات</a>
            <a href="" class="btn-left home-main-slider-prev">مربی ها و هنرجوها<i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</div>