<?php
/**
 * Homepage "Where do I stand" pin.
 *
 * Closed shows the title. Hover and focus open the card: icon and learn-more
 * on one row, the excerpt under that, and the title at the bottom. The whole
 * pin is the link.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'service' => 'income',
		'state'   => '',
		'class'   => '',
	)
);

$catalog = array(
	'income'      => array(
		'title'   => __( 'Map Your Retirement Income', 'kennedyfg' ),
		'excerpt' => __( 'Create clarity around when you can retire, what it will cost, and where your income will come from.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-journey-map.svg',
		'icon_w'  => 32,
		'icon_h'  => 32,
		'pin'     => '1',
	),
	'investments' => array(
		'title'   => __( 'Align Your Investments', 'kennedyfg' ),
		'excerpt' => __( 'Build an investment strategy with the right balance of safety, income, and growth to support your plan over a 30+ year retirement.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-align-investments.svg',
		'icon_w'  => 27,
		'icon_h'  => 40,
		'pin'     => '2',
	),
	'taxes'       => array(
		'title'   => __( 'Manage Your Taxes', 'kennedyfg' ),
		'excerpt' => __( 'Build a proactive tax strategy that helps reduce how much the IRS reaches into your pocket.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-manage-taxes.svg',
		'icon_w'  => 52,
		'icon_h'  => 40,
		'pin'     => '3',
	),
	'family'      => array(
		'title'   => __( 'Safeguard Your Family', 'kennedyfg' ),
		'excerpt' => __( 'An intentional strategy to plan for the unexpected, protect what you’ve built, and live out your legacy for the people and causes that matter most.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-safeguard-family.svg',
		'icon_w'  => 49,
		'icon_h'  => 40,
		'pin'     => '4',
	),
);

$service = isset( $catalog[ $args['service'] ] ) ? $args['service'] : 'income';
$item    = $catalog[ $service ];
$state   = sanitize_html_class( $args['state'] );
$classes = trim( 'journey-pin is-' . $service . ' ' . $state . ' ' . $args['class'] );
?>
<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( home_url( '/process/#' . $service ) ); ?>">
	<span class="journey-pin-card">
		<span class="journey-pin-top">
			<span class="journey-pin-top-inner">
				<span class="journey-pin-icon" aria-hidden="true">
					<img src="<?php echo esc_url( kennedy_fg_asset( $item['icon'] ) ); ?>" alt="" width="<?php echo esc_attr( $item['icon_w'] ); ?>" height="<?php echo esc_attr( $item['icon_h'] ); ?>" />
				</span>
				<span class="journey-pin-more" aria-hidden="true">
					<span class="journey-pin-more-inner"><?php esc_html_e( 'Learn more', 'kennedyfg' ); ?><span class="service-pin-arrow" aria-hidden="true"></span></span>
				</span>
			</span>
		</span>
		<span class="journey-pin-excerpt">
			<span class="journey-pin-excerpt-inner"><?php echo esc_html( $item['excerpt'] ); ?></span>
		</span>
		<span class="journey-pin-title"><?php echo esc_html( $item['title'] ); ?></span>
	</span>
	<img class="journey-pin-marker is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $item['pin'] . '.svg' ) ); ?>" alt="" width="31" height="57" />
	<img class="journey-pin-marker is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $item['pin'] . '-dark.svg' ) ); ?>" alt="" width="31" height="57" />
</a>
