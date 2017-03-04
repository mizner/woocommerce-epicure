<?php
add_action( 'wp_enqueue_scripts', function () {
	wp_register_style( 'woocommerce-epicure-css', WEP_URI . 'dist/' . WEP . '.min.css' );
	wp_register_script( 'woocommerce-epicure-js', WEP_URI . 'dist/' . WEP . '.min.js' );
}, 15 );

