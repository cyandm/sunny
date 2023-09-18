<?php
$frontId = get_option('page_on_front');
$faqTitle = get_field('title_faq_section', $frontId);
$allFaqs = get_field('choose_faqs', $frontId);
$faqImg = get_field('image_faq_section', $frontId);
?>

<section id="faq" class="faq-section">
    <div class="container">
        <?php if ($faqTitle) : ?>
            <div class="section-title">
                <h2><?= esc_html($faqTitle) ?></h2>
            </div>
        <?php endif; ?>
        <div class="faq-content">
            <div class="faq-drop-down">
                <?php
                $accordionNum = 1;
                if (is_array($allFaqs) && count($allFaqs) > 0) :
                    foreach ($allFaqs as $faq) :
                        ?>
                        <div class="accordion <?= ($accordionNum === 1) ? 'show' : '' ?>">
                            <div class="question">
                                <span><?= esc_html($faq->post_title) ?></span>
                                <i class="icon-arrow-single-big"></i>
                            </div>
                            <div class="answer"><?= wp_kses_post($faq->post_content) ?></div>
                        </div>
                        <?php
                        $accordionNum++;
                    endforeach;
                endif;
                ?>
            </div>
            <div class="faq-img">
                <?= wp_get_attachment_image($faqImg, 'full', false, []); ?>
            </div>
        </div>
        <div class="breadcrumb-btn">
            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
            <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
        </div>
    </div>
</section>
