<?php
/**
 * Library-only light/dark toggle.
 *
 * @package kennedyfg
 */

$args  = wp_parse_args(
	$args ?? array(),
	array(
		'mode'  => 'light',
		'class' => '',
	)
);
$is_dark = 'dark' === $args['mode'];
$classes = trim( 'theme-toggle ' . ( $is_dark ? 'is-dark' : 'is-light' ) . ' ' . $args['class'] );
?>
<button
	class="<?php echo esc_attr( $classes ); ?>"
	type="button"
	aria-pressed="<?php echo $is_dark ? 'true' : 'false'; ?>"
	aria-label="<?php echo $is_dark ? esc_attr__( 'Switch to light theme', 'kennedyfg' ) : esc_attr__( 'Switch to dark theme', 'kennedyfg' ); ?>"
>
	<span class="theme-toggle-track">
		<span class="theme-toggle-knob">
			<img class="theme-toggle-sun" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-sun.svg' ) ); ?>" alt="" width="20" height="20" />
			<img class="theme-toggle-moon" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-moon.svg' ) ); ?>" alt="" width="24" height="24" />
		</span>
	</span>
</button>
