<?php
function wep_pages_array() {
	$the_query = new WP_Query( array(
		'post_type'      => 'page',
		'posts_per_page' => - 1,
	) );

	$data = array();

	while ( $the_query->have_posts() ) : $the_query->the_post();

		$data[ get_the_ID() ] = get_the_title();

	endwhile;

	wp_reset_postdata();

	return $data;
}

/*
 * Register Customizer Options
 */

add_action( 'customize_register', 'wep_register' );

function wep_register( $wp_customize ) {
	$wp_customize->add_section( 'wep-online-ordering-section', array(
		'title'    => __( 'WooCommerce Epicure Settings', 'woocommerce-epicure' ),
		'priority' => 4,
//'description' => __( 'Enter details here.', 'knoxweb' )
	) );

	$wp_customize->add_setting(
		'wep-online-ordering-settings',
		array( 'default' => '' )
	);

	$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'online-ordering-page',
			array(
				'label'    => __( 'Online Ordering Page', 'woocommerce-epicure' ),
				'section'  => 'wep-online-ordering-section',
				'settings' => 'wep-online-ordering-settings',
				'type'     => 'select',
				'choices'  => wep_pages_array(),
			)
		)
	);
}