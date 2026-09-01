<?php
/**
 * Lead-magnet / Powerlander form page.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title_before' => __( 'Free: 5 Little-Known Tips for ', 'kennedyfg' ),
		'title_accent' => __( 'Lowering Taxes', 'kennedyfg' ),
		'title_after'  => __( ' in Retirement in 2026', 'kennedyfg' ),
		'lede'         => __( 'Discover how smart retirees are avoiding avoidable taxes — and how you can too.', 'kennedyfg' ),
		'cta'          => __( 'Get the free guide', 'kennedyfg' ),
		'heading'      => __( 'What You Get:', 'kennedyfg' ),
		'form_title'   => __( 'Get The FREE Guide', 'kennedyfg' ),
		'form_lede'    => __( 'Enter your info and click “Send me the guide”.', 'kennedyfg' ),
		'bullets'      => array(
			__( 'The low-tax window to move money that slams shut when RMDs start', 'kennedyfg' ),
			__( 'The Medicare cliff where one extra dollar of income costs you thousands', 'kennedyfg' ),
			__( 'How to turn a future tax bomb into savings that can grow and pass on tax-free', 'kennedyfg' ),
			__( 'Why $100,000 in “safe” cash can quietly add $5,000 to your taxable income', 'kennedyfg' ),
			__( 'How to fund your church straight from your IRA and owe nothing on the gift', 'kennedyfg' ),
		),
		'image'        => kennedy_fg_asset( 'layouts/graphic-powerlander-background.webp' ),
		'magnet'       => kennedy_fg_asset( 'content/graphic-footer-magnet.webp' ),
		'class'        => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-powerlander alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-powerlander-hero">
		<div class="layout-powerlander-hero-bar">
			<div class="alignwide layout-powerlander-hero-inner">
				<div class="layout-powerlander-hero-copy">
					<h1>
						<?php echo esc_html( $args['title_before'] ); ?><span><?php echo esc_html( $args['title_accent'] ); ?></span><?php echo esc_html( $args['title_after'] ); ?>
					</h1>
					<p><?php echo esc_html( $args['lede'] ); ?></p>
				</div>
				<div class="layout-powerlander-hero-cta">
					<?php
					kennedy_fg_component(
						'button-cta',
						array(
							'label' => $args['cta'],
							'href'  => '#powerlander-popup',
							'class' => 'js-powerlander-open',
						)
					);
					?>
				</div>
			</div>
		</div>
		<div class="layout-powerlander-hero-media">
			<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" width="1440" height="547" />
		</div>
	</div>

	<div class="layout-powerlander-body" id="get-the-guide">
		<div class="alignwide layout-powerlander-inner">
			<div class="layout-powerlander-copy">
				<h2><?php echo esc_html( $args['heading'] ); ?></h2>
				<ul class="layout-powerlander-bullets">
					<?php foreach ( $args['bullets'] as $bullet ) : ?>
						<li>
							<span class="layout-powerlander-mark" aria-hidden="true"></span>
							<span><?php echo esc_html( $bullet ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="layout-powerlander-card">
				<div class="layout-powerlander-magnet" aria-hidden="true">
					<img src="<?php echo esc_url( $args['magnet'] ); ?>" alt="" width="280" height="200" />
				</div>
				<div class="layout-powerlander-card-copy">
					<h3><?php echo esc_html( $args['form_title'] ); ?></h3>
					<p><?php echo esc_html( $args['form_lede'] ); ?></p>
				</div>
				<?php kennedy_fg_component( 'powerlander-form', array( 'id' => 'powerlander-inline' ) ); ?>
			</div>
		</div>
	</div>
</section>
