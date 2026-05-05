<?php

function university_post_types() {
     register_post_type('campus', 
        array(
           'supports' => array('title', 'editor','excerpt'),
           'public' => true,
           'show_in_rest' => true,
           'has_archive' => true,
           'rewrite' => array('slug' => 'campuses'),
           'labels' => array(
               'name' => 'Campuses',
               'add_new_item' => 'Add Campus',
               'edit_item' => 'Edit Campus',
               'all_items' => 'All Campuses',
               'singular_name' => 'Campus'
           ),
           'menu_icon' => 'dashicons-location-alt',
        )
    );
    //AIzaSyA8qD1kp_W0ftsMN1QM4_BYo4MRcNQ6rNs
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



function university_map_key($api) {
    $api['key'] = 'AIzaSyA8qD1kp_W0ftsMN1QM4_BYo4MRcNQ6rNs';
    return $api;
}

add_filter('acf/fields/google_map/api', 'university_map_key');