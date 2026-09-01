<?php
/**
 * Start Here soft-close band over a photo.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'Take your time.', 'kennedyfg' ),
		'text'  => __( 'We will never rush you on this decision. One of our favorite clients talked to us for a year before she ever became one. So sleep on it.', 'kennedyfg' ),
		'note'  => __( 'If we are not the right fit, all good. And you still walk away with total clarity on your next moves.', 'kennedyfg' ),
		'image' => kennedy_fg_asset( 'layouts/photo-start-here-close.webp' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-start-close alignfull ' . $args['class'] ) ); ?>">
	<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
	<div class="alignwide layout-start-close-inner">
		<div class="layout-start-close-copy">
			<h2><?php echo esc_html( $args['title'] ); ?></h2>
			<p><?php echo esc_html( $args['text'] ); ?></p>
		</div>
		<p class="layout-start-close-note"><?php echo esc_html( $args['note'] ); ?></p>
	</div>
</section>
