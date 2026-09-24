<?php
/**
 * Theme functions and definitions.
 *
 * @package kennedyfg
 */

function kennedy_fg_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 40,
			'width'       => 196,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_editor_style( 'style.css' );
	load_theme_textdomain( 'kennedyfg', get_template_directory() . '/languages' );

	register_nav_menus(
		array(
			'primary'      => __( 'Primary', 'kennedyfg' ),
			'client-login' => __( 'Client Login', 'kennedyfg' ),
			'footer'       => __( 'Footer', 'kennedyfg' ),
		)
	);
}
add_action( 'after_setup_theme', 'kennedy_fg_setup' );

require get_template_directory() . '/inc/nav.php';
require get_template_directory() . '/inc/fluentforms.php';

function kennedy_fg_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'kennedyfg-style',
		get_stylesheet_uri(),
		array(),
		$version
	);

	wp_enqueue_style(
		'kennedyfg-components',
		get_theme_file_uri( 'assets/css/components.css' ),
		array( 'kennedyfg-style' ),
		(string) filemtime( get_theme_file_path( 'assets/css/components.css' ) )
	);

	wp_enqueue_script(
		'kennedyfg-components',
		get_theme_file_uri( 'assets/js/components.js' ),
		array(),
		(string) filemtime( get_theme_file_path( 'assets/js/components.js' ) ),
		true
	);

	wp_enqueue_style(
		'kennedyfg-layouts',
		get_theme_file_uri( 'assets/css/layouts.css' ),
		array( 'kennedyfg-components' ),
		(string) filemtime( get_theme_file_path( 'assets/css/layouts.css' ) )
	);

	wp_enqueue_script(
		'kennedyfg-layouts',
		get_theme_file_uri( 'assets/js/layouts.js' ),
		array(),
		(string) filemtime( get_theme_file_path( 'assets/js/layouts.js' ) ),
		true
	);

	wp_enqueue_style(
		'kennedyfg-pages',
		get_theme_file_uri( 'assets/css/pages.css' ),
		array( 'kennedyfg-layouts' ),
		(string) filemtime( get_theme_file_path( 'assets/css/pages.css' ) )
	);

	wp_enqueue_style(
		'kennedyfg-fluentforms',
		get_theme_file_uri( 'assets/css/fluentforms.css' ),
		array( 'kennedyfg-pages' ),
		(string) filemtime( get_theme_file_path( 'assets/css/fluentforms.css' ) )
	);

	if ( kennedy_fg_is_component_library() || kennedy_fg_is_layout_library() ) {
		wp_enqueue_style(
			'kennedyfg-library',
			get_theme_file_uri( 'assets/css/component-library.css' ),
			array( 'kennedyfg-components' ),
			$version
		);
		wp_enqueue_script(
			'kennedyfg-library',
			get_theme_file_uri( 'assets/js/component-library.js' ),
			array(),
			$version,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'kennedy_fg_enqueue_assets' );

function kennedy_fg_is_component_library() {
	return is_page_template( 'component-library.php' ) || is_page( 'component-library' );
}

function kennedy_fg_is_layout_library() {
	return is_page_template( 'layout-library.php' ) || is_page( 'layout-library' );
}

function kennedy_fg_is_guide_page() {
	return is_page( array( 'guide', 'retirement-guide' ) ) || is_page_template( 'page-guide.php' );
}

function kennedy_fg_is_thank_you_page() {
	return is_page( array( 'guide-thank-you', 'start-here-thank-you' ) )
		|| is_page_template( array( 'page-guide-thank-you.php', 'page-start-here-thank-you.php' ) );
}

function kennedy_fg_hide_site_header() {
	return kennedy_fg_is_guide_page() || kennedy_fg_is_thank_you_page();
}

function kennedy_fg_hide_site_footer() {
	return kennedy_fg_is_thank_you_page();
}

function kennedy_fg_body_class( $classes ) {
	if ( kennedy_fg_is_component_library() || kennedy_fg_is_layout_library() ) {
		$classes[] = 'kennedyfg-library';
	}
	if ( kennedy_fg_hide_site_header() ) {
		$classes[] = 'has-no-header';
	}
	if ( kennedy_fg_hide_site_footer() ) {
		$classes[] = 'has-no-footer';
	}
	return $classes;
}
add_filter( 'body_class', 'kennedy_fg_body_class' );

function kennedy_fg_page_template_aliases( $template ) {
	if ( is_page( 'retirement-guide' ) ) {
		$found = locate_template( 'page-guide.php' );
		return $found ? $found : $template;
	}

	return $template;
}
add_filter( 'template_include', 'kennedy_fg_page_template_aliases' );

function kennedy_fg_redirect_services_page() {
	if ( is_admin() ) {
		return;
	}

	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( 'services' !== $path ) {
		return;
	}

	wp_safe_redirect( home_url( '/process/' ), 301 );
	exit;
}
add_action( 'template_redirect', 'kennedy_fg_redirect_services_page' );

/**
 * Eyebrow above the title on Service Article pages.
 */
function kennedy_fg_service_eyebrow_meta_box( $post_type, $post ) {
	if ( ! $post instanceof WP_Post ) {
		return;
	}
	$template = get_page_template_slug( $post->ID );
	if ( 'page-service.php' !== $template ) {
		return;
	}
	add_meta_box(
		'kennedy-service-eyebrow',
		__( 'Service eyebrow', 'kennedyfg' ),
		'kennedy_fg_service_eyebrow_meta_box_render',
		'page',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'kennedy_fg_service_eyebrow_meta_box', 10, 2 );

/**
 * @param WP_Post $post Current page.
 */
function kennedy_fg_service_eyebrow_meta_box_render( $post ) {
	wp_nonce_field( 'kennedy_fg_service_eyebrow', 'kennedy_fg_service_eyebrow_nonce' );
	$value = get_post_meta( $post->ID, 'service_eyebrow', true );
	?>
	<p>
		<label for="kennedy-service-eyebrow-field"><?php esc_html_e( 'Shown above the headline, in small caps.', 'kennedyfg' ); ?></label>
	</p>
	<input id="kennedy-service-eyebrow-field" class="widefat" type="text" name="service_eyebrow" value="<?php echo esc_attr( $value ); ?>" />
	<?php
}

/**
 * @param int $post_id Page ID.
 */
function kennedy_fg_save_service_eyebrow( $post_id ) {
	if ( ! isset( $_POST['kennedy_fg_service_eyebrow_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kennedy_fg_service_eyebrow_nonce'] ) ), 'kennedy_fg_service_eyebrow' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}
	$eyebrow = isset( $_POST['service_eyebrow'] ) ? sanitize_text_field( wp_unslash( $_POST['service_eyebrow'] ) ) : '';
	if ( '' === $eyebrow ) {
		delete_post_meta( $post_id, 'service_eyebrow' );
		return;
	}
	update_post_meta( $post_id, 'service_eyebrow', $eyebrow );
}
add_action( 'save_post_page', 'kennedy_fg_save_service_eyebrow' );

function kennedy_fg_asset( $path ) {
	return get_theme_file_uri( 'assets/images/' . ltrim( $path, '/' ) );
}

/**
 * Google Maps URL for the firm office address.
 *
 * @return string
 */
function kennedy_fg_address_map_url() {
	return 'https://www.google.com/maps/place/Kennedy+Financial+Group/@42.5608293,-83.1535016,17z/data=!3m1!4b1!4m6!3m5!1s0x8824c43d8607a99b:0x1227d678aed12f4b!8m2!3d42.5608293!4d-83.1535016';
}

/**
 * Dev/QC options page: lets devs toggle the light/dark theme switcher
 * that appears in the site footer, without touching code.
 */
function kennedy_fg_show_dev_theme_toggle() {
	return (bool) get_option( 'kennedy_fg_show_dev_theme_toggle', true );
}

/**
 * Whether the FINRA BrokerCheck badge is shown, fixed at the bottom left.
 */
function kennedy_fg_show_brokercheck() {
	return (bool) get_option( 'kennedy_fg_show_brokercheck', true );
}

function kennedy_fg_register_theme_options_page() {
	add_theme_page(
		__( 'Kennedy FG Options', 'kennedyfg' ),
		__( 'Kennedy FG Options', 'kennedyfg' ),
		'manage_options',
		'kennedy-fg-options',
		'kennedy_fg_render_theme_options_page'
	);
}
add_action( 'admin_menu', 'kennedy_fg_register_theme_options_page' );

function kennedy_fg_register_theme_options_settings() {
	register_setting(
		'kennedy_fg_options',
		'kennedy_fg_show_dev_theme_toggle',
		array(
			'type'              => 'boolean',
			'sanitize_callback' => 'rest_sanitize_boolean',
			'default'           => true,
		)
	);

	register_setting(
		'kennedy_fg_options',
		'kennedy_fg_show_brokercheck',
		array(
			'type'              => 'boolean',
			'sanitize_callback' => 'rest_sanitize_boolean',
			'default'           => true,
		)
	);

	add_settings_section(
		'kennedy_fg_options_dev',
		__( 'Dev &amp; QC', 'kennedyfg' ),
		'__return_false',
		'kennedy-fg-options'
	);

	add_settings_field(
		'kennedy_fg_show_dev_theme_toggle',
		__( 'Light/dark toggle', 'kennedyfg' ),
		'kennedy_fg_render_show_dev_theme_toggle_field',
		'kennedy-fg-options',
		'kennedy_fg_options_dev'
	);

	add_settings_section(
		'kennedy_fg_options_footer',
		__( 'Footer', 'kennedyfg' ),
		'__return_false',
		'kennedy-fg-options'
	);

	add_settings_field(
		'kennedy_fg_show_brokercheck',
		__( 'BrokerCheck', 'kennedyfg' ),
		'kennedy_fg_render_show_brokercheck_field',
		'kennedy-fg-options',
		'kennedy_fg_options_footer'
	);
}
add_action( 'admin_init', 'kennedy_fg_register_theme_options_settings' );

function kennedy_fg_render_show_dev_theme_toggle_field() {
	?>
	<label for="kennedy_fg_show_dev_theme_toggle">
		<input
			type="checkbox"
			id="kennedy_fg_show_dev_theme_toggle"
			name="kennedy_fg_show_dev_theme_toggle"
			value="1"
			<?php checked( kennedy_fg_show_dev_theme_toggle() ); ?>
		/>
		<?php esc_html_e( 'Show the light/dark theme toggle in the site footer', 'kennedyfg' ); ?>
	</label>
	<p class="description">
		<?php esc_html_e( 'Intended for development and QC only. The site already switches between light and dark automatically based on the visitor\'s device settings; this toggle just lets testers preview both themes manually. Turn it off before launch/handoff to the client.', 'kennedyfg' ); ?>
	</p>
	<?php
}

function kennedy_fg_render_show_brokercheck_field() {
	?>
	<input type="hidden" name="kennedy_fg_show_brokercheck" value="0" />
	<label for="kennedy_fg_show_brokercheck">
		<input
			type="checkbox"
			id="kennedy_fg_show_brokercheck"
			name="kennedy_fg_show_brokercheck"
			value="1"
			<?php checked( kennedy_fg_show_brokercheck() ); ?>
		/>
		<?php esc_html_e( 'Show the BrokerCheck badge on the site', 'kennedyfg' ); ?>
	</label>
	<p class="description">
		<?php esc_html_e( 'Fixed at the bottom left of every page. Links to FINRA BrokerCheck.', 'kennedyfg' ); ?>
	</p>
	<?php
}

function kennedy_fg_render_theme_options_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Kennedy FG Options', 'kennedyfg' ); ?></h1>
		<form action="options.php" method="post">
			<?php
			settings_fields( 'kennedy_fg_options' );
			do_settings_sections( 'kennedy-fg-options' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Resolve a theme asset URL back to its assets/images/ relative path.
 */
function kennedy_fg_asset_relative_path( $url ) {
	$theme_uri = trailingslashit( get_theme_file_uri( 'assets/images/' ) );
	if ( ! str_starts_with( $url, $theme_uri ) ) {
		return '';
	}

	return ltrim( substr( $url, strlen( $theme_uri ) ), '/' );
}

function kennedy_fg_icon_url( $name ) {
	return kennedy_fg_asset( 'icons/' . $name );
}

/**
 * Allowed tags for inline SVG markup from theme assets.
 *
 * @return array<string, array<string, bool>>
 */
function kennedy_fg_inline_svg_allowed_html() {
	return array(
		'svg'   => array(
			'class'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true,
			'viewBox'         => true,
			'fill'            => true,
			'xmlns'           => true,
			'aria-hidden'     => true,
			'focusable'       => true,
			'role'            => true,
		),
		'g'     => array(
			'id'        => true,
			'transform' => true,
			'filter'    => true,
			'style'     => true,
			'opacity'   => true,
		),
		'path'  => array(
			'd'    => true,
			'fill' => true,
			'id'   => true,
		),
		'defs'  => array(),
		'filter' => array(
			'id'                          => true,
			'x'                           => true,
			'y'                           => true,
			'width'                       => true,
			'height'                      => true,
			'filterunits'                 => true,
			'filterUnits'                 => true,
			'color-interpolation-filters' => true,
		),
		'feflood' => array(
			'flood-opacity' => true,
			'result'        => true,
		),
		'feblend' => array(
			'mode'   => true,
			'in'     => true,
			'in2'    => true,
			'result' => true,
		),
		'fegaussianblur' => array(
			'stddeviation' => true,
			'result'       => true,
		),
	);
}

/**
 * Render a theme SVG inline so blend modes composite against the page.
 *
 * @param string               $path Relative path under assets/images/.
 * @param array<string, mixed> $args Optional class and aria-hidden flag.
 */
function kennedy_fg_inline_svg( $path, $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'class'       => '',
			'aria_hidden' => true,
		)
	);

	$file = get_theme_file_path( 'assets/images/' . ltrim( $path, '/' ) );
	if ( ! is_readable( $file ) ) {
		return '';
	}

	$svg = (string) file_get_contents( $file );
	if ( '' === $svg ) {
		return '';
	}

	$attrs = array();
	if ( $args['class'] ) {
		$attrs[] = 'class="' . esc_attr( $args['class'] ) . '"';
	}
	if ( $args['aria_hidden'] ) {
		$attrs[] = 'aria-hidden="true"';
	}
	if ( $attrs ) {
		$svg = preg_replace( '/<svg\b/', '<svg ' . implode( ' ', $attrs ), $svg, 1 );
	}

	// Theme-controlled assets: preserve filters, transforms, and blend modes.
	return $svg;
}

