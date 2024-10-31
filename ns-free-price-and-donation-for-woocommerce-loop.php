<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if(!function_exists('woocommerce_template_loop_price')){
	function woocommerce_template_loop_price() {
		global $post;

		
		if(get_post_meta($post->ID, 'ns_gift_price_custom_tab', true) == 'yes') {
			echo '<style>
				.post-'.$post->ID.' .price {
					display: none !important;
					visibility: hidden !important;
				}
			</style>';
		}
		wc_get_template( 'loop/price.php' ); 
	}
}


?>