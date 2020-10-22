<?php
/* ---------- REPLACE GUTENBERG WITH CLASSIC EDITOR -------------------- */

add_filter( 'use_block_editor_for_post', '__return_false', 10 );

/* ---------- REMOVE UNNECESSARY ELEMENTS FROM WP_HEAD() -------------------- */

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/* ---------- REMOVE WP EMOJI ----------------------------------------------- */

remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

add_filter( 'tiny_mce_plugins', 'wp_disable_emojicons_tinymce' );
function wp_disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/* ---------- ADD THE EXCERPT SETTINGS -------------------------------------- */

add_action( 'after_setup_theme', 'wp_excerpt_setup' );
add_filter( 'excerpt_length', 'wp_excerpt_length' );
add_filter( 'excerpt_more', 'wp_excerpt_truncate' );

function wp_excerpt_setup() {
	add_post_type_support( 'page', 'excerpt' );
}

function wp_excerpt_length( $length ) {
	return 20; // words
}

function wp_excerpt_truncate( $more ) {
	return ' &hellip;';
}

add_filter( 'the_content_more_link', 'wp_modify_read_more' );

// Modify The Read More Link Text
function wp_modify_read_more() {
	return '<a class="read-more" href="' . get_permalink() . '">Your Read More Link Text</a>';
}

/* ---------- EMBED Functions ----------------------------------------------- */
add_filter( 'oembed_result', 'wp_oembed_result', 10, 3 );

function wp_wrap_embed( $html, $url, $attr ) {
	return '<div class="embed-wrapper">' . $html . '</div>';
}

/* ----------   SLUGIFY STRING  -------------------- */

function wp_slugify( $string ) {
	return strtolower( trim( preg_replace( '/[^A-Za-z0-9-]+/', '-', $string ), '-' ) );
}

/* ----------   GET ACTUAL FILE SIZE --------------- */
function wp_actual_file_size( $id ) {
	return size_format( filesize( get_attached_file( $id ) ), 2 );
}
