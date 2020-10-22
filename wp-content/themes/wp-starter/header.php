<?php
/**
 * The header for our theme
 *
 * @category Theme
 * @package  WP-Starter
 * @author   Jethro May <hello@jethromay.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt MIT
 * @link     https://github.com/jethromay/wp-starter
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>"/>
	<meta itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>"/>

	<link href="http://gmpg.org/xfn/11" rel="profile"/>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php get_component( 'header/header' ); ?>

	<main id="main" class="site-main">
