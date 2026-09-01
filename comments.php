<?php
/**
 * Comments template.
 *
 * @package kennedyfg
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area alignwide">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				esc_html( _n( '1 comment', '%s comments', get_comments_number(), 'kennedyfg' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
