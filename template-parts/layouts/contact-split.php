<?php
/**
 * Contact card: firm details plus form.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'firm'    => __( 'Kennedy Financial Group', 'kennedyfg' ),
		'phone'   => '(248) 528-0485',
		'email'   => 'team@kennedyfg.com',
		'address' => array( __( '201 West Big Beaver Road, Suite 1001', 'kennedyfg' ), __( 'Troy, MI 48084', 'kennedyfg' ) ),
		'class'   => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-contact-split alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-contact-card">
		<div class="layout-contact-info">
			<?php kennedy_fg_component( 'logo', array( 'class' => 'is-contact', 'size' => 'compact' ) ); ?>
			<h2><?php echo esc_html( $args['firm'] ); ?></h2>
			<dl class="layout-contact-list">
				<div>
					<dt><?php esc_html_e( 'Office', 'kennedyfg' ); ?></dt>
					<dd><a href="<?php echo esc_url( 'tel:2485280485' ); ?>"><?php echo esc_html( $args['phone'] ); ?></a></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'Email', 'kennedyfg' ); ?></dt>
					<dd><a href="<?php echo esc_url( 'mailto:' . $args['email'] ); ?>"><?php echo esc_html( $args['email'] ); ?></a></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'Address', 'kennedyfg' ); ?></dt>
					<dd>
						<a href="<?php echo esc_url( kennedy_fg_address_map_url() ); ?>" target="_blank" rel="noopener noreferrer">
							<?php foreach ( $args['address'] as $line ) : ?>
								<span><?php echo esc_html( $line ); ?></span>
							<?php endforeach; ?>
						</a>
					</dd>
				</div>
			</dl>
		</div>
		<?php kennedy_fg_component( 'contact-form' ); ?>
	</div>
</section>
