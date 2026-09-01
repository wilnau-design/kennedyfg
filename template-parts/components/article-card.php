<?php
/**
 * Article card, standard or featured.
 *
 * @package kennedyfg
 */

$args      = wp_parse_args(
	$args ?? array(),
	array(
		'variant'  => 'standard',
		'category' => __( 'Small business', 'kennedyfg' ),
		'headline' => __( 'Headline goes here', 'kennedyfg' ),
		'summary'  => __( 'Summary goes here', 'kennedyfg' ),
		'byline'   => __( 'By Author', 'kennedyfg' ),
		'date'     => '',
		'href'     => '#',
		'image'    => '',
		'media'    => 'auto',
		'class'    => '',
	)
);
$featured  = 'featured' === $args['variant'];
$media     = $args['media'];
if ( 'auto' === $media || '' === $media ) {
	$is_video_category = 0 === strcasecmp( (string) $args['category'], 'video' );
	$media             = ( $featured || $is_video_category ) ? 'video' : 'image';
}
$classes = trim( 'article-card article-card ' . ( $featured ? 'is-featured' : 'is-standard' ) . ' ' . $args['class'] );
?>
<article class="<?php echo esc_attr( $classes ); ?>">
	<div class="article-card-media article-card-media">
		<?php if ( 'video' === $media ) : ?>
			<?php
			kennedy_fg_component(
				'video-placeholder',
				array(
					'image'      => $args['image'],
					'href'       => $args['href'],
					'aria_label' => $args['headline'],
				)
			);
			?>
		<?php elseif ( $args['image'] ) : ?>
			<a class="article-card-media-link" href="<?php echo esc_url( $args['href'] ); ?>">
				<img src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['headline'] ); ?>" />
			</a>
		<?php endif; ?>
	</div>
	<div class="article-card-content article-card-content">
		<span class="article-card-tag article-card-tag"><?php echo esc_html( $args['category'] ); ?></span>
		<h3 class="article-card-title article-card-title"><?php echo esc_html( $args['headline'] ); ?></h3>
		<?php if ( $featured ) : ?>
			<p class="article-card-summary article-card-summary"><?php echo esc_html( $args['summary'] ); ?></p>
		<?php endif; ?>
		<p class="<?php echo esc_attr( trim( 'article-card-byline article-card-byline' . ( $args['date'] ? ' has-date' : '' ) ) ); ?>">
				<?php echo esc_html( $args['byline'] ); ?>
				<?php if ( $args['date'] ) : ?>
					<span class="article-card-byline-sep" aria-hidden="true">|</span>
					<?php echo esc_html( $args['date'] ); ?>
				<?php endif; ?>
			</p>
	</div>
	<?php kennedy_fg_component( 'button-nav', array( 'label' => __( 'Read More', 'kennedyfg' ), 'href' => $args['href'] ) ); ?>
</article>
