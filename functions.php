<?php

// This adds support for pages only:
add_theme_support( 'post-thumbnails', array( 'page' ) );

/**
 * Enqueue plugin style-file
 */
function wpwe_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'style' );
}
/**
 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
 */
add_action( 'wp_enqueue_scripts', 'wpwe_stylesheet' );
