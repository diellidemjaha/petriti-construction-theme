<?php

function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

function my_custom_theme_enqueue_styles() {
    // Enqueue the parent theme stylesheet (if your theme is a child theme)
    // Example: wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Enqueue your theme's stylesheet
    wp_enqueue_style('style', get_stylesheet_uri());

    // Enqueue jQuery (uncomment the line below if your theme requires jQuery)
    // wp_enqueue_script('jquery');

    // Enqueue your custom JavaScript file
    // wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_styles');

// Register a custom post type for image gallery
function custom_image_gallery_post_type() {
    $labels = array(
        'name'               => 'Slider Gallery',
        'singular_name'      => 'Image',
        'menu_name'          => 'Slider Gallery',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Slide',
        'edit_item'          => 'Edit Image',
        'new_item'           => 'New Image',
        'view_item'          => 'View Image',
        'search_items'       => 'Search Images',
        'not_found'          => 'No images found',
        'not_found_in_trash' => 'No images found in Trash',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-image',
        'supports'            => array('title', 'thumbnail' , 'editor'),
        'rewrite'             => array('slug' => 'slider_gallery'),
    );
    
    register_post_type('slider_gallery', $args);
}
add_action('init', 'custom_image_gallery_post_type');

// Enable featured image for custom post type
add_theme_support('post-thumbnails');

function custom_text_content_post_type() {
    
    $labels = array(
        'name'               => 'Quote Content',
        'singular_name'      => 'Quote Content',
        'menu_name'          => 'Quote Content',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Text Content',
        'edit_item'          => 'Edit Text Content',
        'new_item'           => 'New Text Content',
        'view_item'          => 'View Text Content',
        'search_items'       => 'Search Text Content',
        'not_found'          => 'No text content found',
        'not_found_in_trash' => 'No text content found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-text',
        'supports'            => array('title', 'editor'), // Add 'editor' for text content
        'rewrite'             => array('slug' => 'text-content'),
    );

    register_post_type('text_content', $args);
}
add_action('init', 'custom_text_content_post_type');