function kennedy_fg_component( $slug, $args = array() ) {
	get_template_part( 'template-parts/components/' . $slug, null, $args );
}

function kennedy_fg_layout( $slug, $args = array() ) {
	get_template_part( 'template-parts/layouts/' . $slug, null, $args );
}

/**
 * Load Client Stories copy from theme JSON.
 *
 * Image paths are relative to assets/images/. Hrefs are site paths unless already absolute.
 *
 * @return array{title: string, stories: array<int, array<string, string>>}
 */
function kennedy_fg_get_client_stories() {
	$path = get_theme_file_path( 'assets/data/client-stories.json' );
	if ( ! is_readable( $path ) ) {
		return array(
			'title'   => __( 'Client stories', 'kennedyfg' ),
			'stories' => array(),
		);
	}

	$data = json_decode( (string) file_get_contents( $path ), true );
	if ( ! is_array( $data ) ) {
		return array(
			'title'   => __( 'Client stories', 'kennedyfg' ),
			'stories' => array(),
		);
	}

	$stories = array();
	foreach ( (array) ( $data['stories'] ?? array() ) as $story ) {
		if ( empty( $story['id'] ) ) {
			continue;
		}

		$image = isset( $story['image'] ) ? (string) $story['image'] : '';
		$href  = isset( $story['href'] ) ? (string) $story['href'] : '';

		if ( $image && ! preg_match( '#^(https?:)?//#i', $image ) ) {
			$image = kennedy_fg_asset( $image );
		}

		if ( $href && ! preg_match( '#^(https?:)?//#i', $href ) ) {
			$href = home_url( $href );
		}

		$card          = sanitize_title( (string) ( $story['card'] ?? 'quote-card' ) );
		$allowed_cards = array( 'quote-card', 'soft-green', 'soft-brown' );
		if ( ! in_array( $card, $allowed_cards, true ) ) {
			$card = 'quote-card';
		}

		$raw_detail = (array) ( $story['detail'] ?? array() );
		$beats      = array();
		foreach ( (array) ( $raw_detail['beats'] ?? array() ) as $beat ) {
			$beats[] = array(
				'label' => (string) ( $beat['label'] ?? '' ),
				'body'  => array_map( 'strval', (array) ( $beat['body'] ?? array() ) ),
			);
		}

		$detail = array(
			'lede'      => (string) ( $raw_detail['lede'] ?? '' ),
			'beats'     => $beats,
			'life_now'  => (string) ( $raw_detail['life_now'] ?? '' ),
			'cta_title' => (string) ( $raw_detail['cta_title'] ?? '' ),
		);

		$stories[] = array(
			'id'     => sanitize_title( (string) $story['id'] ),
			'name'   => trim( (string) ( $story['name'] ?? '' ) ),
			'meta'   => (string) ( $story['meta'] ?? '' ),
			'quote'  => (string) ( $story['quote'] ?? '' ),
			'image'  => $image,
			'href'   => $href,
			'cta'    => (string) ( $story['cta'] ?? __( 'Read More', 'kennedyfg' ) ),
			'card'   => $card,
			'detail' => $detail,
		);
	}

	$title = isset( $data['title'] ) ? (string) $data['title'] : '';

	return array(
		'title'   => $title ? $title : __( 'Client stories', 'kennedyfg' ),
		'stories' => $stories,
	);
}

