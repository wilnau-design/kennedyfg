<?php
/**
 * Services / process page.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main page-services">
	<div class="page-services-flow">
	<?php
	kennedy_fg_layout(
		'hero-page',
		array(
			'title' => __( 'The Guided Retirement Roadmap', 'kennedyfg' ),
			'lede'  => __( 'Income. Investments. Taxes. Legacy. All planned as one thing.', 'kennedyfg' ),
		)
	);
	?>
	<?php kennedy_fg_layout( 'process-anti' ); ?>
	<?php kennedy_fg_layout( 'services-explorer' ); ?>
	</div>
	<?php
	kennedy_fg_layout(
		'cta-split',
		array(
			'title'       => __( 'Can I really make my dream retirement a reality?', 'kennedyfg' ),
			'lede'        => __( 'Our Guided Retirement Roadmap can show you how close you are', 'kennedyfg' ),
			'cta'         => __( 'Click here to get started', 'kennedyfg' ),
			'note'        => '',
			'class'       => 'is-services-cta',
			'people'      => kennedy_fg_asset( 'layouts/graphic-services-couple.svg' ),
			'people_dark' => kennedy_fg_asset( 'layouts/graphic-services-couple-dark.svg' ),
		)
	);
	?>
</main>

<?php
get_footer();
