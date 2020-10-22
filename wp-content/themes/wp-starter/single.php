<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp-starter
 */

get_header();

while ( have_posts() ) :
	the_post(); ?>

		<article>
			<header>
				<?php echo esc_html( get_the_title() ); ?>
			</header>
			<?php echo wp_kses_post( get_the_content() ); ?>
		</article>

	<?php
	endwhile;

get_footer();
