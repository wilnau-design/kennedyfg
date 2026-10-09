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
	<div class="layout-road-join">
		<?php kennedy_fg_layout( 'cta-road' ); ?>
		<?php kennedy_fg_layout( 'cta-split', array( 'wave' => false ) ); ?>
		<?php kennedy_fg_layout( 'team-grid' ); ?>
	</div>
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
