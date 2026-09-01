<?php
/**
 * Seed team CPT members from live kennedyfg.com copy.
 *
 * @package kennedyfg
 */

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$image_dir = get_stylesheet_directory() . '/assets/images/layouts';

$members = array(
	array(
		'slug'       => 'brandon-kennedy',
		'title'      => 'Brandon Kennedy',
		'name'       => 'Brandon Kennedy',
		'job_title'  => 'President | Wealth Advisor',
		'image'      => 'team-brandon.webp',
		'menu_order' => 1,
		'video_link' => 'https://www.loom.com/share/0177899c54eb4d2f9fb464b9fc70bdee',
		'bio'        => '<p>A lifelong resident of Southeastern Michigan, Brandon is a devoted husband to his high school sweetheart, Danielle. They are the proud parents of three – Logan, Henry and Juliet – and live in Lake Orion. Brandon is a die-hard baseball and Detroit Tigers fan, and is a supporter of local youth baseball organizations. You can also find him building things in his workshop, speaking in movie quotes, and working on cars.</p><p>Brandon graduated from Oakland University, earning his Bachelor’s degree in Finance. He is an active volunteer at his church and offers personal educational seminars and courses throughout the year.</p>',
	),
	array(
		'slug'       => 'steven-fronrath',
		'title'      => 'Steven Fronrath, CFP®',
		'name'       => 'Steven Fronrath, CFP®',
		'job_title'  => 'Vice President | Wealth Advisor',
		'image'      => 'team-steven.webp',
		'menu_order' => 2,
		'video_link' => 'https://www.loom.com/share/d77dc8ae852f4559900881325f5cd86e',
		'bio'        => '<p>Steven shares his free time with his high school sweetheart and wife, Mary, and their dog, Jonas. He has a passion for music and the arts, and when he’s not in the office, you can find him playing in his band, reading a great book or tinkering with the latest technology gadget.</p><p>He is a proud graduate of Wayne State University, earning his Bachelor’s degree in Music Business and a minor in Business Administration. While exposed to the powerful impact that arts and music can have on people, he realized he could impact a similar change through acting as a guide for personal finance. By combining his business and financial knowledge with the human aspect of arts and music, Steven is truly able to put the “personal” in personal finance.</p>',
	),
	array(
		'slug'       => 'bob-dopke',
		'title'      => 'Bob Dopke, ChFC®',
		'name'       => 'Bob Dopke, ChFC®',
		'job_title'  => 'Managing Partner | Wealth Advisor',
		'image'      => 'team-bob.webp',
		'menu_order' => 3,
		'video_link' => 'https://www.loom.com/share/336ec6e22bd742e2884a67c4d9babcbc',
		'bio'        => '<p>A life-long Michigan resident, Bob lives in Lake Orion with his wife, Sue. They are proud parents of two boys – Connor and Gavin. When he is not in the office, Bob can usually be found on the golf course or in the kitchen trying a new recipe.</p><p>Bob is a graduate of Central Michigan University, earning his bachelor’s degree in finance. He is a Chartered Financial Consultant (ChFC) with over 32 years of experience helping people live their best financial life.</p>',
	),
	array(
		'slug'       => 'kelly-atkins',
		'title'      => 'Kelly Atkins, CRPC®',
		'name'       => 'Kelly Atkins, CRPC®',
		'job_title'  => 'Wealth Advisor',
		'image'      => 'team-kelly.webp',
		'menu_order' => 4,
		'video_link' => '',
		'bio'        => '<p>Prior to working at Kennedy Financial Group, Kelly spent over 37 years working at General Motors in various roles, including, most recently, Manufacturing Engineering Manager. She has spent years learning the ins and outs of investing and financial planning “for fun,” and we are thrilled to welcome her as a KFG Wealth Advisor. She looks forward to working one-on-one with clients and is particularly passionate about helping those navigating divorce.</p><p>Outside of work, Kelly is a Romeo-native and the proud mom of Zoe and Alexandra. She enjoys playing hockey, stand-up paddleboarding, and rollerblading in her spare time.</p>',
	),
	array(
		'slug'       => 'joe-abbott',
		'title'      => 'Joe Abbott',
		'name'       => 'Joe Abbott',
		'job_title'  => 'Wealth Advisor',
		'image'      => 'team-joe.webp',
		'menu_order' => 5,
		'video_link' => '',
		'bio'        => '<p>Joe has spent the past eight years in the financial services world, with experience that covers everything from mortgage lending to insurance, retirement planning, and long-term care. He started out as an Associate Mortgage Banker at Quicken Loans, then worked as a Financial Services Rep with the Knights of Columbus, and most recently as a Paraplanner at a financial planning firm.</p><p>That mix of roles has given him a well-rounded understanding of how to help people make smart decisions with their money, especially when it comes to protecting their families and planning for the future.</p><p>Outside the office, Joe is married to his high school sweetheart, Patricia, and they have three boys: James, Joey, and Teddy. He’s a big Detroit Tigers and Michigan Wolverines fan (Go Blue!), and when he’s not chasing the boys around, you’ll usually find him golfing, fishing, working on house projects, or spending time with family.</p>',
	),
	array(
		'slug'       => 'kristi-simonaj',
		'title'      => 'Kristi Simonaj, FPQP®',
		'name'       => 'Kristi Simonaj, FPQP®',
		'job_title'  => 'Senior Client Service Associate',
		'image'      => 'team-kristi.webp',
		'menu_order' => 6,
		'video_link' => '',
		'bio'        => '<p>Kristi, having been born and raised in Kosovo, moved to the United States with her parents and three sisters in 2009 and now lives with her family in Sterling Heights. Kristi is proudly fluent in both Albanian and English, having taught herself the language prior to moving to Michigan. She enjoys planning and hosting parties for her friends and family, cooking, and baking.</p><p>As the Senior Client Service Associate at KFG, Kristi supports the Operations Department through the timely processing of paperwork and account opening. She is a natural communicator and prioritizes reaching out to clients to ensure they are kept informed of every step of the onboarding and account updating processes. Kristi prides herself on her attention to detail, efficiency, and desire to learn.</p>',
	),
	array(
		'slug'       => 'nancy-e',
		'title'      => 'Nancy E.',
		'name'       => 'Nancy E.',
		'job_title'  => 'Client Service Associate',
		'image'      => 'team-nancy.webp',
		'menu_order' => 7,
		'video_link' => '',
		'bio'        => '<p>Nancy is thrilled to be the newest member of the KFG team. She is happily married to her high school sweetheart, and together they share a love for adventure. Nancy enjoys camping and hiking, particularly around the stunning Great Lakes. As an outdoor enthusiast, she also loves zip-lining and rock climbing. When not exploring nature, Nancy can be found trying out new recipes or working on her dream garden.</p><p>As a Client Service Associate, Nancy is dedicated to providing an exceptional experience for clients. Her passion for making people feel welcome drives her to deliver white-glove customer service every day, whether it’s over the phone or in the office. Nancy thrives on building relationships and takes pride in ensuring that every client feels valued and heard.</p>',
	),
	array(
		'slug'       => 'nicole-barg',
		'title'      => 'Nicole Barg',
		'name'       => 'Nicole Barg',
		'job_title'  => 'Client Service Associate',
		'image'      => 'team-nicole.webp',
		'menu_order' => 8,
		'video_link' => '',
		'bio'        => '<p>Nicole has spent most of her life in Southeastern Michigan and now resides in Macomb with her husband, Chris, son (Griffin), and their dachshund, Franklin. When she’s not in the office, you can find Nicole working on renovations around her home or spending time with family at her parent’s lake house.</p><p>As a Client Service Associate, Nicole’s primary role is to provide service to our clients and help manage the day-to-day operations of the firm. Nicole has a heart for people and oversees the onboarding of new clients and team members for the firm.</p>',
	),
);

