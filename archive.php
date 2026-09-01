<?php
/**
 * Archives.
 *
 * @package kennedyfg
 */

get_header();
?>

<main id="primary" class="site-main layout-blog-feed">
	<header class="alignwide page-header">
		<?php the_archive_title( '<h1 class="layout-hero-page-title">', '</h1>' ); ?>
		<?php the_archive_description( '<p>', '</p>' ); ?>
	</header>
	<div class="alignwide layout-blog-feed-grid">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php kennedy_fg_component( 'article-card', kennedy_fg_article_card_args( get_post() ) ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<?php
	$pagination = get_the_posts_pagination(
		array(
			'mid_size'           => 1,
			'prev_text'          => esc_html__( 'Prev', 'kennedyfg' ),
			'next_text'          => esc_html__( 'Next', 'kennedyfg' ),
			'screen_reader_text' => __( 'Posts navigation', 'kennedyfg' ),
			'class'              => 'layout-blog-pagination',
		)
	);

	if ( $pagination ) {
		echo '<div class="alignwide">' . $pagination . '</div>';
	}
	?>
</main>

<?php
get_footer();
