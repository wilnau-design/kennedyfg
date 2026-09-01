<?php
/**
 * About page thinking / concern cards.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'  => __( 'If you’ve been thinking:', 'kennedyfg' ),
		'cards'  => array(
			__( 'Am I as far ahead as I should be by now?', 'kennedyfg' ),
			__( 'I can’t afford to get this decision wrong', 'kennedyfg' ),
			__( 'I want professional advice...', 'kennedyfg' ),
			__( 'But I hate being rushed into decisions I don’t fully understand', 'kennedyfg' ),
		),
		'closing' => array(
			__( 'You’re in the ', 'kennedyfg' ),
			__( 'right', 'kennedyfg' ),
			__( ' place because…', 'kennedyfg' ),
		),
		'class'  => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-about-concerns alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-about-concerns-inner">
		<h1><?php echo esc_html( $args['title'] ); ?></h1>
		<div class="layout-about-concerns-cards">
			<?php foreach ( $args['cards'] as $card ) : ?>
				<p><?php echo esc_html( $card ); ?></p>
			<?php endforeach; ?>
		</div>
		<div class="layout-about-concerns-bridge" aria-hidden="true">
			<img class="layout-about-concerns-person is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-about-person.svg' ) ); ?>" alt="" />
			<img class="layout-about-concerns-person is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-about-person-dark.svg' ) ); ?>" alt="" />
			<img class="layout-about-concerns-bubbles" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-thought-bubbles.svg' ) ); ?>" alt="" />
		</div>
		<p class="layout-about-concerns-close">
			<?php echo esc_html( $args['closing'][0] ); ?>
			<span><?php echo esc_html( $args['closing'][1] ); ?></span><?php echo esc_html( $args['closing'][2] ); ?>
		</p>
	</div>
</section>
