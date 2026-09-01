<?php
/**
 * 404.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main layout-404">
	<div class="alignwide layout-404-inner">
		<div class="layout-404-copy">
			<h1><?php esc_html_e( 'This path isn’t on the map.', 'kennedyfg' ); ?></h1>
			<p class="layout-404-lede"><?php esc_html_e( 'The page you wanted isn’t here. Start from home or search.', 'kennedyfg' ); ?></p>
		</div>
		<?php get_search_form(); ?>
		<p class="layout-404-home">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'kennedyfg' ); ?></a>
		</p>
	</div>
</main>

<?php
get_footer();
