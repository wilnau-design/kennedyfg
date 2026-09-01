<?php
/**
 * Blog index.
 *
 * @package kennedyfg
 */

get_header();

$feed = kennedy_fg_get_blog_feed_data();
$has_feed = $feed['featured'] || $feed['popular'] || $feed['recent'];
?>

<main id="primary" class="site-main layout-blog-feed">
	<section class="layout-blog-hero alignfull">
		<div class="alignwide layout-blog-hero-inner">
			<div class="layout-blog-hero-top">
				<img class="layout-blog-hero-marker" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-mile-marker.webp' ) ); ?>" alt="" />
				<h1 class="layout-blog-hero-title"><?php esc_html_e( 'The Mile Markers Blog', 'kennedyfg' ); ?></h1>
			</div>
			<p class="layout-blog-hero-lede"><?php esc_html_e( 'Plain-English notes and tips for the road to retirement', 'kennedyfg' ); ?></p>
		</div>
	</section>

	<?php if ( $has_feed ) : ?>

		<?php if ( $feed['featured'] ) : ?>
			<section class="layout-blog-featured alignfull">
				<div class="alignwide layout-blog-featured-inner">
					<?php kennedy_fg_component( 'article-card', $feed['featured'] ); ?>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $feed['popular'] ) : ?>
			<section class="layout-blog-popular alignfull">
				<div class="alignwide layout-blog-popular-inner">
					<h2 class="layout-blog-section-heading"><?php esc_html_e( 'Popular Posts', 'kennedyfg' ); ?></h2>
					<div class="layout-blog-popular-grid">
						<?php foreach ( $feed['popular'] as $card ) : ?>
							<?php kennedy_fg_component( 'article-card', $card ); ?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( $feed['recent'] ) : ?>
			<section class="layout-blog-recent alignfull">
				<div class="alignwide layout-blog-recent-inner">
					<div class="layout-blog-recent-top">
						<h2 class="layout-blog-section-heading"><?php esc_html_e( 'Recent Posts', 'kennedyfg' ); ?></h2>
						<div class="layout-blog-recent-grid">
							<?php foreach ( $feed['recent'] as $card ) : ?>
								<?php kennedy_fg_component( 'article-card', $card ); ?>
							<?php endforeach; ?>
						</div>
					</div>
					<?php
					kennedy_fg_component(
						'button-cta',
						array(
							'label'   => __( 'View all blogs', 'kennedyfg' ),
							'href'    => home_url( '/category/blog/' ),
							'variant' => 'main',
						)
					);
					?>
				</div>
			</section>
		<?php endif; ?>

	<?php else : ?>

		<div class="alignwide layout-blog-feed-grid">
			<?php
			for ( $i = 0; $i < 6; $i++ ) {
				kennedy_fg_component(
					'article-card',
					array(
						'headline' => __( 'Plain-English notes from the road', 'kennedyfg' ),
						'byline'   => __( 'By Kennedy FG', 'kennedyfg' ),
						'href'     => home_url( '/blog/' ),
						'image'    => kennedy_fg_asset( 'layouts/photo-article.webp' ),
						'category' => __( 'blog', 'kennedyfg' ),
					)
				);
			}
			?>
		</div>

	<?php endif; ?>
</main>

<?php
get_footer();
