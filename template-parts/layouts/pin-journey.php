<?php
/**
 * Homepage pin-journey: CTAs plus qualifier list.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'intro'      => array(
			'title_before' => __( 'We give you the roadmap and guide you every step of your ', 'kennedyfg' ),
			'title_mark'   => __( 'journey', 'kennedyfg' ),
			'title_after'  => '.',
			'cta'          => __( 'Start Here', 'kennedyfg' ),
			'note'         => __( 'Book a casual chat to see if we fit', 'kennedyfg' ),
			'href'         => home_url( '/start-here/' ),
			'variant'      => 'short',
		),
		'aside'      => array(
			'line_before' => __( 'We’re not for ', 'kennedyfg' ),
			'line_mark'   => __( 'everybody', 'kennedyfg' ),
			'line_after'  => __( '.', 'kennedyfg' ),
			'line_two'    => __( 'But if you want…', 'kennedyfg' ),
		),
		'items'      => array(
			array(
				'title' => __( 'A one-on-one guide', 'kennedyfg' ),
				'text'  => __( 'who’s in it with you for the long haul', 'kennedyfg' ),
				'icon'  => 'graphic-guide-couple.svg',
				'dark'  => 'graphic-guide-couple-dark.svg',
				'class' => 'is-guide',
			),
			array(
				'title' => __( 'Straight answers', 'kennedyfg' ),
				'text'  => __( 'from someone who actually listens to what matters most to you', 'kennedyfg' ),
				'icon'  => 'graphic-guide-answers.svg',
				'dark'  => 'graphic-guide-answers-dark.svg',
				'class' => 'is-answers',
			),
			array(
				'title' => __( 'To circle your last day of work', 'kennedyfg' ),
				'text'  => __( 'on your calendar with a smile on your face', 'kennedyfg' ),
				'icon'  => 'graphic-chilling.svg',
				'dark'  => 'graphic-chilling-dark.svg',
				'class' => 'is-chilling',
			),
		),
		'outro'      => array(
			'title_before' => __( 'We help you ', 'kennedyfg' ),
			'title_mark'   => __( 'pinpoint', 'kennedyfg' ),
			'title_after'  => __( ' the date you can walk free and “live your bucket list.”', 'kennedyfg' ),
			'cta'     => __( 'Click here to get started', 'kennedyfg' ),
			'note'    => __( 'A casual 30-min chat to see if we fit', 'kennedyfg' ),
			'href'    => home_url( '/start-here/' ),
			'variant' => 'main',
		),
		'class'      => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-pin-journey alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-pin-journey-intro">
		<h2>
			<?php echo esc_html( $args['intro']['title_before'] ); ?><span class="layout-pin-journey-mark"><?php echo esc_html( $args['intro']['title_mark'] ); ?></span><span class="layout-pin-journey-companion"><?php echo esc_html( $args['intro']['title_after'] ); ?><img class="is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-companion-dot.svg' ) ); ?>" alt="" /><img class="is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-companion-dot-dark.svg' ) ); ?>" alt="" /></span>
		</h2>
		<div class="layout-pin-journey-cta">
			<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['intro']['cta'], 'href' => $args['intro']['href'], 'variant' => $args['intro']['variant'], 'class' => 'calendar-trigger' ) ); ?>
			<p class="layout-pin-journey-note"><?php echo esc_html( $args['intro']['note'] ); ?></p>
		</div>
	</div>
	<div class="layout-pin-journey-section">
		<div class="layout-pin-journey-points">
			<h3 class="layout-pin-journey-aside">
				<?php echo esc_html( $args['aside']['line_before'] ); ?><span class="layout-pin-journey-mark"><?php echo esc_html( $args['aside']['line_mark'] ); ?></span><?php echo esc_html( $args['aside']['line_after'] ); ?><br />
				<?php echo esc_html( $args['aside']['line_two'] ); ?>
			</h3>
			<ul class="layout-pin-journey-list">
				<?php foreach ( $args['items'] as $item ) : ?>
					<li class="<?php echo esc_attr( $item['class'] ); ?>">
						<span class="layout-pin-journey-icon">
							<img class="is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $item['icon'] ) ); ?>" alt="" />
							<img class="is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $item['dark'] ) ); ?>" alt="" />
						</span>
						<div class="layout-pin-journey-item-copy">
							<p class="layout-pin-journey-item-title"><?php echo esc_html( $item['title'] ); ?></p>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="layout-pin-journey-outro">
			<h2><?php echo esc_html( $args['outro']['title_before'] ); ?><span class="layout-pin-journey-mark"><?php echo esc_html( $args['outro']['title_mark'] ); ?></span><?php echo esc_html( $args['outro']['title_after'] ); ?></h2>
			<div class="layout-pin-journey-cta">
				<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['outro']['cta'], 'href' => $args['outro']['href'], 'variant' => $args['outro']['variant'], 'class' => 'calendar-trigger' ) ); ?>
				<p class="layout-pin-journey-note"><?php echo esc_html( $args['outro']['note'] ); ?></p>
			</div>
		</div>
	</div>
</section>
