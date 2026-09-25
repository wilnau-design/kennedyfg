<?php
/**
 * Homepage.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main front-page">
	<?php kennedy_fg_layout( 'hero-home' ); ?>
	<?php kennedy_fg_layout( 'pull-quote' ); ?>
	<?php kennedy_fg_layout( 'pain-points' ); ?>
	<?php kennedy_fg_layout( 'pin-journey' ); ?>
	<?php kennedy_fg_layout( 'testimonials' ); ?>
	<?php kennedy_fg_layout( 'about-intro' ); ?>
	<?php
	kennedy_fg_layout(
		'client-stories',
		array(
			'disclaimer' => __( 'These are hypothetical situations based on real life examples. Names and circumstances have been changed. The opinions voiced in this material are for general information only and are not intended to provide specific advice or recommendations for any individual. To determine which investments or strategies may be appropriate for you, consult your advisor prior to investing.', 'kennedyfg' ),
		)
	);
	?>
	<?php kennedy_fg_layout( 'journey-pins' ); ?>
	<?php
	if ( kennedy_fg_show_home_blog_section() ) {
		kennedy_fg_layout( 'article-spotlight', array( 'source' => 'posts' ) );
	}
	?>
	<?php kennedy_fg_layout( 'smartvestor' ); ?>
	<?php kennedy_fg_layout( 'cta-split' ); ?>
	<?php kennedy_fg_layout( 'lead-magnet' ); ?>
</main>

<?php
get_footer();
