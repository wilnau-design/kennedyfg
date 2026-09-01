<?php
/**
 * Interactive client stories: name list swaps portrait and quote.
 *
 * @package kennedyfg
 */

$from_json = kennedy_fg_get_client_stories();

$args = wp_parse_args(
	$args ?? array(),
	array(
		'title'   => $from_json['title'],
		'stories' => $from_json['stories'],
		'class'   => '',
	)
);

$uid     = 'client-stories-' . wp_unique_id();
$stories = array_values( (array) $args['stories'] );
?>
<section class="<?php echo esc_attr( trim( 'layout-client-stories alignfull ' . $args['class'] ) ); ?>" data-client-stories>
	<div class="alignwide layout-client-stories-inner">
		<h2 class="layout-client-stories-title"><?php echo esc_html( $args['title'] ); ?></h2>
		<div class="layout-client-stories-body">
			<div class="layout-client-stories-nav" role="tablist" aria-label="<?php echo esc_attr( $args['title'] ); ?>">
				<?php foreach ( $stories as $index => $story ) : ?>
					<?php
					$selected = 0 === $index;
					$tab_id   = $uid . '-tab-' . $story['id'];
					$panel_id = $uid . '-panel-' . $story['id'];
					?>
					<button
						class="layout-client-stories-tab<?php echo $selected ? ' is-active' : ''; ?>"
						type="button"
						role="tab"
						id="<?php echo esc_attr( $tab_id ); ?>"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
						aria-selected="<?php echo $selected ? 'true' : 'false'; ?>"
						tabindex="<?php echo $selected ? '0' : '-1'; ?>"
						data-story="<?php echo esc_attr( $story['id'] ); ?>"
					>
						<span class="layout-client-stories-name"><?php echo esc_html( $story['name'] ); ?></span>
						<span class="layout-client-stories-meta"><?php echo esc_html( $story['meta'] ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="layout-client-stories-stage">
				<?php foreach ( $stories as $index => $story ) : ?>
					<?php
					$selected = 0 === $index;
					$tab_id   = $uid . '-tab-' . $story['id'];
					$panel_id = $uid . '-panel-' . $story['id'];
					?>
					<div
						class="layout-client-stories-panel<?php echo $selected ? ' is-active' : ''; ?>"
						role="tabpanel"
						id="<?php echo esc_attr( $panel_id ); ?>"
						aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
						<?php echo $selected ? '' : 'hidden'; ?>
					>
						<figure class="layout-client-stories-portrait">
							<img src="<?php echo esc_url( $story['image'] ); ?>" alt="<?php echo esc_attr( $story['name'] ); ?>" />
						</figure>
						<div class="layout-client-stories-card" data-card="<?php echo esc_attr( $story['card'] ?? 'quote-card' ); ?>">
							<p class="layout-client-stories-quote"><?php echo esc_html( $story['quote'] ); ?></p>
							<?php
							kennedy_fg_component(
								'button-cta',
								array(
									'label'   => $story['cta'],
									'href'    => $story['href'],
									'variant' => 'short',
								)
							);
							?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
