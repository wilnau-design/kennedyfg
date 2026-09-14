<?php
/**
 * Main CTA button (split fill on hover).
 *
 * @package kennedyfg
 *
 * @var array $args {
 *   @type string $label
 *   @type string $href
 *   @type string $variant  main|short|short-light
 *   @type string $state    ''|is-hover|is-focus
 *   @type string $class
 *   @type string $target  ''|_blank
 * }
 */

$args    = wp_parse_args(
	$args ?? array(),
	array(
		'label'        => __( 'Book a Sounding Board Session', 'kennedyfg' ),
		'href'         => '#',
		'variant'      => 'main',
		'state'        => '',
		'class'        => '',
		'range_break'  => false,
		'type'         => 'link',
		'target'       => '',
	)
);
$variant      = sanitize_html_class( $args['variant'] );
$state        = sanitize_html_class( $args['state'] );
$classes      = trim( 'button-cta button-cta is-' . $variant . ' ' . $state . ' ' . $args['class'] );
$range_break  = ! empty( $args['range_break'] );
$is_button    = 'button' === $args['type'] || 'submit' === $args['type'];

$render_content = static function ( $label, $range_break ) {
	$break_at = 'Sounding ';
	$pos      = $range_break ? strpos( $label, $break_at ) : false;
	?>
	<span class="button-cta-content button-cta-content">
		<span class="button-cta-label"><?php
		if ( false !== $pos ) {
			$end = $pos + strlen( $break_at );
			echo esc_html( substr( $label, 0, $end ) );
			echo '<br class="button-cta-range-break" />';
			echo esc_html( ltrim( substr( $label, $end ) ) );
		} else {
			echo esc_html( $label );
		}
		?></span>
		<span class="button-cta-icon button-cta-icon" aria-hidden="true"></span>
	</span>
	<?php
};
?>
<?php if ( $is_button ) : ?>
<button class="<?php echo esc_attr( $classes ); ?>" type="submit">
	<?php $render_content( $args['label'], $range_break ); ?>
	<span class="button-cta-fill button-cta-fill" aria-hidden="true">
		<?php $render_content( $args['label'], $range_break ); ?>
	</span>
</button>
<?php else : ?>
<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $args['href'] ); ?>"<?php echo '_blank' === $args['target'] ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
	<?php $render_content( $args['label'], $range_break ); ?>
	<span class="button-cta-fill button-cta-fill" aria-hidden="true">
		<?php $render_content( $args['label'], $range_break ); ?>
	</span>
</a>
<?php endif; ?>
