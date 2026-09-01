<?php
/**
 * Desktop site header.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'open'  => '',
		'class' => '',
	)
);
?>
<header class="<?php echo esc_attr( trim( 'site-header ' . $args['class'] ) ); ?>">
	<div class="site-header-inner">
		<?php kennedy_fg_component( 'logo' ); ?>

		<nav class="site-header-nav" aria-label="<?php esc_attr_e( 'Primary', 'kennedyfg' ); ?>">
			<?php kennedy_fg_render_primary_nav_desktop( $args['open'] ); ?>
		</nav>

		<div class="site-header-actions">
			<?php kennedy_fg_render_client_login_desktop( $args['open'] ); ?>
			<?php
			kennedy_fg_component(
				'button-nav',
				array(
					'label' => __( 'Start Here', 'kennedyfg' ),
					'href'  => home_url( '/start-here/' ),
				)
			);
			?>
		</div>
	</div>
</header>
