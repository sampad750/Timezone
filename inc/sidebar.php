<?php
// Register Widget areas
add_action( 'widgets_init', function () {
	// sidebar widget
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'sampadinfo' ),
		'description'   => esc_html__( 'Place widgets in the blog sidebar widgets area.', 'sampadinfo' ),
		'id'            => 'sidebar_widgets',
		'before_widget' => '<aside id="%1$s" class="widget single_sidebar_widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget_title">',
		'after_title'   => '</h4>'
	) );
	// footer widget
	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets', 'sampadinfo' ),
		'description'   => esc_html__( 'Add widgets here for Footer widgets area', 'sampadinfo' ),
		'id'            => 'footer_widgets',
		'before_widget' => '<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6"><div class="single-footer-caption mb-50"><div class="footer-tittle">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	) );

} );


//search widget form markup
function timezone_search_form( $form ) {
	$form = '<form role="search" method="get" action="' . home_url( '/' ) . '">
					<div class="form-group">
						<div class="input-group mb-3">
							<input  type="search" placeholder="Search Keyword" value="' . get_search_query() . '" name="s" id="s" class="form-control">
							<div class="input-group-append">
								<button class="btns" type="submit"><i class="ti-search"></i></button>
							</div>
						</div>
					</div>
					<button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
				</form>';

	return $form;
}

add_filter( 'get_search_form', 'timezone_search_form', 100 );

// add extra class in search widget wrapper div
add_filter( 'dynamic_sidebar_params', 'add_search_widget_extra_class' );
function add_search_widget_extra_class( $params ) {
	if ( ! is_admin() ) {
		if ( is_array( $params ) && is_array( $params[0] ) && $params[0]['widget_name'] === 'Search' ) {
			// Insert your custom CSS class (one or more) in the search widget
			$classes                    = array( 'search_widget' );
			$pattern                    = '/class\s*=\s*(["\'])(?:\s*((?!\1).*?)\s*)?\1/i';
			$replace                    = 'class=$1$2 ' . implode( ' ', $classes ) . '$1';
			$params[0]['before_widget'] = preg_replace( $pattern, $replace, $params[0]['before_widget'], 1 );
		}
	}

	return $params;
}

// add extra class in categories widget wrapper div
add_filter( 'dynamic_sidebar_params', 'add_categories_widget_extra_class' );
function add_categories_widget_extra_class( $params ) {
	if ( ! is_admin() ) {
		if ( is_array( $params ) && is_array( $params[0] ) && $params[0]['widget_name'] === 'Categories' ) {
			// Insert your custom CSS class (one or more) in the search widget
			$classes                    = array( 'post_category_widget' );
			$pattern                    = '/class\s*=\s*(["\'])(?:\s*((?!\1).*?)\s*)?\1/i';
			$replace                    = 'class=$1$2 ' . implode( ' ', $classes ) . '$1';
			$params[0]['before_widget'] = preg_replace( $pattern, $replace, $params[0]['before_widget'], 1 );
		}
	}
	return $params;
}
// categories widget list html markup
add_filter( 'wp_list_categories', 'categories_widget_list_markup' );
function categories_widget_list_markup( $list ) {
	?>
    <ul class="list cat-list">
		<?php
		$args       = array(
			'orderby' => 'slug',
			'parent'  => 0
		);
		$categories = get_categories( $args );
		foreach ( $categories as $category ) {
			echo '<li>
                    <a href="' . get_category_link( $category->term_id ) . '" class="d-flex">
                        <p>' . $category->name . '</p>
                        <p>(' . $category->count . ')</p>
                    </a>
                </li>';
		}
		?>
    </ul>
	<?php
}

