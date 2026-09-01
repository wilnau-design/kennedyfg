<?php
/**
 * Seed dummy blog/video posts with thumbnails.
 *
 * @package kennedyfg
 */

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

wp_update_user(
	array(
		'ID'           => 1,
		'display_name' => 'Brandon Kennedy',
		'first_name'   => 'Brandon',
		'last_name'    => 'Kennedy',
	)
);

foreach ( array( 'blog', 'video' ) as $slug ) {
	if ( ! term_exists( $slug, 'category' ) ) {
		wp_insert_term( $slug, 'category', array( 'slug' => $slug ) );
	}
}

$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
if ( $hello ) {
	wp_delete_post( $hello->ID, true );
}

$thumb_dir = get_stylesheet_directory() . '/assets/images/content/blog-thumbs';

$posts = array(
	array(
		'slug'     => 'tariff-refunds-guide-and-faq',
		'title'    => 'Tariff Refunds Guide and FAQ: What Importers Need to Know',
		'excerpt'  => 'There are practical steps importers can take now to prepare for IEEPA tariff refunds. Use this guide to understand eligibility and navigate the refund process.',
		'date'     => '2026-08-10 09:00:00',
		'category'   => 'video',
		'video_link' => 'https://www.youtube.com/watch?v=u31qwQUeGuM',
		'thumb'      => 'kfg-thumb-12.png',
		'sticky'   => true,
		'content'  => '<p>When rules change, the first instinct is to wait. That is usually the expensive instinct. Importers who map eligibility now, gather paperwork, and talk with their advisor before a deadline tend to keep more of what they already paid.</p><p>This video walkthrough covers who may qualify, which records matter, and how to sequence the work so it does not take over your operating calendar. Treat it as a map, not a legal opinion: your facts still drive the next step.</p><p>If you are unsure whether this applies to your business, start with a short inventory of what you imported and when. Bring that list to your next planning conversation.</p>',
	),
	array(
		'slug'     => 'mile-markers-walking-clients-through-a-plan',
		'title'    => 'Mile Markers: Walking Clients Through a Retirement Plan',
		'excerpt'  => 'A plain-English video on how we turn a pile of accounts into a sequence of next steps you can actually follow.',
		'date'     => '2026-07-12 10:00:00',
		'category'   => 'video',
		'video_link' => 'https://www.youtube.com/watch?v=u31qwQUeGuM',
		'thumb'      => 'kfg-thumb-11.png',
		'sticky'   => false,
		'content'  => '<p>Most people do not need more products. They need a route. In this video we show how a first conversation becomes a written plan, then a handful of mile markers you can check without staring at the market every morning.</p><p>You will see how we talk about cash flow, Social Security timing, and the difference between a number on a statement and money you can spend. The goal is fewer surprises, not a perfect forecast.</p>',
	),
	array(
		'slug'     => 'lawmakers-local-businesses-pro-growth-tax-policy',
		'title'    => 'Lawmakers, Local Businesses Talk Pro-Growth Tax Policy',
		'excerpt'  => 'What local owners are asking for when tax talk leaves Washington and lands on Main Street.',
		'date'     => '2026-08-27 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-05.png',
		'sticky'   => false,
		'content'  => '<p>Tax policy sounds abstract until it hits payroll, equipment, and hiring. Local owners tend to ask the same questions: what can we plan around, and what is still a moving target?</p><p>This note is dummy copy for the Mile Markers blog. Use it as a stand-in for a roundup of conversations with operators who want growth without guessing at next year’s rules.</p>',
	),
	array(
		'slug'     => 'small-business-outlook-remain-resilient',
		'title'    => 'Small Business Outlook: Small Businesses Remain Resilient',
		'excerpt'  => 'Owners keep adapting. Here is how that shows up in cash flow, hiring, and retirement savings.',
		'date'     => '2026-08-26 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-10.png',
		'sticky'   => false,
		'content'  => '<p>Resilience is not a slogan. It is a habit of trimming the wrong costs, keeping a cash buffer, and not betting the company on a single customer.</p><p>Dummy copy for now: a short outlook piece on why small firms can still fund retirement plans even when the news cycle is loud.</p>',
	),
	array(
		'slug'     => 'supporting-small-business-commitment-in-action',
		'title'    => 'Supporting Small Business: Our Commitment in Action',
		'excerpt'  => 'How we show up for owners who are building something that has to last longer than a headline.',
		'date'     => '2026-08-25 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-03.png',
		'sticky'   => false,
		'content'  => '<p>Owners already work long days. Advice that adds homework without a next step is not help.</p><p>This dummy article stands in for a piece on how Kennedy FG works with operators: clear meetings, written follow-ups, and a plan that respects both the business and the household.</p>',
	),
	array(
		'slug'     => 'celebrating-americas-top-100-small-businesses-2025',
		'title'    => 'Celebrating America’s Top 100 Small Businesses of 2025',
		'excerpt'  => 'A nod to operators who built something durable, and what their habits can teach the rest of us.',
		'date'     => '2026-08-24 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-01.png',
		'sticky'   => false,
		'content'  => '<p>Lists are not a strategy, but they can be a reminder: durable businesses usually look boring from the outside. They pay themselves on purpose. They keep books that an outsider can follow.</p><p>Dummy copy celebrating operators and pointing readers back to the habits that fund retirement without drama.</p>',
	),
	array(
		'slug'     => 'social-security-timing-without-the-fog',
		'title'    => 'Social Security Timing Without the Fog',
		'excerpt'  => 'Claiming is a household decision, not a trivia contest. Here is how we frame it.',
		'date'     => '2026-08-22 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-07.png',
		'sticky'   => false,
		'content'  => '<p>The internet will give you a hundred claiming tricks. Most of them ignore your health, your spouse, and the rest of the plan.</p><p>This dummy post is a placeholder for a calm walkthrough of the tradeoffs: waiting versus cash flow now, and how we put the choice on a page you can revisit.</p>',
	),
	array(
		'slug'     => 'what-a-written-retirement-plan-actually-contains',
		'title'    => 'What a Written Retirement Plan Actually Contains',
		'excerpt'  => 'If the plan only lives in a conversation, it will drift. Here is the short list we put on paper.',
		'date'     => '2026-08-20 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-08.png',
		'sticky'   => false,
		'content'  => '<p>A plan is not a stack of product illustrations. It is a sequence: what you spend, what you keep in reserve, and what you do when markets are rude.</p><p>Dummy copy describing the sections we expect to see in a written plan so both of us can tell if we are still on the road.</p>',
	),
	array(
		'slug'     => 'cash-reserves-before-you-tinker-with-investments',
		'title'    => 'Cash Reserves Before You Tinker With Investments',
		'excerpt'  => 'The unglamorous buffer that keeps a market dip from becoming a fire sale.',
		'date'     => '2026-08-18 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-06.png',
		'sticky'   => false,
		'content'  => '<p>People love to talk allocation. Fewer people enjoy talking about six months of expenses sitting somewhere boring.</p><p>This dummy article is a reminder that cash is a tool, not a failure of nerve, especially when you are close to leaving a paycheck behind.</p>',
	),
	array(
		'slug'     => 'why-we-talk-about-the-road-not-the-market',
		'title'    => 'Why We Talk About the Road, Not the Market',
		'excerpt'  => 'Mile markers beat scorekeeping. A short note on how we measure progress with clients.',
		'date'     => '2026-08-14 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-02.png',
		'sticky'   => false,
		'content'  => '<p>Markets will do what they do. The useful question is whether this year’s spending, savings, and decisions still match the map you agreed to.</p><p>Dummy copy for a brand piece on why Kennedy FG uses road language: it keeps the conversation on choices you control.</p>',
	),
	array(
		'slug'     => 'a-simple-way-to-talk-about-required-minimum-distributions',
		'title'    => 'A Simple Way to Talk About Required Minimum Distributions',
		'excerpt'  => 'RMDs are a calendar item, not a personality test. Here is the version we use with clients.',
		'date'     => '2026-08-08 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-04.png',
		'sticky'   => false,
		'content'  => '<p>Required withdrawals show up whether you feel ready or not. The work is putting them on a calendar and deciding where the dollars go next.</p><p>This dummy post stands in for a plain-English RMD explainer with a short checklist you can bring to a meeting.</p>',
	),
	array(
		'slug'     => 'when-a-pension-and-a-401k-have-to-share-the-same-plan',
		'title'    => 'When a Pension and a 401(k) Have to Share the Same Plan',
		'excerpt'  => 'Two income sources, one household. How we keep them from arguing with each other.',
		'date'     => '2026-08-04 08:00:00',
		'category' => 'blog',
		'thumb'    => 'kfg-thumb-09.png',
		'sticky'   => false,
		'content'  => '<p>A pension feels like a paycheck. A 401(k) feels like a pile of maybe. Putting them in one plan is how you stop double-counting or under-counting the same future.</p><p>Dummy copy for an article on coordinating guaranteed income with invested savings without turning the kitchen table into a spreadsheet fight.</p>',
	),
);

