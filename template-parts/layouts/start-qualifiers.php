<?php
/**
 * Start Here qualifier cards.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'We do our best work with…', 'kennedyfg' ),
		'items' => array(
			array(
				'title' => __( 'Disciplined savers', 'kennedyfg' ),
				'text'  => __( 'You want to make sure you will continue to make wise decisions', 'kennedyfg' ),
				'icon'  => 'graphic-guide-person-a.svg',
				'dark'  => 'graphic-guide-person-a-dark.svg',
			),
			array(
				'title' => __( 'With $500k+ saved', 'kennedyfg' ),
				'text'  => __( 'You want to make your nest egg last without second-guessing every dollar', 'kennedyfg' ),
				'icon'  => 'icon-guide-start.svg',
				'dark'  => 'icon-guide-start-dark.svg',
			),
			array(
				'title' => __( 'Ongoing partnership', 'kennedyfg' ),
				'text'  => __( 'You want to make the most of what you have and delegate the details', 'kennedyfg' ),
				'icon'  => 'graphic-guide-person-b.svg',
				'dark'  => 'graphic-guide-person-b-dark.svg',
			),
		),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-start-qualifiers alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide">
		<h2><?php echo esc_html( $args['title'] ); ?></h2>
		<div class="layout-start-qualifiers-grid">
			<?php foreach ( $args['items'] as $item ) : ?>
				<article>
					<div class="layout-start-qualifiers-icon">
						<img class="is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $item['icon'] ) ); ?>" alt="" />
						<img class="is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $item['dark'] ) ); ?>" alt="" />
					</div>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
