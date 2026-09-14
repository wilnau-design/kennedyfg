<?php
/**
 * Template Name: Simple Page
 * Text-only pages (privacy policy, terms, and similar).
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main page-simple">
	<?php
	while ( have_posts() ) :
		the_post();
		kennedy_fg_layout( 'simple-page' );
	endwhile;
	?>
</main>

<?php
get_footer();
