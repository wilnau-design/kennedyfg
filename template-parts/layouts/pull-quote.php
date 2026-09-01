<?php
/**
 * Portrait plus large pull quote.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'quote' => __( '“Knowing exactly where we are, what we have, the year we could walk away comfortably gave us a lot of confidence. It was the best thing we ever did.”', 'kennedyfg' ),
		'cite'  => __( '— B & B G., KFG client', 'kennedyfg' ),
		'image' => kennedy_fg_asset( 'layouts/image-pull-quote-portrait.webp' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-pull-quote alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-pull-quote-inner">
		<figure class="layout-pull-quote-media">
			<?php if ( $args['image'] ) : ?>
				<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
			<?php endif; ?>
		</figure>
		<div class="layout-pull-quote-copy">
			<blockquote class="layout-pull-quote-text"><?php echo esc_html( $args['quote'] ); ?></blockquote>
			<cite class="layout-pull-quote-cite"><?php echo esc_html( $args['cite'] ); ?></cite>
		</div>
	</div>
</section>
