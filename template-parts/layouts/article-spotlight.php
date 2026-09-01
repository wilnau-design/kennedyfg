<?php
/**
 * Blog spotlight: marker, heading, 2-1-2 article grid, footer CTA.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'    => __( 'The Mile Markers Blog', 'kennedyfg' ),
		'lede'     => __( 'Plain-English notes and tips for the road to retirement', 'kennedyfg' ),
		'marker'   => kennedy_fg_asset( 'layouts/graphic-mile-marker.webp' ),
		'cta_text' => __( 'Read the full blog here:', 'kennedyfg' ),
		'cta'      => __( 'Read Here', 'kennedyfg' ),
		'href'     => home_url( '/blog/' ),
		'left'     => array(
			array(
				'headline' => __( 'Lawmakers, Local Businesses Talk Pro-Growth Tax Policy', 'kennedyfg' ),
				'byline'   => __( 'By Steven Fronrath', 'kennedyfg' ),
				'category' => __( 'blog', 'kennedyfg' ),
			),
			array(
				'headline' => __( 'Small Business Outlook: Small Businesses Remain Resilient', 'kennedyfg' ),
				'byline'   => __( 'By Brandon Kennedy', 'kennedyfg' ),
				'category' => __( 'blog', 'kennedyfg' ),
			),
		),
		'featured' => array(
			'headline' => __( 'Tariff Refunds Guide and FAQ: What Importers Need to Know', 'kennedyfg' ),
			'summary'  => __( 'There are practical steps importers can take now to prepare for IEEPA tariff refunds. Use this guide to understand eligibility and navigate the refund process.', 'kennedyfg' ),
			'byline'   => __( 'By Brandon Kennedy', 'kennedyfg' ),
			'category' => __( 'VIDEO', 'kennedyfg' ),
			'variant'  => 'featured',
		),
		'right'    => array(
			array(
				'headline' => __( 'Supporting Small Business: Our Commitment in Action', 'kennedyfg' ),
				'byline'   => __( 'By Steven Fronrath', 'kennedyfg' ),
				'category' => __( 'blog', 'kennedyfg' ),
			),
			array(
				'headline' => __( 'Celebrating America’s Top 100 Small Businesses of 2025', 'kennedyfg' ),
				'byline'   => __( 'By Steven Fronrath', 'kennedyfg' ),
				'category' => __( 'blog', 'kennedyfg' ),
			),
		),
		'class'    => '',
		'source'   => 'static',
	)
);

if ( 'posts' === $args['source'] ) {
	$from_posts = kennedy_fg_get_article_spotlight_from_posts();
	if ( $from_posts ) {
		$args = array_merge( $args, $from_posts );
	}
}
?>
<section class="<?php echo esc_attr( trim( 'layout-article-spotlight alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-article-spotlight-header">
		<?php if ( $args['marker'] ) : ?>
			<img class="layout-article-spotlight-marker" src="<?php echo esc_url( $args['marker'] ); ?>" alt="" />
		<?php endif; ?>
		<h2><?php echo esc_html( $args['title'] ); ?></h2>
		<p><?php echo esc_html( $args['lede'] ); ?></p>
	</div>
	<div class="alignwide layout-article-spotlight-grid">
		<div class="layout-article-spotlight-featured">
			<?php kennedy_fg_component( 'article-card', $args['featured'] ); ?>
		</div>
		<?php foreach ( array_merge( $args['left'], $args['right'] ) as $card ) : ?>
			<?php kennedy_fg_component( 'article-card', $card ); ?>
		<?php endforeach; ?>
	</div>
	<div class="alignwide layout-article-spotlight-cta">
		<p><?php echo esc_html( $args['cta_text'] ); ?></p>
		<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'], 'variant' => 'short' ) ); ?>
	</div>
</section>
