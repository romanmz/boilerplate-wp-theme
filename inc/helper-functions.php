<?php

// ==================================================
// HELPER FUNCTIONS
// ==================================================

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;


// Dump variable info
// ------------------------------
if( !function_exists( 'dump' ) ) {
	function dump() {
		if( !current_user_can( 'update_core' ) ) return;
		foreach( func_get_args() as $var ) {
			echo '<pre>';
			if( is_null( $var ) )       echo 'NULL';
			elseif( is_bool( $var ) )   echo $var ? 'true' : 'false';
			elseif( is_string( $var ) ) echo "\"{$var}\"";
			else                        print_r( $var );
			echo '</pre>';
		}
	}
}


// Check currently logged in user by user name
// ------------------------------
if( !function_exists( 'is_user' ) ) {
	function is_user( $usernames ) {
		$usernames = (array) $usernames;
		$current_user = wp_get_current_user();
		return in_array( $current_user->user_login, $usernames );
	}
}


// List all pages using a given template file
// ------------------------------
if( !function_exists( 'get_pages_using_template' ) ) {
	function get_pages_using_template( $template_file ) {
		return get_posts([
			'post_type' => 'any',
			'posts_per_page' => -1,
			'meta_key' => '_wp_page_template',
			'meta_value' => $template_file,
		]);
	}
}


// Get attachment ID from a URL
// ------------------------------
if( !function_exists( 'get_attachment_id_from_url' ) ) {
	function get_attachment_id_from_url( $url ) {
		
		// Validate url
		$url = esc_url( $url );
		if( empty( $url ) ) {
			return false;
		}
		
		// Get the path fragment after the wp-content folder
		$file_path = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
		if( empty( $file_path[1] ) ) {
			return false;
		}
		$file_path = $file_path[1];
		
		// Query database
		global $wpdb;
		$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'attachment' AND guid RLIKE %s;", $file_path ) );
		return !empty( $attachment[0] ) ? absint( $attachment[0] ) : false;
	}
}


// List all hooked functions
// ------------------------------
if( !function_exists( 'get_hooked_functions' ) ) {
	function get_hooked_functions( $hook_name=false ) {
		global $wp_filter;
		
		// Get readable function name
		function get_function_name( $function, $priority ) {
			if( is_array( $function['function'] ) && gettype( $function['function'][0] ) === 'string' ) {
				$name = $function['function'][0].'::'.$function['function'][1];
			} elseif( is_array( $function['function'] ) ) {
				$name = get_class( $function['function'][0] ).'->'.$function['function'][1];
			} else {
				$name = $function['function'];
			}
			$args = array_keys( array_fill( 1, $function['accepted_args'], 1 ) );
			$args = count( $args ) ? ' $'.implode( ', $', $args ).' ' : '';
			return $priority.' – '.$name.'('.$args.')';
		}
		
		// Get function names at a given priority level
		function get_functions_names_per_priority( $functions, $priority ) {
			$priority_arr = array_fill( 0, count( $functions ), $priority );
			return array_map( 'get_function_name', $functions, $priority_arr );
		}
		
		// Get full list of functions for a given hook
		function get_functions_for_hook( $hook ) {
			$functions = array_map( 'get_functions_names_per_priority', $hook->callbacks, array_keys( $hook->callbacks ) );
			return call_user_func_array( 'array_merge', $functions );
		}
		
		// Return
		if( $hook_name ) {
			return isset( $wp_filter[$hook_name] ) ? get_functions_for_hook( $wp_filter[$hook_name] ) : [];
		} else {
			return array_map( 'get_functions_for_hook', $wp_filter );
		}
	}
}
