<?php

// shop page
	add_image_size('timezone_360x379', 360, 379, true );

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
	remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
	add_filter( 'woocommerce_show_page_title', '__return_false' );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	function timezone_loop_shop_per_page($ppp){
		if(isset($_GET['pp3'])){
			$ppp =  sanitize_text_field('3');
		}elseif (isset($_GET['pp6'])){
			$ppp =  sanitize_text_field('6');
		}elseif (isset($_GET['pp9'])){
			$ppp =  sanitize_text_field('9');
		}else{
			$ppp =  sanitize_text_field('12');
		}
		return $ppp;
	}
	add_action('loop_shop_per_page','timezone_loop_shop_per_page');

	/*	add_filter( 'loop_shop_per_page', 'timezone_shop_per_page' );
		function timezone_shop_per_page($ppn){
			$ppn = 6;
			return $ppn;
		}*/

// single shop page
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

    add_action( 'woocommerce_single_product_summary', 'timezone_total_product_price', 31 );
    function timezone_total_product_price() {
        global $product;
        $tzs = get_woocommerce_currency_symbol();
        echo '<p>'.$tzs . $product->get_price().'</p>';

    }

/**
 * Checkout form fields customizing
 */
add_filter( 'woocommerce_checkout_fields' , function ( $fields ) {
	// Billing Fields
	$fields['billing']['billing_first_name'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('First name *', 'placeholder', 'timezone'),
				'required'  => true,
				'class'     => array('col-md-6 form-group p_star'),
				'input_class'     => array('form-control'),
				'clear'     => true
	);
	$fields['billing']['billing_last_name'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Last name *', 'placeholder', 'timezone'),
		'required'  => true,
		'class'     => array('col-md-6 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['billing']['billing_company'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Company name', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-12 form-group'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);
	$fields['billing']['billing_phone'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Phone number', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-6 form-group p_star'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);
	$fields['billing']['billing_email'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Email Address', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-6 form-group p_star'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);
/*	$fields['billing']['billing_country'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Country', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-12 form-group p_star'),
				'clear'     => true,
				'options' => WC()->countries->get_shipping_countries()
			);*/
	$fields['billing']['billing_address_1'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Address line 01', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-12 form-group p_star'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);
	$fields['billing']['billing_address_2'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Address line 02', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-12 form-group p_star'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);
	$fields['billing']['billing_city'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Town/City', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-12 form-group p_star'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);
	$fields['billing']['billing_state'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('State', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-12 form-group p_star'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);
	$fields['billing']['billing_postcode'] = array(
				'label_class' => array('hidden'),
				'placeholder'   => esc_html_x('Postcode/ZIP', 'placeholder', 'timezone'),
				'required'  => false,
				'class'     => array('col-md-12 form-group'),
				'clear'     => true,
				'input_class'     => array('form-control'),
	);

	// Shipping Fields
	$fields['shipping']['shipping_first_name'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('First name *', 'placeholder', 'timezone'),
		'required'  => true,
		'class'     => array('col-md-6 form-group p_star'),
		'input_class'     => array('form-control'),
		'clear'     => true
	);
	$fields['shipping']['shipping_last_name'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Last name *', 'placeholder', 'timezone'),
		'required'  => true,
		'class'     => array('col-md-6 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['shipping']['shipping_company'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Company name', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-12 form-group'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['shipping']['shipping_city'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Town/City', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-12 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['shipping']['shipping_postcode'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Postcode/ZIP', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-12 form-group'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['shipping']['shipping_phone'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Phone number', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-6 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['shipping']['shipping_email'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Email Address', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-6 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['shipping']['shipping_address_1'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Address line 01', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-12 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);
	$fields['shipping']['shipping_address_2'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('Address line 02', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-12 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);

	$fields['shipping']['shipping_state'] = array(
		'label_class' => array('hidden'),
		'placeholder'   => esc_html_x('State', 'placeholder', 'timezone'),
		'required'  => false,
		'class'     => array('col-md-12 form-group p_star'),
		'clear'     => true,
		'input_class'     => array('form-control'),
	);

	return $fields;
});















/*add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields($fields) {
	foreach ($fields as &$fieldset) {
		foreach ($fieldset as &$field) {
			$field['class'][] = 'col-md-6 form-group p_star';
			$field['input_class'][] = 'form-control';
		}
	}
	return $fields;
}*/

// product image size
//add_image_size( 'timezone_360x379', 360, 379, true );
// product cart page image
//add_image_size( 'timezone_148x153', 148, 153, true );

// remove breadcrumb
//remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// remove result count
//remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
// remove show page title
//add_filter( 'woocommerce_show_page_title', '__return_null' );

/*function timezone_woocommerce_product_query($wcq){
	if(isset($_GET['category_name']) && $_GET['category_name'] == 'clothing' ){
		$wcq->set('ct', 'yes');
	}
	return $wcq;
}
add_action('woocommerce_product_query', 'timezone_woocommerce_product_query');*/


/**
 * Change number of products that are displayed per page (shop page)
 */
/*add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = 6;
	switch ($cols) {
		case 3:
			"<option>3 per page</option>";
			break;
		case 6:
			"<option>6 per page</option>";
			break;
		case 9:
			"<option>9 per page</option>";
			break;

		default:
			"<option>12 per page</option>";
	}
	return $cols;
}
*/

