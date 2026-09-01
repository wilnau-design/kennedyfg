<?php
/**
 * Start Here page.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main page-start-here">
	<?php kennedy_fg_layout( 'hero-start' ); ?>
	<?php kennedy_fg_layout( 'start-qualifiers' ); ?>
	<?php kennedy_fg_layout( 'start-steps' ); ?>
	<?php
	kennedy_fg_layout(
		'cta-center',
		array(
			'title'       => __( 'Book a 30-Minute Sounding Board Session', 'kennedyfg' ),
			'lede'        => '',
			'cta'         => __( 'Book it here', 'kennedyfg' ),
			'cta_variant' => 'short',
			'note'        => __( 'Start Here — see how close you are', 'kennedyfg' ),
			'href'        => '#kennedy-calendar',
			'class'       => 'is-start-mid',
			'people'      => kennedy_fg_asset( 'layouts/graphic-start-cta-people.webp' ),
			'people_dark' => kennedy_fg_asset( 'layouts/graphic-start-cta-people-dark.svg' ),
		)
	);
	?>
	<?php kennedy_fg_layout( 'start-close' ); ?>
	<?php kennedy_fg_layout( 'calendar' ); ?>
</main>

<?php
get_footer();
