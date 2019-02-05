<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;



// ==================================================
// THEME SETUP
// ==================================================


// Set content width
// ------------------------------
if( !isset( $content_width ) ) {
	$content_width = 1200;
}


// Setup theme
// ------------------------------
add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
	
	// Add theme support
	add_editor_style( 'assets/css/editor.css' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );
	//add_theme_support( 'woocommerce' );
	
	// Register menus
	register_nav_menus([
		'main'   => 'Main',
		'footer' => 'Footer',
	]);
	
	// Image sizes
	// set_post_thumbnail_size( 960, 250, true );
	// add_image_size( 'promo-pic', 320, 180 );
}


// Setup "Gutenberg" editor
// ------------------------------
add_action( 'after_setup_theme', 'theme_setup_gutenberg' );
function theme_setup_gutenberg() {
	
	// General settings
	// Declare support for gutenberg, makes it load the same css file specified in add_editor_style()
	add_theme_support( 'editor-styles' );
	// Reverse colour of the editor's ui elements if your styles have dark body background and light text
	// add_theme_support( 'dark-editor-style' );
	// Enable the 'wide' and 'full' alignment options
	add_theme_support( 'align-wide' );
	// Load the full standard block styles on the frontend (by default only basic styles are loaded on the frontend so you can easily theme the blocks)
	// add_theme_support( 'wp-block-styles' );
	// Automatically makes the embedded media elements responsive (note that this may cause conflicts with existing filters that do the same thing)
	// add_theme_support( 'responsive-embeds' );
	
}


// Settings pages
// ------------------------------
if( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page([
		'page_title' => 'Site Options',
		'menu_title' => 'Site Options',
		'menu_slug'  => 'site-options',
		'capability' => 'edit_theme_options',
		'redirect'   => true,
	]);
	// acf_add_options_sub_page([
	// 	'page_title'  => 'Site Header',
	// 	'menu_title'  => 'Header',
	// 	'parent_slug' => 'site-options',
	// ]);
	// acf_add_options_sub_page([
	// 	'page_title'  => 'Site Footer',
	// 	'menu_title'  => 'Footer',
	// 	'parent_slug' => 'site-options',
	// ]);
}


// Widget areas
// ------------------------------
// add_action( 'widgets_init', 'theme_setup_widgets' );
function theme_setup_widgets() {
	register_sidebar([
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	]);
}


// Frontend scripts
// ------------------------------
add_action( 'wp_enqueue_scripts', 'theme_load_frontend_scripts' );
function theme_load_frontend_scripts() {
	
	// Load jQuery from a CDN
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', [], '', true );
	wp_enqueue_script( 'jquery' );
	
	// Theme Styles
	wp_enqueue_style( 'theme-main', THEME_STYLES.'/main.css', [], THEME_VERSION );
	wp_enqueue_style( 'theme-print', THEME_STYLES.'/print.css', ['theme-main'], THEME_VERSION, 'print' );
	
	// Theme Scripts
	wp_enqueue_script( 'modernizr', THEME_SCRIPTS.'/modernizr.js', [], '3.6.0' );
	wp_enqueue_script( 'main-js', THEME_SCRIPTS.'/main.js', ['jquery'], THEME_VERSION, true );
	
	// Comments
	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


// Login scripts
// ------------------------------
add_action( 'login_enqueue_scripts', 'theme_load_login_scripts' );
function theme_load_login_scripts() {
	wp_enqueue_style( 'theme-login', THEME_STYLES.'/login.css', [], THEME_VERSION );
}


// Admin scripts
// ------------------------------
add_action( 'admin_enqueue_scripts', 'theme_load_admin_scripts' );
function theme_load_admin_scripts() {
	wp_enqueue_style( 'theme-admin', THEME_STYLES.'/admin.css', [], THEME_VERSION );
}
