<?php
/**
 * Inspect stored team bio encoding (raw DB vs ACF vs front-end helper).
 *
 * Usage:
 *   wp eval-file wp-content/themes/kennedyfg/bin/diagnose-team-bio.php
 *   wp eval-file wp-content/themes/kennedyfg/bin/diagnose-team-bio.php brandon-kennedy
 *
 * @package kennedyfg
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	exit( 1 );
}

$slug = isset( $args[0] ) ? $args[0] : 'brandon-kennedy';
$post = get_page_by_path( $slug, OBJECT, 'team' );

if ( ! $post ) {
	WP_CLI::error( "Team post not found: {$slug}" );
}

global $wpdb;

$raw_bio = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key = 'bio' LIMIT 1",
		$post->ID
	)
);

$acf_bio = function_exists( 'get_field' ) ? get_field( 'bio', $post->ID ) : '';
$theme_bio = function_exists( 'kennedy_fg_get_team_bio_html' )
	? kennedy_fg_get_team_bio_html( $post )
	: '';

WP_CLI::log( "Post #{$post->ID} ({$slug})" );
WP_CLI::log( 'Raw DB bio snippet: ' . wp_html_excerpt( (string) $raw_bio, 120, '...' ) );
WP_CLI::log( 'Raw DB hex (first 80 bytes): ' . bin2hex( substr( (string) $raw_bio, 0, 80 ) ) );
WP_CLI::log( 'ACF get_field bio snippet: ' . wp_html_excerpt( (string) $acf_bio, 120, '...' ) );
WP_CLI::log( 'Theme bio snippet: ' . wp_html_excerpt( wp_strip_all_tags( (string) $theme_bio ), 120, '...' ) );

$has_mojibake = is_string( $raw_bio ) && false !== strpos( $raw_bio, "\xC3\x94\xC3\x87" );
WP_CLI::log( 'Has ÔÇ mojibake bytes: ' . ( $has_mojibake ? 'YES' : 'no' ) );

$has_en_dash = is_string( $raw_bio ) && false !== strpos( $raw_bio, "\xE2\x80\x93" );
WP_CLI::log( 'Has correct en-dash bytes: ' . ( $has_en_dash ? 'YES' : 'no' ) );
