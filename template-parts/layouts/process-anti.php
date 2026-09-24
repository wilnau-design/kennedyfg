<?php
/**
 * Process page anti-positioning band.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'before'   => __( 'If you’re looking for aggressive bets, “market timing,” or one-off advice... ', 'kennedyfg' ),
		'emphasis' => __( 'that’s not us.', 'kennedyfg' ),
		'lead'     => __( 'Here’s what we actually do:', 'kennedyfg' ),
		'class'    => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-process-anti alignfull ' . $args['class'] ) ); ?>">
	<p class="layout-process-anti-body">
		<?php echo esc_html( $args['before'] ); ?>
		<strong><?php echo esc_html( $args['emphasis'] ); ?></strong>
	</p>
	<p class="layout-process-anti-lead"><?php echo esc_html( $args['lead'] ); ?></p>
</section>
