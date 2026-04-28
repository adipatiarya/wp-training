<?php

function university_files() {
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/style-index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
    add_theme_support('title-tag'); 
}

add_action('after_setup_theme', 'university_features');


//custom gutenberg block category

function enqueue_menu_order_panel() {
    wp_enqueue_script(
        'menu-order-panel',
        get_template_directory_uri() . '/build/menu-order-panel.js',
        array('wp-plugins', 'wp-edit-post', 'wp-components', 'wp-data', 'wp-element'),
        '1.1',
        true
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_menu_order_panel');


