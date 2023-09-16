<?php
$frontId = get_option('page_on_front');

$startSliders = get_field('slider_start_section', $frontId);

?>
<section id="panels2" class="scroll-section panel-section start-section">

    <div id="panels-container2" class="panels-container" style="width: <?= count($startSliders) * 100 ?>%;">
        <?php
        $num = 1;
        foreach ($startSliders as $Slide): ?>
            <article id="start-<?= $num ?>" class="slide panel2 full-screen">
                <div class="row">
                    <div class="container">
                        <div class="start-content">
                            <div class="start-img">
                                <?= wp_get_attachment_image($Slide['start_slider_image'], 'full', false, []); ?>
                            </div>
                            <div class="start-text"></div>
                        </div>

                        <div class="panels-navigation text-right">
                            <?php if ($num == 1): ?>
                                <div class="nav-panel next" data-sign="plus"><a href="#start-<?= $num + 1 ?>" class="anchor"><i
                                                class="icon-arrow-single-big"></i>next</a>
                                </div>
                            <?php elseif ($num == count($startSliders)): ?>
                                <div class="nav-panel prv" data-sign="minus"><a href="#start-<?= $num - 1 ?>"
                                                                                class="anchor"><i
                                                class="icon-arrow-single-big"></i>prv</a></div>
                            <?php else: ?>
                                <div class="nav-panel prv" data-sign="minus"><a href="#start-<?= $num - 1 ?>"
                                                                                class="anchor"><i
                                                class="icon-arrow-single-big"></i>prv</a></div>
                                <div class="nav-panel next" data-sign="plus"><a href="#start-<?= $num + 1 ?>" class="anchor"><i
                                                class="icon-arrow-single-big"></i>next</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="breadcrumb-btn">
                            <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
                            <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
                        </div>
                    </div>
                </div>
            </article>
            <?php $num++; endforeach; ?>
    </div>
</section>