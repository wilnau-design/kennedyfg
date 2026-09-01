<?php
/**
 * Client story detail: single page, hash-routed between stories.
 *
 * Renders one panel per story (default: the first). JS in layouts.js
 * swaps the active panel based on location.hash (#ben, #kerry, #jason)
 * so the URL is /client-stories/#<id> with no page reload.
 *
 * @package kennedyfg
 */

$from_json = kennedy_fg_get_client_stories();
$stories   = array_values( (array) $from_json['stories'] );
if ( ! $stories ) {
	return;
}
?>
<section class="layout-client-story-detail alignfull" data-client-story-detail data-default-story="<?php echo esc_attr( $stories[0]['id'] ); ?>">
	<?php foreach ( $stories as $index => $story ) : ?>
		<?php $detail = (array) $story['detail']; ?>
		<article
			class="layout-client-story-detail-panel<?php echo 0 === $index ? ' is-active' : ''; ?>"
			data-story-panel="<?php echo esc_attr( $story['id'] ); ?>"
			<?php echo 0 === $index ? '' : 'hidden'; ?>
		>
			<div class="layout-client-story-detail-intro" data-card="<?php echo esc_attr( $story['card'] ); ?>">
				<div class="alignfull layout-client-story-detail-intro-inner">
					<figure class="layout-client-story-detail-portrait">
						<img src="<?php echo esc_url( $story['image'] ); ?>" alt="<?php echo esc_attr( $story['name'] ); ?>" />
					</figure>
					<div class="layout-client-story-detail-hero-text">
						<div class="layout-client-story-detail-hero-top">
							<p class="layout-client-story-detail-kicker"><?php esc_html_e( 'Case study', 'kennedyfg' ); ?></p>
							<h1 class="layout-client-story-detail-name" data-story-doctitle><?php echo esc_html( $story['name'] ); ?></h1>
							<p class="layout-client-story-detail-lede"><?php echo esc_html( $detail['lede'] ); ?></p>
						</div>
						<div class="layout-client-story-detail-rule"></div>
						<div class="layout-client-story-detail-testimonial" data-card="<?php echo esc_attr( $story['card'] ); ?>">
							<p><?php echo esc_html( $story['quote'] ); ?></p>
						</div>
					</div>
				</div>
			</div>

			<nav class="layout-client-story-detail-siblings-strip" aria-label="<?php esc_attr_e( 'Client stories', 'kennedyfg' ); ?>">
				<div class="alignwide layout-client-story-detail-siblings-inner">
					<button class="layout-client-story-detail-siblings-prev" type="button"><?php esc_html_e( '← Previous', 'kennedyfg' ); ?></button>
					<div class="layout-client-story-detail-siblings-viewport">
						<div class="layout-client-story-detail-siblings-track">
							<?php foreach ( $stories as $sibling ) : ?>
								<?php $is_current = $sibling['id'] === $story['id']; ?>
								<?php if ( $is_current ) : ?>
									<div class="layout-client-story-detail-sibling is-active" data-card="<?php echo esc_attr( $sibling['card'] ); ?>" aria-current="true">
										<span class="layout-client-story-detail-sibling-image">
											<img src="<?php echo esc_url( $sibling['image'] ); ?>" alt="" />
										</span>
										<span class="layout-client-story-detail-sibling-text">
											<span class="layout-client-story-detail-sibling-name"><?php echo esc_html( $sibling['name'] ); ?></span>
											<span class="layout-client-story-detail-sibling-meta"><?php echo esc_html( $sibling['meta'] ); ?></span>
										</span>
									</div>
								<?php else : ?>
									<a
										class="layout-client-story-detail-sibling"
										data-story-link="<?php echo esc_attr( $sibling['id'] ); ?>"
										data-card="<?php echo esc_attr( $sibling['card'] ); ?>"
										href="#<?php echo esc_attr( $sibling['id'] ); ?>"
									>
										<span class="layout-client-story-detail-sibling-image">
											<img src="<?php echo esc_url( $sibling['image'] ); ?>" alt="" />
										</span>
										<span class="layout-client-story-detail-sibling-text">
											<span class="layout-client-story-detail-sibling-name"><?php echo esc_html( $sibling['name'] ); ?></span>
											<span class="layout-client-story-detail-sibling-meta"><?php echo esc_html( $sibling['meta'] ); ?></span>
										</span>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
					<button class="layout-client-story-detail-siblings-next" type="button"><?php esc_html_e( 'Next →', 'kennedyfg' ); ?></button>
				</div>
			</nav>

			<div class="alignwide layout-client-story-detail-beats">
				<?php foreach ( (array) $detail['beats'] as $beat_index => $beat ) : ?>
					<?php if ( $beat_index > 0 ) : ?>
						<div class="layout-client-story-detail-separator"></div>
					<?php endif; ?>
					<div class="layout-client-story-detail-beat">
						<div class="layout-client-story-detail-beat-header">
							<span class="layout-client-story-detail-accent-mark"></span>
							<p><?php echo esc_html( strtoupper( $beat['label'] ) ); ?></p>
						</div>
						<div class="layout-client-story-detail-beat-body">
							<?php foreach ( (array) $beat['body'] as $paragraph ) : ?>
								<p><?php echo esc_html( $paragraph ); ?></p>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="alignwide layout-client-story-detail-life-now">
				<div class="layout-client-story-detail-beat-header">
					<span class="layout-client-story-detail-accent-mark"></span>
					<p><?php esc_html_e( 'LIFE NOW', 'kennedyfg' ); ?></p>
				</div>
				<div class="layout-client-story-detail-life-now-card" data-card="<?php echo esc_attr( $story['card'] ); ?>">
					<p><?php echo esc_html( $detail['life_now'] ); ?></p>
				</div>
			</div>

			<div class="layout-client-story-detail-disclaimer">
				<p>
					<?php esc_html_e( 'Note: Details have been adjusted to protect client privacy.', 'kennedyfg' ); ?>
					<?php esc_html_e( 'No portion of this content should be construed as a guarantee of specific results.', 'kennedyfg' ); ?>
				</p>
			</div>

			<?php
			kennedy_fg_layout(
				'cta-split',
				array(
					'title' => $detail['cta_title'],
					'lede'  => __( 'Book a 30-min Sounding Board Session to find out where you stand', 'kennedyfg' ),
					'cta'   => __( 'Book it here', 'kennedyfg' ),
					'note'  => __( 'A friendly chat to see if we\'re a good fit for each other', 'kennedyfg' ),
				)
			);
			?>
		</article>
	<?php endforeach; ?>
</section>
