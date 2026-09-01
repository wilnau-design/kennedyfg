<?php
/**
 * Blog article body: content column + sticky lead-magnet sidebar.
 *
 * @package kennedyfg
 */

$args = wp_parse_args(
	$args ?? array(),
	array(
		'class' => '',
	)
);

$author_bio  = get_the_author_meta( 'description' );
$permalink   = get_permalink();
$share_title = get_the_title();
$prev_post   = get_previous_post();
$next_post   = get_next_post();
?>
<section class="<?php echo esc_attr( trim( 'layout-blog-post alignfull ' . $args['class'] ) ); ?>">
	<div class="alignwide layout-blog-post-grid">
		<div class="layout-blog-post-content" id="article-content">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php if ( $author_bio || get_the_author() ) : ?>
				<div class="layout-blog-post-author">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 82 ); ?>
					<div class="layout-blog-post-author-info">
						<p class="layout-blog-post-author-name"><?php echo esc_html( get_the_author() ); ?></p>
						<?php if ( $author_bio ) : ?>
							<p class="layout-blog-post-author-role"><?php echo esc_html( $author_bio ); ?></p>
						<?php endif; ?>
						<p class="layout-blog-post-author-company"><?php bloginfo( 'name' ); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<div class="layout-blog-post-disclaimer">
				<p class="layout-blog-post-disclaimer-label"><?php esc_html_e( 'Disclaimer', 'kennedyfg' ); ?></p>
				<p><?php esc_html_e( 'This content is developed from sources believed to be providing accurate information. The information provided is not written or intended as tax advice. You should consult with your tax advisor for guidance on your specific situation.', 'kennedyfg' ); ?></p>
			</div>

			<div class="layout-blog-post-share">
				<p class="layout-blog-post-share-label"><?php esc_html_e( 'Share this article', 'kennedyfg' ); ?></p>
				<div class="layout-blog-post-share-buttons">
					<a href="<?php echo esc_url( 'mailto:?subject=' . rawurlencode( $share_title ) . '&body=' . rawurlencode( $permalink ) ); ?>" aria-label="<?php esc_attr_e( 'Share by email', 'kennedyfg' ); ?>">
						<img src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-share-email.svg' ) ); ?>" alt="" width="34" height="24" />
					</a>
					<a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( $permalink ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on Facebook', 'kennedyfg' ); ?>">
						<img src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-share-facebook.svg' ) ); ?>" alt="" width="13" height="24" />
					</a>
					<a href="<?php echo esc_url( 'https://twitter.com/intent/tweet?url=' . rawurlencode( $permalink ) . '&text=' . rawurlencode( $share_title ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on X', 'kennedyfg' ); ?>">
						<img src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-share-twitter.svg' ) ); ?>" alt="" width="23" height="24" />
					</a>
					<a href="<?php echo esc_url( 'https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode( $permalink ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'kennedyfg' ); ?>">
						<img src="<?php echo esc_url( kennedy_fg_icon_url( 'icon-share-linkedin.svg' ) ); ?>" alt="" width="24" height="24" />
					</a>
				</div>
			</div>

			<?php if ( $prev_post || $next_post ) : ?>
				<div class="layout-blog-post-nav">
					<div class="layout-blog-post-nav-side">
						<?php if ( $prev_post ) : ?>
							<a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>">
								<span class="layout-blog-post-nav-label">&larr; <?php esc_html_e( 'Previous', 'kennedyfg' ); ?></span>
								<span class="layout-blog-post-nav-title"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
							</a>
						<?php endif; ?>
					</div>
					<div class="layout-blog-post-nav-divider" aria-hidden="true"></div>
					<div class="layout-blog-post-nav-side is-next">
						<?php if ( $next_post ) : ?>
							<a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>">
								<span class="layout-blog-post-nav-label"><?php esc_html_e( 'Next', 'kennedyfg' ); ?> &rarr;</span>
								<span class="layout-blog-post-nav-title"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<div class="layout-blog-post-divider" aria-hidden="true"></div>

		<div class="layout-blog-post-sidebar">
			<?php kennedy_fg_component( 'side-cta' ); ?>
		</div>
	</div>
</section>
