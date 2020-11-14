<?php

/* ----------  CUSTOM QUERIES ----------------------------------------------- */
add_action( 'pre_get_posts', 'wp_starter_all_cpts_on_archives', 99 );
add_action( 'pre_get_posts', 'wp_starter_query_reset', 99 );

//reset the query for archive pages so we can reduce response time and allow us to get curated content only
function wp_starter_query_reset( $query ) {
	$curated = get_query_var( 'curated', false );

	if ( ! is_admin() && $query->is_main_query() && is_archive() && $curated /* other conditionals here! */ ) {
		// NOTE to FORCE an empty result set
		$query->set( 'post__in', array( 0 ) );

		// re-run validation and conditional set up.
		$query->parse_query();
	}
}


function wp_starter_all_cpts_on_archives( $query ) {
	if ( ! is_admin() && ! is_home() ) {

		$types   = array();
		$orderby = $query->get( 'orderby' );
		$orderby = is_array( $orderby ) ? $orderby : array( $orderby );
		$filter  = $query->get( 'filter' );
		$pseudo  = $query->get( 'pseudo' );
		$paged   = $query->get( 'paged' );

		// Check to see if we have explicitly set the post_type(s) otherwise use the default group
		if ( ! empty( $filter ) && ( ( $query->is_main_query() && is_archive() ) || $pseudo ) ) {
			$types = explode( '|', urldecode( $filter ) );
		}

		// add post types to archives
		if ( empty( $types ) && empty( $query->query['post_type'] ) ) {
			// to change to a query_var
			$types = array_merge(
				array(
					'post' => 'post',
					'page' => 'page',
				),
				get_post_types(
					array(
						'_builtin' => false,
					)
				)
			);
		}

		// Set types if any
		if ( ! empty( $types ) ) {
			$query->set( 'post_type', $types );
		}
	}
}
