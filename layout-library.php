<?php
/**
 * Template Name: Layout Library
 *
 * Visual review surface for Phase 3 layouts. Not a production page.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main library-main">
	<div class="library-bar">
		<h1 class="library-bar-title"><?php esc_html_e( 'Kennedy FG layout library', 'kennedyfg' ); ?></h1>
		<div class="library-bar-actions">
			<span><?php esc_html_e( 'Library theme', 'kennedyfg' ); ?></span>
			<?php kennedy_fg_component( 'theme-toggle' ); ?>
		</div>
	</div>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Hero / home', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Homepage path hero. Reused only on the home route; shown light then dark.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-home' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-home' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Hero / inner page', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Centered page intro used on Services, Start Here, and similar inner pages.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-page' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-page' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Pull quote', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Portrait plus large serif quote. Homepage and story pages.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'pull-quote' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'pull-quote' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Testimonials', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Featured portrait + quote, then three quote cards. Homepage social proof.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'testimonials' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'testimonials' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Client stories', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Interactive name list that swaps the portrait and quote. Homepage after About.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'client-stories' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'client-stories' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'About intro', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Split headline and CTA over a wide photo. Homepage about band.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'about-intro' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'about-intro' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Article spotlight', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Mile-marker header, 2-1-2 article grid using article cards, short CTA.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'article-spotlight' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'article-spotlight' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'CTA split', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'The recurring end-of-page CTA with path wave and couple silhouette.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'cta-split' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'cta-split' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Lead magnet', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Guide covers plus copy. Homepage closer and footer magnet composition.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'lead-magnet' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'lead-magnet' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Team grid', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Four-up team cards from the About page.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'team-grid' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'team-grid' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Hero / process', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'New process-page intro. Not yet applied to the live process page.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-process' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-process' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Process anti-positioning', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'The line that sits between the process hero and the roadmap explorer.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'process-anti' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'process-anti' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Services explorer', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Live on the process page. Click a pin to open its detail panel. Income starts selected.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'services-explorer' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'services-explorer' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Journey pins / interactive', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Live on the homepage. Hover a pin for the read-more state, click to open one overview. Pins are desktop and tablet; mobile keeps the card stack and the How it works button.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'journey-pins' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'journey-pins' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Hero / start here path', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Live on the Start Here page.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-start-path' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'hero-start-path' ); ?>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Contact split', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Raised contact card: firm details plus the contact form.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'contact-split' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_layout( 'contact-split' ); ?>
		</div>
	</section>
</main>

<?php
get_footer();
