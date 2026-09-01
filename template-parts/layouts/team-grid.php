<?php
/**
 * Team member grid.
 *
 * @package kennedyfg
 */

$from_cpt = array();
foreach ( kennedy_fg_get_team_posts() as $member_post ) {
	$from_cpt[] = kennedy_fg_team_card_args( $member_post );
}

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'   => __( 'Meet the team', 'kennedyfg' ),
		'members' => $from_cpt,
		'class'   => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-team-grid alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide">
		<?php if ( $args['title'] ) : ?>
			<h2 class="layout-team-grid-title"><?php echo esc_html( $args['title'] ); ?></h2>
		<?php endif; ?>
		<div class="layout-team-grid-list">
			<?php foreach ( $args['members'] as $member ) : ?>
				<?php kennedy_fg_component( 'team-card', $member ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