function kennedy_fg_post_is_video( $post = null ) {
	$post = get_post( $post );
	return $post && has_category( 'video', $post );
}

function kennedy_fg_get_video_link( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}

	$value = '';
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( 'video_link', $post->ID );
	}
	if ( ! $value ) {
		$value = get_post_meta( $post->ID, 'video_link', true );
	}

	$value = is_string( $value ) ? trim( $value ) : '';
	return $value ? esc_url_raw( $value ) : '';
}

/**
 * Escape an href that may be an absolute URL or a site-relative path.
 *
 * @param mixed $href Raw href from a text field.
 * @return string
 */
function kennedy_fg_esc_href( $href ) {
	$href = is_string( $href ) ? trim( $href ) : '';
	if ( '' === $href ) {
		return '';
	}

	if ( preg_match( '#^(javascript|data|vbscript):#i', $href ) ) {
		return '';
	}

	if ( preg_match( '#^(https?:)?//#i', $href ) || str_starts_with( $href, '/' ) || str_starts_with( $href, '#' ) || str_starts_with( $href, '?' ) ) {
		return esc_url( $href );
	}

	if ( str_starts_with( $href, './' ) || str_starts_with( $href, '../' ) ) {
		return esc_attr( $href );
	}

	return esc_url( '/' . ltrim( $href, '/' ) );
}

