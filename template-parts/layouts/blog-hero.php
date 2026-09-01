<?php
/**
 * Blog article hero: eyebrow, title, byline, jump CTA, full-bleed photo.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'eyebrow'   => __( 'Blog', 'kennedyfg' ),
		'title'     => get_the_title(),
		'byline'    => sprintf( __( 'By %s', 'kennedyfg' ), get_the_author() ),
		'date'      => get_the_date(),
		'cta'       => __( 'Read more', 'kennedyfg' ),
		'target'    => '#article-content',
		'is_video'  => false,
		'image'     => has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : kennedy_fg_asset( 'layouts/graphic-blog-hero-default.webp' ),
		'class'     => '',
	)
);
$show_media = ! $args['is_video'] && $args['image'];
?>
<section class="<?php echo esc_attr( trim( 'layout-blog-article-hero alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-blog-article-hero-top">
		<div class="layout-blog-article-hero-left">
			<?php if ( $args['eyebrow'] ) : ?>
				<p class="layout-blog-article-hero-eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
			<?php endif; ?>
			<h1 class="layout-blog-article-hero-title"><?php echo esc_html( $args['title'] ); ?></h1>
			<div class="layout-blog-article-hero-meta">
				<span><?php echo esc_html( $args['byline'] ); ?></span>
				<span aria-hidden="true">|</span>
				<span><?php echo esc_html( $args['date'] ); ?></span>
			</div>
		</div>
		<div class="layout-blog-article-hero-right">
			<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['target'], 'variant' => 'short' ) ); ?>
		</div>
	</div>
	<?php if ( $show_media ) : ?>
		<div class="layout-blog-article-hero-media">
			<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
		</div>
	<?php endif; ?>
</section>
