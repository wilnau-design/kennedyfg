<?php
/**
 * Sidebar lead-magnet CTA.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( '5 Little-Known Tips for Lowering Taxes in Retirement in 2026', 'kennedyfg' ),
		'href'  => home_url( '/guide/' ),
		'label' => __( 'Free Instant Access', 'kennedyfg' ),
		'image' => kennedy_fg_asset( 'content/graphic-footer-magnet.webp' ),
		'class' => '',
	)
);
?>
<aside class="<?php echo esc_attr( trim( 'side-cta side-cta ' . $args['class'] ) ); ?>">
	<div class="side-cta-media side-cta-media">
		<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" width="240" height="223" />
	</div>
	<p class="side-cta-title side-cta-title"><?php echo esc_html( $args['title'] ); ?></p>
	<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['label'], 'href' => $args['href'] ) ); ?>
</aside>
