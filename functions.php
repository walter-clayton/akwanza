<?php
/**
 * My Custom Theme functions and definitions
 *
 * @copyright  Copyright (c) 2024, Oana Grecu
 * @license    MIT
 */

// Prevent using ZipArchive for unzipping files
add_filter('unzip_file_use_ziparchive', '__return_false');

// Add featured image functionality
add_theme_support('post-thumbnails');
add_image_size('my-custom-image-size');

// Enqueue scripts and styles
function enqueue_akwanza_scripts()
{
    // Enqueue D3.js
    wp_enqueue_script('d3', get_template_directory_uri() . '/assets/js/d3.v5.min.js', array(), '5.16.0', false);

    // Enqueue custom script
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

// Enqueue custom style
function enqueue_custom_style()
{
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_style');
function force_https()
{
    if (!is_ssl()) {
        wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301);
        exit();
    }
}
add_action('template_redirect', 'force_https');
