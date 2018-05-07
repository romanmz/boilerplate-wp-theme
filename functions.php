<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Define constants
define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_URL', get_template_directory_uri() );
define( 'THEME_DIR', get_template_directory() );

// Include files
require_once THEME_DIR.'/inc/theme-functions.php';
require_once THEME_DIR.'/inc/theme-init.php';
require_once THEME_DIR.'/inc/theme-filters.php';
