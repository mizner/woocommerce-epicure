<?php

add_shortcode( 'jetpack-testimonials-slider', [ 'JetpackTestimonialsSlider', 'template' ] );

if ( ! class_exists( 'WooEpicureShortcode' ) ) {
	class WooEpicureShortcode {
		public static function template() {
			ob_start();
			include( plugin_dir_path( __FILE__ ) . 'templates/slider.php' );

			return ob_get_clean();
		}
	}
}