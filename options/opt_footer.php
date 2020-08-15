<?php

// Header Section
Redux::setSection('timezone_opt', array(
    'title'            => esc_html__('Footer Settings', 'timezone'),
    'id'               => 'footer_sec',
    'customizer_width' => '400px',
    'icon'             => 'el el-fork'
));
// Footer Copyright
Redux::setSection('timezone_opt', array(
    'title'     => esc_html__('Copyright Text', 'timezone'),
    'id'        => 'timezone_footer',
    'subsection' => true,
    'icon'      => 'dashicons dashicons-media-text',
    'fields'    => array(
        array(
            'title'     => esc_html__('Copyright text', 'timezone'),
            'subtitle'  => esc_html__('Footer Copyright text', 'timezone'),
            'id'        => 'copyright_txt',
            'type'      => 'editor',
            'default'   => 'Copyright © 2020 Sampadinfo. All rights reserved.',
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_cols' => 3,
                //'tabindex' => 1,
                //'editor_css' => '',
                'teeny'         => false,
                //'tinymce' => array(),
                'quicktags'     => false,
            )
        ),
    )
));

// Footer Social link
Redux::setSection('timezone_opt', array(
    'title'     => esc_html__('Social Link For Footer', 'timezone'),
    'id'        => 'timezone_footer_s_link',
    'subsection' => true,
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(
        array(
            'id'      => 'is_footer_social',
            'type'    => 'switch',
            'title'   => esc_html__('Hide/Show Footer Social Icon', 'timezone'),
            'on'      => esc_html__('Enable', 'timezone'),
            'off'     => esc_html__('Disable', 'timezone'),
            'default' => true,
        ),
    )
));
