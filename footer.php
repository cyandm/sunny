<?php
$frontId = get_option('page_on_front');

// -------------------------title variables
$firstMenuTitle = get_field('first_menu_title', $frontId);
$secondtMenuTitle = get_field('second_menu_title', $frontId);
$thirdMenuTitle = get_field('third_menu_title', $frontId);
$fourthMenuTitle = get_field('fourth_menu_title', $frontId);
$fifthMenuTitle = get_field('fifth_menu_title', $frontId);
$sixthMenuTitle = get_field('sixth_menu_title', $frontId);

// -------------------------footer information variables
$footerCallFirst = get_field('footer_call_first', $frontId);
$footerCallSecond = get_field('footer_call_second', $frontId);
$footeAddress = get_field('footer_address', $frontId);
$footerMapRepeater = get_field('footer_contact_map_repeater', $frontId);

$whataappLink = get_field('footer_whatsapp_link', $frontId);
$instagramLink = get_field('footer_insta_link', $frontId);
$telegramLink = get_field('footer_telegram_link', $frontId);

function widget_title($title)
{
	if ($title) : ?>
		<h4><?= $title ?></h4>
	<?php endif;
};
function menu($menuSlug)
{
	if ($menuSlug) : ?>
		<div class="footer-menu">
			<?php wp_nav_menu(['theme_location' => $menuSlug]) ?>
		</div>
	<?php endif;
}

function social_media($socialLink, $icon)
{
	if ($socialLink) { ?>
		<a href="<?= $socialLink ?>"><i class="<?= $icon ?>"></i></a>
<?php
	}
}


?>
<footer class="container">
	<div class="footer-top">
		<div class="line">
		</div>
		<div class="footer-logo">
			<?php the_custom_logo() ?>
		</div>
		<div class="line">
		</div>
	</div>
	<div class="widget-row">
		<?php ?>
		<!-- -------------------first widget -->
		<div class="footer-widget">
			<?php widget_title($firstMenuTitle);
			$menuSlug = "first_footer";
			menu($menuSlug); ?>
		</div>

		<!-- -------------------second widget -->
		<div class="footer-widget">
			<?php widget_title($secondtMenuTitle);
			$menuSlug = "second_footer";
			menu($menuSlug); ?>
		</div>

		<!-- -------------------third widget -->
		<div class="footer-widget">
			<?php widget_title($thirdMenuTitle);
			$menuSlug = "third_footer";
			menu($menuSlug);  ?>
		</div>

		<!-- -------------------fourth widget -->
		<div class="footer-widget">
			<?php widget_title($fourthMenuTitle); ?>
			<?php if ($footerCallFirst && $footerCallSecond) : ?>
				<div class="numbers">
					<a href="tel:<?= $footerCallFirst ?>"><?= $footerCallFirst ?></a>
					<a href="tel:<?= $footerCallSecond ?>"><?= $footerCallSecond ?></a>
				</div>
			<?php endif; ?>
		</div>

		<!-- -------------------fifth widget -->
		<div class="footer-widget address-column">
			<?php widget_title($fifthMenuTitle); ?>
			<?php if ($footeAddress) : ?>
				<div class="address-widget">
					<p><?= $footeAddress ?></p>
				</div>
			<?php endif; ?>
		</div>

		<!-- -------------------sixth widget -->
		<div class="footer-widget map-column">
			<?php widget_title($sixthMenuTitle); ?>
			<?php if ($footerMapRepeater) : ?>
				<div class="map-widget">
					<?php foreach ($footerMapRepeater as $map) : ?>
						<a href="<?= $map['map_link'] ?>"><?= wp_get_attachment_image($map['map_image'], 'thumbnail', false, []); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="sotioal-row">
		<?php
		// -----------telegram
		$icon = "star";
		social_media($telegramLink, $icon);
		social_media($instagramLink, $icon);
		social_media($whataappLink, $icon);
		?>
	</div>
</footer>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>