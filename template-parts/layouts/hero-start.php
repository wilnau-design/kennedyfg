<?php
/**
 * Start Here page hero with topographic copy band and photo.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title_before' => __( 'Start with a', 'kennedyfg' ),
		'title_mark'   => __( 'Sounding Board Session', 'kennedyfg' ),
		'lede'         => __( 'A 30-minute chat to see if we’re the right fit', 'kennedyfg' ),
		'cta'          => __( 'Book it here', 'kennedyfg' ),
		'href'         => '#kennedy-calendar',
		'image'        => kennedy_fg_asset( 'layouts/hero-start-here.webp' ),
		'steps'        => array(
			array(
				'num'   => '01',
				'title' => __( 'A 30-Minute Sounding Board Session', 'kennedyfg' ),
				'class' => 'is-one',
			),
			array(
				'num'   => '02',
				'title' => __( 'A 60-Minute Discovery Meeting', 'kennedyfg' ),
				'class' => 'is-two',
			),
			array(
				'num'   => '03',
				'title' => __( 'Personal Assessment', 'kennedyfg' ),
				'class' => 'is-three',
			),
		),
		'class'        => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-hero-start alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-hero-start-band">
		<img class="layout-hero-start-topo is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-start-here-topo.svg' ) ); ?>" alt="" />
		<img class="layout-hero-start-topo is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-start-here-topo-dark.svg' ) ); ?>" alt="" />
		<div class="layout-hero-start-steps" aria-hidden="true">
			<?php foreach ( $args['steps'] as $step ) : ?>
				<div class="layout-hero-start-step <?php echo esc_attr( $step['class'] ); ?>">
					<p class="layout-hero-start-step-label"><?php echo esc_html( $step['title'] ); ?></p>
					<span class="layout-hero-start-step-num"><?php echo esc_html( $step['num'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="alignwide layout-hero-start-copy">
			<div class="layout-hero-start-left">
				<h1>
					<?php echo esc_html( $args['title_before'] ); ?><br />
					<span class="layout-hero-start-mark"><?php echo esc_html( $args['title_mark'] ); ?></span><span class="layout-hero-start-tm"><?php esc_html_e( '™', 'kennedyfg' ); ?></span>
				</h1>
				<p><?php echo esc_html( $args['lede'] ); ?></p>
			</div>
			<div class="layout-hero-start-cta">
				<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'variant' => 'short', 'class' => 'calendar-trigger' ) ); ?>
			</div>
		</div>
	</div>
	<figure class="layout-hero-start-media">
		<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
	</figure>
</section>
