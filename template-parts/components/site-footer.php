<?php
/**
 * Site footer, desktop or mobile.
 *
 * @package kennedyfg
 */

$args     = wp_parse_args(
	$args ?? array(),
	array(
		'variant' => 'desktop',
		'class'   => '',
	)
);
$is_mobile = 'mobile' === $args['variant'];
$classes   = trim( 'site-footer ' . ( $is_mobile ? 'is-mobile' : 'is-desktop' ) . ' ' . $args['class'] );

$legal_copy_one = 'Advisors associated with Kennedy Financial Group may be either (1) registered representatives with, and securities offered through LPL Financial, Member <a href="https://www.finra.org/" target="_blank" rel="noopener noreferrer">FINRA</a> / <a href="https://www.sipc.org/" target="_blank" rel="noopener noreferrer">SIPC</a>, and investment advisor representatives of HighPoint Advisor Group; or (2) solely investment advisor representatives of HighPoint Advisor Group, and not affiliated with LPL Financial. Investment advice offered through HighPoint Advisor Group, a registered investment advisor. HighPoint Advisor Group and Kennedy Financial Group are separate entities from LPL Financial.';
$legal_copy_two = 'The LPL Financial registered representative associated with this site may only discuss and/or transact business in the states of AZ, CA, CO, FL, IL, MI, NC, OH, and TX. Dave Ramsey and the SmartVestor Pro program are not affiliated with LPL Financial or Kennedy Financial Group. SmartVestor is an advertising and referral service for investment professionals operated by The Lampo Group, LLC, d/b/a Ramsey Solutions. SmartVestor provides referrals to financial professionals of LPL Financial, LLC (LPL). SmartVestor is not a current client of LPL for brokerage or advisory services. Financial professionals of LPL pay SmartVestor cash compensation for these referrals, which creates the incentive for SmartVestor to make these referrals, resulting in a conflict of interest. Please visit <a href="https://www.ramseysolutions.com/smartvestor/documents/form_adv_2/SABL31835B174B87/fa412bad-2929-4e89-9bd9-14dcb2c44304.pdf" target="_blank" rel="noopener noreferrer">SmartVestor investing professionals | RamseySolutions.com</a> to learn more.';
?>
<footer class="<?php echo esc_attr( $classes ); ?>">
	<div class="site-footer-main">
		<div class="site-footer-left">
			<?php kennedy_fg_component( 'logo', array( 'size' => $is_mobile ? 'nav' : 'footer' ) ); ?>

			<div class="site-footer-columns">
				<div class="site-footer-column">
					<p class="site-footer-heading"><?php esc_html_e( 'Legal', 'kennedyfg' ); ?></p>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'LPL Financial Form CRS', 'kennedyfg' ), 'href' => 'https://www.lpl.com/content/dam/lpl-www/documents/disclosures/lpl-financial-relationship-summary.pdf', 'target' => '_blank' ) ); ?>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'HighPoint Form CRS', 'kennedyfg' ), 'href' => 'https://highpointplanningpartners.com/wp-content/uploads/2024/01/FormCRS_HPAG_01.2024-1.pdf', 'target' => '_blank' ) ); ?>
				</div>
				<div class="site-footer-column">
					<p class="site-footer-heading"><?php esc_html_e( 'More From Us', 'kennedyfg' ); ?></p>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Start Here', 'kennedyfg' ), 'href' => home_url( '/start-here/' ) ) ); ?>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Articles', 'kennedyfg' ), 'href' => home_url( '/blog/' ) ) ); ?>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'About', 'kennedyfg' ), 'href' => home_url( '/about/' ) ) ); ?>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Contact', 'kennedyfg' ), 'href' => home_url( '/contact/' ) ) ); ?>
				</div>
				<div class="site-footer-column">
					<p class="site-footer-heading"><?php esc_html_e( 'Kennedy Financial Group', 'kennedyfg' ); ?></p>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => '(248) 528-0485', 'href' => 'tel:2485280485' ) ); ?>
					<p class="site-footer-address">
						<a href="<?php echo esc_url( kennedy_fg_address_map_url() ); ?>" target="_blank" rel="noopener noreferrer">
							201 West Big Beaver Road,<br />
							Suite 1001,<br />
							Troy, MI 48084
						</a>
					</p>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => 'team@kennedyfg.com', 'href' => 'mailto:team@kennedyfg.com' ) ); ?>
				</div>
				<div class="site-footer-column">
					<p class="site-footer-heading"><?php esc_html_e( 'Socials', 'kennedyfg' ); ?></p>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'Facebook', 'kennedyfg' ), 'href' => 'https://www.facebook.com/kennedyfinancialgroup/', 'icon' => 'facebook', 'target' => '_blank' ) ); ?>
					<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'LinkedIn', 'kennedyfg' ), 'href' => 'https://www.linkedin.com/company/kennedy-financial-group-llc', 'icon' => 'linkedin', 'target' => '_blank' ) ); ?>
				</div>
			</div>
		</div>

		<div class="site-footer-magnet">
			<div class="lead-magnet-stack" aria-hidden="true">
				<img src="<?php echo esc_url( kennedy_fg_asset( 'content/graphic-footer-magnet.webp' ) ); ?>" alt="" />
			</div>
			<p class="lead-magnet-title"><?php esc_html_e( '5 Little-Known Tips for Lowering Taxes in Retirement in 2026', 'kennedyfg' ); ?></p>
			<?php
			kennedy_fg_component(
				'button-cta',
				array(
					'label'   => __( 'Free Instant Access', 'kennedyfg' ),
					'href'    => '#powerlander-popup',
					'variant' => 'main',
					'class'   => trim( 'js-powerlander-open ' . ( $is_mobile ? 'is-full' : '' ) ),
				)
			);
			?>
		</div>
	</div>

	<div class="site-footer-legal">
		<div class="site-footer-legal-copy">
			<p><?php echo wp_kses_post( $legal_copy_one ); ?></p>
			<p><?php echo wp_kses_post( $legal_copy_two ); ?></p>
		</div>
		<div class="site-footer-legal-links">
			<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'LPL Financial Form CRS', 'kennedyfg' ), 'href' => 'https://www.lpl.com/content/dam/lpl-www/documents/disclosures/lpl-financial-relationship-summary.pdf', 'target' => '_blank' ) ); ?>
			<?php kennedy_fg_component( 'footer-link', array( 'label' => __( 'HighPoint Form CRS', 'kennedyfg' ), 'href' => 'https://highpointplanningpartners.com/wp-content/uploads/2024/01/FormCRS_HPAG_01.2024-1.pdf', 'target' => '_blank' ) ); ?>
		</div>
	</div>
</footer>
