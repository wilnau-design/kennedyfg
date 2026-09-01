<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php
	kennedy_fg_component(
		'form-field',
		array(
			'label'       => __( 'Search', 'kennedyfg' ),
			'name'        => 's',
			'type'        => 'search',
			'placeholder' => __( 'What are you looking for?', 'kennedyfg' ),
			'value'       => get_search_query(),
			'class'       => 'is-search',
		)
	);
	kennedy_fg_component(
		'button-cta',
		array(
			'label'   => __( 'Search', 'kennedyfg' ),
			'type'    => 'submit',
			'variant' => 'short',
		)
	);
	?>
</form>