function kennedy_fg_register_video_oembed_providers() {
	wp_oembed_add_provider( '#https?://(www\.)?loom\.com/(share|embed)/.*#i', 'https://www.loom.com/v1/oembed', true );
}
add_action( 'init', 'kennedy_fg_register_video_oembed_providers' );

function kennedy_fg_get_loom_id( $url ) {
	$url = is_string( $url ) ? $url : '';
	if ( ! $url ) {
		return '';
	}

	if ( preg_match( '#loom\.com/(?:share|embed)/([a-zA-Z0-9]+)#i', $url, $matches ) ) {
		return $matches[1];
	}

	return '';
}

function kennedy_fg_get_video_embed_src( $url ) {
	$url = esc_url_raw( $url );
	if ( ! $url ) {
		return '';
	}

	$loom_id = kennedy_fg_get_loom_id( $url );
	if ( $loom_id ) {
		return 'https://www.loom.com/embed/' . rawurlencode( $loom_id ) . '?hide_owner=true&hide_share=true&hide_title=true';
	}

	$html = kennedy_fg_get_video_embed_html( $url );
	if ( $html && preg_match( '/src=["\']([^"\']+)["\']/', $html, $matches ) ) {
		return esc_url_raw( $matches[1] );
	}

	return '';
}

function kennedy_fg_get_video_embed_html( $url ) {
	$url = esc_url_raw( $url );
	if ( ! $url ) {
		return '';
	}

	$html = wp_oembed_get( $url );
	if ( $html ) {
		return $html;
	}

	$loom_id = kennedy_fg_get_loom_id( $url );
	if ( $loom_id ) {
		$src = kennedy_fg_get_video_embed_src( $url );
		return sprintf(
			'<iframe src="%1$s" title="%2$s" frameborder="0" allowfullscreen allow="autoplay; fullscreen; picture-in-picture"></iframe>',
			esc_url( $src ),
			esc_attr__( 'Video', 'kennedyfg' )
		);
	}

	$path = (string) wp_parse_url( $url, PHP_URL_PATH );
	$ext  = strtolower( pathinfo( $path, PATHINFO_EXTENSION ) );
	if ( in_array( $ext, array( 'mp4', 'm4v', 'webm', 'ogv' ), true ) ) {
		$video = wp_video_shortcode( array( 'src' => $url ) );
		return is_string( $video ) ? $video : '';
	}

	return '';
}

