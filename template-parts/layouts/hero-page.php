<?php
/**
 * Inner-page hero: centered headline, lede, optional motif.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'    => __( 'The Guided Retirement Roadmap', 'kennedyfg' ),
		'lede'     => __( 'Income. Investments. Taxes. Legacy. All planned as one thing.', 'kennedyfg' ),
		'motif'    => kennedy_fg_asset( 'layouts/graphic-hero-motif.svg' ),
		'class'    => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-hero-page alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-hero-page-inner">
		<h1 class="layout-hero-page-title"><?php echo esc_html( $args['title'] ); ?></h1>
		<?php if ( $args['lede'] ) : ?>
			<p class="layout-hero-page-lede"><?php echo esc_html( $args['lede'] ); ?></p>
		<?php endif; ?>
		<?php if ( $args['motif'] ) : ?>
			<img class="layout-hero-page-motif is-light" src="<?php echo esc_url( $args['motif'] ); ?>" alt="" />
			<img class="layout-hero-page-motif is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-motif-dark.svg' ) ); ?>" alt="" />
		<?php endif; ?>
	</div>
</section>
