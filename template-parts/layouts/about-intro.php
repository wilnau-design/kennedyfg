<?php
/**
 * Split about band: headline, lede, CTA, content-width photo.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'You’ve faithfully stewarded your money for decades', 'kennedyfg' ),
		'lede'  => __( 'We built Kennedy FG to guide your journey from “I think I’m okay” to “I know I am.”', 'kennedyfg' ),
		'cta'   => __( 'About Kennedy FG', 'kennedyfg' ),
		'href'  => home_url( '/about/' ),
		'image' => kennedy_fg_asset( 'layouts/photo-about.webp' ),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-about-intro alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-about-intro-inner">
		<h2 class="layout-about-intro-title"><?php echo esc_html( $args['title'] ); ?></h2>
		<div class="layout-about-intro-aside">
			<p><?php echo esc_html( $args['lede'] ); ?></p>
			<?php kennedy_fg_component( 'button-cta', array( 'label' => $args['cta'], 'href' => $args['href'] ) ); ?>
		</div>
		<figure class="layout-about-intro-media">
			<img src="<?php echo esc_url( $args['image'] ); ?>" alt="" />
		</figure>
	</div>
</section>
