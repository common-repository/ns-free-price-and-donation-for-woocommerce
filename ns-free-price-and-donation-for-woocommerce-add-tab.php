<?php

function ns_gift_price_tab_options_woocat() {
    echo '<li class="custom_tab"><a href="#custom_tab_data_donation"><span>Free Price</span></a></li>';
}
add_action('woocommerce_product_write_panel_tabs', 'ns_gift_price_tab_options_woocat'); 


//Add field options
function ns_custom_tab_donation() {
	global $post;
	
	$custom_tab_options = array(
		'title' => get_post_meta($post->ID, 'ns_gift_price_custom_tab', true)
	);
	
?>
	<div id="custom_tab_data_donation" class="panel woocommerce_options_panel">
		<div class="options_group">
			<p class="form-field">
				<?php woocommerce_wp_checkbox( array( 'id' => 'ns_gift_price_custom_tab', 'label' => __('Product free price?', 'woothemes'), 'description' => __('', 'woothemes') ) ); ?>
			</p>
		</div>
	
	</div>
<?php
}
add_action('woocommerce_product_data_panels', 'ns_custom_tab_donation');


// Save Data
function ns_process_product_meta_custom_tab_donation( $post_id ) {
	update_post_meta( $post_id, 'ns_gift_price_custom_tab', ( isset($_POST['ns_gift_price_custom_tab']) && $_POST['ns_gift_price_custom_tab'] ) ? 'yes' : 'no' );
}
add_action('woocommerce_process_product_meta', 'ns_process_product_meta_custom_tab_donation');
?>