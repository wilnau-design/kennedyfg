<?php
/**
 * SmartVestor referral landing.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main page-smartvestor">
	<?php kennedy_fg_layout( 'referral' ); ?>
	<?php kennedy_fg_layout( 'referral-intro' ); ?>
	<?php kennedy_fg_layout( 'referral-proof' ); ?>
	<?php kennedy_fg_layout( 'referral-fit' ); ?>
	<?php
	kennedy_fg_layout(
		'cta-split',
		array(
			'title'       => __( 'Can I really make my dream retirement a reality?', 'kennedyfg' ),
			'lede'        => __( 'Our Guided Retirement Roadmap can show you how close you are', 'kennedyfg' ),
			'cta'         => __( 'Click here to get started', 'kennedyfg' ),
			'note'        => __( 'Start Here — see how close you are', 'kennedyfg' ),
			'class'       => 'is-services-cta',
			'people'      => kennedy_fg_asset( 'layouts/graphic-services-couple.svg' ),
			'people_dark' => kennedy_fg_asset( 'layouts/graphic-services-couple-dark.svg' ),
		)
	);
	?>
</main>

<?php
get_footer();
