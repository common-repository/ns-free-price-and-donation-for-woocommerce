<?php
/*
Plugin Name: NS Free Price and Donation for WooCommerce
Plugin URI: http://nsthemes.com
Description: Insert free price to one or many product
Version: 2.4.4
Author: NsThemes
Author URI: http://nsthemes.com
Text Domain: ns-free-price-and-donation-for-woocommerce
Domain Path: /languages
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-free-price-and-donation-for-woocommerce',
    'main_file_name'            => 'ns-free-price-and-donation-for-woocommerce.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-free-price-and-donation-for-woocommerce%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '206',
    'plugin_token'              => 'NWNmZTRhZGU0NzMwOGUwY2NjNDNjOWIxNTE1OWM3YWQ5MTRhOTgyMTAyZTBhZWMyMzQ4MTViNGI2NGYxODBlMGE4OWFjOTI0OTA0ODk=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj206 = new pluginEye($plugineye);
$plugineyeobj206->pluginEyeStart();      
        

if ( ! defined( 'GIFT_PRICE_NS_PLUGIN_DIR' ) )
    define( 'GIFT_PRICE_NS_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

if ( ! defined( 'GIFT_PRICE_NS_PLUGIN_URL' ) )
    define( 'GIFT_PRICE_NS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' );

function add_custom_price( $cart_object ) {
	
	foreach ( $cart_object->cart_contents as $key => $value ) {
		if(get_post_meta($value['product_id'], 'ns_gift_price_custom_tab', true) == 'yes') {
			$arr_temp_new_price = get_post_meta($value['product_id'], $key);
			$value['data']->set_price($arr_temp_new_price[0]);
			$value['data']->set_regular_price($arr_temp_new_price[0]);
			$value['data']->set_sale_price($arr_temp_new_price[0]);
		}
	}
}

add_action( 'save_post', 'ns_gp_my_product_update' , 10, 3);

function ns_gp_my_product_update( $post_id, $post, $update ) {
    if($post->post_type == "product"){
	if (isset($_POST['ns_gift_price_custom_tab']) AND $_POST['ns_gift_price_custom_tab'] != '') {
			$ns_gift_price_custom_tab = sanitize_text_field($_POST['ns_gift_price_custom_tab']);
	} else {
		$ns_gift_price_custom_tab = 0;
	}
		if($ns_gift_price_custom_tab) {
			update_post_meta($post->ID, '_sold_individually', 'yes');
			update_post_meta($post->ID, '_regular_price', '0');
		}
    }
}

function action_woocommerce_add_to_cart( $array, $inta, $intb ) {
	$new_price = sanitize_text_field($_POST['new_price']);
	if (isset($new_price)) {
		if (!add_post_meta($inta, $array, $new_price, true)) {
			update_post_meta( $inta, $array, $new_price );
		}
	}
}

add_action( 'woocommerce_add_to_cart', 'action_woocommerce_add_to_cart', 10, 3 ); 

/* *** include css admin *** */
function ns_gift_price_css_admin( $hook ) {
	wp_enqueue_style('ns-free-price-and-donation-style-admin', GIFT_PRICE_NS_PLUGIN_URL . '/css/ns-free-price-and-donation-for-woocommerce-admin.css');
}
add_action( 'admin_enqueue_scripts', 'ns_gift_price_css_admin' );

/* *** include css *** */
function ns_gift_price_css( $hook ) {
	wp_enqueue_style('ns-free-price-and-donation-for-woocommerce-style', GIFT_PRICE_NS_PLUGIN_URL . '/css/ns-free-price-and-donation-for-woocommerce.css');
}
add_action( 'wp_enqueue_scripts', 'ns_gift_price_css' );

/* *** include single product free price and donation *** */
require_once( GIFT_PRICE_NS_PLUGIN_DIR.'/ns-free-price-and-donation-for-woocommerce-single-product.php');

/* *** include loop product free price and donation *** */
require_once( GIFT_PRICE_NS_PLUGIN_DIR.'/ns-free-price-and-donation-for-woocommerce-loop.php');

/* *** include admin option *** */
// require_once( GIFT_PRICE_NS_PLUGIN_DIR.'/ns-free-price-and-donation-for-woocommerce-admin.php');
require_once( plugin_dir_path( __FILE__ ).'ns-admin-options/ns-admin-options-setup.php');


// Add the custom tab in woocommerce product page
require_once( GIFT_PRICE_NS_PLUGIN_DIR.'/ns-free-price-and-donation-for-woocommerce-add-tab.php');

function ns_gift_price_activate_set_default_options() {
    add_option('ns_gp_enabled_plugin', 'on');
}
 
register_activation_hook( __FILE__, 'ns_gift_price_activate_set_default_options');

add_action( 'plugins_loaded', 'ns_catalog_free_load_textdomain' );

function ns_catalog_free_load_textdomain() {
  load_plugin_textdomain( 'ns-free-price-and-donation-for-woocommerce', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}


/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nsfreepriceanddonation_add_action_links' );

function nsfreepriceanddonation_add_action_links ( $links ) {	
 $mylinks = array('<a id="nsfpadlinkpremiumlinkpremium" href="https://www.nsthemes.com/product/free-price-and-donation-for-woocommerce/?ref-ns=2&campaign=FPAD-linkpremium" target="_blank">'.__( 'Premium Version', 'ns-facebook-pixel-for-wp' ).'</a>');
return array_merge( $links, $mylinks );
}

?>