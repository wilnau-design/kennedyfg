<?php
/**
 * Homepage hero: headline, path pins, CTA, shoreline photo.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'       => __( 'Plain-English retirement planning for humble, hard working', 'kennedyfg' ),
		'accent'      => __( 'Michiganders', 'kennedyfg' ),
		'lede_before' => __( 'Pinpoint the ', 'kennedyfg' ),
		'lede_mark'   => __( 'day', 'kennedyfg' ),
		'lede_after'  => __( ' you can walk free without second guessing', 'kennedyfg' ),
		'cta'         => __( 'Book a Sounding Board Session', 'kennedyfg' ),
		'note'        => __( 'A casual 30-min chat to see if we fit', 'kennedyfg' ),
		'href'        => home_url( '/start-here/' ),
		'image'       => kennedy_fg_asset( 'layouts/hero-home.webp' ),
		'pins'        => array(
			array( 'label' => __( 'Map your income', 'kennedyfg' ), 'pin' => '1' ),
			array( 'label' => __( 'Align investments', 'kennedyfg' ), 'pin' => '2' ),
			array( 'label' => __( 'Manage taxes', 'kennedyfg' ), 'pin' => '3' ),
			array( 'label' => __( 'Safeguard family', 'kennedyfg' ), 'pin' => '4' ),
		),
		'class'       => '',
	)
);

$path_wide    = 'M1 132.742C26 164.244 71 198.244 146 198.244C238.5 198.244 281.363 252.051 349 284.244C453 333.744 440 203.744 601 174.244C711.048 154.08 635.238 20.5157 713.5 3.24408C786 -12.7559 821.311 62.5555 876 47.744C924 34.744 935.5 5.24399 994 5.24399C1080.96 5.24399 1093 79.7438 1143.5 81.7422';
$path_tablet  = 'M1.23332 1.23332C60.9539 55.4992 207.718 29.9329 207.718 85.7154C207.718 154.514 53.0309 117.445 73.2871 178.214C102.27 265.163 286.083 169.178 255.201 290.446C229.918 389.727 88.3951 344.468 67.1205 402.677C47.4122 456.6 111.52 372.461 111.52 421.177';
$path_compact = 'M1 1C49.4228 45 168.423 24.2702 168.423 69.5C168.423 125.283 42.9987 95.2274 59.4229 144.5C82.9228 215 231.963 137.173 206.923 235.5C186.423 316 71.6728 279.303 54.4229 326.5C38.4429 370.222 90.4227 302 90.4227 341.5';
$path_variants = array(
	'is-wide'    => array(
		'view' => '0 0 1145 297',
		'd'    => $path_wide,
	),
	'is-tablet'  => array(
		'view' => '0 0 259.918 422.735',
		'd'    => $path_tablet,
	),
	'is-compact' => array(
		'view' => '0 0 211 343',
		'd'    => $path_compact,
	),
);
?>
<section class="<?php echo esc_attr( trim( 'layout-hero-home alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-hero-home-copy">
		<div class="alignwide layout-hero-home-copy-inner">
			<div class="layout-hero-home-left">
				<h1 class="layout-hero-home-title">
					<?php echo esc_html( $args['title'] ); ?>
					<span><?php echo esc_html( $args['accent'] ); ?></span>
				</h1>
				<p class="layout-hero-home-lede">
					<?php echo esc_html( $args['lede_before'] ); ?>
					<span class="layout-hero-home-day">
						<?php echo esc_html( $args['lede_mark'] ); ?>
						<span class="layout-hero-home-day-mark" aria-hidden="true"></span>
					</span>
					<?php echo esc_html( $args['lede_after'] ); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="layout-hero-home-media">
		<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
	</div>
	<div class="layout-hero-home-cta">
		<div class="alignwide layout-hero-home-cta-inner">
			<div class="layout-hero-home-cta-cluster">
				<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'range_break' => true ) ); ?>
				<p class="layout-hero-home-note"><?php echo esc_html( $args['note'] ); ?></p>
			</div>
		</div>
	</div>
	<div class="layout-hero-home-path-wrap" aria-hidden="true">
		<?php foreach ( $path_variants as $variant => $path ) : ?>
			<?php foreach ( array( 'is-copy', 'is-media', 'is-cta' ) as $layer ) : ?>
				<svg class="layout-hero-home-path <?php echo esc_attr( $layer . ' ' . $variant ); ?>" viewBox="<?php echo esc_attr( $path['view'] ); ?>" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="<?php echo esc_attr( $path['d'] ); ?>" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
				</svg>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
	<div class="layout-hero-home-pins" aria-hidden="true">
		<?php foreach ( $args['pins'] as $pin ) : ?>
			<div class="layout-hero-home-pin is-pin-<?php echo esc_attr( $pin['pin'] ); ?>">
				<span><?php echo esc_html( $pin['label'] ); ?></span>
				<img class="is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $pin['pin'] . '.svg' ) ); ?>" alt="" width="31" height="48" />
				<img class="is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-hero-pin-' . $pin['pin'] . '-dark.svg' ) ); ?>" alt="" width="31" height="48" />
			</div>
		<?php endforeach; ?>
	</div>
</section>
