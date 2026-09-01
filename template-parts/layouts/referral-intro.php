<?php
/**
 * Referral intro: Brandon greeting card plus portrait.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'hello'    => __( 'Hi, I’m', 'kennedyfg' ),
		'name'     => __( 'Brandon.', 'kennedyfg' ),
		'role'     => __( 'SmartVestor Pro Financial Advisor', 'kennedyfg' ),
		'full_name' => __( 'Brandon Kennedy', 'kennedyfg' ),
		'title'    => __( 'President | Wealth Advisor', 'kennedyfg' ),
		'image'    => kennedy_fg_asset( 'layouts/photo-referral-brandon.webp' ),
		'class'    => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-referral-intro alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-referral-intro-inner">
		<div class="layout-referral-intro-card">
			<p class="layout-referral-intro-hello"><?php echo esc_html( $args['hello'] ); ?><br /><?php echo esc_html( $args['name'] ); ?></p>
			<p class="layout-referral-intro-role"><?php echo esc_html( $args['role'] ); ?></p>
		</div>
		<figure class="layout-referral-intro-portrait">
			<img src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['full_name'] ); ?>" width="431" height="511" />
			<div class="layout-referral-intro-badge">
				<p class="layout-referral-intro-badge-name"><?php echo esc_html( $args['full_name'] ); ?></p>
				<p class="layout-referral-intro-badge-title"><?php echo esc_html( $args['title'] ); ?></p>
			</div>
		</figure>
	</div>
</section>
