<?php
$course_template = [
    'post_type' => 'page',
    'fields' => 'ids',
    'nopaging' => true,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/course.php'
];
$page_id = get_posts($course_template);

$tickerTitle = get_field('ticker_title', $page_id[0]);
$tickerSubTitle = get_field('ticker_sub_title', $page_id[0]);
$tickers = get_field('ticker_text_slider', $page_id[0]);


?>

<div class="ticker-section">
    <?php if ($tickerTitle) :
    ?>
        <div class="section-title-sub container">
            <h2>
                <?php echo $tickerTitle
                ?>
            </h2>
            <span>
                <?php echo $tickerSubTitle
                ?>
            </span>
        </div>
    <?php endif;
    if ($tickers) : ?>
        <div class="ticker ticker-container">
            <ul class="ticker-custom">
                <?php foreach ($tickers as $ticker) :
                    if ($ticker['label'] != '') :
                ?>
                        <li>
                            <a href="<?php echo $ticker['link']
                                        ?>"><span>
                                    <?php echo $ticker['label']
                                    ?>
                                </span><i class="icon-arrow-right"></i></a>
                        </li>
                <?php
                    endif;
                endforeach;
                ?>
                <?php foreach ($tickers as $ticker) :
                    if ($ticker['label'] != '') :
                ?>
                        <li>
                            <a href="<?php echo $ticker['link']
                                        ?>"><span>
                                    <?php echo $ticker['label']
                                    ?>
                                </span><i class="icon-arrow-right"></i></a>
                        </li>
                <?php
                    endif;
                endforeach;
                ?>
                <?php foreach ($tickers as $ticker) :
                    if ($ticker['label'] != '') :
                ?>
                        <li>
                            <a href="<?php echo $ticker['link']
                                        ?>"><span>
                                    <?php echo $ticker['label']
                                    ?>
                                </span><i class="icon-arrow-right"></i></a>
                        </li>
                <?php
                    endif;
                endforeach;
                ?>
            </ul>
        </div>
    <?php endif;
    ?>
</div>