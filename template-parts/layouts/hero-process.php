<?php
/**
 * Process page hero: centered title, lede, and kite motif.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'The Guided Retirement Roadmap', 'kennedyfg' ),
		'lede'  => __( 'Income. Investments. Taxes. Legacy. All planned as one thing.', 'kennedyfg' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-hero-process alignfull ' . $args['class'] ) ); ?>">
	<h1><?php echo esc_html( $args['title'] ); ?></h1>
	<p><?php echo esc_html( $args['lede'] ); ?></p>
	<img class="layout-hero-process-motif" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-process-hero-motif.svg' ) ); ?>" alt="" width="47" height="271" />
</section>
