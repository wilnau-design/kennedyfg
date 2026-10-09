<?php
/**
 * Homepage "Where do I stand" pin.
 *
 * Closed shows the title. Hover and focus open the card: icon, title, and
 * learn-more label, all centered. The whole pin is the link.
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
		'title'  => __( 'Map your retirement income', 'kennedyfg' ),
		'icon'   => 'layouts/graphic-journey-map.svg',
		'icon_w' => 32,
		'icon_h' => 32,
		'pin'    => '1',
	),
	'investments' => array(
		'title'  => __( 'Align your investments', 'kennedyfg' ),
		'icon'   => 'layouts/graphic-align-investments.svg',
		'icon_w' => 27,
		'icon_h' => 40,
		'pin'    => '2',
	),
	'taxes'       => array(
		'title'  => __( 'Manage your taxes', 'kennedyfg' ),
		'icon'   => 'layouts/graphic-manage-taxes.svg',
		'icon_w' => 52,
		'icon_h' => 40,
		'pin'    => '3',
	),
	'family'      => array(
		'title'  => __( 'Safeguard your family', 'kennedyfg' ),
		'icon'   => 'layouts/graphic-safeguard-family.svg',
		'icon_w' => 49,
		'icon_h' => 40,
		'pin'    => '4',
	),
);

$service = isset( $catalog[ $args['service'] ] ) ? $args['service'] : 'income';
$item    = $catalog[ $service ];
$state   = sanitize_html_class( $args['state'] );
$classes = trim( 'journey-pin is-' . $service . ' ' . $state . ' ' . $args['class'] );
?>
<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( home_url( '/process/#' . $service ) ); ?>">
	<span class="journey-pin-card">
		<span class="journey-pin-icon" aria-hidden="true">
			<span class="journey-pin-icon-inner">
				<img src="<?php echo esc_url( kennedy_fg_asset( $item['icon'] ) ); ?>" alt="" width="<?php echo esc_attr( $item['icon_w'] ); ?>" height="<?php echo esc_attr( $item['icon_h'] ); ?>" />
			</span>
		</span>
		<span class="journey-pin-title"><?php echo esc_html( $item['title'] ); ?></span>
		<span class="journey-pin-more" aria-hidden="true">
			<span class="journey-pin-more-inner"><?php esc_html_e( 'Learn more', 'kennedyfg' ); ?><span class="service-pin-arrow" aria-hidden="true"></span></span>
		</span>
	</span>
	<img class="journey-pin-marker is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $item['pin'] . '.svg' ) ); ?>" alt="" width="31" height="57" />
	<img class="journey-pin-marker is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $item['pin'] . '-dark.svg' ) ); ?>" alt="" width="31" height="57" />
</a>
