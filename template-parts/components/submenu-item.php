<?php
/**
 * Dropdown submenu row.
 *
 * @package kennedyfg
 */

$args    = wp_parse_args(
	$args ?? array(),
	array(
		'label'  => '',
		'href'   => '#',
		'state'  => '',
		'target' => '',
		'class'  => '',
	)
);
$classes = trim( 'submenu-item ' . sanitize_html_class( $args['state'] ) . ' ' . $args['class'] );
$target  = $args['target'] ? ' target="' . esc_attr( $args['target'] ) . '" rel="noopener noreferrer"' : '';
?>
<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $args['href'] ); ?>"<?php echo $target; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php echo esc_html( $args['label'] ); ?>
</a>
