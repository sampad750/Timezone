<?php

// Header Section
Redux::setSection('timezone_opt', array(
    'title'            => esc_html__('Social Share Link', 'timezone'),
    'id'               => 'social_share_id',
    'customizer_width' => '400px',
    'icon'             => 'el el-fork',
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(
        array(
            'id'       => 's_l_f',
            'type'     => 'text',
            'title'    => __('Facebook URL', 'timezone'),
            'default'  => '#'
        ),        array(
            'id'       => 's_l_t',
            'type'     => 'text',
            'title'    => __('Twitter URL', 'timezone'),
            'default'  => '#'
        ),        array(
            'id'       => 's_l_l',
            'type'     => 'text',
            'title'    => __('Linkedin URL', 'timezone'),
            'default'  => '#'
        ),        array(
            'id'       => 's_l_p',
            'type'     => 'text',
            'title'    => __('Pinterest URL', 'timezone'),
            'default'  => '#'
        ),
    )
));
