<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
	<div class="nsdashboarddonation">
		<div class="ns_donation_description"><?php _e('To activate the plugin inside a single product, click on Free Price tab and check Free Price checkbox.', $ns_text_domain); ?></div>
		<div class="ns_container_text">
			<div class="ns_donation_title"><?php _e('Total donations', $ns_text_domain); ?>:</div>
			<div class="ns_donation_text"><?php echo $ns_total_donation.' '.$currency; ?></div>
			<div class="ns_donation_icon"><img src="<?php echo GIFT_PRICE_NS_PLUGIN_URL; ?>/img/donation.png"></div>
		</div>
	</div>

