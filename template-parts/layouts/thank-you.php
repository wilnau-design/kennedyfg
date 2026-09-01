<?php
/**
 * Thank-you / confirmation screen (Start Here and Guide).
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'headline'   => __( 'We’ve sent you an email', 'kennedyfg' ),
		'heading'    => __( 'With all the details for our meeting.', 'kennedyfg' ),
		'note'       => __( 'Looking forward to meeting you!', 'kennedyfg' ),
		'signature'  => __( 'Brandon and Steven', 'kennedyfg' ),
		'background' => kennedy_fg_asset( 'layouts/graphic-start-here-thank-you-background.webp' ),
		'brandon'    => kennedy_fg_asset( 'layouts/team-brandon.webp' ),
		'steven'     => kennedy_fg_asset( 'layouts/team-steven.webp' ),
		'class'      => '',
	)
);

$is_guide    = false !== strpos( (string) $args['class'], 'is-guide' );
$heading_tag = $is_guide ? 'h6' : 'h5';
?>
<section class="<?php echo esc_attr( trim( 'layout-thank-you alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-thank-you-media" aria-hidden="true">
		<img src="<?php echo esc_url( $args['background'] ); ?>" alt="" />
	</div>
	<?php if ( $args['headline'] && ! $is_guide ) : ?>
		<h2 class="layout-thank-you-headline"><?php echo esc_html( $args['headline'] ); ?></h2>
	<?php endif; ?>
	<div class="layout-thank-you-card">
		<div class="layout-thank-you-copy">
			<?php if ( $args['headline'] && $is_guide ) : ?>
				<h2 class="layout-thank-you-headline"><?php echo esc_html( $args['headline'] ); ?></h2>
			<?php endif; ?>
			<?php if ( $args['heading'] ) : ?>
				<<?php echo tag_escape( $heading_tag ); ?> class="layout-thank-you-heading"><?php echo esc_html( $args['heading'] ); ?></<?php echo tag_escape( $heading_tag ); ?>>
			<?php endif; ?>
			<?php if ( $args['note'] ) : ?>
				<h6 class="layout-thank-you-note"><?php echo esc_html( $args['note'] ); ?></h6>
			<?php endif; ?>
		</div>
		<div class="layout-thank-you-sign">
			<div class="layout-thank-you-people">
				<div class="layout-thank-you-photos">
					<span class="layout-thank-you-photo is-brandon">
						<img src="<?php echo esc_url( $args['brandon'] ); ?>" alt="<?php esc_attr_e( 'Brandon Kennedy', 'kennedyfg' ); ?>" width="128" height="128" />
					</span>
					<span class="layout-thank-you-photo is-steven">
						<img src="<?php echo esc_url( $args['steven'] ); ?>" alt="<?php esc_attr_e( 'Steven Fronrath', 'kennedyfg' ); ?>" width="128" height="128" />
					</span>
				</div>
				<p class="layout-thank-you-names"><?php echo esc_html( $args['signature'] ); ?></p>
			</div>
			<?php kennedy_fg_component( 'logo', array( 'class' => 'layout-thank-you-logo', 'size' => 'compact' ) ); ?>
		</div>
	</div>
</section>
