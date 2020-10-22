<?php
/* -------------------------------------------------------------------------- */
/* ----------  Theme  Functions --------------------------------------------- */
/* -------------------------------------------------------------------------- */

add_action( 'after_setup_theme', 'wp_website_setup' );
add_action( 'wp_enqueue_scripts', 'wp_website_scripts' );
add_action( 'wp_default_scripts', 'wp_jquery_in_footer' );

function wp_website_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'image', 'link', 'video', 'aside' ) );
	add_theme_support( 'title-tag' );
}

function wp_website_scripts() {
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );

	/* ---------- SCRIPTS ----------------------------------------------------- */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/public/js/app.js', array(), $version, true );

	/* ---------- STYLES ---------------------------------------------------- */
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/public/css/style.css', array(), $version );
}

function wp_jquery_in_footer( &$scripts ) {
	if ( ! is_admin() ) {
		$scripts->add_data( 'jquery', 'group', 1 );
		$scripts->add_data( 'jquery-core', 'group', 1 );
		$scripts->add_data( 'jquery-migrate', 'group', 1 );
	}
}