function kennedy_fg_seed_sideload_image( $source, $post_id, $filename ) {
	$tmp = wp_tempnam( $filename );
	if ( ! copy( $source, $tmp ) ) {
		return new WP_Error( 'copy_failed', 'Could not copy ' . $source );
	}

	return media_handle_sideload(
		array(
			'name'     => $filename,
			'tmp_name' => $tmp,
		),
		$post_id
	);
}

function kennedy_fg_seed_set_field( $key, $value, $post_id ) {
	if ( function_exists( 'update_field' ) ) {
		update_field( $key, $value, $post_id );
		return;
	}
	update_post_meta( $post_id, $key, $value );
}

foreach ( $members as $item ) {
	$existing = get_page_by_path( $item['slug'], OBJECT, 'team' );
	$post_id  = $existing ? (int) $existing->ID : 0;

	$postarr = array(
		'post_type'    => 'team',
		'post_status'  => 'publish',
		'post_title'   => $item['title'],
		'post_name'    => $item['slug'],
		'post_content' => '',
		'menu_order'   => $item['menu_order'],
	);

	if ( $post_id ) {
		$postarr['ID'] = $post_id;
		$post_id       = wp_update_post( $postarr, true );
	} else {
		$post_id = wp_insert_post( $postarr, true );
	}

	if ( is_wp_error( $post_id ) ) {
		WP_CLI::warning( $item['slug'] . ': ' . $post_id->get_error_message() );
		continue;
	}

	kennedy_fg_seed_set_field( 'name', $item['name'], $post_id );
	kennedy_fg_seed_set_field( 'job_title', $item['job_title'], $post_id );
	kennedy_fg_seed_set_field( 'bio', $item['bio'], $post_id );
	kennedy_fg_seed_set_field( 'video_link', $item['video_link'], $post_id );

	$source = $image_dir . '/' . $item['image'];
	if ( ! file_exists( $source ) ) {
		WP_CLI::warning( 'Missing image ' . $source );
		continue;
	}

	$avatar_id = (int) get_post_thumbnail_id( $post_id );
	if ( ! $avatar_id ) {
		$media_id = kennedy_fg_seed_sideload_image( $source, $post_id, $item['image'] );
		if ( is_wp_error( $media_id ) ) {
			WP_CLI::warning( $item['slug'] . ' image: ' . $media_id->get_error_message() );
			continue;
		}
		$avatar_id = (int) $media_id;
		set_post_thumbnail( $post_id, $avatar_id );
	}

	kennedy_fg_seed_set_field( 'avatar', $avatar_id, $post_id );
	WP_CLI::log( "Team {$post_id} -> {$item['slug']}" );
}

WP_CLI::success( 'Team members seeded.' );
