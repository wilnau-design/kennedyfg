<?php
/**
 * Contact form composition. Rendered by Fluent Forms (form ID
 * KENNEDY_FG_CONTACT_FORM_ID, see inc/fluentforms.php) with the theme's
 * existing .contact-form / .form-field / .button-cta styling reapplied
 * via the fluentform/form_class and fluentform/rendering_field_html_button
 * filters, so the frontend markup and appearance stay unchanged.
 *
 * @package kennedyfg
 */

// theme="ffs_inherit_theme" stops Fluent Forms from loading its own
// default input/button skin (fluentform-public-default.css), whose
// .ff-default-scoped rules otherwise beat the theme's .form-control
// hover/focus/pressed states on load order + specificity.
echo do_shortcode( '[fluentform id="' . KENNEDY_FG_CONTACT_FORM_ID . '" theme="ffs_inherit_theme"]' );
