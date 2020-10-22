<?php //** HEADER COMPONENT */ ?>
<header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">Test</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu-content" aria-controls="navbar-menu-content" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbar-menu-content">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'depth'          => 3,
				'walker'         => new WP_Bootstrap_Navwalker,
			)
		);
		?>
		</div>
	</nav>
</header>
<?php
