<?php
/**
 * Homepage SmartVestor CTA band.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'Visiting from Dave Ramsey’s SmartVestor Program?', 'kennedyfg' ),
		'cta'   => __( 'Read this', 'kennedyfg' ),
		'href'  => home_url( '/smartvestor/' ),
		'image' => kennedy_fg_asset( 'layouts/graphic-smartvestor.webp' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-smartvestor alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-smartvestor-inner">
		<img class="layout-smartvestor-photo" src="<?php echo esc_url( $args['image'] ); ?>" alt="" width="1344" height="456" />
		<div class="layout-smartvestor-copy">
			<div class="layout-smartvestor-heading">
				<img class="layout-smartvestor-logo" src="<?php echo esc_url( kennedy_fg_asset( 'brand/logo-smartvestor-dark.svg' ) ); ?>" alt="<?php esc_attr_e( 'Ramsey SmartVestor', 'kennedyfg' ); ?>" width="278" height="48" />
				<h2><?php echo esc_html( $args['title'] ); ?></h2>
			</div>
			<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'variant' => 'short' ) ); ?>
		</div>
	</div>
</section>
