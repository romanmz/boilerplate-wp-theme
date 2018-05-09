<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;



// ==================================================
// [multi-column] SHORTCODE
// ==================================================


// Helper function
// ------------------------------
if( !function_exists( 'cleanup_shortcode_markup' ) ) {
	function cleanup_shortcode_markup( $content ) {
		// Undo 'wpautop'
		$content = str_replace( ['<p>', '</p>', '<br />'], ["\r\n", "\r\n", ''], $content );
		// Run nested shortcodes
		$content = do_shortcode( $content );
		// Trim space before closing divs
		$content = preg_replace( '/\s*<\\/div>/i', '</div>', $content );
		// Redo 'wpautop'
		$content = wpautop( $content );
		// Return
		return $content;
	}
}


// [multi-column]
// ------------------------------
add_shortcode( 'multi-column', 'shortcode_multi_column' );
function shortcode_multi_column( $atts=[], $content='' ) {
	return '<div class="multi-column-grid">'.cleanup_shortcode_markup( $content ).'</div><!-- .multi-column-grid -->';
}


// [column]
// ------------------------------
add_shortcode( 'column', 'shortcode_column' );
function shortcode_column( $atts=[], $content='' ) {
	return '<div class="multi-column-grid--item">'.$content.'</div>';
}
