<?php

/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function timezone_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = '';

	/* Body font */
	if (  'off' !== 'on'  ) {
		$fonts[] = "Roboto:300,400,500,600,700,900";
	}

	$is_ssl = is_ssl() ? 'https' : 'http';

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts  ) ),
			'subset' => urlencode( $subsets ),
		), "$is_ssl://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

function timezone_scripts() {

	/**
	 * Register Stylesheets
	 */
	wp_register_style( 'slicknav',  TIMEZONE_DIR_CSS.'/slicknav.css' );


	wp_enqueue_style( 'timezone-owl.carousel', TIMEZONE_DIR_CSS.'/owl.carousel.min.css' );
	wp_enqueue_style( 'magnific-popup',  TIMEZONE_DIR_CSS.'/magnific-popup.css' );


	// Mobile menu css
	if(has_nav_menu('main_menu')){
		wp_enqueue_style('slicknav');
	}



	/**
	 * Enqueueing Stylesheets
	 */
	wp_enqueue_style( 'timezone-fonts', timezone_fonts_url(), array(), null);

	wp_enqueue_style( 'bootstrap',  TIMEZONE_DIR_CSS.'/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome-5-free',  TIMEZONE_DIR_CSS.'/fontawesome-all.min.css' );
	wp_enqueue_style( 'flaticon',  TIMEZONE_DIR_CSS.'/flaticon.css' );



	wp_enqueue_style( 'animate-min',  TIMEZONE_DIR_CSS.'/animate.min.css' );
	wp_enqueue_style( 'themify-icons',  TIMEZONE_DIR_CSS.'/themify-icons.css' );
	wp_enqueue_style( 'slick-css',  TIMEZONE_DIR_CSS.'/slick.css' );
	wp_enqueue_style( 'nice-select',  TIMEZONE_DIR_CSS.'/nice-select.css' );
	wp_enqueue_style( 'timezone-wpd',  TIMEZONE_DIR_CSS.'/wpd-style.css' );
	wp_enqueue_style( 'theme-css',  TIMEZONE_DIR_CSS.'/style.css' );
	wp_enqueue_style( 'timezone-wc-style',  TIMEZONE_DIR_CSS.'/wc-style.css' );

	wp_enqueue_style( 'timezone-root', get_stylesheet_uri() );


	$dynamic_css = '';

	$logo_padding_no_menu = has_nav_menu('main_menu') ? '' : ".logo > a > h3 {margin: 0; padding: 30px 0; text-transform: capitalize;}";

	$dynamic_css .= $logo_padding_no_menu;

	if (  class_exists( 'WooCommerce'  )  ) {
		// single product quantity input style
		$dynamic_css .= "
			.product_count input::-webkit-outer-spin-button,
			.product_count input::-webkit-inner-spin-button {
			    -webkit-appearance: none;
			    margin: 0;
			}
			input[type=number] {
			    -moz-appearance: textfield;
			}";
	}

	wp_add_inline_style( 'timezone-wc-style', $dynamic_css);

	// timezone register js files
	wp_register_script('slicknav', TIMEZONE_DIR_JS.'/jquery.slicknav.min.js', array( 'jquery' ), '1.0', true );



	// Mobile menu js
	if(has_nav_menu('main_menu')){
		wp_enqueue_script('slicknav');
	}




	wp_enqueue_script( 'propper', TIMEZONE_DIR_JS.'/modernizr-3.5.0.min.js', '1.0', true );

	wp_enqueue_script( 'bootstrap', TIMEZONE_DIR_JS.'/bootstrap.min.js', array( 'jquery' ), '4.1.2', true );

	wp_enqueue_script( 'popper', TIMEZONE_DIR_JS.'/popper.min.js', array( 'jquery' ), '1.1.0', true );



	// Jquery Slick , Owl-Carousel Plugins
	wp_enqueue_script( 'owl-carousel', TIMEZONE_DIR_JS.'/owl.carousel.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'slick-min', TIMEZONE_DIR_JS.'/slick.min.js', array( 'jquery' ), '1.0', true );

	// One Page, Animated-HeadLin
	wp_enqueue_script( 'wow-min', TIMEZONE_DIR_JS.'/wow.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'animated-headline', TIMEZONE_DIR_JS.'/animated.headline.js', array( 'jquery' ), '1.0', true );

	// Scrollup, nice-select, sticky -->
	wp_enqueue_script( 'scrollUp', TIMEZONE_DIR_JS.'/jquery.scrollUp.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'nice-select', TIMEZONE_DIR_JS.'/jquery.nice-select.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'sticky', TIMEZONE_DIR_JS.'/jquery.sticky.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'magnific-popup', TIMEZONE_DIR_JS.'/jquery.magnific-popup.js', array( 'jquery' ), '1.0', true );

	// Contact js
	wp_enqueue_script( 'contact', TIMEZONE_DIR_JS.'/contact.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-form', TIMEZONE_DIR_JS.'/jquery.form.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'validate-js', TIMEZONE_DIR_JS.'/jquery.validate.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'mail-script', TIMEZONE_DIR_JS.'/mail-script.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'ajaxchimp-min', TIMEZONE_DIR_JS.'/jquery.ajaxchimp.min.js', array( 'jquery' ), '1.0', true );

	// Jquery Plugins, main Jquery
	wp_enqueue_script( 'plugins', TIMEZONE_DIR_JS.'/plugins.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'main-js', TIMEZONE_DIR_JS.'/main.js', array( 'jquery' ), '1.0', true );


	$dynamic_js = '';
	if (  class_exists( 'WooCommerce'  )  ) {
		// single product quantity
		$dynamic_js .= "
        ;(function($){
            $(document).ready(function () {
               $('form.cart').on( 'click', 'span.plus, span.minus', function() {

                // Get current quantity values
                var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
                var val   = parseFloat(qty.val());
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));

                // Change the value if plus or minus
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }
            });
            });
        })(jQuery);";
	}
	wp_add_inline_script( 'main-js', $dynamic_js );

}
add_action( 'wp_enqueue_scripts', 'timezone_scripts' );

