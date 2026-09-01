<?php
/**
 * Close / dismiss control.
 *
 * @package kennedyfg
 */

$args    = wp_parse_args(
	$args ?? array(),
	array(
		'state' => '',
		'label' => __( 'Close', 'kennedyfg' ),
		'class' => '',
	)
);
$classes = trim( 'close-button ' . sanitize_html_class( $args['state'] ) . ' ' . $args['class'] );
?>
<button class="<?php echo esc_attr( $classes ); ?>" type="button" aria-label="<?php echo esc_attr( $args['label'] ); ?>">
	<img src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-close.svg' ) ); ?>" alt="" width="24" height="24" />
</button>
