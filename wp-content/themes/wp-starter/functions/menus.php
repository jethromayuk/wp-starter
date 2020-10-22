<?php

add_action( 'after_setup_theme', 'wp_menu_setup' );

/* -------------------------------------------------------------------------- */
/* ----------  Menu  Functions ---------------------------------------------- */
/* -------------------------------------------------------------------------- */
function wp_menu_setup() {
	/* ---------- Menus ------------------------------------------------------ */
	register_nav_menus(
		array(
			'primary'   => 'Global Navigation',
			'secondary' => 'Global Sub Navigation',
			'footer'    => 'Footer Navigation',
		)
	);
}
