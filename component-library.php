<?php
/**
 * Template Name: Component Library
 *
 * Visual review surface for Phase 2 components. Not a production page.
 *
 * @package kennedyfg
 */

get_header();

$about_items = array(
	array( 'label' => __( 'Team', 'kennedyfg' ), 'href' => '#' ),
	array( 'label' => __( 'Contact Us', 'kennedyfg' ), 'href' => '#' ),
	array( 'label' => __( 'SmartVestor', 'kennedyfg' ), 'href' => '#' ),
);
$login_items = array(
	array( 'label' => __( 'LPL', 'kennedyfg' ), 'href' => '#', 'target' => '_blank' ),
	array( 'label' => __( 'eMoney', 'kennedyfg' ), 'href' => '#', 'target' => '_blank' ),
);
?>

<main id="primary" class="site-main library-main">
	<div class="library-bar">
		<h1 class="library-bar-title"><?php esc_html_e( 'Kennedy FG component library', 'kennedyfg' ); ?></h1>
		<div class="library-bar-actions">
			<span><?php esc_html_e( 'Library theme', 'kennedyfg' ); ?></span>
			<?php kennedy_fg_component( 'theme-toggle' ); ?>
		</div>
	</div>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Header / desktop', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Full viewport width. Default, then About open, then Client Login open.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_component( 'site-header' ); ?>
			<?php kennedy_fg_component( 'site-header', array( 'open' => 'about' ) ); ?>
			<?php kennedy_fg_component( 'site-header', array( 'open' => 'login' ) ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_component( 'site-header' ); ?>
			<?php kennedy_fg_component( 'site-header', array( 'open' => 'about' ) ); ?>
			<?php kennedy_fg_component( 'site-header', array( 'open' => 'login' ) ); ?>
		</div>
	</section>

	<section class="library-section">
		<h2 class="library-section-title"><?php esc_html_e( 'Header / mobile', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Closed, open, About accordion open, Client Login accordion open.', 'kennedyfg' ); ?></p>
		<div class="library-pair">
			<div class="library-surface is-light" data-theme="light">
				<?php kennedy_fg_component( 'site-header-mobile' ); ?>
				<?php kennedy_fg_component( 'site-header-mobile', array( 'state' => 'open' ) ); ?>
				<?php kennedy_fg_component( 'site-header-mobile', array( 'state' => 'open', 'accordion' => 'about' ) ); ?>
				<?php kennedy_fg_component( 'site-header-mobile', array( 'state' => 'open', 'accordion' => 'login' ) ); ?>
			</div>
			<div class="library-surface is-dark" data-theme="dark">
				<?php kennedy_fg_component( 'site-header-mobile' ); ?>
				<?php kennedy_fg_component( 'site-header-mobile', array( 'state' => 'open' ) ); ?>
				<?php kennedy_fg_component( 'site-header-mobile', array( 'state' => 'open', 'accordion' => 'about' ) ); ?>
				<?php kennedy_fg_component( 'site-header-mobile', array( 'state' => 'open', 'accordion' => 'login' ) ); ?>
			</div>
		</div>
	</section>

	<section class="library-section">
		<h2 class="library-section-title"><?php esc_html_e( 'Buttons', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Default beside forced hover (.is-hover). Focus is :focus-visible, also shown with .is-focus on the nav pill.', 'kennedyfg' ); ?></p>
		<div class="library-pair">
			<div class="library-surface is-light library-stack" data-theme="light">
				<div class="library-row">
					<?php kennedy_fg_component( 'button-cta' ); ?>
					<?php kennedy_fg_component( 'button-cta', array( 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short' ) ); ?>
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short', 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short-light' ) ); ?>
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short-light', 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'button-nav' ); ?>
					<?php kennedy_fg_component( 'button-nav', array( 'state' => 'is-hover' ) ); ?>
					<?php kennedy_fg_component( 'button-nav', array( 'state' => 'is-focus' ) ); ?>
				</div>
			</div>
			<div class="library-surface is-dark library-stack" data-theme="dark">
				<div class="library-row">
					<?php kennedy_fg_component( 'button-cta' ); ?>
					<?php kennedy_fg_component( 'button-cta', array( 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short' ) ); ?>
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short', 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short-light' ) ); ?>
					<?php kennedy_fg_component( 'button-cta', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'variant' => 'short-light', 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'button-nav' ); ?>
					<?php kennedy_fg_component( 'button-nav', array( 'state' => 'is-hover' ) ); ?>
					<?php kennedy_fg_component( 'button-nav', array( 'state' => 'is-focus' ) ); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="library-section">
		<h2 class="library-section-title"><?php esc_html_e( 'Navigation pieces', 'kennedyfg' ); ?></h2>
		<div class="library-pair">
			<div class="library-surface is-light library-stack" data-theme="light">
				<div class="library-row">
					<?php kennedy_fg_component( 'nav-link' ); ?>
					<?php kennedy_fg_component( 'nav-link', array( 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'About', 'kennedyfg' ), 'href' => '#', 'items' => $about_items ) ); ?>
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'About', 'kennedyfg' ), 'href' => '#', 'items' => $about_items, 'state' => 'is-open' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'Client Login', 'kennedyfg' ), 'items' => $login_items ) ); ?>
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'Client Login', 'kennedyfg' ), 'items' => $login_items, 'state' => 'is-open' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'submenu-item', array( 'label' => __( 'Team', 'kennedyfg' ) ) ); ?>
					<?php kennedy_fg_component( 'submenu-item', array( 'label' => __( 'Team', 'kennedyfg' ), 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'close-button' ); ?>
					<?php kennedy_fg_component( 'close-button', array( 'state' => 'is-hover' ) ); ?>
					<?php kennedy_fg_component( 'theme-toggle', array( 'mode' => 'light' ) ); ?>
					<?php kennedy_fg_component( 'theme-toggle', array( 'mode' => 'dark' ) ); ?>
				</div>
			</div>
			<div class="library-surface is-dark library-stack" data-theme="dark">
				<div class="library-row">
					<?php kennedy_fg_component( 'nav-link' ); ?>
					<?php kennedy_fg_component( 'nav-link', array( 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'About', 'kennedyfg' ), 'href' => '#', 'items' => $about_items ) ); ?>
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'About', 'kennedyfg' ), 'href' => '#', 'items' => $about_items, 'state' => 'is-open' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'Client Login', 'kennedyfg' ), 'items' => $login_items ) ); ?>
					<?php kennedy_fg_component( 'nav-dropdown', array( 'label' => __( 'Client Login', 'kennedyfg' ), 'items' => $login_items, 'state' => 'is-open' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'submenu-item', array( 'label' => __( 'Team', 'kennedyfg' ) ) ); ?>
					<?php kennedy_fg_component( 'submenu-item', array( 'label' => __( 'Team', 'kennedyfg' ), 'state' => 'is-hover' ) ); ?>
				</div>
				<div class="library-row">
					<?php kennedy_fg_component( 'close-button' ); ?>
					<?php kennedy_fg_component( 'close-button', array( 'state' => 'is-hover' ) ); ?>
					<?php kennedy_fg_component( 'theme-toggle', array( 'mode' => 'light' ) ); ?>
					<?php kennedy_fg_component( 'theme-toggle', array( 'mode' => 'dark' ) ); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="library-section">
		<h2 class="library-section-title"><?php esc_html_e( 'Forms', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Input states: default, hover, pressed/focus. Labels use the body font in small caps because Source Code Pro is not a theme font.', 'kennedyfg' ); ?></p>
		<div class="library-pair">
			<div class="library-surface is-light library-stack" data-theme="light">
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'Add your name', 'kennedyfg' ) ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'Add your name', 'kennedyfg' ), 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'Add your name', 'kennedyfg' ), 'state' => 'is-pressed' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'How can we help?', 'kennedyfg' ), 'multiline' => true ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'How can we help?', 'kennedyfg' ), 'multiline' => true, 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'How can we help?', 'kennedyfg' ), 'multiline' => true, 'state' => 'is-pressed' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'label' => __( 'Your name', 'kennedyfg' ), 'name' => 'powerlander-name', 'placeholder' => __( 'Add your name', 'kennedyfg' ) ) ); ?>
				<?php kennedy_fg_component( 'contact-form' ); ?>
			</div>
			<div class="library-surface is-dark library-stack" data-theme="dark">
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'Add your name', 'kennedyfg' ) ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'Add your name', 'kennedyfg' ), 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'Add your name', 'kennedyfg' ), 'state' => 'is-pressed' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'How can we help?', 'kennedyfg' ), 'multiline' => true ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'How can we help?', 'kennedyfg' ), 'multiline' => true, 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'placeholder' => __( 'How can we help?', 'kennedyfg' ), 'multiline' => true, 'state' => 'is-pressed' ) ); ?>
				<?php kennedy_fg_component( 'form-field', array( 'label' => __( 'Your name', 'kennedyfg' ), 'name' => 'powerlander-name-dark', 'placeholder' => __( 'Add your name', 'kennedyfg' ) ) ); ?>
				<?php kennedy_fg_component( 'contact-form' ); ?>
			</div>
		</div>
	</section>

	<section class="library-section">
		<h2 class="library-section-title"><?php esc_html_e( 'Cards', 'kennedyfg' ); ?></h2>
		<div class="library-pair">
			<div class="library-surface is-light library-stack" data-theme="light">
				<?php kennedy_fg_component( 'article-card' ); ?>
				<?php kennedy_fg_component( 'article-card', array( 'variant' => 'featured' ) ); ?>
				<?php kennedy_fg_component( 'team-card' ); ?>
				<?php kennedy_fg_component( 'side-cta' ); ?>
				<?php kennedy_fg_component( 'video-placeholder' ); ?>
				<?php kennedy_fg_component( 'video-placeholder', array( 'state' => 'is-hover' ) ); ?>
			</div>
			<div class="library-surface is-dark library-stack" data-theme="dark">
				<?php kennedy_fg_component( 'article-card' ); ?>
				<?php kennedy_fg_component( 'article-card', array( 'variant' => 'featured' ) ); ?>
				<?php kennedy_fg_component( 'team-card' ); ?>
				<?php kennedy_fg_component( 'side-cta' ); ?>
				<?php kennedy_fg_component( 'video-placeholder' ); ?>
				<?php kennedy_fg_component( 'video-placeholder', array( 'state' => 'is-hover' ) ); ?>
			</div>
		</div>
	</section>

	<section class="library-section">
		<h2 class="library-section-title"><?php esc_html_e( 'Footer links', 'kennedyfg' ); ?></h2>
		<div class="library-pair">
			<div class="library-surface is-light library-row" data-theme="light">
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Link', 'kennedyfg' ) ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Link', 'kennedyfg' ), 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Facebook', 'kennedyfg' ), 'icon' => 'facebook' ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Facebook', 'kennedyfg' ), 'icon' => 'facebook', 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'LinkedIn', 'kennedyfg' ), 'icon' => 'linkedin' ) ); ?>
			</div>
			<div class="library-surface is-dark library-row" data-theme="dark">
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Link', 'kennedyfg' ) ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Link', 'kennedyfg' ), 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Facebook', 'kennedyfg' ), 'icon' => 'facebook' ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Facebook', 'kennedyfg' ), 'icon' => 'facebook', 'state' => 'is-hover' ) ); ?>
				<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'LinkedIn', 'kennedyfg' ), 'icon' => 'linkedin' ) ); ?>
			</div>
		</div>
	</section>

	<section class="library-section library-fullbleed">
		<h2 class="library-section-title"><?php esc_html_e( 'Footer / desktop', 'kennedyfg' ); ?></h2>
		<p class="library-note"><?php esc_html_e( 'Full viewport width so column rhythm and the lead-magnet band can be reviewed at true size.', 'kennedyfg' ); ?></p>
		<div class="library-surface is-light" data-theme="light">
			<p class="library-caption"><?php esc_html_e( 'Light', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_component( 'site-footer' ); ?>
		</div>
		<div class="library-surface is-dark" data-theme="dark">
			<p class="library-caption"><?php esc_html_e( 'Dark', 'kennedyfg' ); ?></p>
			<?php kennedy_fg_component( 'site-footer' ); ?>
		</div>
	</section>

	<section class="library-section">
		<h2 class="library-section-title"><?php esc_html_e( 'Footer / mobile', 'kennedyfg' ); ?></h2>
		<div class="library-pair">
			<div class="library-surface is-light" data-theme="light">
				<?php kennedy_fg_component( 'site-footer', array( 'variant' => 'mobile' ) ); ?>
			</div>
			<div class="library-surface is-dark" data-theme="dark">
				<?php kennedy_fg_component( 'site-footer', array( 'variant' => 'mobile' ) ); ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
