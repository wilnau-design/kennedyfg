<?php
/**
 * About page vision stack.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'   => __( 'Most of our clients share a similar vision for retirement:', 'kennedyfg' ),
		'cards'   => array(
			__( 'You wake up in the morning and get to choose what your day looks like.', 'kennedyfg' ),
			__( 'The dream trip. The big family Airbnb. The weekend with old friends you keep meaning to plan.', 'kennedyfg' ),
			__( 'And your question isn’t “can we afford this?”', 'kennedyfg' ),
			__( 'It’s “where are we going next?”', 'kennedyfg' ),
		),
		'closing' => array(
			__( 'That freedom is what we ', 'kennedyfg' ),
			__( 'work toward with', 'kennedyfg' ),
			__( ' our clients.', 'kennedyfg' ),
		),
		'class'   => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-about-vision alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-about-vision-inner">
		<h2><?php echo esc_html( $args['title'] ); ?></h2>
		<div class="layout-about-vision-scene" aria-hidden="false">
			<?php
			$card_classes = array( 'is-card-1', 'is-card-2', 'is-card-3', 'is-card-4' );
			foreach ( $args['cards'] as $index => $card ) :
				?>
				<p class="<?php echo esc_attr( $card_classes[ $index ] ?? '' ); ?>"><?php echo esc_html( $card ); ?></p>
			<?php endforeach; ?>
			<img class="layout-about-vision-asset is-umbrella is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-people-right.svg' ) ); ?>" alt="" />
			<img class="layout-about-vision-asset is-umbrella is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-people-right-dark.svg' ) ); ?>" alt="" />
			<img class="layout-about-vision-asset is-standing is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-person-middle.svg' ) ); ?>" alt="" />
			<img class="layout-about-vision-asset is-standing is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-person-middle-dark.svg' ) ); ?>" alt="" />
			<img class="layout-about-vision-asset is-suitcase is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-person-left.svg' ) ); ?>" alt="" />
			<img class="layout-about-vision-asset is-suitcase is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-person-left-dark.svg' ) ); ?>" alt="" />
			<img class="layout-about-vision-asset is-reading is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-ground.svg' ) ); ?>" alt="" />
			<img class="layout-about-vision-asset is-reading is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-concerns-ground-dark.svg' ) ); ?>" alt="" />
		</div>
		<p class="layout-about-vision-close">
			<?php echo esc_html( $args['closing'][0] ); ?>
			<span><?php echo esc_html( $args['closing'][1] ); ?></span><?php echo esc_html( $args['closing'][2] ); ?>
		</p>
	</div>
</section>
