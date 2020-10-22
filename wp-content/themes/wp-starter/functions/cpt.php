<?php

add_action( 'init', 'wp_cpts', 0 );
add_action( 'init', 'wp_post_support' );

function wp_post_support() {
	//  *** ADD SUPPORT *****
	add_post_type_support( 'page', 'excerpt' );

	// *** REMOVE SUPPORT *****
	remove_post_type_support( 'page', 'thumbnail' ); // ACF field is used to force required
	remove_post_type_support( 'page', 'trackbacks' );
	remove_post_type_support( 'page', 'custom-fields' ); // ACF fields are used instead
	remove_post_type_support( 'page', 'comments' );
	remove_post_type_support( 'page', 'revisions' );
	remove_post_type_support( 'page', 'author' );

	remove_post_type_support( 'post', 'thumbnail' ); // ACF field is used to force required
	remove_post_type_support( 'post', 'trackbacks' );
	remove_post_type_support( 'post', 'custom-fields' ); // ACF fields are used instead
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'post', 'revisions' );
	remove_post_type_support( 'post', 'author' );
}

function wp_cpts() {
	if ( function_exists( 'jm_register_cpt' ) ) :

		// jm_register_cpt('project', 'welcome-widgets-menus', ['title'], 'page', false, true, true, '', '');

	endif;

	if ( function_exists( 'jm_register_taxonomies' ) ) :

	endif;
}
