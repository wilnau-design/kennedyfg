<?php
/**
 * Homepage Guided Retirement Roadmap.
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
		'stops' => array(
			array(
				'class'  => 'is-map',
				'title'  => __( 'Map your retirement income', 'kennedyfg' ),
				'blurb'  => __( 'Know the exact dollar you can spend, and the date', 'kennedyfg' ),
				'icon'   => 'graphic-map-income.svg',
				'mobile' => 'graphic-roadmap-map-mobile.svg',
				'pin'    => 'graphic-roadmap-pin-map.svg',
				'dark'   => 'graphic-roadmap-pin-map-dark.svg',
				'iw'     => 63,
				'ih'     => 64,
				'mw'     => 86,
				'mh'     => 86,
			),
			array(
				'class'  => 'is-align',
				'title'  => __( 'Align your investments', 'kennedyfg' ),
				'blurb'  => __( 'Your income plan first, not somebody’s commission', 'kennedyfg' ),
				'icon'   => 'graphic-align-investments.svg',
				'mobile' => 'graphic-roadmap-align-mobile.svg',
				'pin'    => 'graphic-roadmap-pin-align.svg',
				'dark'   => 'graphic-roadmap-pin-align-dark.svg',
				'iw'     => 43,
				'ih'     => 64,
				'mw'     => 97,
				'mh'     => 100,
			),
			array(
				'class'  => 'is-taxes',
				'title'  => __( 'Manage your taxes', 'kennedyfg' ),
				'blurb'  => __( 'Stay ahead of the IRS and keep more of your money', 'kennedyfg' ),
				'icon'   => 'graphic-manage-taxes.svg',
				'mobile' => 'graphic-roadmap-taxes-mobile.svg',
				'pin'    => 'graphic-roadmap-pin-taxes.svg',
				'dark'   => 'graphic-roadmap-pin-taxes-dark.svg',
				'iw'     => 83,
				'ih'     => 64,
				'mw'     => 97,
				'mh'     => 74,
			),
			array(
				'class'  => 'is-family',
				'title'  => __( 'Safeguard your family', 'kennedyfg' ),
				'blurb'  => __( 'Make sure your spouse and family is cared for', 'kennedyfg' ),
				'icon'   => 'graphic-safeguard-family.svg',
				'mobile' => 'graphic-roadmap-family-mobile.svg',
				'pin'    => 'graphic-roadmap-pin-family.svg',
				'dark'   => 'graphic-roadmap-pin-family-dark.svg',
				'iw'     => 78,
				'ih'     => 64,
				'mw'     => 97,
				'mh'     => 79,
			),
		),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-home-roadmap alignfull ' . $args['class'] ) ); ?>">
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
		<?php foreach ( $args['stops'] as $stop ) : ?>
			<div class="layout-home-roadmap-stop <?php echo esc_attr( $stop['class'] ); ?>">
				<div class="layout-home-roadmap-card">
					<img class="layout-home-roadmap-icon" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $stop['icon'] ) ); ?>" alt="" width="<?php echo (int) $stop['iw']; ?>" height="<?php echo (int) $stop['ih']; ?>" />
					<div class="layout-home-roadmap-copy-block">
						<p class="layout-home-roadmap-stop-title"><?php echo esc_html( $stop['title'] ); ?></p>
						<p class="layout-home-roadmap-blurb"><?php echo esc_html( $stop['blurb'] ); ?></p>
					</div>
				</div>
				<img class="layout-home-roadmap-pin is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $stop['pin'] ) ); ?>" alt="" width="32" height="57" />
				<img class="layout-home-roadmap-pin is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $stop['dark'] ) ); ?>" alt="" width="32" height="57" />
			</div>
		<?php endforeach; ?>
	</div>
	<div class="layout-home-roadmap-cards">
		<?php foreach ( $args['stops'] as $stop ) : ?>
			<article class="layout-home-roadmap-mobile-card <?php echo esc_attr( $stop['class'] ); ?>">
				<img src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $stop['mobile'] ) ); ?>" alt="" width="<?php echo (int) $stop['mw']; ?>" height="<?php echo (int) $stop['mh']; ?>" />
				<div>
					<p class="layout-home-roadmap-stop-title"><?php echo esc_html( $stop['title'] ); ?></p>
					<p><?php echo esc_html( $stop['blurb'] ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
