<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;



// ==================================================
// [icon] SHORTCODE
// ==================================================

add_shortcode( 'icon', 'shortcode_icon' );
function shortcode_icon( $atts=[], $content='' ) {
	$defaults = [
		'name' => '',
	];
	extract( shortcode_atts( $defaults, $atts, 'icon' ) );
	return get_inline_svg( "icons/icon-{$name}" );
}
