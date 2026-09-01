<?php
/**
 * Navigation from WordPress menus assigned to `primary` and `client-login`.
 *
 * Markup is rendered through the existing header components so the frontend
 * stays identical to the previous hardcoded items.
 *
 * @package kennedyfg
 */

/**
 * Default tree matching the previous hardcoded header.
 *
 * @return array<int, array<string, mixed>>
 */
function kennedy_fg_default_primary_nav_items() {
	return array(
		array(
			'label'    => __( 'About', 'kennedyfg' ),
			'href'     => home_url( '/about/' ),
			'target'   => '',
			'children' => array(
				array(
					'label'  => __( 'Team', 'kennedyfg' ),
					'href'   => home_url( '/about/' ),
					'target' => '',
				),
				array(
					'label'  => __( 'Contact Us', 'kennedyfg' ),
					'href'   => home_url( '/contact/' ),
					'target' => '',
				),
				array(
					'label'  => __( 'SmartVestor', 'kennedyfg' ),
					'href'   => home_url( '/smartvestor/' ),
					'target' => '',
				),
			),
		),
		array(
			'label'    => __( 'Process', 'kennedyfg' ),
			'href'     => home_url( '/process/' ),
			'target'   => '',
			'children' => array(),
		),
		array(
			'label'    => __( 'Blog', 'kennedyfg' ),
			'href'     => home_url( '/blog/' ),
			'target'   => '',
			'children' => array(),
		),
	);
}

/**
 * Nested items for a theme location.
 *
 * @param string $location Theme location slug.
 * @return array<int, array<string, mixed>>
 */
function kennedy_fg_nav_items_from_location( $location ) {
	$locations = get_nav_menu_locations();
	if ( empty( $locations[ $location ] ) ) {
		return array();
	}

	$menu_items = wp_get_nav_menu_items( (int) $locations[ $location ] );
	if ( empty( $menu_items ) || ! is_array( $menu_items ) ) {
		return array();
	}

	$by_parent = array();
	foreach ( $menu_items as $item ) {
		$parent                     = (int) $item->menu_item_parent;
		$by_parent[ $parent ][] = $item;
	}

	$map_child = static function ( $item ) {
		return array(
			'label'  => $item->title,
			'href'   => $item->url,
			'target' => $item->target,
		);
	};

	$top = array();
	foreach ( $by_parent[0] ?? array() as $item ) {
		$children = array();
		foreach ( $by_parent[ (int) $item->ID ] ?? array() as $child ) {
			$children[] = $map_child( $child );
		}

		$top[] = array(
			'label'    => $item->title,
			'href'     => $item->url,
			'target'   => $item->target,
			'children' => $children,
		);
	}

	return $top;
}

/**
 * Primary nav items: assigned menu, or the previous hardcoded tree.
 *
 * @return array<int, array<string, mixed>>
 */
function kennedy_fg_primary_nav_items() {
	$items = kennedy_fg_nav_items_from_location( 'primary' );
	return $items ? $items : kennedy_fg_default_primary_nav_items();
}

/**
 * Default Client Login dropdown links.
 *
 * @return array<int, array<string, mixed>>
 */
function kennedy_fg_default_client_login_nav_items() {
	return array(
		array(
			'label'  => __( 'LPL', 'kennedyfg' ),
			'href'   => 'https://accountview.lpl.com/web/login',
			'target' => '_blank',
		),
		array(
			'label'  => __( 'eMoney', 'kennedyfg' ),
			'href'   => 'https://wealth.emaplan.com/ema/SignIn?ema',
			'target' => '_blank',
		),
	);
}

/**
 * Client Login items: assigned menu, or the previous hardcoded links.
 *
 * @return array<int, array<string, mixed>>
 */
function kennedy_fg_client_login_nav_items() {
	$items = kennedy_fg_nav_items_from_location( 'client-login' );
	if ( ! $items ) {
		return kennedy_fg_default_client_login_nav_items();
	}

	$flat = array();
	foreach ( $items as $item ) {
		$flat[] = array(
			'label'  => $item['label'],
			'href'   => $item['href'],
			'target' => $item['target'] ?? '',
		);
	}

	return $flat;
}

/**
 * Component-library / demo open state for a top-level item.
 *
 * @param array<string, mixed> $item Nav item.
 * @param string               $open Requested open slug (e.g. about).
 * @return string
 */
function kennedy_fg_primary_nav_item_state( $item, $open ) {
	if ( ! $open || empty( $item['children'] ) ) {
		return '';
	}

	return sanitize_title( (string) $item['label'] ) === $open ? 'is-open' : '';
}

/**
 * Render desktop primary links (nav-dropdown / nav-link).
 *
 * @param string $open Optional demo state slug.
 */
