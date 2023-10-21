<?php
$coachId = '';
if ($args['id']) {
    $coachId = $args['id'];
}

$imagesFilms = get_field('add_film_or_images', $coachId);


?>
<div class="students-row-popup">

    <div class="students-slider-popup swiper container">
        <i class="icon-close close-student-popup"></i>
        <div class="swiper-wrapper sliders-wrapper">

            <?php foreach ($imagesFilms as $content) :
                if ($content['add_film'] != "" || $content['add_image'] != "")
                    :?>
                    <div class="student-info swiper-slide">

                        <?php if ($content['film_or_img'] == 'film') { ?>
                            <div class="add-video-content">
                                <video class="video" controls>
                                    <source src="<?= $content['add_film'] ?>" type="video/mp4">
                                </video>

                                <div class="achievement-description">
                                    <span><?= $content['description_attachment_content'] ?></span>
                                </div>
                            </div>
                        <?php }
                        if ($content['film_or_img'] == 'img') { ?>
                            <div class="add-image-content">
                                <?php echo wp_get_attachment_image($content['add_image'], 'full', false, []); ?>
                                <div class="achievement-description">
                                    <span><?= $content['description_attachment_content'] ?></span>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                <?php
                endif;
            endforeach; ?>
        </div>
    </div>
</div>