function kennedy_fg_get_video_thumbnail( $url ) {
	$url = esc_url_raw( $url );
	if ( ! $url ) {
		return '';
	}

	$key    = 'kfg_vthumb_' . md5( $url );
	$cached = get_transient( $key );
	if ( false !== $cached ) {
		return is_string( $cached ) ? $cached : '';
	}

	$thumb = '';
	$data  = _wp_oembed_get_object()->get_data( $url );
	if ( is_object( $data ) && ! empty( $data->thumbnail_url ) ) {
		$thumb = esc_url_raw( $data->thumbnail_url );
	}

	set_transient( $key, $thumb, DAY_IN_SECONDS );
	return $thumb;
}

function kennedy_fg_get_team_posts() {
	$query = new WP_Query(
		array(
			'post_type'      => 'team',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'no_found_rows'  => true,
		)
	);

	return $query->posts;
}

function kennedy_fg_get_team_acf( $key, $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}

	$value = '';
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $key, $post->ID );
	}
	if ( ! $value ) {
		$value = get_post_meta( $post->ID, $key, true );
	}

	return $value;
}

function kennedy_fg_get_team_name( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}

	$name = kennedy_fg_get_team_acf( 'name', $post );
	$name = is_string( $name ) ? trim( $name ) : '';
	return $name ? $name : get_the_title( $post );
}

