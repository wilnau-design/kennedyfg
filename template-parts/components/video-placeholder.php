<?php
/**
 * Video placeholder with play overlay.
 *
 * @package kennedyfg
 */

$args    = wp_parse_args(
	$args ?? array(),
	array(
		'state'      => '',
		'image'      => '',
		'href'       => '',
		'embed_src'  => '',
		'aria_label' => '',
		'class'      => '',
	)
);
$classes   = trim( 'video-placeholder video-placeholder ' . sanitize_html_class( $args['state'] ) . ' ' . $args['class'] );
$label     = $args['aria_label'] ? $args['aria_label'] : __( 'Play video', 'kennedyfg' );
$is_link   = '' !== $args['href'];
$embed_src = $args['embed_src'] ? esc_url( $args['embed_src'] ) : '';
$embed_attr = $embed_src ? ' data-video-embed="' . esc_attr( $embed_src ) . '"' : '';
?>
<?php if ( $is_link ) : ?>
<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $args['href'] ); ?>" aria-label="<?php echo esc_attr( $label ); ?>"<?php echo $embed_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
<?php else : ?>
<button class="<?php echo esc_attr( $classes ); ?>" type="button" aria-label="<?php echo esc_attr( $label ); ?>"<?php echo $embed_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
<?php endif; ?>
	<span class="video-placeholder-surface video-placeholder-surface">
		<?php if ( $args['image'] ) : ?>
			<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
		<?php endif; ?>
	</span>
	<img class="video-placeholder-play video-placeholder-play" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-play-button.svg' ) ); ?>" alt="" width="123" height="88" />
	<span class="video-placeholder-spinner" hidden aria-live="polite">
		<span class="video-placeholder-spinner-ring" aria-hidden="true"></span>
		<span class="screen-reader-text"><?php esc_html_e( 'Loading video', 'kennedyfg' ); ?></span>
	</span>
<?php if ( $is_link ) : ?>
</a>
<?php else : ?>
</button>
<?php endif; ?>
