<?php
/**
 * Calendly-style booking placeholder.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'Ready to get started?', 'kennedyfg' ),
		'lede'  => __( 'Book a free call below to take the first step.', 'kennedyfg' ),
		'cta'   => __( 'Book it here', 'kennedyfg' ),
		'href'  => 'https://go.oncehub.com/infocall?brdr=0px000000&dt=&em=1&Si=1',
		'class' => '',
	)
);
?>
<section id="kennedy-calendar" class="<?php echo esc_attr( trim( 'layout-calendar alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-calendar-inner">
		<h2><?php echo esc_html( $args['title'] ); ?></h2>
		<?php if ( $args['lede'] ) : ?>
			<p class="layout-calendar-lede"><?php echo esc_html( $args['lede'] ); ?></p>
		<?php endif; ?>
		<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'target' => '_blank' ) ); ?>
	</div>
</section>
