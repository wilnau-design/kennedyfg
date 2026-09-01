<?php
/**
 * Referral positioning statement plus WealthTender review screenshots.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'before'  => __( 'We built Kennedy FG for humble, hardworking ', 'kennedyfg' ),
		'accent'  => __( 'Michiganders', 'kennedyfg' ),
		'after'   => __( ' who did everything right, followed Dave Ramsey’s principles to the letter, and still aren’t sure it was enough.', 'kennedyfg' ),
		'reviews' => array(
			array(
				'src'    => kennedy_fg_asset( 'layouts/image-wealth-tender-review-1.webp' ),
				'width'  => 802,
				'height' => 316,
				'alt'    => __( 'WealthTender review by Aaron: Helped make my dream a reality', 'kennedyfg' ),
			),
			array(
				'src'    => kennedy_fg_asset( 'layouts/image-wealth-tender-review-2.webp' ),
				'width'  => 702,
				'height' => 316,
				'alt'    => __( 'WealthTender review by Faith C: Helping us plan every chapter with confidence', 'kennedyfg' ),
			),
			array(
				'src'    => kennedy_fg_asset( 'layouts/image-wealth-tender-review-3.webp' ),
				'width'  => 736,
				'height' => 316,
				'alt'    => __( 'WealthTender review by Elizabeth: More than a financial advisor', 'kennedyfg' ),
			),
		),
		'link_label' => __( 'Check other reviews here', 'kennedyfg' ),
		'link_href'  => 'https://wealthtender.com/advisory-firms/kennedy-financial-group/',
		'class'      => '',
	)
);
?>
<section class="<?php echo esc_attr( trim( 'layout-referral-proof alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-referral-proof-inner">
		<p class="layout-referral-proof-lede">
			<?php echo esc_html( $args['before'] ); ?><span><?php echo esc_html( $args['accent'] ); ?></span><?php echo esc_html( $args['after'] ); ?>
		</p>
		<div class="layout-referral-proof-reviews">
			<?php foreach ( $args['reviews'] as $review ) : ?>
				<button
					class="layout-referral-proof-review"
					type="button"
					data-review-src="<?php echo esc_url( $review['src'] ); ?>"
					data-review-alt="<?php echo esc_attr( $review['alt'] ); ?>"
					aria-haspopup="dialog"
					aria-controls="referral-review-lightbox"
					aria-label="<?php echo esc_attr( sprintf( /* translators: %s: review description */ __( 'Open review: %s', 'kennedyfg' ), $review['alt'] ) ); ?>"
				>
					<img
						src="<?php echo esc_url( $review['src'] ); ?>"
						alt="<?php echo esc_attr( $review['alt'] ); ?>"
						width="<?php echo esc_attr( (string) $review['width'] ); ?>"
						height="<?php echo esc_attr( (string) $review['height'] ); ?>"
					/>
				</button>
			<?php endforeach; ?>
		</div>
		<a class="layout-referral-proof-link" href="<?php echo esc_url( $args['link_href'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $args['link_label'] ); ?></a>
	</div>
</section>

<dialog class="layout-referral-lightbox" id="referral-review-lightbox" aria-labelledby="referral-review-lightbox-title">
	<div class="layout-referral-lightbox-card">
		<?php
		kennedy_fg_component(
			'close-button',
			array(
				'class' => 'js-referral-lightbox-close',
				'label' => __( 'Close review', 'kennedyfg' ),
			)
		);
		?>
		<h2 id="referral-review-lightbox-title" class="screen-reader-text"><?php esc_html_e( 'Review', 'kennedyfg' ); ?></h2>
		<img class="layout-referral-lightbox-image" src="" alt="" width="802" height="316" />
	</div>
</dialog>
