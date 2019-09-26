<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage LambadaLite
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'lambadalite' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo lambadalite_get_svg( array( 'icon' => 'bars' ) ) ;
		echo lambadalite_get_svg( array( 'icon' => 'close' ) );
		esc_html_e( 'Menu', 'lambadalite' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>
</nav><!-- #site-navigation -->
