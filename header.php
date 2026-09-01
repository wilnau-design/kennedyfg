<!doctype html>
<html <?php language_attributes(); ?> data-theme="light">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
	(function () {
		try {
			var stored = window.localStorage.getItem('kennedyfg-theme');
			var mode = (stored === 'dark' || stored === 'light')
				? stored
				: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
			document.documentElement.setAttribute('data-theme', mode);
		} catch (e) {}
	})();
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kennedyfg' ); ?></a>
<?php if ( ! kennedy_fg_hide_site_header() ) : ?>
	<?php kennedy_fg_component( 'site-header' ); ?>
	<?php kennedy_fg_component( 'site-header-mobile' ); ?>
<?php endif; ?>
