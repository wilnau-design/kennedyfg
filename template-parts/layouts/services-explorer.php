<?php
/**
 * Interactive services roadmap: path, pins, and the matching detail panel.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'active'   => 'income',
		'services' => array( 'income', 'investments', 'taxes', 'family' ),
		'class'    => '',
	)
);

$active = in_array( $args['active'], $args['services'], true ) ? $args['active'] : 'income';
?>
<section class="<?php echo esc_attr( trim( 'layout-services-explorer alignfull is-' . $active . ' ' . $args['class'] ) ); ?>" data-services-explorer>
	<div class="layout-services-explorer-stage">
		<div class="layout-services-explorer-road">
			<img class="layout-services-explorer-path is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-services-explorer-ribbon.svg' ) ); ?>" alt="" />
			<img class="layout-services-explorer-path is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-services-explorer-ribbon-dark.svg' ) ); ?>" alt="" />
		</div>
		<img class="layout-services-explorer-walker is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-person-walking.svg' ) ); ?>" alt="" width="56" height="77" />
		<img class="layout-services-explorer-walker is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-person-walking-dark.svg' ) ); ?>" alt="" width="56" height="77" />
		<?php foreach ( $args['services'] as $service ) : ?>
			<div class="layout-services-explorer-stop is-<?php echo esc_attr( $service ); ?>">
				<?php
				kennedy_fg_component(
					'service-pin',
					array(
						'service' => $service,
						'state'   => $service === $active ? 'is-selected' : '',
					)
				);
				?>
			</div>
			<div id="<?php echo esc_attr( $service ); ?>" class="layout-services-explorer-panel is-<?php echo esc_attr( $service ); ?>" <?php echo $service === $active ? '' : 'hidden'; ?>>
				<?php kennedy_fg_component( 'service-detail', array( 'service' => $service ) ); ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>
