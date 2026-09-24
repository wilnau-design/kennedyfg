<?php
/**
 * Homepage "Where do I stand" section with interactive pins.
 *
 * Pins (hover and open) are desktop and tablet. Mobile keeps the card stack.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( '“Where do I stand and what comes next?”', 'kennedyfg' ),
		'cta'   => __( 'How it works', 'kennedyfg' ),
		'href'  => home_url( '/process/' ),
		'lede'  => sprintf(
			/* translators: 1: opening strong tag, 2: closing strong tag */
			__( 'Our %1$sGuided Retirement Roadmap%2$s can show you how to:', 'kennedyfg' ),
			'<strong>',
			'</strong>'
		),
		'services' => array( 'income', 'investments', 'taxes', 'family' ),
		'stops'    => array(
			array(
				'slug'   => 'income',
				'class'  => 'is-map',
				'title'  => __( 'Map your retirement income', 'kennedyfg' ),
				'blurb'  => __( 'Create clarity around when you can retire, what it will cost, and where your income will come from.', 'kennedyfg' ),
				'mobile' => 'graphic-roadmap-map-mobile.svg',
				'mw'     => 86,
				'mh'     => 86,
			),
			array(
				'slug'   => 'investments',
				'class'  => 'is-align',
				'title'  => __( 'Align your investments', 'kennedyfg' ),
				'blurb'  => __( 'Build an investment strategy with the right balance of safety, income, and growth to support your plan over a 30+ year retirement.', 'kennedyfg' ),
				'mobile' => 'graphic-roadmap-align-mobile.svg',
				'mw'     => 97,
				'mh'     => 100,
			),
			array(
				'slug'   => 'taxes',
				'class'  => 'is-taxes',
				'title'  => __( 'Manage your taxes', 'kennedyfg' ),
				'blurb'  => __( 'Build a proactive tax strategy that helps reduce how much the IRS reaches into your pocket.', 'kennedyfg' ),
				'mobile' => 'graphic-roadmap-taxes-mobile.svg',
				'mw'     => 97,
				'mh'     => 74,
			),
			array(
				'slug'   => 'family',
				'class'  => 'is-family',
				'title'  => __( 'Safeguard your family', 'kennedyfg' ),
				'blurb'  => __( 'An intentional strategy to plan for the unexpected, protect what you’ve built, and live out your legacy for the people and causes that matter most.', 'kennedyfg' ),
				'mobile' => 'graphic-roadmap-family-mobile.svg',
				'mw'     => 97,
				'mh'     => 79,
			),
		),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-home-roadmap layout-journey-pins alignfull ' . $args['class'] ) ); ?>" data-journey-pins>
	<div class="layout-home-roadmap-copy">
		<div class="layout-home-roadmap-heading">
			<h2><?php echo esc_html( $args['title'] ); ?></h2>
			<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'variant' => 'short' ) ); ?>
		</div>
		<p class="layout-home-roadmap-lede"><?php echo wp_kses( $args['lede'], array( 'strong' => array() ) ); ?></p>
	</div>
	<div class="layout-home-roadmap-scene" aria-hidden="true">
		<img class="layout-home-roadmap-path is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-roadmap-path.svg' ) ); ?>" alt="" width="1686" height="241" />
		<img class="layout-home-roadmap-path is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-roadmap-path-dark.svg' ) ); ?>" alt="" width="1686" height="241" />
		<img class="layout-home-roadmap-walker is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-person-walking.svg' ) ); ?>" alt="" width="56" height="77" />
		<img class="layout-home-roadmap-walker is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-person-walking-dark.svg' ) ); ?>" alt="" width="56" height="77" />
	</div>
	<div class="layout-journey-pins-stops">
		<?php foreach ( $args['services'] as $index => $service ) : ?>
			<?php
			kennedy_fg_component(
				'journey-pin',
				array(
					'service' => $service,
					'state'   => 0 === $index ? 'is-open' : '',
				)
			);
			?>
		<?php endforeach; ?>
	</div>
	<div class="layout-home-roadmap-cards">
		<?php foreach ( $args['stops'] as $stop ) : ?>
			<article class="layout-home-roadmap-mobile-card <?php echo esc_attr( $stop['class'] ); ?>">
				<div class="layout-home-roadmap-mobile-inner">
					<img src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $stop['mobile'] ) ); ?>" alt="" width="<?php echo (int) $stop['mw']; ?>" height="<?php echo (int) $stop['mh']; ?>" />
					<div>
						<p class="layout-home-roadmap-stop-title"><?php echo esc_html( $stop['title'] ); ?></p>
						<p><?php echo esc_html( $stop['blurb'] ); ?></p>
						<a class="layout-home-roadmap-more" href="<?php echo esc_url( home_url( '/process/#' . $stop['slug'] ) ); ?>"><?php esc_html_e( 'Learn more', 'kennedyfg' ); ?><span class="service-pin-arrow" aria-hidden="true"></span></a>
					</div>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
