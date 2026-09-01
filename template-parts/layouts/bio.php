<?php
/**
 * Team bio layout.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'name'        => __( 'Brandon Kennedy', 'kennedyfg' ),
		'role'        => __( 'President | Wealth Advisor', 'kennedyfg' ),
		'image'       => kennedy_fg_asset( 'layouts/team-brandon.webp' ),
		'video_url'   => '',
		'video_src'   => '',
		'video_thumb' => '',
		'bio'         => array(
			__( 'A lifelong resident of Southeastern Michigan, Brandon is a devoted husband to his high school sweetheart, Danielle. They are the proud parents of three – Logan, Henry and Juliet – and live in Lake Orion. Brandon is a die-hard baseball and Detroit Tigers fan, and is a supporter of local youth baseball organizations. You can also find him building things in his workshop, speaking in movie quotes, and working on cars.', 'kennedyfg' ),
			__( 'Brandon graduated from Oakland University, earning his Bachelor’s degree in Finance. He is an active volunteer at his church and offers personal educational seminars and courses throughout the year.', 'kennedyfg' ),
		),
		'bio_html'    => '',
		'current_id'  => 0,
		'members'     => array(),
		'class'       => '',
	)
);

$has_video = '' !== $args['video_src'] || '' !== $args['video_url'];
$thumb     = $args['video_thumb'] ? $args['video_thumb'] : $args['image'];
$embed_src = $args['video_src'] ? $args['video_src'] : ( $args['video_url'] ? kennedy_fg_get_video_embed_src( $args['video_url'] ) : '' );
?>
<section class="<?php echo esc_attr( trim( 'layout-bio alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-bio-inner">
		<header class="layout-bio-identity">
			<h1><?php echo esc_html( $args['name'] ); ?></h1>
			<?php if ( $args['role'] ) : ?>
				<p class="layout-bio-role"><?php echo esc_html( $args['role'] ); ?></p>
			<?php endif; ?>
		</header>
		<div class="layout-bio-main">
			<figure class="layout-bio-media<?php echo $has_video ? ' is-video' : ' is-photo'; ?>">
				<?php if ( $has_video && $embed_src ) : ?>
					<?php
					kennedy_fg_component(
						'video-placeholder',
						array(
							'image'      => $thumb,
							'embed_src'  => $embed_src,
							'aria_label' => sprintf(
								/* translators: %s: team member name */
								__( 'Play video: %s', 'kennedyfg' ),
								$args['name']
							),
						)
					);
					?>
				<?php elseif ( $args['image'] ) : ?>
					<img src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['name'] ); ?>" />
				<?php endif; ?>
			</figure>
			<div class="layout-bio-copy">
				<?php if ( $args['bio_html'] ) : ?>
					<?php echo wp_kses_post( $args['bio_html'] ); ?>
				<?php else : ?>
					<?php foreach ( (array) $args['bio'] as $paragraph ) : ?>
						<p><?php echo esc_html( $paragraph ); ?></p>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if ( ! empty( $args['members'] ) ) : ?>
		<nav class="layout-bio-nav" aria-label="<?php esc_attr_e( 'Team members', 'kennedyfg' ); ?>">
			<div class="alignwide layout-bio-nav-inner">
				<button class="layout-bio-nav-prev" type="button"><?php esc_html_e( '← Previous', 'kennedyfg' ); ?></button>
				<div class="layout-bio-nav-viewport">
					<div class="layout-bio-nav-track">
						<?php foreach ( $args['members'] as $member ) : ?>
							<?php
							$is_current = ! empty( $member['href'] ) && untrailingslashit( (string) $member['href'] ) === untrailingslashit( get_permalink() );
							$card_class = 'layout-bio-nav-card' . ( $is_current ? ' is-current' : '' );
							?>
							<?php if ( $is_current ) : ?>
								<div class="<?php echo esc_attr( $card_class ); ?>" aria-current="page">
									<span class="layout-bio-nav-name"><?php echo esc_html( $member['name'] ); ?></span>
									<span class="layout-bio-nav-role"><?php echo esc_html( $member['role'] ); ?></span>
								</div>
							<?php else : ?>
								<a class="<?php echo esc_attr( $card_class ); ?>" href="<?php echo esc_url( $member['href'] ); ?>">
									<span class="layout-bio-nav-name"><?php echo esc_html( $member['name'] ); ?></span>
									<span class="layout-bio-nav-role"><?php echo esc_html( $member['role'] ); ?></span>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<button class="layout-bio-nav-next" type="button"><?php esc_html_e( 'Next →', 'kennedyfg' ); ?></button>
			</div>
		</nav>
	<?php endif; ?>
</section>
