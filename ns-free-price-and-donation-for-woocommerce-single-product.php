<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if(!function_exists('woocommerce_template_single_price')){
	function woocommerce_template_single_price() {
		global $post;
		// if ($post->ID == 8) {
		if(get_post_meta($post->ID, 'ns_gift_price_custom_tab', true) == 'yes') {
			add_user_meta( get_current_user_id(), 'price'.$post->ID, 60);
			
			echo '<style>
			.post-'.$post->ID.' .price, .quantity, #product-'.$post->ID.' .woocommerce-Price-amount, #product-'.$post->ID.' .amount {
					display: none !important;
					visibility: hidden !important;
			}
			</style>';


			add_action( 'woocommerce_before_add_to_cart_button', 'ns_insert_new_price_text'); 
		}
		wc_get_template( 'loop/price.php' ); 
	}
}

function ns_insert_new_price_text () {
	echo '<div class="new_custom_price"><input type="number" min="1" value="1" name="new_price" id="new_price"></div>';
}

?>