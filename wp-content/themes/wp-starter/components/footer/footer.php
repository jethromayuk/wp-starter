<?php //** FOOTER COMPONENT */ ?>
<footer id="colophon" class="site-footer" role="contentinfo" itemscope="" itemtype="http://schema.org/WPFooter">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'depth'          => 3,
				'walker'         => new WP_Bootstrap_Navwalker,
			)
		);
		?>
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?></p>
</footer>
<?php
