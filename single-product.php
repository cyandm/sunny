<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<?php

/* Template Name: Single Product Page */

get_header();
$product_id = get_the_ID();
$wc_product = wc_get_product($product_id);
$product_sku = $wc_product->get_sku();
$product_price = $wc_product->get_price();
$product_stock_status = $wc_product->get_stock_status();
$product_stock_quantity = $wc_product->get_stock_quantity();
$product_attributes = $wc_product->get_attributes();
$product_gallery = $wc_product->get_gallery_image_ids();
$favorite_products = wc_get_related_products($product_id);

$is_disable = false;

if ($product_stock_quantity <= 0 && ($product_stock_status !== 'instock')) {
    $is_disable = true;
}

function swiper_slider($images_slider)
{
    if (is_array($images_slider)) :
        foreach ($images_slider as $slider_image) :
            if (($slider_image != null) && !empty($slider_image)) : ?>
                <div class="swiper-slide">
                    <div class="favorite-products__img"><?= wp_get_attachment_image($slider_image, 'full') ?></div>
                </div>
<?php
            endif;
        endforeach;
    endif;
}
?>

<main class="single-product container">
    <?php get_template_part('/templates/components/notifications/successful');
    ?>
    <?php
    get_template_part('/templates/components/popup/submit', 'shopping', ['id' => $product_id, 'type' => 'shopping']);
    ?>
    <?php get_template_part('/templates/components/back-btn'); ?>

    <section class="single-product__title">
        <div class="single-product__title__text">
            <p> جزئیات محصول</p>
        </div>
        <div class="single-product__content">

            <div class="single-product__details">

                <h1><?php the_title() ?></h1>
                <p class="single-product__details__code"><?= $product_sku ?></p>
                <?= get_the_content() ?>


                <div class="single-product__items">
                    <div class="single-product__price">
                        <p>قیمت</p>
                        <span><?= $product_price  ?> تومان</span>
                    </div>

                    <?php

                    foreach ($product_attributes as $key => $attribute) : ?>
                        <div class="single-product__property">
                            <p><?= $attribute['data']['name'] ?></p>
                            <div class="drop-down">
                                <select>
                                    <?php foreach ($attribute['data']['options'] as $keykey => $att) : ?>
                                        <option>
                                            <p><?= $att ?></p>
                                            <p class="color"></p>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <div class="single-product__inventory">
                        <p>وضعیت موجودی</p>
                        <?php if ($product_stock_status === 'instock') : ?>
                            <div class="count-inventory"><i><?= get_template_part('templates/components/svg/icon-inventory') ?></i><span>موجود</span></div>
                        <?php else : ?>
                            <div class="count-no-inventory"><i><?= get_template_part('templates/components/svg/icon-no-inventory') ?></i><span>نا موجود</span></div>
                        <?php endif ?>
                    </div>

                    <div class="single-product__btn" id="submitShoppingBtn" <?php if ($is_disable) echo 'disabled' ?>>
                        <p> سفارش محصول</p>
                    </div>
                </div>


            </div>
            <div class="single-product__images">
                <div class="swiper swiper-feature-image" id="featureSlider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <?php if (get_the_post_thumbnail()) {
                                echo ' <div class="favorite-products__img">';
                                echo the_post_thumbnail('full');
                                echo '</div>';
                            } else {
                                printf(
                                    '<img src="%s" alt="image-not-set" >',
                                    get_stylesheet_directory_uri() . '/assets/imgs/placeholder.png'
                                );
                            }
                            ?>
                        </div>

                        <?php swiper_slider($product_gallery); ?>
                    </div>
                </div>

                <?php if (is_array($product_gallery) && !empty($product_gallery)) : ?>
                    <div thumbsSlider="" class="swiper swiper-thumbnail-image" id="thumbsSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="favorite-products__img"><?php the_post_thumbnail('full'); ?></div>
                            </div>
                            <?php swiper_slider($product_gallery); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>


        </div>
    </section>


    <?php if ($favorite_products) : ?>
        <section class="favorite-products">
            <p class="favorite-products__title">شاید بپسندید</p>
            <div class="favorite-products__favorite_post-wrapper">

                <?php
                foreach ($favorite_products as $favorite_product_id) :
                    $favorite_product = wc_get_product($favorite_product_id);
                ?>
                    <div class="cart-products-box">
                        <h2 class="favorite-products__title"><?= $favorite_product->get_name() ?></h2>
                        <div class="favorite-products__img">
                            <?php if (!empty(get_the_post_thumbnail($favorite_product_id))) {
                                echo get_the_post_thumbnail($favorite_product_id);
                            } else {
                                printf(
                                    '<img src="%s" alt="image-not-set" >',
                                    get_stylesheet_directory_uri() . '/assets/imgs/placeholder.png'
                                );
                            } ?>
                        </div>
                        <div class="btn-cart-custom">
                            <a href="<?= get_permalink($favorite_product_id) ?>">
                                <div>خرید</div>
                                <div><?= $favorite_product->get_price(); ?>تومان</div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata() ?>

            </div>

        </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>