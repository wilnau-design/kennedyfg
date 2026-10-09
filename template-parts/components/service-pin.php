<?php
/**
 * Services explorer map pin. Default, hover, and selected.
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
		'label' => __( 'Map Your Retirement Income', 'kennedyfg' ),
		'pin'   => '1',
	),
	'investments' => array(
		'label' => __( 'Align Your Investments', 'kennedyfg' ),
		'pin'   => '2',
	),
	'taxes'       => array(
		'label' => __( 'Manage Your Taxes', 'kennedyfg' ),
		'pin'   => '3',
	),
	'family'      => array(
		'label' => __( 'Safeguard Your Family', 'kennedyfg' ),
		'pin'   => '4',
	),
);

$service = isset( $catalog[ $args['service'] ] ) ? $args['service'] : 'income';
$item    = $catalog[ $service ];
$state   = sanitize_html_class( $args['state'] );
$classes = trim( 'service-pin is-' . $service . ' ' . $state . ' ' . $args['class'] );
?>
<button class="<?php echo esc_attr( $classes ); ?>" type="button" data-service="<?php echo esc_attr( $service ); ?>" aria-pressed="<?php echo 'is-selected' === $state ? 'true' : 'false'; ?>">
	<span class="service-pin-label">
		<span class="service-pin-text"><?php echo esc_html( $item['label'] ); ?></span>
		<span class="service-pin-arrow" aria-hidden="true"></span>
	</span>
	<img class="service-pin-marker" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $item['pin'] . '.svg' ) ); ?>" alt="" width="31" height="48" />
</button>
