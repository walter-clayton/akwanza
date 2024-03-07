<?php

/**
 * My Custom Theme functions and definitions
 
 * @copyright  Copyright (c) 2024, Oana Grecu
 * @license    
 */
add_filter('unzip_file_use_ziparchive', '__return_false');

/**
 */



// Add featured image functionality.
add_theme_support('post-thumbnails');

add_image_size('my-custom-image-size',1920, 500);


// Add title tag functionality.
// add_theme_support( 'title-tag' );

// Enqueue your custom script
function enqueue_akwanza_scripts()
{

    wp_enqueue_script('d3', get_template_directory_uri() . '/assets/js/d3.v5.min.js', array(), '5.16.0', false);


    wp_enqueue_script('akwanza-script', get_template_directory_uri() . '/assets/js/script.js', array('d3'), '1.0', false);
}

add_action('wp_enqueue_scripts', 'enqueue_akwanza_scripts');


// Enqueue Bootstrap CSS and JavaScript from CDN
function enqueue_bootstrap()
{
    // Register Bootstrap CSS
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');

    // Register Bootstrap JavaScript (bundle)
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);

    // Enqueue Bootstrap CSS and JavaScript
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');
