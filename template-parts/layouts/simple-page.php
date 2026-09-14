<?php
/**
 * Text-only page: title plus editor content. No decorative layout.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-simple-page alignfull ' . $args['class'] ) ); ?>">
	<div class="layout-simple-page-inner">
		<h1 class="layout-simple-page-title"><?php echo esc_html( get_the_title() ); ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div>
</section>
