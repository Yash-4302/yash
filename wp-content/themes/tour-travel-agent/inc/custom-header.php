<?php
/**
 * @package Tour Travel Agent
 * @subpackage tour-travel-agent
 * @since tour-travel-agent 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses tour_travel_agent_header_style()
*/

function tour_travel_agent_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'tour_travel_agent_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 80,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'tour_travel_agent_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'tour_travel_agent_custom_header_setup' );

if ( ! function_exists( 'tour_travel_agent_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see tour_travel_agent_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'tour_travel_agent_header_style' );
function tour_travel_agent_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$tour_travel_agent_custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}
		";
	   	wp_add_inline_style( 'tour-travel-agent-basic-style', $tour_travel_agent_custom_css );
	endif;
}
endif; // tour_travel_agent_header_style
