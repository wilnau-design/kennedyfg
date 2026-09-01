<?php
/**
 * Single blog post.
 *
 * @package kennedyfg
 */

get_header();
the_post();
?>

<main id="primary" class="site-main">
	<?php
	$is_video    = kennedy_fg_post_is_video();
	$video_url   = $is_video ? kennedy_fg_get_video_link() : '';
	$video_embed = $video_url ? kennedy_fg_get_video_embed_html( $video_url ) : '';
	?>
	<?php
	kennedy_fg_layout(
		'blog-hero',
		array(
			'eyebrow'  => kennedy_fg_post_category_label(),
			'is_video' => $is_video,
		)
	);
	?>
	<?php if ( $video_embed ) : ?>
		<figure class="alignwide layout-article-media is-video">
			<?php kennedy_fg_component( 'video-player', array( 'html' => $video_embed ) ); ?>
		</figure>
	<?php elseif ( $is_video ) : ?>
		<figure class="alignwide layout-article-media is-video">
			<?php kennedy_fg_component( 'video-placeholder', array( 'image' => get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) ); ?>
		</figure>
	<?php endif; ?>
	<?php kennedy_fg_layout( 'blog-post' ); ?>
	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
	?>
	<?php kennedy_fg_layout( 'cta-split' ); ?>
</main>

<?php
get_footer();
