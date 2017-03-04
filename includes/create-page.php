<?php

$post = wp_insert_post( array(
	'post_title'  => __( 'Online Ordering' ),
	'post_slug'   => sanitize_title( 'online-ordering' ),
	'post_type'   => 'page',
	'post_status' => 'publish'
) );
