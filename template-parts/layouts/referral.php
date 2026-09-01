<?php
/**
 * SmartVestor continuity band at the top of the referral landing page.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'Visiting from Dave Ramsey’s SmartVestor Program?', 'kennedyfg' ),
		'image' => kennedy_fg_asset( 'layouts/graphic-referral-hero.webp' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-referral alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-referral-inner">
		<img class="layout-referral-photo" src="<?php echo esc_url( $args['image'] ); ?>" alt="" width="1440" height="171" />
		<img class="layout-referral-logo is-light" src="<?php echo esc_url( kennedy_fg_asset( 'brand/logo-smartvestor.svg' ) ); ?>" alt="<?php esc_attr_e( 'Ramsey SmartVestor', 'kennedyfg' ); ?>" width="200" height="35" />
		<img class="layout-referral-logo is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'brand/logo-smartvestor-dark.svg' ) ); ?>" alt="<?php esc_attr_e( 'Ramsey SmartVestor', 'kennedyfg' ); ?>" width="200" height="35" />
		<h1><?php echo esc_html( $args['title'] ); ?></h1>
	</div>
</section>
