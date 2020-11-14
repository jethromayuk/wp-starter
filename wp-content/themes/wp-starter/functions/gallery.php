<?php
add_filter( 'gallery_style', 'wp_remove_gallery_css' );
function wp_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