$created = 0;
$skipped = 0;

foreach ( $posts as $item ) {
	$existing = get_page_by_path( $item['slug'], OBJECT, 'post' );
	if ( $existing ) {
		++$skipped;
		WP_CLI::log( 'Skip existing: ' . $item['slug'] );
		continue;
	}

	$post_id = wp_insert_post(
		array(
			'post_title'   => $item['title'],
			'post_name'    => $item['slug'],
			'post_content' => $item['content'],
			'post_excerpt' => $item['excerpt'],
			'post_status'  => 'publish',
			'post_type'    => 'post',
			'post_author'  => 1,
			'post_date'    => $item['date'],
		),
		true
	);

	if ( is_wp_error( $post_id ) ) {
		WP_CLI::warning( $post_id->get_error_message() );
		continue;
	}

	$term = get_term_by( 'slug', $item['category'], 'category' );
	if ( $term && ! is_wp_error( $term ) ) {
		wp_set_post_terms( $post_id, array( (int) $term->term_id ), 'category' );
	}

	$source = $thumb_dir . '/' . $item['thumb'];
	if ( file_exists( $source ) ) {
		$tmp = wp_tempnam( $item['thumb'] );
		copy( $source, $tmp );
		$file_array = array(
			'name'     => $item['thumb'],
			'tmp_name' => $tmp,
		);
		$media_id   = media_handle_sideload( $file_array, $post_id, $item['title'] );
		if ( ! is_wp_error( $media_id ) ) {
			set_post_thumbnail( $post_id, $media_id );
		} else {
			WP_CLI::warning( $item['slug'] . ' media: ' . $media_id->get_error_message() );
			@unlink( $tmp );
		}
	}

	if ( ! empty( $item['video_link'] ) ) {
		if ( function_exists( 'update_field' ) ) {
			update_field( 'video_link', $item['video_link'], $post_id );
		} else {
			update_post_meta( $post_id, 'video_link', $item['video_link'] );
		}
	}

	if ( ! empty( $item['sticky'] ) ) {
		stick_post( $post_id );
	}

	++$created;
	WP_CLI::log( 'Created #' . $post_id . ' ' . $item['slug'] . ' [' . $item['category'] . ']' );
}

update_option( 'posts_per_page', 12 );

WP_CLI::success( "Seeded {$created} posts, skipped {$skipped}." );
