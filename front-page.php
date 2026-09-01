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
	<?php kennedy_fg_layout( 'client-stories' ); ?>
	<?php kennedy_fg_layout( 'home-roadmap' ); ?>
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
