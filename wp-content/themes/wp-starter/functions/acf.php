<?php

add_action( 'init', 'wp_starter_acf', 1 );
function wp_starter_acf() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'General Settings',
				'menu_title' => 'General Settings',
				'menu_slug'  => 'general-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'position'   => 3.3,
				'icon_url'   => 'dashicons-admin-settings',
			)
		);
	}
}