function kennedy_fg_render_primary_nav_desktop( $open = '' ) {
	foreach ( kennedy_fg_primary_nav_items() as $item ) {
		if ( ! empty( $item['children'] ) ) {
			kennedy_fg_component(
				'nav-dropdown',
				array(
					'label' => $item['label'],
					'href'  => $item['href'],
					'items' => $item['children'],
					'state' => kennedy_fg_primary_nav_item_state( $item, $open ),
				)
			);
			continue;
		}

		kennedy_fg_component(
			'nav-link',
			array(
				'label'  => $item['label'],
				'href'   => $item['href'],
				'target' => $item['target'] ?? '',
			)
		);
	}
}

/**
 * Render mobile primary links (accordion / mobile-nav-link).
 *
 * @param string $accordion Optional demo accordion slug.
 */
function kennedy_fg_render_primary_nav_mobile( $accordion = '' ) {
	foreach ( kennedy_fg_primary_nav_items() as $item ) {
		if ( ! empty( $item['children'] ) ) {
			$is_open = (bool) kennedy_fg_primary_nav_item_state( $item, $accordion );
			?>
			<div class="mobile-accordion<?php echo $is_open ? ' is-open' : ''; ?>">
				<div class="mobile-accordion-row">
					<a class="mobile-nav-link" href="<?php echo esc_url( $item['href'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
					<button class="mobile-accordion-trigger" type="button" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: top-level nav label */ __( 'Open %s menu', 'kennedyfg' ), $item['label'] ) ); ?>">
						<img src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-dropdown.svg' ) ); ?>" alt="" width="10" height="7" />
					</button>
				</div>
				<div class="mobile-accordion-panel" <?php echo $is_open ? '' : 'hidden'; ?>>
					<?php foreach ( $item['children'] as $child ) : ?>
						<?php
						kennedy_fg_component(
							'submenu-item',
							array(
								'label'  => $child['label'],
								'href'   => $child['href'],
								'target' => $child['target'] ?? '',
							)
						);
						?>
					<?php endforeach; ?>
				</div>
			</div>
			<?php
			continue;
		}
		?>
		<a class="mobile-nav-link" href="<?php echo esc_url( $item['href'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
		<?php
	}
}

/**
 * Render desktop Client Login dropdown. Trigger label stays hardcoded.
 *
 * @param string $open Optional demo state slug.
 */
function kennedy_fg_render_client_login_desktop( $open = '' ) {
	kennedy_fg_component(
		'nav-dropdown',
		array(
			'label' => __( 'Client Login', 'kennedyfg' ),
			'items' => kennedy_fg_client_login_nav_items(),
			'state' => 'login' === $open ? 'is-open' : '',
		)
	);
}

/**
 * Render mobile Client Login accordion. Trigger label stays hardcoded.
 *
 * @param string $accordion Optional demo accordion slug.
 */
