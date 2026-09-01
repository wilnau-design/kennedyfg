<?php
/**
 * Attach dummy thumbnails to seeded posts.
 *
 * @package kennedyfg
 */

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$thumb_dir = get_stylesheet_directory() . '/assets/images/content/blog-thumbs';

$map = array(
	'tariff-refunds-guide-and-faq'                         => 'kfg-thumb-12.png',
	'mile-markers-walking-clients-through-a-plan'          => 'kfg-thumb-11.png',
	'lawmakers-local-businesses-pro-growth-tax-policy'     => 'kfg-thumb-05.png',
	'small-business-outlook-remain-resilient'              => 'kfg-thumb-10.png',
	'supporting-small-business-commitment-in-action'       => 'kfg-thumb-03.png',
	'celebrating-americas-top-100-small-businesses-2025'   => 'kfg-thumb-01.png',
	'social-security-timing-without-the-fog'               => 'kfg-thumb-07.png',
	'what-a-written-retirement-plan-actually-contains'     => 'kfg-thumb-08.png',
	'cash-reserves-before-you-tinker-with-investments'     => 'kfg-thumb-06.png',
	'why-we-talk-about-the-road-not-the-market'            => 'kfg-thumb-02.png',
	'a-simple-way-to-talk-about-required-minimum-distributions' => 'kfg-thumb-04.png',
	'when-a-pension-and-a-401k-have-to-share-the-same-plan' => 'kfg-thumb-09.png',
);

foreach ( $map as $slug => $file ) {
	$post = get_page_by_path( $slug, OBJECT, 'post' );
	if ( ! $post ) {
		WP_CLI::warning( "Missing post {$slug}" );
		continue;
	}
	if ( has_post_thumbnail( $post ) ) {
		WP_CLI::log( "Already has thumb: {$slug}" );
		continue;
	}

	$source = $thumb_dir . '/' . $file;
	if ( ! file_exists( $source ) ) {
		WP_CLI::warning( "Missing file {$source}" );
		continue;
	}

	$tmp = wp_tempnam( $file );
	copy( $source, $tmp );
	$media_id = media_handle_sideload(
		array(
			'name'     => $file,
			'tmp_name' => $tmp,
		),
		$post->ID,
		$post->post_title
	);

	if ( is_wp_error( $media_id ) ) {
		WP_CLI::warning( $slug . ': ' . $media_id->get_error_message() );
		continue;
	}

	set_post_thumbnail( $post->ID, $media_id );
	WP_CLI::log( "Thumb {$media_id} -> {$slug}" );
}

WP_CLI::success( 'Thumbnails attached.' );
