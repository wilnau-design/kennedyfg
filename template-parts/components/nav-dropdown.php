<?php
/**
 * Navbar dropdown trigger plus panel.
 *
 * @package kennedyfg
 */

$args    = wp_parse_args(
	$args ?? array(),
	array(
		'label' => __( 'About', 'kennedyfg' ),
		'href'  => '',
		'items' => array(),
		'state' => '',
		'align' => 'left',
		'class' => '',
	)
);
$open    = in_array( $args['state'], array( 'is-open', 'is-hover' ), true );
$href    = $args['href'];
$classes = trim( 'nav-dropdown ' . ( $open ? 'is-open' : '' ) . ' ' . $args['class'] );
$toggle_label = sprintf(
	/* translators: %s: top-level nav label */
	__( 'Open %s menu', 'kennedyfg' ),
	$args['label']
);
?>
<div class="<?php echo esc_attr( $classes ); ?>">
	<?php if ( $href ) : ?>
		<a class="nav-dropdown-trigger" href="<?php echo esc_url( $href ); ?>">
			<span><?php echo esc_html( $args['label'] ); ?></span>
		</a>
		<button class="nav-dropdown-toggle" type="button" aria-expanded="<?php echo $open ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr( $toggle_label ); ?>">
			<img class="nav-dropdown-icon" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-dropdown.svg' ) ); ?>" alt="" width="10" height="7" />
		</button>
	<?php else : ?>
		<button class="nav-dropdown-trigger" type="button" aria-expanded="<?php echo $open ? 'true' : 'false'; ?>">
			<span><?php echo esc_html( $args['label'] ); ?></span>
			<img class="nav-dropdown-icon" src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-dropdown.svg' ) ); ?>" alt="" width="10" height="7" />
		</button>
	<?php endif; ?>
	<div class="nav-dropdown-panel" <?php echo $open ? '' : 'hidden'; ?>>
		<div class="nav-dropdown-panel-inner">
			<?php foreach ( $args['items'] as $item ) : ?>
				<?php
				kennedy_fg_component(
					'submenu-item',
					array(
						'label'  => $item['label'],
						'href'   => $item['href'] ?? '#',
						'target' => $item['target'] ?? '',
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
