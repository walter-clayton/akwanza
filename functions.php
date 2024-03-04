<?php

/**
 * My Custom Theme functions and definitions
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
add_filter('unzip_file_use_ziparchive', '__return_false');

/**
 * Register one navigation menu.
 */
register_nav_menus(
    array(
        'menu-1' => esc_html__('Primary Menu', 'my-custom-theme'),
    )
);

/**
 * Register one sidebar.
 */
function my_custom_theme_sidebar()
{
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'my-custom-theme'),
        'id'   => 'sidebar-1',
    ));
}
add_action('widgets_init', 'my_custom_theme_sidebar');

// Add featured image functionality.
add_theme_support('post-thumbnails');

add_image_size('my-custom-image-size', 640, 999);


// Add title tag functionality.
// add_theme_support( 'title-tag' );

function enqueue_akwanza_scripts()
{

    wp_enqueue_script('d3', get_template_directory_uri() . '/d3.v5.min.js', array(), '5.16.0', true);

    // Enqueue your custom script
    wp_enqueue_script('akwanza-script', get_template_directory_uri() . '/script.js', array('d3'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_akwanza_scripts');
