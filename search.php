<?php
/**
 * Search results.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main layout-search">
	<div class="alignwide">
		<h1>
			<?php
			printf(
				esc_html__( 'Search results for: %s', 'kennedyfg' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>
		<?php get_search_form(); ?>
		<?php if ( have_posts() ) : ?>
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing found.', 'kennedyfg' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