function kennedy_fg_get_team_role( $post = null ) {
	$role = kennedy_fg_get_team_acf( 'job_title', $post );
	return is_string( $role ) ? trim( $role ) : '';
}

function kennedy_fg_get_team_avatar( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}

	$value = kennedy_fg_get_team_acf( 'avatar', $post );
	if ( is_array( $value ) && ! empty( $value['url'] ) ) {
		return esc_url_raw( $value['url'] );
	}
	if ( is_numeric( $value ) ) {
		$url = wp_get_attachment_image_url( (int) $value, 'large' );
		return $url ? $url : '';
	}
	if ( is_string( $value ) && $value ) {
		return esc_url_raw( $value );
	}

	$thumb = get_the_post_thumbnail_url( $post, 'large' );
	return $thumb ? $thumb : '';
}

function kennedy_fg_get_team_bio_html( $post = null ) {
	$bio = kennedy_fg_get_team_acf( 'bio', $post );
	if ( ! is_string( $bio ) || '' === trim( $bio ) ) {
		$post = get_post( $post );
		return $post ? apply_filters( 'the_content', $post->post_content ) : '';
	}

	$bio = trim( $bio );
	if ( false === strpos( $bio, '<' ) ) {
		$bio = wpautop( $bio );
	}

	return $bio;
}

function kennedy_fg_team_card_args( $post ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return array();
	}

	return array(
		'name'  => kennedy_fg_get_team_name( $post ),
		'role'  => kennedy_fg_get_team_role( $post ),
		'image' => kennedy_fg_get_team_avatar( $post ),
		'href'  => get_permalink( $post ),
	);
}

function kennedy_fg_get_team_bio_args( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return array();
	}

	$video  = kennedy_fg_get_video_link( $post );
	$avatar = kennedy_fg_get_team_avatar( $post );
	$thumb  = $video ? kennedy_fg_get_video_thumbnail( $video ) : '';

	return array(
		'name'        => kennedy_fg_get_team_name( $post ),
		'role'        => kennedy_fg_get_team_role( $post ),
		'image'       => $avatar,
		'video_url'   => $video,
		'video_src'   => $video ? kennedy_fg_get_video_embed_src( $video ) : '',
		'video_thumb' => $thumb ? $thumb : $avatar,
		'bio_html'    => kennedy_fg_get_team_bio_html( $post ),
		'current_id'  => $post->ID,
		'members'     => array_map( 'kennedy_fg_team_card_args', kennedy_fg_get_team_posts() ),
	);
}

function kennedy_fg_post_category_label( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}

	$terms = get_the_category( $post->ID );
	if ( empty( $terms ) ) {
		return '';
	}

	foreach ( $terms as $term ) {
		if ( 'video' === $term->slug ) {
			return $term->name;
		}
	}

	foreach ( $terms as $term ) {
		if ( 'blog' === $term->slug ) {
			return $term->name;
		}
	}

	return $terms[0]->name;
}

