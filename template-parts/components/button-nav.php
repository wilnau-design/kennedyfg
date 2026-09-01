<?php
/**
 * Pill navbar CTA.
 *
 * @package kennedyfg
 */

$args   = wp_parse_args(
	$args ?? array(),
	array(
		'label' => __( 'Start Here', 'kennedyfg' ),
		'href'  => '#',
		'state' => '',
		'class' => '',
	)
);
$state  = sanitize_html_class( $args['state'] );
$classes = trim( 'button-nav button-nav ' . $state . ' ' . $args['class'] );
?>
<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $args['href'] ); ?>">
	<span><?php echo esc_html( $args['label'] ); ?></span>
	<img class="button-nav-icon button-nav-icon" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-navbar-arrow.svg' ) ); ?>" alt="" width="5" height="10" />
</a>
