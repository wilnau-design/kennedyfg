<?php
/**
 * Start Here three-step process.
 *
 * @package kennedyfg
 */

$sample_href = '';
$page_id     = get_queried_object_id();
if ( $page_id ) {
	if ( function_exists( 'get_field' ) ) {
		$sample_href = get_field( 'sample', $page_id );
	}
	if ( ! $sample_href ) {
		$sample_href = get_post_meta( $page_id, 'sample', true );
	}
}
$sample_href = is_string( $sample_href ) ? trim( $sample_href ) : '';

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title' => __( 'How it works', 'kennedyfg' ),
		'steps' => array(
			array(
				'num'    => '01',
				'title'  => __( 'A 30-Minute Sounding Board Session', 'kennedyfg' ),
				'text'   => __( 'A chance for us to learn your story, your goals, and what matters most. Together we will see if it makes sense to continue the conversation.', 'kennedyfg' ),
				'cta'    => __( 'Book it here', 'kennedyfg' ),
				'href'   => '#kennedy-calendar',
				'sample'      => '',
				'sample_href' => '',
				'art'    => 'graphic-sounding-board.svg',
				'dark'   => 'graphic-sounding-board-dark.svg',
				'class'  => 'is-one',
			),
			array(
				'num'    => '02',
				'title'  => __( 'A 60-Minute Discovery Meeting', 'kennedyfg' ),
				'text'   => __( 'We will take a deeper look at your finances and goals to uncover what is working and where gaps may exist. You will see how your plan aligns with your vision.', 'kennedyfg' ),
				'cta'    => '',
				'href'   => '',
				'sample'      => '',
				'sample_href' => '',
				'art'    => 'graphic-discovery-meeting.png',
				'dark'   => 'graphic-discovery-meeting-dark.png',
				'class'  => 'is-two',
			),
			array(
				'num'    => '03',
				'title'  => __( 'Personal Assessment', 'kennedyfg' ),
				'text'   => __( 'You will receive a customized summary of key red flags, opportunities, and next steps, along with a tax report and investment audit to give you confidence moving forward.', 'kennedyfg' ),
				'cta'    => '',
				'href'   => '',
				'sample'      => __( 'Click here to see an example of what you will get.', 'kennedyfg' ),
				'sample_href' => $sample_href,
				'art'    => 'graphic-personal-assessment.svg',
				'dark'   => 'graphic-personal-assessment-dark.svg',
				'class'  => 'is-three',
			),
		),
		'class' => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-start-steps alignfull ' . $args['class'] ) ); ?>">
	<h2><?php echo esc_html( $args['title'] ); ?></h2>
	<div class="layout-start-steps-track">
		<img class="layout-start-steps-path is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-start-here-path.svg' ) ); ?>" alt="" />
		<img class="layout-start-steps-path is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/graphic-start-here-path-dark.svg' ) ); ?>" alt="" />
		<?php foreach ( $args['steps'] as $step ) : ?>
			<article class="layout-start-step <?php echo esc_attr( $step['class'] ); ?>">
				<div class="layout-start-step-copy">
					<div class="layout-start-step-top">
						<p class="layout-start-step-num"><?php echo esc_html( $step['num'] ); ?></p>
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $step['text'] ); ?></p>
					<?php if ( ! empty( $step['cta'] ) ) : ?>
						<?php kennedy_fg_component( 'button-cta', array( 'label' => $step['cta'], 'href' => $step['href'], 'variant' => 'short', 'class' => 'calendar-trigger' ) ); ?>
					<?php endif; ?>
					<?php if ( ! empty( $step['sample'] ) && ! empty( $step['sample_href'] ) ) : ?>
						<p class="layout-start-step-sample">
							<a href="<?php echo kennedy_fg_esc_href( $step['sample_href'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $step['sample'] ); ?></a>
						</p>
					<?php endif; ?>
				</div>
				<div class="layout-start-step-art">
					<img class="is-light" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $step['art'] ) ); ?>" alt="" />
					<img class="is-dark" src="<?php echo esc_url( kennedy_fg_asset( 'layouts/' . $step['dark'] ) ); ?>" alt="" />
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
