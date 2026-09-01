<?php
/**
 * About page.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main page-about">
	<?php kennedy_fg_layout( 'about-concerns' ); ?>
	<?php kennedy_fg_layout( 'about-vision' ); ?>
	<?php kennedy_fg_layout( 'cta-split' ); ?>
	<?php kennedy_fg_layout( 'team-grid' ); ?>
	<?php
	kennedy_fg_layout(
		'cta-center',
		array(
			'class'         => 'is-about-close',
			'people_inline' => 'layouts/graphic-cta-center-couple.svg',
			'people_dark'   => kennedy_fg_asset( 'layouts/graphic-cta-center-couple-dark.svg' ),
		)
	);
	?>
</main>

<?php
get_footer();
