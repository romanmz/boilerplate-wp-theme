<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Define constants
define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_URL', get_template_directory_uri() );
define( 'THEME_STYLES', THEME_URL.'/assets/css' );
define( 'THEME_FAVICONS', THEME_URL.'/assets/favicons' );
define( 'THEME_IMAGES', THEME_URL.'/assets/images' );
define( 'THEME_SCRIPTS', THEME_URL.'/assets/js' );
define( 'THEME_DIR', get_template_directory() );

// Include files
require_once THEME_DIR.'/inc/theme-functions.php';
require_once THEME_DIR.'/inc/theme-init.php';
require_once THEME_DIR.'/inc/theme-filters.php';
require_once THEME_DIR.'/inc/shortcodes/icon.php';
require_once THEME_DIR.'/inc/shortcodes/multi-column.php';
require_once THEME_DIR.'/inc/shortcodes/sample-html.php';
