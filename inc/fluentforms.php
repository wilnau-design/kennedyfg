<?php
/**
 * Renders the Contact form and Guide Request form (both built in Fluent
 * Forms) with the theme's existing button-cta markup so the frontend looks
 * identical to the original hand-built forms.
 *
 * @package kennedyfg
 */

const KENNEDY_FG_CONTACT_FORM_ID = 3;
const KENNEDY_FG_GUIDE_FORM_ID   = 4;

/**
 * Add the theme's form wrapper classes to the <form> tag so the existing
 * .contact-form / .powerlander-form selectors in components.css / pages.css
 * keep applying.
 */
function kennedy_fg_fluentform_class( $class, $form ) {
	if ( KENNEDY_FG_CONTACT_FORM_ID === (int) $form->id ) {
		$class .= ' contact-form';
	} elseif ( KENNEDY_FG_GUIDE_FORM_ID === (int) $form->id ) {
		$class .= ' powerlander-form';
	}

	return $class;
}
add_filter( 'fluentform/form_class', 'kennedy_fg_fluentform_class', 10, 2 );

/**
 * Replace Fluent Forms' plain submit button with the theme's button-cta
 * markup (icon + hover fill animation), keeping the same <button
 * type="submit"> element so Fluent Forms' own AJAX submit handling
 * (which binds to the form's submit event) keeps working unchanged.
 */
function kennedy_fg_fluentform_submit_button_html( $html, $data, $form ) {
	if ( ! in_array( (int) $form->id, array( KENNEDY_FG_CONTACT_FORM_ID, KENNEDY_FG_GUIDE_FORM_ID ), true ) ) {
		return $html;
	}

	$label = isset( $data['settings']['button_ui']['text'] ) ? $data['settings']['button_ui']['text'] : __( 'Submit', 'kennedyfg' );

	ob_start();
	?>
	<div class="ff-el-group ff_submit_btn_wrapper">
		<?php
		kennedy_fg_component(
			'button-cta',
			array(
				'label' => $label,
				'type'  => 'submit',
				'class' => 'ff-btn ff-btn-submit',
			)
		);
		?>
	</div>
	<?php
	if ( KENNEDY_FG_GUIDE_FORM_ID === (int) $form->id && ! empty( $GLOBALS['kennedy_fg_powerlander_privacy'] ) ) {
		?>
		<p class="powerlander-form-privacy"><?php echo esc_html( $GLOBALS['kennedy_fg_powerlander_privacy'] ); ?></p>
		<?php
	}
	return ob_get_clean();
}
add_filter( 'fluentform/rendering_field_html_button', 'kennedy_fg_fluentform_submit_button_html', 20, 3 );
