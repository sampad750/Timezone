<?php

Redux::setSection('timezone_opt', array(
	'title'     => esc_html__('Blog settings', 'timezone'),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
	'fields'    => array(
		array(
			'title'     => esc_html__('Blog page title', 'timezone'),
			'subtitle'  => esc_html__('Give here the blog page title', 'timezone'),
			'desc'      => esc_html__('This text will be show on blog page banner', 'timezone'),
			'id'        => 'blog_title',
			'type'      => 'text',
			'default'   => 'Blog Page'
		)
	)
));

Redux::setSection('timezone_opt', array(
	'title'     => esc_html__('Blog single', 'timezone'),
	'id'        => 'blog_single_opt',
	'icon'      => 'dashicons dashicons-info',
	'subsection' => true,
	'fields'    => array(
		array(
            'id'      => 'is_blog_social_icon',
            'type'    => 'switch',
            'title'   => esc_html__('Hide/Show Social Share Icon', 'timezone'),
            'on'      => esc_html__('Enable', 'timezone'),
            'off'     => esc_html__('Disable', 'timezone'),
            'default' => true,
        ),
	)
));


