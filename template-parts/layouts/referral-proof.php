<?php
/**
 * Referral positioning statement plus client quote cards.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'before' => __( 'We built Kennedy FG for humble, hardworking ', 'kennedyfg' ),
		'accent' => __( 'Michiganders', 'kennedyfg' ),
		'after'  => __( ' who did everything right, followed Dave Ramsey\'s principles to the letter, and still aren\'t sure it was enough.', 'kennedyfg' ),
		'lead'   => array(
			'before' => __( 'I was first referred to ', 'kennedyfg' ),
			'mark'   => __( 'Brandon', 'kennedyfg' ),
			'after'  => __( ' over 15 years ago when I changed jobs and needed help rolling over a 401(k)—and working with him has been one of the best decisions I’ve ever made. Since then, Brandon and his team at Kennedy Financial Group have been by my side through so many life milestones: career changes, getting married, raising children, and even the loss of a parent. At every stage, they’ve provided thoughtful guidance—not just with investments, but with the bigger financial picture. From wills and trusts to college savings, retirement planning, and even refinancing our home, they’ve helped us navigate it all with confidence. Anytime we start thinking about a new goal or life change, one of our first thoughts is, “We should call Brandon.” That says everything. He and his team truly care, deliver exceptional service, and make you feel known and valued. I can’t recommend them highly enough.', 'kennedyfg' ),
			'cite'   => __( '— Faith C, KFG client', 'kennedyfg' ),
		),
		'quotes' => array(
			array(
				'before' => __( 'Starting a relationship with Kennedy Financial Group was one of the smartest choices I have ever made. I had never wanted to manage my 401 K and be responsible for my own financial future and working with KFG made my long-time goal of early retirement a reality. ', 'kennedyfg' ),
				'mark'   => __( 'Brandon', 'kennedyfg' ),
				'after'  => __( ', Steven and all the other folks at KFG are always extremely knowledgeable, very friendly and super helpful and I would recommend their services to anyone.', 'kennedyfg' ),
				'cite'   => __( '— aaron, KFG client', 'kennedyfg' ),
			),
			array(
				'before' => __( 'From the very beginning, we felt that ', 'kennedyfg' ),
				'mark'   => __( 'Brandon', 'kennedyfg' ),
				'after'  => __( ' genuinely had our best interests at heart. We never felt pressured to go in a certain direction, and he never tried to sell us on products we didn’t need—something we unfortunately experienced with another financial advisor. Brandon is an excellent listener and a great teacher. He takes the time to understand our goals and explains things clearly, showing us how we can work toward achieving the retirement we envision. We truly appreciate his guidance, honesty, and commitment to helping us reach our retirement goals.', 'kennedyfg' ),
				'cite'   => __( '— Elizabeth, KFG client', 'kennedyfg' ),
			),
		),
		'class'  => '',
	)
);

$render_quote = static function ( $quote ) {
	?>
	<blockquote class="layout-quote-card">
		<p><?php echo esc_html( $quote['before'] ); ?><strong><?php echo esc_html( $quote['mark'] ); ?></strong><?php echo esc_html( $quote['after'] ); ?></p>
		<cite><?php echo esc_html( $quote['cite'] ); ?></cite>
	</blockquote>
	<?php
};
?>
<section class="<?php echo esc_attr( trim( 'layout-referral-proof alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-referral-proof-inner">
		<div class="layout-referral-proof-lead">
			<p class="layout-referral-proof-lede">
				<?php echo esc_html( $args['before'] ); ?><span><?php echo esc_html( $args['accent'] ); ?></span><?php echo esc_html( $args['after'] ); ?>
			</p>
			<?php $render_quote( $args['lead'] ); ?>
		</div>
		<div class="layout-referral-proof-aside">
			<?php foreach ( $args['quotes'] as $quote ) : ?>
				<?php $render_quote( $quote ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
