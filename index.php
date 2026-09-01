<?php
/**
 * Fallback template.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			kennedy_fg_layout(
				'hero-page',
				array(
					'title' => get_the_title(),
					'lede'  => '',
					'motif' => '',
				)
			);
			?>
		<?php endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
