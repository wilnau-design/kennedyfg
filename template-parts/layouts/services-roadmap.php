<?php
/**
 * Services anti-positioning plus four roadmap cards.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'anti'      => __( 'If you’re looking for aggressive bets, “market timing,” or one-off advice... ', 'kennedyfg' ),
		'emphasis'  => __( 'that’s not us.', 'kennedyfg' ),
		'lead'      => __( 'Here’s what we actually do:', 'kennedyfg' ),
		'cards'     => array(
			array(
				'title' => __( 'Map Your Retirement Income.', 'kennedyfg' ),
				'text'  => __( 'A date- and dollar-specific plan that ties your savings, portfolio income, and Social Security into one number you can spend confidently.', 'kennedyfg' ),
				'means' => array(
					__( 'You leave with a real retirement date and a real monthly income figure, not a vague “you’re probably fine.”', 'kennedyfg' ),
					__( 'You see how the picture shifts if you go at 60, 62, or 65, so the timing is your call instead of a guess.', 'kennedyfg' ),
					__( 'If you’re already past the finish line, you find out. A lot of people are and have no idea.', 'kennedyfg' ),
				),
				'icon'  => 'graphic-service-map.svg',
				'class' => 'is-map',
			),
			array(
				'title' => __( 'Align Your Investments.', 'kennedyfg' ),
				'text'  => __( 'A low-cost, tax-efficient portfolio built around your income plan, not around somebody’s commission.', 'kennedyfg' ),
				'means' => array(
					__( 'Every year we do a tax review and look for opportunities to help you pay less over time', 'kennedyfg' ),
					__( 'We adjust your plan as laws change so your roadmap stays current and tax-smart', 'kennedyfg' ),
				),
				'icon'  => 'graphic-service-align.svg',
				'class' => 'is-align',
			),
			array(
				'title' => __( 'Manage Your Taxes.', 'kennedyfg' ),
				'text'  => __( 'Annual tax review, strategies and proactive plan adjustments to help keep the IRS out of your pocket.', 'kennedyfg' ),
				'means' => array(
					__( 'Your investments are matched to your goals and your withdrawal plan, not dropped into a cookie-cutter model everyone else gets.', 'kennedyfg' ),
					__( 'We plan for the down years ahead of time instead of reacting to them, so you’re not watching the market every day trying to time it.', 'kennedyfg' ),
				),
				'icon'  => 'graphic-service-taxes.svg',
				'class' => 'is-taxes',
			),
			array(
				'title' => __( 'Safeguard Your Family.', 'kennedyfg' ),
				'text'  => __( 'Estate plan, insurance, and the systems that make sure your spouse is taken care of if something happens to you.', 'kennedyfg' ),
				'means' => array(
					__( 'You and your spouse leave every meeting understanding where things stand', 'kennedyfg' ),
					__( 'If you’re not here one day, your spouse already knows us and has a clear set of next steps, instead of facing a stranger and a stack of paperwork.', 'kennedyfg' ),
					__( 'Coverage gaps, and estate documents get checked and kept current, so nothing important slips through.', 'kennedyfg' ),
				),
				'icon'  => 'graphic-service-family.svg',
				'class' => 'is-family',
			),
		),
		'class'     => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-services-roadmap alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-services-anti">
		<p class="layout-services-anti-body">
			<?php echo esc_html( $args['anti'] ); ?>
			<strong class="layout-services-anti-emphasis"><?php echo esc_html( $args['emphasis'] ); ?></strong>
		</p>
		<p class="layout-services-anti-lead"><?php echo esc_html( $args['lead'] ); ?></p>
	</div>
	<div class="layout-services-track">
		<div class="layout-services-path-wrap">
			<img class="layout-services-path is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-services-path.svg' ) ); ?>" alt="" />
			<img class="layout-services-path is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-services-path-dark.svg' ) ); ?>" alt="" />
		</div>
		<img class="layout-services-walker is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-services-walker.svg' ) ); ?>" alt="" />
		<img class="layout-services-walker is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-services-walker-dark.svg' ) ); ?>" alt="" />
		<?php foreach ( $args['cards'] as $card ) : ?>
			<article class="layout-service-card <?php echo esc_attr( $card['class'] ); ?>">
				<img src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $card['icon'] ) ); ?>" alt="" />
				<div class="layout-service-card-copy">
					<h2><?php echo esc_html( $card['title'] ); ?></h2>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</div>
				<hr />
				<div class="layout-service-means-block">
					<p class="layout-service-means"><?php esc_html_e( 'What that means for you:', 'kennedyfg' ); ?></p>
					<ul>
						<?php foreach ( $card['means'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
