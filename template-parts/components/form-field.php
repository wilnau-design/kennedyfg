<?php
/**
 * Text input or textarea.
 *
 * @package kennedyfg
 */

$args     = wp_parse_args(
	$args ?? array(),
	array(
		'label'       => '',
		'name'        => '',
		'type'        => 'text',
		'placeholder' => '',
		'value'       => '',
		'multiline'   => false,
		'state'       => '',
		'class'       => '',
	)
);
$classes  = trim( 'form-field form-field ' . ( $args['multiline'] ? 'is-large' : '' ) . ' ' . $args['class'] );
$control  = trim( 'form-control form-control ' . sanitize_html_class( $args['state'] ) );
$id       = $args['name'] ? 'field-' . sanitize_html_class( $args['name'] ) : '';
?>
<label class="<?php echo esc_attr( $classes ); ?>" <?php echo $id ? 'for="' . esc_attr( $id ) . '"' : ''; ?>>
	<?php if ( $args['label'] ) : ?>
		<span class="form-label form-label"><?php echo esc_html( $args['label'] ); ?></span>
	<?php endif; ?>
	<?php if ( $args['multiline'] ) : ?>
		<textarea
			class="<?php echo esc_attr( $control ); ?>"
			<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
			name="<?php echo esc_attr( $args['name'] ); ?>"
			placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
			rows="4"
		></textarea>
	<?php else : ?>
		<input
			class="<?php echo esc_attr( $control ); ?>"
			<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
			type="<?php echo esc_attr( $args['type'] ); ?>"
			name="<?php echo esc_attr( $args['name'] ); ?>"
			value="<?php echo esc_attr( $args['value'] ); ?>"
			placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
		/>
	<?php endif; ?>
</label>
