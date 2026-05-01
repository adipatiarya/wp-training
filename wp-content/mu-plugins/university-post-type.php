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

}

add_action('init', 'university_post_types');