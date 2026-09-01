<?php
/**
 * Homepage pain-points band with path and thought cards.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'You drove the used cars, invested wisely, tithed', 'kennedyfg' ),
		'lede'  => __( 'Now you’re eyeing the finish line thinking…', 'kennedyfg' ),
		'cards' => array(
			array(
				'quote' => __( 'Can I finally quit and make my days look the way I want?', 'kennedyfg' ),
				'icon'  => 'graphic-pain-my-days.svg',
				'dark'  => 'graphic-pain-my-days-dark.svg',
				'class' => 'is-days',
			),
			array(
				'quote' => __( 'I only get one shot at this… what if I blow it?', 'kennedyfg' ),
				'icon'  => 'graphic-pain-blow-it.svg',
				'dark'  => 'graphic-pain-blow-it-dark.svg',
				'class' => 'is-blow',
			),
			array(
				'quote' => __( 'Who do I trust to guide me?', 'kennedyfg' ),
				'icon'  => 'graphic-pain-who-to-trust.svg',
				'dark'  => 'graphic-pain-who-to-trust-dark.svg',
				'mark'  => 'graphic-pain-who-to-trust-mark.svg',
				'class' => 'is-trust',
			),
		),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-pain-points alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-pain-points-top">
		<h2><?php echo esc_html( $args['title'] ); ?></h2>
		<p><?php echo esc_html( $args['lede'] ); ?></p>
	</div>
	<div class="layout-pain-points-scene">
		<img class="layout-pain-points-path is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-pain-path.svg' ) ); ?>" alt="" />
		<img class="layout-pain-points-path is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-pain-path-dark.svg' ) ); ?>" alt="" />
		<?php foreach ( $args['cards'] as $card ) : ?>
			<div class="layout-pain-points-card <?php echo esc_attr( $card['class'] ); ?>">
				<span class="layout-pain-points-icon">
					<img class="is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $card['icon'] ) ); ?>" alt="" />
					<img class="is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $card['dark'] ) ); ?>" alt="" />
					<?php if ( ! empty( $card['mark'] ) ) : ?>
						<img class="layout-pain-points-mark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $card['mark'] ) ); ?>" alt="" />
					<?php endif; ?>
				</span>
				<p><?php echo esc_html( $card['quote'] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>
