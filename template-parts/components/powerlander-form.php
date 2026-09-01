<?php
/**
 * Name + email capture used on the guide page and popup. Rendered by
 * Fluent Forms (form ID KENNEDY_FG_GUIDE_FORM_ID, see inc/fluentforms.php)
 * with the theme's existing .powerlander-form / .form-field / .button-cta
 * styling reapplied via filters, so the frontend markup and appearance
 * stay unchanged. Both instances on the site (inline card + popup) embed
 * the same underlying form.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'privacy' => __( 'We respect your privacy and promise to keep your information safe.', 'kennedyfg' ),
	)
);
// Read by kennedy_fg_fluentform_submit_button_html() so the privacy note
// renders as the form's last child (its original position), which the
// popup's responsive grid layout depends on.
$GLOBALS['kennedy_fg_powerlander_privacy'] = $args['privacy'];
?>
<?php echo do_shortcode( '[fluentform id="' . KENNEDY_FG_GUIDE_FORM_ID . '" theme="ffs_inherit_theme"]' ); ?>
