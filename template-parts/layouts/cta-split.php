<?php
/**
 * Split CTA band used across most pages.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'Ready to know when you can walk free?', 'kennedyfg' ),
		'lede'  => __( 'Our <strong>Guided Retirement Roadmap</strong> can show you how close you are', 'kennedyfg' ),
		'cta'   => __( 'Book your chat', 'kennedyfg' ),
		'note'        => __( 'A 30-min Sounding Board Session to see if we fit', 'kennedyfg' ),
		'href'        => home_url( '/start-here/' ),
		'class'       => '',
		'people'      => kennedy_fg_asset( 'layouts/graphic-couple-silhouette.svg' ),
		'people_dark' => kennedy_fg_asset( 'layouts/graphic-couple-silhouette-dark.svg' ),
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-cta-split alignfull ' . $args['class'] ) ); ?>">
	<img class="layout-cta-split-wave is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-cta-wave.svg' ) ); ?>" alt="" />
	<img class="layout-cta-split-wave is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-cta-wave-dark.svg' ) ); ?>" alt="" />
	<div class="layout-cta-split-frame">
		<div class="alignwide layout-cta-split-inner">
			<div class="layout-cta-split-copy">
				<h2><?php echo esc_html( $args['title'] ); ?></h2>
				<p><?php echo wp_kses_post( $args['lede'] ); ?></p>
			</div>
			<div class="layout-cta-split-action">
				<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'class' => 'calendar-trigger' ) ); ?>
				<?php if ( $args['note'] ) : ?>
					<p><?php echo esc_html( $args['note'] ); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php
		$people_light_path = kennedy_fg_asset_relative_path( $args['people'] );
		if ( ! $people_light_path ) {
			$people_light_path = 'layouts/graphic-couple-silhouette.svg';
		}

		echo kennedy_fg_inline_svg(
			$people_light_path,
			array(
				'class' => 'layout-cta-split-people is-light',
			)
		);
		?>
		<img class="layout-cta-split-people is-dark" src="<?php echo esc_url( $args['people_dark'] ); ?>" alt="" />
	</div>
</section>
