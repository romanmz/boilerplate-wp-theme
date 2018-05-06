<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;



// ==================================================
// HELPER FUNCTIONS
// ==================================================


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


// Embed .svg files as inline <svg> tags
// ------------------------------
function is_svg_file( $file_path ) {
	$valid_mimes = ['text/plain', 'text/html', 'image/svg', 'image/svg+xml'];
	return (
		is_file( $file_path ) &&
		is_readable( $file_path ) &&
		( !function_exists( 'mime_content_type' ) || in_array( mime_content_type( $file_path ), $valid_mimes ) )
	);
}
function get_inline_svg( $filename ) {
	$path = THEME_DIR.'/assets/images/'.$filename.'.svg';
	return is_svg_file( $path ) ? file_get_contents( $path ) : false;
}
function inline_svg( $filename ) {
	$path = THEME_DIR.'/assets/images/'.$filename.'.svg';
	return is_svg_file( $path ) ? readfile( $path ) : false;
}



// ==================================================
// TEMPLATE FUNCTIONS
// ==================================================


// Numbered posts pagination
// ------------------------------
function get_numbered_posts_pagination( $query=false ) {
	
	// Init vars
	if( !$query ) {
		global $wp_query;
		$query = $wp_query;
	}
	$paged = max( 1, get_query_var( 'paged' ) );
	$total = $query->max_num_pages;
	
	// Get links
	$links = paginate_links([
		'current'   => $paged,
		'total'     => $total,
		'end_size'  => 1,
		'mid_size'  => 2,
		'type'      => 'array',
		'prev_next' => false,
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;',
	]);
	if( empty( $links ) ) {
		return '';
	}
	
	// Return markup
	return sprintf(
		'<nav class="numbered-pagination">
			<h3 class="screen-reader-text">Posts navigation</h3>
			<ul>
				<li>%s</li>
			</ul>
		</nav>',
		implode( '</li><li>', $links )
	);
}


// Prev/next posts pagination
// ------------------------------
function get_posts_pagination( $query=false ) {
	
	// Init vars
	if( !$query ) {
		global $wp_query;
		$query = $wp_query;
	}
	if( $query->max_num_pages < 2 ) {
		return '';
	}
	
	// Get links
	if( $prev_link = get_next_posts_link( '&larr; Older Posts', $query->max_num_pages ) ) {
		$prev_link = '<li class="pagination-previous">'.$prev_link.'</li>';
	}
	if( $next_link = get_previous_posts_link( 'Newer Posts &rarr;', $query->max_num_pages ) ) {
		$next_link = '<li class="pagination-next">'.$next_link.'</li>';
	}
	
	// Return markup
	return sprintf(
		'<nav class="pagination">
			<h3 class="screen-reader-text">Posts navigation</h3>
			<ul>
				%s
				%s
			</ul>
		</nav>',
		$prev_link,
		$next_link
	);
}
add_filter( 'next_posts_link_attributes', 'theme_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'theme_posts_link_attributes' );
function theme_posts_link_attributes( $atts ) {
	$atts .= ' class="button"';
	return $atts;
}


// Prev/next comments pagination
// ------------------------------
function get_comments_pagination( $query=false ) {
	
	// Exit if pagination is not necessary
	if( get_comment_pages_count() <= 1 || !get_option( 'page_comments' ) ) {
		return '';
	}
	
	// Get links
	if( $prev_link = get_previous_comments_link( '&larr; Older Comments' ) ) {
		$prev_link = '<div class="pagination-previous">'.$prev_link.'</div>';
	}
	if( $next_link = get_next_comments_link( 'Newer Comments &rarr;' ) ) {
		$next_link = '<div class="pagination-next">'.$next_link.'</div>';
	}
	
	// Return markup
	return sprintf(
		'<nav class="pagination">
			<h3 class="screen-reader-text">Comments navigation</h3>
			<ul>
				%s
				%s
			</ul>
		</nav>',
		$prev_link,
		$next_link
	);
}
add_filter( 'next_comments_link_attributes', 'theme_comments_link_attributes' );
add_filter( 'previous_comments_link_attributes', 'theme_comments_link_attributes' );
function theme_comments_link_attributes( $attributes ) {
	$attributes .= ' class="button"';
	return $attributes;
}
