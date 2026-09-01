<?php
/**
 * Centered closing CTA, often on a navy band.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'   => __( 'Am I ready to quit working for good?', 'kennedyfg' ),
		'lede'    => __( 'Book a Sounding Board Session to find out', 'kennedyfg' ),
		'cta'         => __( 'Book your chat', 'kennedyfg' ),
		'cta_variant' => 'main',
		'note'        => __( 'A 30-min chat to see if we fit', 'kennedyfg' ),
		'href'        => home_url( '/start-here/' ),
		'variant'     => 'navy',
		'class'       => '',
		'people'          => '',
		'people_inline'   => '',
		'people_dark'     => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-cta-center alignfull is-' . $args['variant'] . ' ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-cta-center-inner">
		<h2><?php echo esc_html( $args['title'] ); ?></h2>
		<?php if ( $args['lede'] ) : ?>
			<p class="layout-cta-center-lede"><?php echo esc_html( $args['lede'] ); ?></p>
		<?php endif; ?>
		<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'variant' => $args['cta_variant'], 'class' => 'calendar-trigger' ) ); ?>
		<?php if ( $args['note'] ) : ?>
			<p class="layout-cta-center-note"><?php echo esc_html( $args['note'] ); ?></p>
		<?php endif; ?>
	</div>
	<?php if ( $args['people_inline'] ) : ?>
		<?php
		echo kennedy_fg_inline_svg(
			$args['people_inline'],
			array(
				'class' => 'layout-cta-center-people is-light',
			)
		);
		?>
		<?php if ( $args['people_dark'] ) : ?>
			<img class="layout-cta-center-people is-dark" src="<?php echo esc_url( $args['people_dark'] ); ?>" alt="" />
		<?php endif; ?>
	<?php elseif ( $args['people'] ) : ?>
		<img class="layout-cta-center-people is-light" src="<?php echo esc_url( $args['people'] ); ?>" alt="" />
		<img class="layout-cta-center-people is-dark" src="<?php echo esc_url( $args['people_dark'] ? $args['people_dark'] : $args['people'] ); ?>" alt="" />
	<?php endif; ?>
</section>

