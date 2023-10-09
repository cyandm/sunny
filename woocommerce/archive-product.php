<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

$pageId = get_option('woocommerce_shop_page_id');
$title = get_field('shop_title', $pageId);
$description = get_field('shop_description', $pageId);
$rightBtnLink = get_field('right_btn_link', $pageId);
$rightBtnTitle = get_field('right_btn_title', $pageId);
$leftBtnLink = get_field('left_btn_link', $pageId);
$leftBtnTitle = get_field('left_btn_title', $pageId);
$img = get_field('shop_page_img', $pageId);

?>
<div class="padding-top container custom-archive-product">
	<div class="shop-hero">
		<div class="content-text">
			<?php if ($title) : ?>
				<h1><?= $title ?></h1>
			<?php endif;
			if ($description) :
			?>
				<div class="text">
					<?= $description ?>
				</div>
			<?php endif; ?>
			<div class="shop-btn">
				<?php if ($rightBtnLink) : ?>
					<a class="right-btn" href="<?= $rightBtnLink ?>"><?= $rightBtnTitle ?></a>
				<?php endif;
				if ($leftBtnLink) :
				?>
					<a class="left-btn" href="<?= $leftBtnLink ?>"><i class="icon-arrow-right"></i><?= $leftBtnTitle ?></a>
				<?php endif; ?>
			</div>

		</div>
		<div class="content-img">

			<?= wp_get_attachment_image($img, 'full', false, []); ?>

		</div>
	</div>

	<h2>فروشگاه سانی</h2>
	<?php
	if (woocommerce_product_loop()) {

		woocommerce_product_loop_start();

		if (wc_get_loop_prop('total')) {
			while (have_posts()) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action('woocommerce_shop_loop');

				wc_get_template_part('content', 'product');
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action('woocommerce_after_shop_loop');
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action('woocommerce_no_products_found');
	}

	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action('woocommerce_after_main_content');


	get_footer('shop'); ?>
</div>