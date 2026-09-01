<?php
/**
 * Generic static page fallback.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	kennedy_fg_layout(
		'hero-page',
		array(
			'title' => get_the_title( get_queried_object_id() ),
			'lede'  => '',
			'motif' => '',
		)
	);
	?>
</main>

<?php
get_footer();
