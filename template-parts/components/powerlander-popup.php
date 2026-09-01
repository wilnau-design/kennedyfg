<?php
/**
 * Guide capture dialog (light + dark via theme tokens).
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'  => __( 'We’ve Prepared Your Guide For You...', 'kennedyfg' ),
		'lede'   => __( 'Just Tell Us Where To Send It', 'kennedyfg' ),
		'magnet' => kennedy_fg_asset( 'content/graphic-footer-magnet.webp' ),
		'class'  => '',
	)
);
?>
<dialog class="<?php echo esc_attr( trim( 'layout-powerlander-popup ' . $args['class'] ) ); ?>" id="powerlander-popup">
	<div class="layout-powerlander-popup-inner">
		<p class="layout-powerlander-popup-title"><?php echo esc_html( $args['title'] ); ?></p>
		<div class="layout-powerlander-popup-card">
		<?php
		kennedy_fg_component(
			'close-button',
			array(
				'class' => 'js-powerlander-close',
				'label' => __( 'Close guide form', 'kennedyfg' ),
			)
		);
		?>
		<div class="layout-powerlander-popup-intro">
			<div class="layout-powerlander-magnet" aria-hidden="true">
				<img src="<?php echo esc_url( $args['magnet'] ); ?>" alt="" width="280" height="200" />
			</div>
			<h2><?php echo esc_html( $args['lede'] ); ?></h2>
		</div>
		<?php
		kennedy_fg_component(
			'powerlander-form',
			array(
				'id'         => 'powerlander-popup-form',
				'name_name'  => 'popup-name',
				'email_name' => 'popup-email',
			)
		);
		?>
		</div>
	</div>
</dialog>
