<?php
/**
 * Contact page map.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'firm'    => __( 'Kennedy Financial Group', 'kennedyfg' ),
		'map_src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2938.7392504563863!2d-83.15350162440295!3d42.56082932239464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824c43d8607a99b%3A0x1227d678aed12f4b!2sKennedy%20Financial%20Group!5e0!3m2!1sen!2scl!4v1788204178295!5m2!1sen!2scl',
		'class'   => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-contact-map alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-contact-map-media">
		<iframe src="<?php echo esc_url( $args['map_src'] ); ?>" title="<?php echo esc_attr( $args['firm'] ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
	</div>
</section>
