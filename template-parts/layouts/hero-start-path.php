<?php
/**
 * Start Here hero: headline, numbered path pins, and shoreline photo.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title_before' => __( 'Start with a', 'kennedyfg' ),
		'title_mark'   => __( 'Sounding Board Session', 'kennedyfg' ),
		'lede_before'  => __( 'A 30-minute chat to see if we’re ', 'kennedyfg' ),
		'lede_mark'    => __( 'the right fit', 'kennedyfg' ),
		'cta'          => __( 'Book it here', 'kennedyfg' ),
		'href'         => '#kennedy-calendar',
		'image'        => kennedy_fg_asset( 'layouts/hero-start-path.webp' ),
		'pins'         => array(
			array(
				'num'   => '01',
				'label' => __( 'A 30-Minute Sounding Board Session', 'kennedyfg' ),
				'pin'   => '1',
			),
			array(
				'num'   => '02',
				'label' => __( 'A 60-Minute Discovery Meeting', 'kennedyfg' ),
				'pin'   => '2',
			),
			array(
				'num'   => '03',
				'label' => __( 'Personal Assessment', 'kennedyfg' ),
				'pin'   => '3',
			),
		),
		'class'        => '',
	)
);

$path = 'M1.50006 137.515C76.0001 132.515 54.2259 324.514 120.5 298.5C227.5 256.5 194.863 330.307 262.5 362.5C366.5 412 371.356 250.197 466.5 218.015C571.5 182.5 488.405 94.3052 563 65C647 32.0001 640.811 72.3115 695.5 57.5C743.5 44.5 743.5 1.5 802 1.5C888.962 1.5 836 93 922.5 126';
?>
<section class="<?php echo esc_attr( trim( 'layout-hero-start-path alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-hero-start-path-band">
		<div class="alignwide layout-hero-start-path-copy">
			<div class="layout-hero-start-path-left">
				<h1>
					<?php echo esc_html( $args['title_before'] ); ?><br />
					<span><?php echo esc_html( $args['title_mark'] ); ?></span><sup><?php echo esc_html( '™' ); ?></sup>
				</h1>
				<p>
					<?php echo esc_html( $args['lede_before'] ); ?>
					<strong class="layout-hero-start-path-fit">
						<?php echo esc_html( $args['lede_mark'] ); ?>
						<span class="layout-hero-start-path-underline" aria-hidden="true"></span>
					</strong>
				</p>
			</div>
			<div class="layout-hero-start-path-cta">
				<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'variant' => 'short', 'class' => 'calendar-trigger' ) ); ?>
			</div>
		</div>
	</div>
	<figure class="layout-hero-start-path-media">
		<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
	</figure>
	<div class="layout-hero-start-path-art" aria-hidden="true">
		<?php foreach ( array( 'is-copy', 'is-media' ) as $layer ) : ?>
			<svg class="layout-hero-start-path-line <?php echo esc_attr( $layer ); ?>" viewBox="0 0 924 373.342" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="<?php echo esc_attr( $path ); ?>" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		<?php endforeach; ?>
		<img class="layout-hero-start-path-end" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-start-path-end.svg' ) ); ?>" alt="" width="89" height="90" />
		<?php foreach ( $args['pins'] as $pin ) : ?>
			<div class="layout-hero-start-path-pin is-pin-<?php echo esc_attr( $pin['pin'] ); ?>">
				<span><?php echo esc_html( $pin['label'] ); ?></span>
				<img src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-start-pin-' . $pin['pin'] . '.svg' ) ); ?>" alt="" width="30" height="48" />
			</div>
		<?php endforeach; ?>
	</div>
</section>
