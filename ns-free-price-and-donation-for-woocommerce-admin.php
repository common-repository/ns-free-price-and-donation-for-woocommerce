<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ns_donation_update_options_form () {
	$currency = get_woocommerce_currency_symbol();
	$ns_total_donation = 0;
	$inner_args = array(
		'post_type' => 'shop_order',
		'post_status' => 'any',
		'posts_per_page' => -1,
	);
	$inner_query = new WP_Query($inner_args);
	while ($inner_query->have_posts()) : $inner_query->the_post();
		$order = new WC_Order( get_the_ID() );
		$items = $order->get_items();
		foreach ( $items as $item ) {
		   if (get_post_meta( $item['product_id'], 'ns_gift_price_custom_tab', true) == 'yes') {
				$ns_total_donation += $order->get_line_total($item);
		   }
		}
	endwhile;
	?>
	<div class="ns_container">
		<div><a href="http://www.nsthemes.com/product/free-price-and-donation-for-woocommerce/?utm_source=Free%20Price%20Donation%20Woocommerce%20Bannerino&utm_medium=Bannerino%20dentro%20settings&utm_campaign=Free%20Price%20Donation%20Woocommerce%20Bannerino%20premium"><img src="<?php echo GIFT_PRICE_NS_PLUGIN_URL; ?>/img/bannerooone.png" style="width: 100%; height: auto; margin-bottom: 15px;"></a></div>
		<div class="ns_donation_description">To activate the plugin inside a single product, click on Free Price tab and check Free Price checkbox.</div>
		<div class="ns_container_text">
			<div class="ns_donation_title">Total donations:</div>
			<div class="ns_donation_text"><?php echo $ns_total_donation.' '.$currency; ?></div>
			<div class="ns_donation_icon"><img src="<?php echo GIFT_PRICE_NS_PLUGIN_URL; ?>/img/donation.png"></div>
		</div>
		<div><a href="http://www.nsthemes.com/product/free-price-and-donation-for-woocommerce/?utm_source=Free%20Price%20Donation%20Woocommerce%20Bannerino&utm_medium=Bannerino%20dentro%20settings&utm_campaign=Free%20Price%20Donation%20Woocommerce%20Bannerino%20premium"><img src="<?php echo GIFT_PRICE_NS_PLUGIN_URL?>/img/banneriiino.png" style="max-width: 468px; height: auto;"></a></div>
	</div>
	
	<?php
}

?>