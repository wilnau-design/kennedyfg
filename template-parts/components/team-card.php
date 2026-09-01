<?php
/**
 * Team member card.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'name'     => __( 'Brandon Kennedy', 'kennedyfg' ),
		'role'     => __( 'President | Wealth Advisor', 'kennedyfg' ),
		'image'    => kennedy_fg_asset( 'content/photo-brandon.jpg' ),
		'href'     => '#',
		'cta'      => __( 'Read Bio', 'kennedyfg' ),
		'class'    => '',
	)
);
?>
<article class="<?php echo esc_attr( trim( 'team-card team-card ' . $args['class'] ) ); ?>">
	<div class="team-card-media team-card-media">
		<img src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['name'] ); ?>" width="318" height="405" />
		<?php
		kennedy_fg_component(
			'button-cta',
			array(
				'label'   => $args['cta'],
				'href'    => $args['href'],
				'variant' => 'short',
				'class'   => 'team-card-cta team-card-cta',
			)
		);
		?>
	</div>
	<div class="team-card-content">
		<h3 class="team-card-name team-card-name"><?php echo esc_html( $args['name'] ); ?></h3>
		<p class="team-card-role team-card-role"><?php echo esc_html( $args['role'] ); ?></p>
	</div>
</article>