function kennedy_fg_article_card_args( $post = null, $overrides = array() ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return $overrides;
	}

	$excerpt = has_excerpt( $post )
		? $post->post_excerpt
		: wp_trim_words( wp_strip_all_tags( $post->post_content ), 32 );

	$image = get_the_post_thumbnail_url( $post, 'medium' );
	if ( ! $image ) {
		$image = kennedy_fg_asset( 'layouts/photo-article.webp' );
	}

	return wp_parse_args(
		$overrides,
		array(
			'headline' => get_the_title( $post ),
			'summary'  => $excerpt,
			'byline'   => sprintf( __( 'By %s', 'kennedyfg' ), get_the_author_meta( 'display_name', $post->post_author ) ),
			'date'     => get_the_date( 'F j, Y', $post ),
			'href'     => get_permalink( $post ),
			'image'    => $image,
			'category' => kennedy_fg_post_category_label( $post ),
		)
	);
}

/**
 * Query the latest posts for the blog feed, optionally scoped to a category,
 * sticky posts only, or excluding a set of IDs.
 *
 * @param array $opts  { category_name?, sticky_only?, exclude? }
 * @param int   $count Number of posts to return.
 * @return WP_Post[]
 */
function kennedy_fg_find_latest_posts( $opts, $count ) {
	$exclude = array_map( 'intval', (array) ( $opts['exclude'] ?? array() ) );

	$args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $count,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'no_found_rows'       => true,
	);

	if ( ! empty( $opts['category_name'] ) ) {
		$args['category_name'] = $opts['category_name'];
	}

	if ( ! empty( $opts['sticky_only'] ) ) {
		$sticky_ids = array_map( 'intval', (array) get_option( 'sticky_posts', array() ) );
		$sticky_ids = array_values( array_diff( $sticky_ids, $exclude ) );
		if ( ! $sticky_ids ) {
			return array();
		}
		$args['post__in'] = $sticky_ids;
	}

	if ( $exclude ) {
		$args['post__not_in'] = $exclude;
	}

	$query = new WP_Query( $args );
	return $query->posts;
}

function kennedy_fg_find_latest_post( $opts ) {
	$posts = kennedy_fg_find_latest_posts( $opts, 1 );
	return $posts ? $posts[0] : null;
}

/**
 * Merge post lists, de-dupe by ID, and return the newest first.
 *
 * @param WP_Post[][] $groups
 * @param int         $count
 * @return WP_Post[]
 */
function kennedy_fg_merge_posts_by_date( $groups, $count ) {
	$by_id = array();
	foreach ( $groups as $posts ) {
		foreach ( $posts as $post ) {
			$by_id[ (int) $post->ID ] = $post;
		}
	}

	$posts = array_values( $by_id );
	usort(
		$posts,
		static function ( $a, $b ) {
			return strcmp( $b->post_date, $a->post_date );
		}
	);

	return array_slice( $posts, 0, $count );
}

/**
 * Recent posts for the blog landing: mix "blog" and "video" so videos
 * stay visible instead of being crowded out by newer articles.
 *
 * @param int[] $exclude Post IDs already shown above, plus stickies.
 * @param int   $count
 * @return WP_Post[]
 */
function kennedy_fg_find_recent_feed_posts( $exclude, $count ) {
	$blog = kennedy_fg_find_latest_posts(
		array(
			'category_name' => 'blog',
			'exclude'       => $exclude,
		),
		$count
	);
	$video = kennedy_fg_find_latest_posts(
		array(
			'category_name' => 'video',
			'exclude'       => $exclude,
		),
		$count
	);

	if ( ! $video ) {
		return array_slice( $blog, 0, $count );
	}
	if ( ! $blog ) {
		return array_slice( $video, 0, $count );
	}

	$video_take = array_slice( $video, 0, min( count( $video ), (int) ceil( $count / 2 ) ) );
	$blog_take  = array_slice( $blog, 0, $count - count( $video_take ) );

	return kennedy_fg_merge_posts_by_date( array( $blog_take, $video_take ), $count );
}

