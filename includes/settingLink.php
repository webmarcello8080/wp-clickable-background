<?php

if ( !function_exists( 'wp_clickable_background_loader' ) ) {
	function wp_clickable_background_settings_link( $links ) {
		$links[] = '<a href="' .
			admin_url( 'options-general.php?page=wp-clickable-background-admin' ) .
			'">' . __('Settings', 'wp_clickable_background_domain') . '</a>';
		return $links;
	}
	add_filter('plugin_action_links_' . PLUGIN_WCB_BASENAME, 'wp_clickable_background_settings_link');
}
