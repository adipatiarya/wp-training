<?php

function university_post_types() {
    // Event Post Type
    register_post_type('event', 
        array(
           'public' => true,
           'show_in_rest' => true,
           'has_archive' => true,
           'rewrite' => array('slug' => 'events'),
           'labels' => array(
               'name' => 'Events',
               'add_new_item' => 'Add Event',
               'edit_item' => 'Edit Event',
               'all_items' => 'All Events',
               'singular_name' => 'Event'
           ),
           'menu_icon' => 'dashicons-calendar',
        )
    );


    // Program Post Type
    register_post_type('program', 
        array(
           'public' => true,
           'show_in_rest' => true,
           'has_archive' => true,
           'rewrite' => array('slug' => 'programs'),
           'labels' => array(
               'name' => 'Programs',
               'add_new_item' => 'Add Program',
               'edit_item' => 'Edit Program',
               'all_items' => 'All Programs',
               'singular_name' => 'Program'
           ),
           'menu_icon' => 'dashicons-awards',
        )
    );

    // Professor Post Type
    register_post_type('professor', 
        array(
           'supports' => array('title', 'editor','thumbnail'),
           'public' => true,
           'show_in_rest' => true,
           'labels' => array(
               'name' => 'Professors',
               'add_new_item' => 'Add Professor',
               'edit_item' => 'Edit Professor',
               'all_items' => 'All Professors',
               'singular_name' => 'Professor'
           ),
           'menu_icon' => 'dashicons-welcome-learn-more',
        )
    );

}

add_action('init', 'university_post_types');
