<?php
wp_enqueue_style( 'woocommerce-epicure-css' );
wp_enqueue_script( 'woocommerce-epicure-js' );

function get_menu_term() {

	$terms = get_terms( array(
		'taxonomy' => 'product_cat',
		'slug'     => 'menu',
	) );

	return $terms[0]->term_id;
}


$args      = [
	'post_type'      => 'product',
	'posts_per_page' => - 1,
	'post_staus'     => 'publish',
	'product_cat'    => 'menu'
];
$the_query = new WP_Query( $args ); ?>
<div class="wep-container">
	<section id="wepMenuList">
		<?php
		$menu_terms = get_terms( array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'parent'     => get_menu_term(),
		) ); ?>
		<ul class="wep-menu-category-list">
			<?php foreach ( $menu_terms as $menu_term ): ?>
				<li class="wep-menu-category-list-item">
					<a><?php echo $menu_term->name; ?></a>
					<ul class="wep-menu-list-items">
						<?php foreach ( $the_query->posts as $post ): ?>
							<?php

							// _log( $menu_term->term_id );
							// _log( $terms );
							$terms = wp_get_post_terms( $post->ID, 'product_cat', array( "fields" => "ids" ) );
							?>
							<?php if ( in_array( $menu_term->term_id, $terms ) ): ?>
								<li id="wep<?php echo $post->ID; ?>" class="wep-menu-list-item">
									<a><?php echo $post->post_title; ?></a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>

	<section id="wepCurrentItem">

		<div class="wep-menu-item-placeholder wep-menu-item">
			<span>Please select an item to the left to add to your order!</span>
		</div>

		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div id="wep<?php the_ID(); ?>" class="wep-menu-item hide">
				<?php include WEP_PATH . 'templates/components/product-page.php'; ?>
			</div>
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	</section>

	<section id="wepTheCart">
        <h3>Cart</h3>
		<?php the_widget( 'WC_Widget_Cart' ); ?>
	</section>
</div>
<div class="clear"></div>