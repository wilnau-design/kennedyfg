<?php
/**
 * Referral “looking for” list, thought figure, and close.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'So if you’re looking for…', 'kennedyfg' ),
		'items' => array(
			__( 'Local advisors who understand your faith, values, and retirement vision', 'kennedyfg' ),
			__( 'A partner to answer your questions in plain English', 'kennedyfg' ),
			__( 'Long-term delegation to a team of professionals', 'kennedyfg' ),
		),
		'close_before' => __( 'We might be a ', 'kennedyfg' ),
		'close_mark'   => __( 'good fit', 'kennedyfg' ),
		'close_after'  => __( ' for you.', 'kennedyfg' ),
		'class'        => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-referral-fit alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-referral-fit-inner">
		<div class="layout-referral-fit-top">
			<h2><?php echo esc_html( $args['title'] ); ?></h2>
			<ul class="layout-referral-fit-items">
				<?php foreach ( $args['items'] as $item ) : ?>
					<li><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="layout-referral-fit-bottom">
			<div class="layout-referral-fit-figure" aria-hidden="true">
				<img class="layout-referral-fit-bubbles is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-referral-bubbles.svg' ) ); ?>" alt="" width="82" height="82" />
				<img class="layout-referral-fit-bubbles is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-referral-bubbles-dark.svg' ) ); ?>" alt="" width="82" height="87" />
				<img class="layout-referral-fit-human is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-referral-human.svg' ) ); ?>" alt="" width="88" height="160" />
				<img class="layout-referral-fit-human is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-referral-human-dark.svg' ) ); ?>" alt="" width="88" height="160" />
			</div>
			<p class="layout-referral-fit-close">
				<?php echo esc_html( $args['close_before'] ); ?><span><?php echo esc_html( $args['close_mark'] ); ?></span><?php echo esc_html( $args['close_after'] ); ?>
			</p>
		</div>
	</div>
</section>
