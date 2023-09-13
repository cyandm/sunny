<?php
$frontId = get_option('page_on_front');

$whataappLink = get_field('footer_whatsapp_link', $frontId);
$instagramLink = get_field('footer_insta_link', $frontId);
$telegramLink = get_field('footer_telegram_link', $frontId);

?>
<div class="sotioal-row">
    <?php
    $icon = "star";
    if ($telegramLink) { ?>
        <a href="<?= $telegramLink ?>"><i class="icon-telegram"></i></a>
    <?php
    }
    if ($instagramLink) { ?>
        <a href="<?= $instagramLink ?>"><i class="icon-insta"></i></a>
    <?php
    }
    if ($whataappLink) { ?>
        <a href="<?= $whataappLink ?>"><i class="icon-whatsapp"></i></a>
    <?php
    }
    ?>
</div>