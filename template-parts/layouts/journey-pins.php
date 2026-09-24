<?php
/**
 * Interactive row of homepage journey pins.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'services' => array( 'income', 'investments', 'taxes', 'family' ),
		'class'    => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-journey-pins alignfull ' . $args['class'] ) ); ?>" data-journey-pins>
	<?php foreach ( $args['services'] as $service ) : ?>
		<?php kennedy_fg_component( 'journey-pin', array( 'service' => $service ) ); ?>
	<?php endforeach; ?>
</section>
