<?php
/**
 * Site logo, light and dark files.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'href'  => home_url( '/' ),
		'size'  => 'nav',
		'class' => '',
	)
);
$is_footer  = 'footer' === $args['size'];
$is_compact = 'compact' === $args['size'];
$width      = $is_footer ? 240 : ( $is_compact ? 156 : 196 );
$height     = $is_footer ? 49 : ( $is_compact ? 32 : 40 );
?>
<a class="<?php echo esc_attr( trim( 'site-logo ' . $args['class'] ) ); ?>" href="<?php echo esc_url( $args['href'] ); ?>" rel="home">
	<img
		class="site-logo-light"
		src="<?php echo esc_url( kennedy_fg_asset( 'brand/kennedyfg-logo.png' ) ); ?>"
		alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
		width="<?php echo esc_attr( (string) $width ); ?>"
		height="<?php echo esc_attr( (string) $height ); ?>"
	/>
	<img
		class="site-logo-dark"
		src="<?php echo esc_url( kennedy_fg_asset( 'brand/logo-kennedy-dark.svg' ) ); ?>"
		alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
		width="<?php echo esc_attr( (string) $width ); ?>"
		height="<?php echo esc_attr( (string) $height ); ?>"
	/>
</a>
