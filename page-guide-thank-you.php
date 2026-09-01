<?php
/**
 * Template Name: Guide Thank You
 * Guide thank-you page.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main page-guide-thank-you">
	<?php
	kennedy_fg_layout(
		'thank-you',
		array(
			'headline'   => __( 'Check Your Inbox!', 'kennedyfg' ),
			'heading'    => __( 'Your “5 Little-Known Tips for Lowering Taxes in Retirement in 2026” guide has arrived.', 'kennedyfg' ),
			'note'       => __( 'Don’t see the email? Check your spam or junk folder :)', 'kennedyfg' ),
			'background' => kennedy_fg_asset( 'layouts/graphic-powerlander-popup-background.webp' ),
			'class'      => 'is-guide',
		)
	);
	?>
</main>

<?php
get_footer();
