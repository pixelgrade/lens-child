<?php
/*
 * ===== Theme Translation =====
 * Load the translations from the child theme if present
 */
add_action( 'before_wpgrade_core', 'lens_child_theme_setup' );
function lens_child_theme_setup() {
	load_child_theme_textdomain( 'lens_txtd', get_stylesheet_directory() . '/languages' );
}

/**
 * ===== Loading Resources =====
 * Add all the extra static resources of the child theme - right now only the style.css file
 */

function lens_child_enqueue_styles() {
	// Here we are adding the child style.css while still retaining all of the parents assets (style.css, JS files, etc)
	wp_enqueue_style( 'lens-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('wpgrade-main-style') //make sure the the child's style.css comes after the parents so you can overwrite rules
	);
}

add_action( 'wp_enqueue_scripts', 'lens_child_enqueue_styles' );
