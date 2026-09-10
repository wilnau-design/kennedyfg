<?php
/**
 * Fix UTF-8 mojibake from SQLite → MySQL migration.
 *
 * Typical broken sequences:
 * - ÔÇô  → en dash (–)
 * - ÔÇÖ  → curly apostrophe (’)
 * - â€"  → en dash (latin1 mishap)
 *
 * Usage (pass flags as plain words, not --flags):
 *   wp eval-file wp-content/themes/kennedyfg/bin/fix-encoding.php dry-run
 *   wp eval-file wp-content/themes/kennedyfg/bin/fix-encoding.php
 *   wp eval-file wp-content/themes/kennedyfg/bin/fix-encoding.php team-only
 *   wp eval-file wp-content/themes/kennedyfg/bin/fix-encoding.php dry-run team-only
 *
 * @package kennedyfg
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	exit( 1 );
}

/**
 * Reverse common UTF-8 mojibake patterns.
 *
 * @param string $text Raw text from the database.
 * @return string
 */
function kennedy_fg_fix_mojibake( $text ) {
	if ( ! is_string( $text ) || '' === $text ) {
		return $text;
	}

	$markers = array( 'ÔÇ', 'â€', 'Ã¢', 'Ã"','â€™', 'â€"', 'â€"' );
	$found   = false;
	foreach ( $markers as $marker ) {
		if ( false !== strpos( $text, $marker ) ) {
			$found = true;
			break;
		}
	}
	if ( ! $found ) {
		return $text;
	}

	if ( false !== strpos( $text, 'ÔÇ' ) ) {
		$fixed = mb_convert_encoding( $text, 'CP850', 'UTF-8' );
		if ( $fixed && mb_check_encoding( $fixed, 'UTF-8' ) ) {
			return $fixed;
		}
	}

	$fixed = mb_convert_encoding(
		mb_convert_encoding( $text, 'ISO-8859-1', 'UTF-8' ),
		'UTF-8',
		'UTF-8'
	);

	return $fixed ? $fixed : $text;
}

$dry_run   = in_array( 'dry-run', $args, true );
$team_only = in_array( 'team-only', $args, true );

$updated = 0;
$checked = 0;

global $wpdb;

if ( $team_only ) {
	$meta_rows = $wpdb->get_results(
		"SELECT pm.meta_id, pm.post_id, pm.meta_key, pm.meta_value
		FROM {$wpdb->postmeta} pm
		INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
		WHERE p.post_type = 'team'
		AND pm.meta_key NOT LIKE '\\_%'
		AND pm.meta_value REGEXP 'ÔÇ|â€|Ã'"
	);
} else {
	$meta_rows = $wpdb->get_results(
		"SELECT meta_id, post_id, meta_key, meta_value
		FROM {$wpdb->postmeta}
		WHERE meta_key NOT LIKE '\\_%'
		AND meta_value REGEXP 'ÔÇ|â€|Ã'"
	);
}

foreach ( (array) $meta_rows as $row ) {
	++$checked;
	$fixed = kennedy_fg_fix_mojibake( $row->meta_value );
	if ( $fixed === $row->meta_value ) {
		continue;
	}

	WP_CLI::log( "postmeta #{$row->meta_id} (post {$row->post_id}, {$row->meta_key})" );
	if ( $dry_run ) {
		WP_CLI::log( '  before: ' . wp_html_excerpt( $row->meta_value, 120, '…' ) );
		WP_CLI::log( '  after:  ' . wp_html_excerpt( $fixed, 120, '…' ) );
	} else {
		$wpdb->update(
			$wpdb->postmeta,
			array( 'meta_value' => $fixed ),
			array( 'meta_id' => (int) $row->meta_id ),
			array( '%s' ),
			array( '%d' )
		);
	}
	++$updated;
}

if ( ! $team_only ) {
	$post_types = array( 'post', 'page', 'team' );
	$placeholders = implode( ', ', array_fill( 0, count( $post_types ), '%s' ) );
	$post_rows = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT ID, post_title, post_content, post_excerpt
			FROM {$wpdb->posts}
			WHERE post_type IN ($placeholders)
			AND (post_title REGEXP 'ÔÇ|â€|Ã' OR post_content REGEXP 'ÔÇ|â€|Ã' OR post_excerpt REGEXP 'ÔÇ|â€|Ã')",
			$post_types
		)
	);

	foreach ( (array) $post_rows as $row ) {
		$changes = array();
		foreach ( array( 'post_title', 'post_content', 'post_excerpt' ) as $field ) {
			$fixed = kennedy_fg_fix_mojibake( $row->$field );
			if ( $fixed !== $row->$field ) {
				$changes[ $field ] = $fixed;
			}
		}
		if ( empty( $changes ) ) {
			continue;
		}

		++$checked;
		WP_CLI::log( "post #{$row->ID}" );
		if ( $dry_run ) {
			foreach ( $changes as $field => $fixed ) {
				WP_CLI::log( "  {$field} before: " . wp_html_excerpt( $row->$field, 120, '…' ) );
				WP_CLI::log( "  {$field} after:  " . wp_html_excerpt( $fixed, 120, '…' ) );
			}
		} else {
			$changes['ID'] = (int) $row->ID;
			wp_update_post( $changes );
		}
		++$updated;
	}
}

if ( $dry_run ) {
	WP_CLI::success( "Dry run complete. {$updated} of {$checked} checked rows would be updated." );
} else {
	WP_CLI::success( "Fixed {$updated} rows ({$checked} checked)." );
}