function kennedy_fg_render_client_login_mobile( $accordion = '' ) {
	$login_open = 'login' === $accordion;
	?>
	<div class="mobile-accordion<?php echo $login_open ? ' is-open' : ''; ?>">
		<button class="mobile-accordion-trigger" type="button" aria-expanded="<?php echo $login_open ? 'true' : 'false'; ?>">
			<span><?php esc_html_e( 'Client Login', 'kennedyfg' ); ?></span>
			<img src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-dropdown.svg' ) ); ?>" alt="" width="10" height="7" />
		</button>
		<div class="mobile-accordion-panel" <?php echo $login_open ? '' : 'hidden'; ?>>
			<?php foreach ( kennedy_fg_client_login_nav_items() as $item ) : ?>
				<?php
				kennedy_fg_component(
					'submenu-item',
					array(
						'label'  => $item['label'],
						'href'   => $item['href'],
						'target' => $item['target'] ?? '',
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}

/**
 * Resolve a published page ID by path, if it exists.
 *
 * @param string $path Page path (e.g. about).
 * @return int
 */
function kennedy_fg_nav_page_id( $path ) {
	$page = get_page_by_path( $path );
	return $page ? (int) $page->ID : 0;
}

/**
 * Args for wp_update_nav_menu_item: page object when possible, else custom URL.
 *
 * @param string $title    Menu label.
 * @param string $path     Page path without slashes.
 * @param int    $parent   Parent menu item ID.
 * @param int    $position Order.
 * @param int    $page_id  Optional explicit page ID.
 * @return array<string, mixed>
 */
function kennedy_fg_nav_menu_item_args( $title, $path, $parent = 0, $position = 1, $page_id = 0 ) {
	$page_id = $page_id ? (int) $page_id : kennedy_fg_nav_page_id( $path );

	if ( $page_id ) {
		return array(
			'menu-item-title'     => $title,
			'menu-item-object-id' => $page_id,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
			'menu-item-parent-id' => $parent,
			'menu-item-position'  => $position,
		);
	}

	return array(
		'menu-item-title'     => $title,
		'menu-item-url'       => home_url( '/' . trim( $path, '/' ) . '/' ),
		'menu-item-type'      => 'custom',
		'menu-item-status'    => 'publish',
		'menu-item-parent-id' => $parent,
		'menu-item-position'  => $position,
	);
}

/**
 * Create and assign the Primary menu once, matching the previous hardcoded items.
 */
function kennedy_fg_maybe_seed_primary_menu() {
	if ( get_option( 'kennedyfg_seeded_primary_nav' ) ) {
		return;
	}

	$locations = get_nav_menu_locations();
	if ( ! empty( $locations['primary'] ) && wp_get_nav_menu_object( (int) $locations['primary'] ) ) {
		update_option( 'kennedyfg_seeded_primary_nav', 1 );
		return;
	}

	$menu = wp_get_nav_menu_object( 'Primary' );
	if ( $menu ) {
		$menu_id = (int) $menu->term_id;
	} else {
		$menu_id = wp_create_nav_menu( __( 'Primary', 'kennedyfg' ) );
		if ( is_wp_error( $menu_id ) ) {
			return;
		}
		$menu_id = (int) $menu_id;
	}

	$existing = wp_get_nav_menu_items( $menu_id );
	if ( empty( $existing ) ) {
		$about_id = wp_update_nav_menu_item( $menu_id, 0, kennedy_fg_nav_menu_item_args( __( 'About', 'kennedyfg' ), 'about', 0, 1 ) );
		if ( ! is_wp_error( $about_id ) ) {
			wp_update_nav_menu_item( $menu_id, 0, kennedy_fg_nav_menu_item_args( __( 'Team', 'kennedyfg' ), 'about', (int) $about_id, 1 ) );
			wp_update_nav_menu_item( $menu_id, 0, kennedy_fg_nav_menu_item_args( __( 'Contact Us', 'kennedyfg' ), 'contact', (int) $about_id, 2 ) );
			wp_update_nav_menu_item( $menu_id, 0, kennedy_fg_nav_menu_item_args( __( 'SmartVestor', 'kennedyfg' ), 'smartvestor', (int) $about_id, 3 ) );
		}

		wp_update_nav_menu_item( $menu_id, 0, kennedy_fg_nav_menu_item_args( __( 'Process', 'kennedyfg' ), 'process', 0, 2 ) );

		$posts_page = (int) get_option( 'page_for_posts' );
		wp_update_nav_menu_item( $menu_id, 0, kennedy_fg_nav_menu_item_args( __( 'Blog', 'kennedyfg' ), 'blog', 0, 3, $posts_page ) );
	}

	$locations             = get_theme_mod( 'nav_menu_locations', array() );
	$locations             = is_array( $locations ) ? $locations : array();
	$locations['primary']  = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
	update_option( 'kennedyfg_seeded_primary_nav', 1 );
}
add_action( 'init', 'kennedy_fg_maybe_seed_primary_menu', 20 );

/**
 * Args for a custom-URL nav item (external Client Login links).
 *
 * @param string $title    Menu label.
 * @param string $url      Absolute URL.
 * @param int    $position Order.
 * @param string $target   Link target.
 * @return array<string, mixed>
 */
function kennedy_fg_nav_menu_custom_item_args( $title, $url, $position = 1, $target = '_blank' ) {
	return array(
		'menu-item-title'    => $title,
		'menu-item-url'      => $url,
		'menu-item-type'     => 'custom',
		'menu-item-status'   => 'publish',
		'menu-item-position' => $position,
		'menu-item-target'   => $target,
	);
}

/**
 * Create and assign the Client Login menu once, matching the previous hardcoded items.
 */
function kennedy_fg_maybe_seed_client_login_menu() {
	if ( get_option( 'kennedyfg_seeded_client_login_nav' ) ) {
		return;
	}

	$locations = get_nav_menu_locations();
	if ( ! empty( $locations['client-login'] ) && wp_get_nav_menu_object( (int) $locations['client-login'] ) ) {
		update_option( 'kennedyfg_seeded_client_login_nav', 1 );
		return;
	}

	$menu = wp_get_nav_menu_object( 'Client Login' );
	if ( $menu ) {
		$menu_id = (int) $menu->term_id;
	} else {
		$menu_id = wp_create_nav_menu( __( 'Client Login', 'kennedyfg' ) );
		if ( is_wp_error( $menu_id ) ) {
			return;
		}
		$menu_id = (int) $menu_id;
	}

	$existing = wp_get_nav_menu_items( $menu_id );
	if ( empty( $existing ) ) {
		wp_update_nav_menu_item(
			$menu_id,
			0,
			kennedy_fg_nav_menu_custom_item_args( __( 'LPL', 'kennedyfg' ), 'https://accountview.lpl.com/web/login', 1 )
		);
		wp_update_nav_menu_item(
			$menu_id,
			0,
			kennedy_fg_nav_menu_custom_item_args( __( 'eMoney', 'kennedyfg' ), 'https://wealth.emaplan.com/ema/SignIn?ema', 2 )
		);
	}

	$locations                 = get_theme_mod( 'nav_menu_locations', array() );
	$locations                 = is_array( $locations ) ? $locations : array();
	$locations['client-login'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
	update_option( 'kennedyfg_seeded_client_login_nav', 1 );
}
add_action( 'init', 'kennedy_fg_maybe_seed_client_login_menu', 20 );
