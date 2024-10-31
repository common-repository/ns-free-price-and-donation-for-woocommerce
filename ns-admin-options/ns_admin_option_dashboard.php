<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once( plugin_dir_path( __FILE__ ) .'/inc.php');

$link_sidebar = $ns_url_plugin_premium.'?ref-ns=2&campaign=FPAD-sidebar&utm_source='.$ns_menu_label.'%20Sidebar&utm_medium=Sidebar%20dentro%20settings&utm_campaign='.$ns_menu_label.'%20Sidebar%20premium';
$link_bannerino = $ns_url_plugin_premium.'?ref-ns=2&campaign=FPAD-bannerino&utm_source='.$ns_menu_label.'%20Bannerino&utm_medium=Bannerino%20dentro%20settings&utm_campaign='.$ns_menu_label.'%20Bannerino%20premium'; 
$link_bannerone = $ns_url_plugin_premium.'?ref-ns=2&campaign=FPAD-bannerone&utm_source='.$ns_menu_label.'%20Bannerone&utm_medium=Bannerone%20dashboard&utm_campaign='.$ns_menu_label.'%20Bannerone%20premium'; 
$link_promo_theme = $ns_url_theme_promo.'?ref-ns=2&campaign='.$ns_theme_promo_slug.'&utm_source='.$ns_theme_promo_slug.'%20'.$ns_menu_label.'%20Sidebar&utm_medium=Sidebar%20'.$ns_theme_promo_slug.'%20dentro%20settings&utm_campaign='.$ns_theme_promo_slug.'%20'.$ns_menu_label.'%20Sidebar%20premium';
/*
		<div class="notice notice-success is-dismissible">
		   <p class="nscenterbannerone"><?php echo '<a href="'.$link_bannerone.'"><img src="'.plugin_dir_url( __FILE__ ).'img/'.$ns_slug.'-bannerone.png"></a>'; ?></p>
		</div>
*/
?>
	    <div class="verynsbigbox">
	    	<?php 
	    		/* *** BOX THEME PROMO *** */
				require_once( plugin_dir_path( __FILE__ ) .'/ns_settings_box_theme_promo.php');

	    		/* *** BOX PREMIUM VERSION *** */
				require_once( plugin_dir_path( __FILE__ ) .'/ns_settings_box_pro_version.php');

	    		/* *** BOX NEWSLETTER *** */
				// require_once( plugin_dir_path( __FILE__ ) .'/ns_settings_box_newsletter.php');
			?>			
		</div>
	   
	   
<div class="verynsbigboxcontainer">

			<a name="rac-table-anchor"></a>
			<div class="icon32" id="icon-options-general"><br /></div>
</div>
<h2><?php echo $ns_full_name.' '; _e('Settings', $ns_text_domain); ?></h2>
<div class="ns-div-container-settings">
	<div class="icon32" id="icon-options-general"><br /></div>
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php /* *** BOX OPTION *** */ ?>
		<?php require_once( plugin_dir_path( __FILE__ ) .'/ns_settings_custom.php'); ?>				
	</form>
</div>






