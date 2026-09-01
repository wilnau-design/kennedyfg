<?php
/**
 * Footer text or social link.
 *
 * @package kennedyfg
 */

$args    = wp_parse_args(
	$args ?? array(),
	array(
		'label'  => '',
		'href'   => '#',
		'icon'   => '',
		'state'  => '',
		'target' => '',
		'class'  => '',
	)
);
$classes = trim( 'footer-link ' . ( $args['icon'] ? 'has-icon' : '' ) . ' ' . sanitize_html_class( $args['state'] ) . ' ' . $args['class'] );
$target  = $args['target'] ? ' target="' . esc_attr( $args['target'] ) . '" rel="noopener noreferrer"' : '';
?>
<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $args['href'] ); ?>"<?php echo $target; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( 'facebook' === $args['icon'] ) : ?>
		<img class="footer-link-icon is-default" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-facebook.svg' ) ); ?>" alt="" width="12" height="14" />
		<img class="footer-link-icon is-hover" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-facebook-hover.svg' ) ); ?>" alt="" width="8" height="14" />
	<?php elseif ( 'linkedin' === $args['icon'] ) : ?>
		<img class="footer-link-icon" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-linkedin.svg' ) ); ?>" alt="" width="12" height="12" />
	<?php endif; ?>
	<span><?php echo esc_html( $args['label'] ); ?></span>
</a>