/**
 * Blog page feed: featured video, popular posts, and recent posts.
 *
 * Featured: the latest post marked sticky in the "video" category, falling
 * back to the latest "video" post if none is sticky.
 * Popular: sticky posts (excluding the featured one), falling back to the
 * latest remaining posts if fewer than 2 are sticky.
 * Recent: the latest posts from both the "blog" and "video" categories,
 * excluding sticky posts and anything already used above.
 *
 * @return array{featured: ?array, popular: array, recent: array}
 */
function kennedy_fg_get_blog_feed_data() {
	$used = array();

	$featured = kennedy_fg_find_latest_post(
		array(
			'category_name' => 'video',
			'sticky_only'    => true,
		)
	);
	if ( ! $featured ) {
		$featured = kennedy_fg_find_latest_post( array( 'category_name' => 'video' ) );
	}
	if ( $featured ) {
		$used[] = (int) $featured->ID;
	}

	$popular = kennedy_fg_find_latest_posts(
		array(
			'sticky_only' => true,
			'exclude'     => $used,
		),
		2
	);
	if ( count( $popular ) < 2 ) {
		$popular = array_merge(
			$popular,
			kennedy_fg_find_latest_posts(
				array( 'exclude' => array_merge( $used, wp_list_pluck( $popular, 'ID' ) ) ),
				2 - count( $popular )
			)
		);
	}
	$used = array_merge( $used, wp_list_pluck( $popular, 'ID' ) );

	$sticky_ids = array_map( 'intval', (array) get_option( 'sticky_posts', array() ) );
	$recent     = kennedy_fg_find_recent_feed_posts(
		array_unique( array_merge( $used, $sticky_ids ) ),
		6
	);

	return array(
		'featured' => $featured ? kennedy_fg_article_card_args( $featured, array( 'variant' => 'featured' ) ) : null,
		'popular'  => array_map( 'kennedy_fg_article_card_args', $popular ),
		'recent'   => array_map( 'kennedy_fg_article_card_args', $recent ),
	);
}

function kennedy_fg_show_home_blog_section() {
	$page_id = (int) get_option( 'page_on_front' );
	if ( ! $page_id ) {
		$page_id = (int) get_queried_object_id();
	}

	if ( ! $page_id ) {
		return false;
	}

	if ( function_exists( 'get_field' ) ) {
		return (bool) get_field( 'is_blog_section', $page_id );
	}

	return (bool) get_post_meta( $page_id, 'is_blog_section', true );
}

function kennedy_fg_get_article_spotlight_from_posts() {
	$featured   = null;
	$sticky_ids = array_values( array_filter( array_map( 'intval', (array) get_option( 'sticky_posts', array() ) ) ) );

	if ( $sticky_ids ) {
		$sticky_query = new WP_Query(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'post__in'            => $sticky_ids,
				'posts_per_page'      => 1,
				'ignore_sticky_posts' => true,
				'orderby'             => 'date',
				'order'               => 'DESC',
				'no_found_rows'       => true,
			)
		);
		if ( $sticky_query->have_posts() ) {
			$featured = $sticky_query->posts[0];
		}
	}

	if ( ! $featured ) {
		$video_query = new WP_Query(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'category_name'       => 'video',
				'posts_per_page'      => 1,
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);
		if ( $video_query->have_posts() ) {
			$featured = $video_query->posts[0];
		}
	}

	$exclude       = $featured ? array( (int) $featured->ID ) : array();
	$others_query  = new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => 4,
			'post__not_in'        => $exclude,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
	$others = $others_query->posts;

	if ( ! $featured && $others ) {
		$featured = array_shift( $others );
	}

	if ( ! $featured ) {
		return array();
	}

	$without_date = static function ( $post, $overrides = array() ) {
		return kennedy_fg_article_card_args( $post, array_merge( $overrides, array( 'date' => '' ) ) );
	};

	return array(
		'featured' => $without_date( $featured, array( 'variant' => 'featured' ) ),
		'left'     => array_map( $without_date, array_slice( $others, 0, 2 ) ),
		'right'    => array_map( $without_date, array_slice( $others, 2, 2 ) ),
	);
}

function kennedy_fg_scroll_animations() {
	if ( kennedy_fg_is_component_library() || kennedy_fg_is_layout_library() ) {
		return;
	}
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		var els = document.querySelectorAll('.animate-on-scroll');
		if (!els.length) return;
		var observer = new IntersectionObserver(function(entries) {
			entries.forEach(function(entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.2 });
		els.forEach(function(el) { observer.observe(el); });
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'kennedy_fg_scroll_animations' );
