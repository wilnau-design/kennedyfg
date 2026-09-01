<?php
/**
 * Lead magnet: copy plus stacked guide covers.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( '5 Little-Known Tips for Lowering Taxes in Retirement in 2026', 'kennedyfg' ),
		'lede'  => __( 'Discover how smart retirees are avoiding avoidable taxes — and how <strong>you can too</strong>.', 'kennedyfg' ),
		'cta'   => __( 'Get it here', 'kennedyfg' ),
		'href'  => home_url( '/guide/' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-lead-magnet alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-lead-magnet-inner">
		<div class="layout-lead-magnet-copy">
			<h2><?php echo esc_html( $args['title'] ); ?></h2>
			<p><?php echo wp_kses_post( $args['lede'] ); ?></p>
			<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'variant' => 'short' ) ); ?>
		</div>
		<div class="layout-lead-magnet-stack" aria-hidden="true">
			<img src="<?php echo esc_url( kennedy_fg_asset( 'content/graphic-footer-magnet.webp' ) ); ?>" alt="" width="620" height="453" />
		</div>
	</div>
</section>
