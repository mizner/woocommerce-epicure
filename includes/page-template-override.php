<?php
add_filter( 'template_include', function ( $template ) {
	$page = get_theme_mod( 'wep-online-ordering-settings' );
	if ( $page && is_page( $page ) ) {
		return WEP_PATH . 'templates/online-ordering.php';
	}

	return $template;
} );