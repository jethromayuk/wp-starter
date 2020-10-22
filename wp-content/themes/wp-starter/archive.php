<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-starter
 */

get_header();
?>

	<?php
	if ( have_posts() ) :

		the_archive_title( '<h1>', '</h1>' );
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile;

	endif;
	?>

<?php
get_sidebar();
get_footer();
