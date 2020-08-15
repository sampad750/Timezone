<?php

// Header Section
Redux::setSection( 'timezone_opt', array(
	'title'            => esc_html__( 'Header Settings', 'timezone' ),
	'id'               => 'header_sec',
	'customizer_width' => '400px',
	'icon'             => 'el el-home'
) );


// Is Pre-loader
Redux::setSection( 'timezone_opt', array(
	'title'      => esc_html__( 'Pre-loader', 'timezone' ),
	'id'         => 'preloader_opt',
	'subsection' => true,
	'icon'       => 'dashicons dashicons-minus',
	'fields'     => array(
		array(
			'title'    => esc_html__( 'Show/hide Pre-loder', 'timezone' ),
			'subtitle' => esc_html__( 'Toggle this switcher to show or hide the sing up button.', 'timezone' ),
			'id'       => 'is_preloader',
			'type'     => 'switch',
			'on'       => esc_html__( 'Show', 'timezone' ),
			'off'      => esc_html__( 'Hide', 'timezone' ),
		),
		array(
			'title'    => esc_html__( 'Preloader logo', 'timezone' ),
			'subtitle' => esc_html__( 'Upload here a image file for your preloader logo', 'timezone' ),
			'id'       => 'pre_logo',
			'type'     => 'media',
			'compiler' => true,
			'default'  => array(
				'url' => TIMEZONE_DIR_IMG . '/logo.png'
			),
			'required' => array('is_preloader','=','1'),
		)
	)
) );


Redux::setSection( 'timezone_opt', array(
	'title'      => esc_html__( 'Logo settings', 'timezone' ),
	'id'         => 'logo_opt',
	'subsection' => true,
	'icon'       => 'dashicons dashicons-schedule',
	'fields'     => array(
		array(
			'title'    => esc_html__( 'Upload logo', 'timezone' ),
			'subtitle' => esc_html__( 'Upload here a image file for your logo', 'timezone' ),
			'id'       => 'main_logo',
			'type'     => 'media',
			'compiler' => true,
			'default'  => array(
				'url' => TIMEZONE_DIR_IMG . '/logo.png'
			)
		),
		array(
			'title'    => esc_html__( 'Logo dimensions', 'timezone' ),
			'subtitle' => esc_html__( 'Set a custom height width for your upload logo.', 'timezone' ),
			'id'       => 'logo_dimensions',
			'type'     => 'dimensions',
			'units'    => array( 'em', 'px', '%' ),
			'output'   => '.header-area .logo > a > img'
		),
		array(
			'title'          => esc_html__( 'Padding', 'timezone' ),
			'subtitle'       => esc_html__( 'Padding around the logo. Input the padding as clockwise (Top Right Bottom Left)', 'timezone' ),
			'id'             => 'logo_padding',
			'type'           => 'spacing',
			'output'         => array( '.header-area .logo' ),
			'mode'           => 'padding',
			'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true',
			'default'        => array(
				'padding-top'    => '0px',
				'padding-right'  => '0px',
				'padding-bottom' => '0px',
				'padding-left'   => '0px'
			)
		),
	)
) );

// Menu action button
Redux::setSection( 'timezone_opt', array(
	'title'      => esc_html__( 'Menu action button', 'timezone' ),
	'id'         => 'menu_action_btn_opt',
	'subsection' => true,
	'icon'       => 'dashicons dashicons-minus',
	'fields'     => array(
		array(
			'title'    => esc_html__( 'Show/hide search button', 'timezone' ),
			'subtitle' => esc_html__( 'Toggle this switcher to show or hide the search button.', 'timezone' ),
			'id'       => 'is_search',
			'type'     => 'switch',
			'on'       => esc_html__( 'Show', 'timezone' ),
			'off'      => esc_html__( 'Hide', 'timezone' ),
		),

	)
) );



