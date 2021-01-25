<?php
    $tm = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'color';
    $themes = array(
        'wb' => array(
            'wrap' => '',
            'text-white' => '',
            'icons' => 'st1',
            'menu-items' => 'setting-menu-item-wb',
            'menu-items_link' => 'wb',
            'language-options' => 'language-options_wb',
            'language-options_label' => 'label_wb',
            'button-fill' => 'button-fill_wb',
            'button-transparent' => 'button-transparent_wb',
            'field' => 'field_wb',
            'signup-link' => 'signup-link_wb',
            'music-link' => 'music-link_wb',
            'errors' => 'errors_wb',
            'profile-list-item' => 'profile-list-item-wb',
            'forgot_password_link' => 'forgot_password_link-wb'
        ),
        'color' => array(
            'wrap' => 'wrap-color',
            'text-white' => 'text-white',
            'icons' => 'st0',
            'menu-items' => '',
            'menu-items_link' => '',
            'language-options' => '',
            'language-options_label' => '',
            'button-fill' => 'button-fill',
            'button-transparent' => 'button-transparent',
            'field' => '',
            'signup-link' => 'signup-link',
            'music-link' => 'music-link',
            'errors' => 'errors',
            'profile-list-item' => '',
            'forgot_password_link' => ''
        )
    );