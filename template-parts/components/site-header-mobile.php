<?php
/**
 * Mobile navbar.
 *
 * @package kennedyfg
 */

$args    = wp_parse_args(
	$args ?? array(),
	array(
		'state'     => 'closed',
		'accordion' => '',
		'class'     => '',
	)
);
$is_open = 'open' === $args['state'];
$classes = trim( 'site-header-mobile ' . ( $is_open ? 'is-open' : '' ) . ' ' . $args['class'] );
?>
<header class="<?php echo esc_attr( $classes ); ?>">
	<div class="site-header-mobile-bar">
		<?php kennedy_fg_component( 'logo' ); ?>
		<button class="menu-toggle" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="kennedy-mobile-menu" aria-label="<?php esc_attr_e( 'Open menu', 'kennedyfg' ); ?>">
			<img class="menu-toggle-open" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-hamburger.svg' ) ); ?>" alt="" width="18" height="12" />
			<img class="menu-toggle-close" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-close.svg' ) ); ?>" alt="" width="24" height="24" />
		</button>
	</div>

	<nav id="kennedy-mobile-menu" class="site-header-mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'kennedyfg' ); ?>" <?php echo $is_open ? '' : 'hidden'; ?>>
		<?php kennedy_fg_render_primary_nav_mobile( $args['accordion'] ); ?>
		<?php kennedy_fg_render_client_login_mobile( $args['accordion'] ); ?>
		<div class="site-header-mobile-cta">
			<?php kennedy_fg_component( 'button-nav', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'href' => home_url( '/start-here/' ), 'class' => 'is-full' ) ); ?>
		</div>
	</nav>
</header>
