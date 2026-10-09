<?php
/**
 * Organic road behind a split CTA and the section it melts into.
 *
 * The curve stays at the Figma scale. Side extensions and the fill
 * underneath cover 2K, 4K, and wider viewports without stretching it.
 *
 * @package kennedyfg
 */

?>
<div class="layout-road" aria-hidden="true">
	<div class="layout-road-fill"></div>
	<?php
	echo kennedy_fg_inline_svg(
		'layouts/graphic-cta-road.svg',
		array(
			'class' => 'layout-road-wave',
		)
	);
	?>
</div>
