<?php
/**
 * Homepage "Where do I stand" pin. Default, hover, and open.
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
		'title'   => __( 'Map your retirement income', 'kennedyfg' ),
		'overview'=> __( 'Create clarity around when you can retire, what it will cost, and where your income will come from.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-journey-map.svg',
		'icon_w'  => 32,
		'icon_h'  => 32,
		'pin'     => '1',
	),
	'investments' => array(
		'title'   => __( 'Align your investments', 'kennedyfg' ),
		'overview'=> __( 'Build an investment strategy with the right balance of safety, income, and growth to support your plan over a 30+ year retirement.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-align-investments.svg',
		'icon_w'  => 27,
		'icon_h'  => 40,
		'pin'     => '2',
	),
	'taxes'       => array(
		'title'   => __( 'Manage your taxes', 'kennedyfg' ),
		'overview'=> __( 'Build a proactive tax strategy that helps reduce how much the IRS reaches into your pocket.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-manage-taxes.svg',
		'icon_w'  => 52,
		'icon_h'  => 40,
		'pin'     => '3',
	),
	'family'      => array(
		'title'   => __( 'Safeguard your family', 'kennedyfg' ),
		'overview'=> __( 'An intentional strategy to plan for the unexpected, protect what you’ve built, and live out your legacy for the people and causes that matter most.', 'kennedyfg' ),
		'icon'    => 'layouts/graphic-safeguard-family.svg',
		'icon_w'  => 49,
		'icon_h'  => 40,
		'pin'     => '4',
	),
);

$service = isset( $catalog[ $args['service'] ] ) ? $args['service'] : 'income';
$item    = $catalog[ $service ];
$state   = sanitize_html_class( $args['state'] );
$open    = 'is-open' === $state;
$classes = trim( 'journey-pin is-' . $service . ' ' . $state . ' ' . $args['class'] );
?>
<div class="<?php echo esc_attr( $classes ); ?>">
	<button class="journey-pin-toggle" type="button" aria-expanded="<?php echo $open ? 'true' : 'false'; ?>">
		<span class="journey-pin-open" <?php echo $open ? '' : 'aria-hidden="true"'; ?>>
			<span class="journey-pin-open-inner">
				<span class="journey-pin-open-head">
					<img src="<?php echo esc_url( kennedy_fg_asset( $item['icon'] ) ); ?>" alt="" width="<?php echo esc_attr( $item['icon_w'] ); ?>" height="<?php echo esc_attr( $item['icon_h'] ); ?>" />
				</span>
				<span class="journey-pin-kicker"><?php esc_html_e( 'Overview', 'kennedyfg' ); ?></span>
				<span class="journey-pin-overview"><?php echo esc_html( $item['overview'] ); ?></span>
			</span>
		</span>
		<span class="journey-pin-read" aria-hidden="true"><span class="journey-pin-read-inner"><?php esc_html_e( 'Read more', 'kennedyfg' ); ?><span class="service-pin-arrow" aria-hidden="true"></span></span></span>
		<span class="journey-pin-title"><?php echo esc_html( $item['title'] ); ?></span>
	</button>
	<a class="journey-pin-more" href="<?php echo esc_url( home_url( '/process/#' . $service ) ); ?>"><?php esc_html_e( 'Learn more', 'kennedyfg' ); ?><span class="service-pin-arrow" aria-hidden="true"></span></a>
	<img class="journey-pin-marker is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $item['pin'] . '.svg' ) ); ?>" alt="" width="31" height="57" />
	<img class="journey-pin-marker is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $item['pin'] . '-dark.svg' ) ); ?>" alt="" width="31" height="57" />
</div>
