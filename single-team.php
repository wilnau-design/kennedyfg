<?php
/**
 * Single team member.
 *
 * @package kennedyfg
 */

get_header();
the_post();
?>

<main id="primary" class="site-main page-bio">
	<?php kennedy_fg_layout( 'bio', kennedy_fg_get_team_bio_args() ); ?>
	<?php kennedy_fg_layout( 'cta-split' ); ?>
</main>

<?php
get_footer();
