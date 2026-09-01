<?php
/**
 * Featured portrait plus quote cards.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'image'    => kennedy_fg_asset( 'layouts/photo-client-story.webp' ),
		'featured' => array(
			'quote' => __( 'If something would happen to me, what I’m really happy about is I know [my wife] can trust Brandon now. She could go to him and feel very comfortable with what her next steps would look like for our family.', 'kennedyfg' ),
			'cite'  => __( '— K.K., KFG client', 'kennedyfg' ),
		),
		'quotes'   => array(
			array(
				'quote' => __( 'We like always knowing what’s happening with our money, what we’re doing and why.', 'kennedyfg' ),
				'cite'  => __( '— J.T., KFG client', 'kennedyfg' ),
			),
			array(
				'quote' => __( 'Knowing exactly where we are, what we have, the year we could walk away comfortably gave us a lot of confidence. It was the best thing we ever did.', 'kennedyfg' ),
				'cite'  => __( '— B & B G., KFG client', 'kennedyfg' ),
			),
			array(
				'quote' => __( 'He’s never rushed me. He’s a good guy that does a good job and knows what he’s doing.', 'kennedyfg' ),
				'cite'  => __( '— J.F., KFG client', 'kennedyfg' ),
			),
		),
		'class'    => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-testimonials alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-testimonials-inner">
		<div class="layout-testimonials-featured">
			<figure class="layout-testimonials-portrait">
				<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
			</figure>
			<blockquote class="layout-quote-card is-featured">
				<p><?php echo esc_html( $args['featured']['quote'] ); ?></p>
				<cite><?php echo esc_html( $args['featured']['cite'] ); ?></cite>
			</blockquote>
		</div>
		<div class="layout-testimonials-grid">
			<?php foreach ( $args['quotes'] as $quote ) : ?>
				<blockquote class="layout-quote-card">
					<p><?php echo esc_html( $quote['quote'] ); ?></p>
					<cite><?php echo esc_html( $quote['cite'] ); ?></cite>
				</blockquote>
			<?php endforeach; ?>
		</div>
	</div>
</section>
