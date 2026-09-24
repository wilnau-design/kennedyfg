<?php
/**
 * Template Name: Service Article
 *
 * Process child pages. Same article column as a blog post, with a text-only hero.
 *
 * @package kennedyfg
 */

get_header();
the_post();

$parent_id = (int) wp_get_post_parent_id( get_the_ID() );
$siblings  = $parent_id ? get_pages(
	array(
		'parent'      => $parent_id,
		'sort_column' => 'menu_order,post_title',
		'post_status' => 'publish',
	)
) : array();

$siblings = array_values(
	array_filter(
		$siblings,
		static function ( $page ) {
			return 'page-service.php' === get_page_template_slug( $page->ID );
		}
	)
);

$index = null;
foreach ( $siblings as $i => $sibling ) {
	if ( (int) $sibling->ID === (int) get_the_ID() ) {
		$index = $i;
		break;
	}
}

$nav_prev = null !== $index && isset( $siblings[ $index - 1 ] ) ? $siblings[ $index - 1 ] : null;
$nav_next = null !== $index && isset( $siblings[ $index + 1 ] ) ? $siblings[ $index + 1 ] : null;

$eyebrow = get_post_meta( get_the_ID(), 'service_eyebrow', true );
$steven  = get_page_by_path( 'steven-fronrath', OBJECT, 'team' );
$photo   = $steven ? get_the_post_thumbnail_url( $steven->ID, 'medium' ) : '';
?>

<main id="primary" class="site-main">
	<?php
	kennedy_fg_layout(
		'blog-hero',
		array(
			'eyebrow' => $eyebrow,
			'title'   => get_the_title(),
			'byline'  => '',
			'date'    => '',
			'cta'     => '',
			'image'   => '',
			'class'   => 'is-service',
		)
	);
	kennedy_fg_layout(
		'blog-post',
		array(
			'class'          => 'is-service',
			'author_name'    => __( 'Steven Fronrath', 'kennedyfg' ),
			'author_role'    => __( 'Vice President | Wealth Advisor', 'kennedyfg' ),
			'author_company' => __( 'Kennedy Financial Group', 'kennedyfg' ),
			'author_image'   => $photo ? $photo : '',
			'custom_nav'     => true,
			'nav_prev'       => $nav_prev,
			'nav_next'       => $nav_next,
		)
	);
	kennedy_fg_layout( 'cta-split' );
	?>
</main>

<?php
get_footer();
