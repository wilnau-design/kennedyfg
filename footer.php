<?php if ( ! kennedy_fg_hide_site_footer() ) : ?>
	<?php kennedy_fg_component( 'site-footer', array( 'variant' => 'desktop' ) ); ?>
	<?php kennedy_fg_component( 'site-footer', array( 'variant' => 'mobile' ) ); ?>
	<?php kennedy_fg_component( 'powerlander-popup' ); ?>
<?php endif; ?>
<?php if ( kennedy_fg_show_brokercheck() && ! kennedy_fg_hide_site_footer() && ! kennedy_fg_is_component_library() && ! kennedy_fg_is_layout_library() ) : ?>
	<a class="brokercheck-badge" href="https://brokercheck.finra.org/" target="_blank" rel="noopener noreferrer">
		<img src="<?php echo esc_url( content_url( 'uploads/2026/09/BrokerCheck_logo_big.webp' ) ); ?>" alt="<?php esc_attr_e( 'BrokerCheck', 'kennedyfg' ); ?>" width="188" height="50" />
	</a>
<?php endif; ?>
<?php if ( kennedy_fg_show_dev_theme_toggle() && ! kennedy_fg_is_component_library() && ! kennedy_fg_is_layout_library() ) : ?>
	<div class="theme-toggle-dev">
		<span class="theme-toggle-dev-label"><?php esc_html_e( 'Dev', 'kennedyfg' ); ?></span>
		<?php kennedy_fg_component( 'theme-toggle' ); ?>
	</div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
