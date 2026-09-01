<?php
/**
 * Contact page hero: centered title, lede, and full-bleed team photo.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'lede'  => __( 'Prefer to email us? Fill it in and hit “send.”', 'kennedyfg' ),
		'image' => kennedy_fg_asset( 'layouts/photo-contact-team.webp' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-contact-hero alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-contact-hero-copy">
		<h1 class="layout-contact-hero-title">
			<?php esc_html_e( 'Contact', 'kennedyfg' ); ?><br />
			<?php esc_html_e( 'Kennedy Financial Group', 'kennedyfg' ); ?>
		</h1>
		<?php if ( $args['lede'] ) : ?>
			<p class="layout-contact-hero-lede"><?php echo esc_html( $args['lede'] ); ?></p>
		<?php endif; ?>
	</div>
	<div class="layout-contact-hero-stage">
		<div class="layout-contact-hero-media">
			<img src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php esc_attr_e( 'The Kennedy Financial Group team', 'kennedyfg' ); ?>" width="1440" height="683" />
		</div>
		<?php kennedy_fg_layout( 'contact-split' ); ?>
	</div>
</section>
