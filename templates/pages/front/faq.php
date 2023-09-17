<?php
$frontId = get_option('page_on_front');

$faqTitle = get_field('title_faq_section', $frontId);
$allFaqs = get_field('choose_faqs', $frontId);
$faqImg = get_field('image_faq_section', $frontId);



?>
<section id="faq" class="faq-section">
    <div class="container">
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
                $acardionNum = 1;
                foreach ($allFaqs as $faq) :
                    if (is_array($allFaqs) && count($allFaqs) > 0) : ?>
                        <div class="accardion <?= ($acardionNum == 1) ? 'show' : '' ?>">
                            <div class="question">
                                <span><?= $faq->post_title ?></span>
                                <i class="icon-arrow-single-big"></i>
                            </div>
                            <div class="answer"><?= $faq->post_content ?></div>
                        </div>
                <?php endif;
                    $acardionNum++;
                endforeach; ?>
            </div>
            <div class="faq-img">
                <?= wp_get_attachment_image($faqImg, 'full', false, []);
                ?>
            </div>

        </div>
        <div class="breadcrumb-btn">
            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
            <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</section>