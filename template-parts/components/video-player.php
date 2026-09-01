<?php
/**
 * Responsive video embed from an oEmbed or native video URL.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'html'  => '',
		'url'   => '',
		'class' => '',
	)
);

$html = $args['html'];
if ( ! $html && $args['url'] ) {
	$html = kennedy_fg_get_video_embed_html( $args['url'] );
}
if ( ! $html ) {
	return;
}

$classes = trim( 'video-player wp-block-embed is-type-video wp-embed-aspect-16-9 wp-has-aspect-ratio ' . $args['class'] );
?>
<div class="<?php echo esc_attr( $classes ); ?>">
	<div class="wp-block-embed__wrapper">
		<?php echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- oEmbed / wp_video_shortcode HTML. ?>
	</div>
</div>
