<?php

/**
 * Plugin Name: Our First Plugin
 * Description: A simple plugin to demonstrate WordPress plugin development.
 * Version: 1.0.0
 * Author: Ratman
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

add_filter('the_content', 'add_custom_message_to_content');

function add_custom_message_to_content($content) {
    $custom_message = '<p>This is a custom message added by our first plugin!</p>';
    return $custom_message;
}