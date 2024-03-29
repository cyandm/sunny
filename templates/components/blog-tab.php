<?php
$page_id = get_queried_object_id();
$blog_page_id = get_posts( [ 
	'post_type' => 'page',
	'fields' => 'ids',
	'nopaging' => true,
	'meta_key' => '_wp_page_template',
	'meta_value' => 'templates/blogs.php'
] );

if ( get_queried_object_id() == $blog_page_id[0] || get_queried_object()->taxonomy == 'category' ) {

	$args = get_terms(
		array(
			'taxonomy' => 'category',
			'hide_empty' => false
		)
	);
	$all_terms = new WP_Query( $args );
	$terms = $all_terms->query;
} else {
	$terms = get_field( 'choose_category', get_option( 'page_on_front' ) );
}

?>

<div class="blog-tab">

	<?php
	if ( get_queried_object_id() == $blog_page_id[0] || get_queried_object()->taxonomy == 'category' ) : ?>
		<ul>
			<li class="category-tab  <?= ( $page_id == $blog_page_id[0] ) ? 'active-cat' : ''; ?>">
				<a href="<?= the_permalink( $blog_page_id[0] ); ?>">همه</a>
			</li>

			<?php foreach ( $terms as $cat ) :

				?>
				<li class="category-tab <?= ( get_queried_object()->term_id == $cat->term_id ) ? 'active-cat' : ''; ?>"
					data-slug="<?= $cat->slug ?>">
					<a href="<?= get_term_link( $cat->term_id ) ?>">
						<?= $cat->name ?>
					</a>
				</li>
				<?php
			endforeach; ?>
		</ul>
		<?php
		get_template_part( 'templates/components/search-form', null, [ 'menu-mobile' => false ] );

	else : ?>
		<ul>
			<?php
			$key = 1;
			foreach ( $terms as $cat ) : ?>
				<li class="category-tab <?= ( $key == 1 ) ? 'active-cat' : ''; ?>" data-slug="<?= $cat->slug ?>">
					<?= $cat->name ?>
				</li>
				<?php $key++;
			endforeach; ?>
		</ul>
		<?php
	endif; ?>


</div>

<!-- ---------------------------------------mobile tab -->

<div class="blog-tab-mobile">

	<?php if ( get_queried_object_id() == $blog_page_id[0] || is_category( get_queried_object_id() ) ) :
		get_template_part( 'templates/components/search-form', null, [ 'menu-mobile' => false ] );
		?>
		<select name="" id="cat-select-mobile" class="cat-select-mobile mobile-category-list">
			<option <?= ( $page_id == $blog_page_id[0] ) ? 'selected' : '' ?> value="<?= the_permalink( $blog_page_id[0] ); ?>">
				همه</option>
			<?php
			foreach ( $terms as $term ) :
				?>
				<option <?= ( $page_id == $term->term_id ) ? 'selected' : '' ?> value="<?= get_term_link( $term->term_id ) ?>">
					<?= $term->name ?>
				</option>
				<?php

			endforeach; ?>

		</select>

	<?php else : ?>
		<select name="" id="cat-select-mobile-front" class="cat-select-mobile mobile-category-list front">
			<?php
			foreach ( $terms as $term ) : ?>
				<option <?= ( $page_id == $term->term_id ) ? 'selected' : '' ?> value="<?= $term->slug ?>">
					<?= $term->name ?>
				</option>
				<?php
			endforeach; ?>
		</select>
	<?php endif; ?>
</div>