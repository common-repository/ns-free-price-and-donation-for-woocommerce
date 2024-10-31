<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="nsbigbox<?php echo $ns_style; ?>">
	<div class="titlensbigbox<?php echo $ns_style; ?>">
		<h4><?php echo strtoupper($ns_full_name); ?> <?php _e('PREMIUM VERSION', $ns_text_domain); ?></h4>
	</div>
	<div class="contentnsbigbox">
		<p>	<?php _e('ALL FREE VERSION FEATURES and', $ns_text_domain); ?>:<br/><br/>
		<?php _e('– Contributor full list<br/>', $ns_text_domain); ?>
		<?php _e('– Order list of contributor<br/>', $ns_text_domain); ?>
		<?php _e('– Total donation<br/>', $ns_text_domain); ?>
		<?php _e('– Shortcode for total donation<br/>', $ns_text_domain); ?>
		<?php _e('– Shortcode for contributor list<br/>', $ns_text_domain); ?>
		<?php _e('– Work with all currency', $ns_text_domain); ?></p>
		<a href="<?php echo $link_sidebar; ?>" class="linkBigBoxNS">
			<div class="buttonNsbigbox<?php echo $ns_style; ?>">
				<?php _e('UPGRADE', $ns_text_domain); ?>!
			</div>
		</a>
	</div>
</div>