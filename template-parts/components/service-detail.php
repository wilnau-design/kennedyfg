<?php
/**
 * Services explorer detail panel.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'service' => 'income',
		'class'   => '',
	)
);

$catalog = array(
	'income'      => array(
		'title'    => __( 'Map Your Retirement Income', 'kennedyfg' ),
		'lead'     => __( 'Turn “I think I’m ready” into a plan to retire.', 'kennedyfg' ),
		'rest'     => __( ' Discover when you can retire, how much you’ll need, and where your income will come from.', 'kennedyfg' ),
		'means'    => array(
			__( 'Put a date and dollar amount on retirement: when you can stop working, how much you’ll need, and where your new paycheck will come from.', 'kennedyfg' ),
			__( 'Get a tailored plan for Social Security: how much to expect, the role it plays, and when to turn it on.', 'kennedyfg' ),
			__( 'Gain clarity on what your retirement lifestyle will actually cost - including everyday living, over and above purchases, bucket list travel, and the unexpected.', 'kennedyfg' ),
		),
		'icon'     => 'layouts/graphic-service-map.svg',
		'icon_w'   => 52,
		'icon_h'   => 52,
		'figure'   => 'layouts/graphic-person-diving.svg',
		'figure_dark' => 'layouts/graphic-person-diving-dark.svg',
		'figure_w' => 49,
		'figure_h' => 40,
		'prompt'   => __( "Want to dive in more?\nHere's how we think through this.", 'kennedyfg' ),
	),
	'investments' => array(
		'title'    => __( 'Align Your Investments', 'kennedyfg' ),
		'lead'     => __( 'Are your investments aligned with your retirement plan?', 'kennedyfg' ),
		'rest'     => __( ' Build an investment strategy designed to provide monthly income, fund larger purchases, navigate difficult markets, and keep growing for years to come.', 'kennedyfg' ),
		'means'    => array(
			__( 'Build a customized “bucket” strategy that gives every dollar a name and a goal, specific to your situation.', 'kennedyfg' ),
			__( 'Set aside money for short-term spending and planned expenses, so a temporary market decline doesn’t become a permanent loss.', 'kennedyfg' ),
			__( 'A low cost portfolio of investments that work together, free of overly complicated strategies, gimmicks or market timing.', 'kennedyfg' ),
		),
		'icon'     => 'layouts/graphic-align-investments.svg',
		'icon_w'   => 43,
		'icon_h'   => 64,
		'figure'   => 'layouts/graphic-person-sitting.svg',
		'figure_dark' => 'layouts/graphic-person-sitting-dark.svg',
		'figure_w' => 50,
		'figure_h' => 36,
		'prompt'   => __( "Ready to sit with this?\nHere's how we think through it.", 'kennedyfg' ),
	),
	'taxes'       => array(
		'title'    => __( 'Manage Your Taxes', 'kennedyfg' ),
		'lead'     => __( 'Don’t let taxes manage your retirement.', 'kennedyfg' ),
		'rest'     => __( ' Build a proactive tax strategy that helps keep the IRS from going deeper into your pocket.', 'kennedyfg' ),
		'means'    => array(
			__( 'Get customized tax-saving opportunities brought to you before deadlines pass and your options narrow.', 'kennedyfg' ),
			__( 'Withdrawals planned to help avoid surprise tax bills and unnecessary increases in Medicare costs.', 'kennedyfg' ),
			__( 'Work with a team that proactively guides your tax decisions so the deck doesn’t feel stacked against you.', 'kennedyfg' ),
		),
		'icon'     => 'layouts/graphic-manage-taxes.svg',
		'icon_w'   => 67,
		'icon_h'   => 52,
		'figure'   => 'layouts/graphic-human-icon.svg',
		'figure_dark' => 'layouts/graphic-human-icon-dark.svg',
		'figure_w' => 26,
		'figure_h' => 48,
		'prompt'   => __( "Want to walk through this? Here's how we think through it.", 'kennedyfg' ),
	),
	'family'      => array(
		'title'    => __( 'Safeguard Your Family', 'kennedyfg' ),
		'lead'     => __( 'You’ve changed what’s possible for your family.', 'kennedyfg' ),
		'rest'     => __( ' Now decide how to build on that progress for the next generation.', 'kennedyfg' ),
		'means'    => array(
			__( 'Keep your estate plan in step with the family and life you have today, so your wishes guide your plan and who makes important decisions.', 'kennedyfg' ),
			__( 'Protect the life you’ve worked hard to build by planning for healthcare costs, long-term care, or the unexpected loss of a spouse.', 'kennedyfg' ),
			__( 'Help the next generation, pass on your values and the lessons you’ve learned, and make time for memories together.', 'kennedyfg' ),
		),
		'icon'     => 'layouts/graphic-safeguard-family.svg',
		'icon_w'   => 64,
		'icon_h'   => 52,
		'figure'   => 'layouts/graphic-kids-playing.svg',
		'figure_dark' => 'layouts/graphic-kids-playing-dark.svg',
		'figure_w' => 44,
		'figure_h' => 40,
		'prompt'   => __( "Want to dive in further?\nHere's how we think through this.", 'kennedyfg' ),
	),
);

$service = isset( $catalog[ $args['service'] ] ) ? $args['service'] : 'income';
$item    = $catalog[ $service ];
$classes = trim( 'service-detail is-' . $service . ' ' . $args['class'] );
?>
<article class="<?php echo esc_attr( $classes ); ?>" data-service="<?php echo esc_attr( $service ); ?>">
	<div class="service-detail-content">
		<div class="service-detail-heading">
			<img src="<?php echo esc_url( kennedy_fg_asset( $item['icon'] ) ); ?>" alt="" width="<?php echo esc_attr( $item['icon_w'] ); ?>" height="<?php echo esc_attr( $item['icon_h'] ); ?>" />
			<h2><?php echo esc_html( $item['title'] ); ?></h2>
		</div>
		<p class="service-detail-lead">
			<strong><?php echo esc_html( $item['lead'] ); ?></strong><?php echo esc_html( $item['rest'] ); ?>
		</p>
	</div>
	<hr />
	<div class="service-detail-means">
		<p><?php esc_html_e( 'What it means for you:', 'kennedyfg' ); ?></p>
		<ul>
			<?php foreach ( $item['means'] as $mean ) : ?>
				<li><?php echo esc_html( $mean ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="service-detail-cta">
		<div class="service-detail-prompt">
			<img class="is-light" src="<?php echo esc_url( kennedy_fg_asset( $item['figure'] ) ); ?>" alt="" width="<?php echo esc_attr( $item['figure_w'] ); ?>" height="<?php echo esc_attr( $item['figure_h'] ); ?>" />
			<img class="is-dark" src="<?php echo esc_url( kennedy_fg_asset( $item['figure_dark'] ) ); ?>" alt="" width="<?php echo esc_attr( $item['figure_w'] ); ?>" height="<?php echo esc_attr( $item['figure_h'] ); ?>" />
			<p><?php echo nl2br( esc_html( $item['prompt'] ) ); ?></p>
		</div>
		<?php
		kennedy_fg_component(
			'button-nav',
			array(
				'label' => __( 'Learn More', 'kennedyfg' ),
				'href'  => home_url( '/process/' ),
			)
		);
		?>
	</div>
</article>
