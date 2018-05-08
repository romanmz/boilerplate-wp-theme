<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;



// ==================================================
// FILTERS - GENERAL
// ==================================================


// Security: Remove generator
// ------------------------------
add_filter( 'the_generator', 'theme_remove_generator' );
function theme_remove_generator() {
	return '';
}


// Security: Prevent user enumeration
// ------------------------------
if( !is_admin() && isset( $_SERVER['REQUEST_URI'] ) ) {
	if(
		preg_match( '/(wp-comments-post)/', $_SERVER['REQUEST_URI'] ) === 0 &&
		!empty( $_REQUEST['author'] )
	) {
		openlog( 'wordpress('.$_SERVER['HTTP_HOST'].')', LOG_NDELAY | LOG_PID, LOG_AUTH );
		syslog( LOG_INFO, "Attempted user enumeration from {$_SERVER['REMOTE_ADDR']}" );
		closelog();
		wp_die( 'forbidden' );
	}
}


// Support async scripts
// ------------------------------
add_filter( 'clean_url', 'theme_support_async_scripts', 11 );
function theme_support_async_scripts( $url ) {
	if( strpos( $url, '#async') === false ) {
		return $url;
	} elseif( is_admin() ) {
		return str_replace( '#async', '', $url );
	} else {
		return str_replace( '#async', '', $url )."' async='async";
	}
}


// Excerpts length
// ------------------------------
add_filter( 'excerpt_length', 'theme_excerpt_length' );
function theme_excerpt_length( $length ) {
	return 30;
}


// Number of revisions
// ------------------------------
add_filter( 'wp_revisions_to_keep', 'theme_revisions_to_keep', 10, 2 );
function theme_revisions_to_keep( $number, $post ) {
	return 10;
}


// Remove the "Private:" and "Protected:" text from titles
// ------------------------------
add_filter( 'protected_title_format', 'theme_cleanup_titles' );
add_filter( 'private_title_format', 'theme_cleanup_titles' );
function theme_cleanup_titles( $title ) {
	return '%s';
}


// Extend the_archive_title()
// ------------------------------
add_filter( 'get_the_archive_title', 'theme_the_archive_title' );
function theme_the_archive_title( $title ) {
	if( is_home() && is_front_page() ) {
		$title = get_bloginfo( 'name' );
	} elseif( is_home() ) {
		$title = single_post_title( '', false );
	} elseif( is_search() ) {
		$title = sprintf( 'Search Results for: &ldquo;%s&rdquo;', get_search_query() );
	} elseif( is_post_type_archive() ) {
		$title = str_replace( 'Archives: ', '', $title );
	} elseif( is_category() || is_tag() || ( is_tax() && !is_tax( 'post_format' ) ) ) {
		$title = single_term_title( '', false );
	}
	return $title;
}


// Disable attachment pages (redirects to the file itself)
// ------------------------------
add_action( 'template_redirect', 'theme_disable_attachment_pages', 1 );
function theme_disable_attachment_pages() {
	global $post;
	if( is_attachment() ) {
		wp_redirect( wp_get_attachment_url( $post->ID ), 301 );
		exit;
	}
}



// ==================================================
// FILTERS - MEDIA
// ==================================================


// Set default options for inserting images into content
// ------------------------------
add_action( 'after_switch_theme', 'theme_default_image_attributes' );
function theme_default_image_attributes() {
	
	// none* | left | center | right
	update_option( 'image_default_align', 'none' );
	
	// none | file* | post | custom
	update_option( 'image_default_link_type', 'none' );
	
	// thumbnail | medium* | large | full
	update_option( 'image_default_size', 'medium' );
}


// Allowed file types on media library
// ------------------------------
add_filter( 'upload_mimes', 'theme_upload_mimes' );
function theme_upload_mimes( $mimes ) {
	if( current_user_can( 'unfiltered_upload' ) ) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}


// Always Show Kitchen Sink in WYSIWYG Editor
// ------------------------------
add_filter( 'tiny_mce_before_init', 'theme_show_kitchensink' );
function theme_show_kitchensink( $args ) {
	$args['wordpress_adv_hidden'] = false;
	return $args;
}


// Add <div> to embeds
// ------------------------------
add_filter( 'embed_oembed_html', 'theme_responsive_embeds', 99, 4 );
add_filter( 'embed_handler_html', 'theme_responsive_embeds', 99, 3 );
function theme_responsive_embeds( $html, $url, $attr, $post_id=0 ) {
	
	// Apply only to some embeds
	$patterns = [
		'#^https?://(?:www\.)?(?:youtube\.com/watch|youtu\.be/)#',
		'#^https?://(.+\.)?vimeo\.com/.*#',
	];
	
	// Add div
	foreach( $patterns as $pattern ) {
		if( preg_match( $pattern, $url ) ) {
			return "<div class=\"ratio-16-9 margin-1\">{$html}</div>";
		}
	}
	return $html;
}


// Add embeds to excerpts
// ------------------------------
// add_filter( 'get_the_excerpt', [$wp_embed, 'autoembed'], 9 );



// ==================================================
// FILTERS - MENUS
// ==================================================


// Update default settings
// ------------------------------
add_filter( 'wp_nav_menu_args', 'theme_wp_nav_menu_args' );
function theme_wp_nav_menu_args( $args ) {
	
	// Remove default container
	if( $args['container'] == 'div' &&
		empty( $args['container_class'] ) &&
		empty( $args['container_id'] )
	) {
		$args['container'] = false;
	}
	
	// Never use fallback
	$args['fallback_cb'] = false;
	
	// Return
	return $args;
}


// Allow unlinked items in menus
// ------------------------------
add_filter( 'walker_nav_menu_start_el', 'theme_unlinked_nav_items', 10, 4 );
function theme_unlinked_nav_items( $item_output, $item, $depth, $args ) {
	if( strpos( $item_output, '<a>' ) === 0 ) {
		$item_output = str_replace( ['<a>', '</a>'], ['<span>', '</span>'], $item_output );
	}
	return $item_output;
}


// Add menu-level classes
// ------------------------------
add_filter( 'nav_menu_css_class', 'theme_nav_level_classes', 10, 4 );
function theme_nav_level_classes( $classes, $item, $args, $depth ) {
	$classes[] = "menu-level-".( $depth+1 );
	return $classes;
}


// Filter nav items
// ------------------------------
add_filter( 'wp_nav_menu_objects', 'theme_nav_item_filters' );
function theme_nav_item_filters( $items ) {
	return array_filter( $items, function( $item ){
		$remove_item = (
			// Remove by log in status
			( in_array( 'if-logged-out', $item->classes ) && is_user_logged_in() ) ||
			( in_array( 'if-logged-in', $item->classes ) && !is_user_logged_in() ) ||
			// Remove private items if user can't read them
			( $item->type == 'post_type' && get_post_status( $item->object_id ) == 'private' && !current_user_can( 'read_private_posts' ) )
		);
		return !$remove_item;
	});
}
