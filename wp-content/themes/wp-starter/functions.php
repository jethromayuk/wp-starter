<?php
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our WordPress application. We just need to utilize it!
| We'll require it into the script here so that we do not have to worry
| about the loading of any our classes "manually".
|
*/

// phpcs:ignore
if ( ! file_exists( $composer = __DIR__ . '/vendor/autoload.php' ) ) {
	wp_die( __( 'Error locating autoloader. Please run <code>composer install</code>.', 'pn' ) );
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our WordPress application. We just need to utilize it!
| We'll require it into the script here so that we do not have to worry
| about the loading of any our classes "manually".
|
*/

require $composer;

/*
|--------------------------------------------------------------------------
| Locate Functions Files
|--------------------------------------------------------------------------
|
| Functions files are pulled into the project.
|
*/

get_template_part( 'functions/admin' );
get_template_part( 'functions/query' );
get_template_part( 'functions/plugins' );
get_template_part( 'functions/api' );
get_template_part( 'functions/acf' );
get_template_part( 'functions/theme' );
get_template_part( 'functions/content' );
get_template_part( 'functions/cpt' );
get_template_part( 'functions/menus' );
get_template_part( 'functions/api' );
get_template_part( 'functions/images' );
get_template_part( 'functions/gallery' );
get_template_part( 'functions/widgets' );
