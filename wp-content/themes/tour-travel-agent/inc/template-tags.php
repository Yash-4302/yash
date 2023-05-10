<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Tour Travel Agent
 */

if ( ! function_exists( 'tour_travel_agent_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function tour_travel_agent_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'tour_travel_agent_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids      = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery&hellip
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment&hellip
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);

	wp_reset_postdata();
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function tour_travel_agent_categorized_blog() {
	if ( false === ( $tour_travel_agent_all_the_cool_cats = get_transient( 'tour_travel_agent_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$tour_travel_agent_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$tour_travel_agent_all_the_cool_cats = count( $tour_travel_agent_all_the_cool_cats );

		set_transient( 'tour_travel_agent_all_the_cool_cats', $tour_travel_agent_all_the_cool_cats );
	}

	if ( '1' != $tour_travel_agent_all_the_cool_cats ) {
		// This blog has more than 1 category so tour_travel_agent_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so tour_travel_agent_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'tour_travel_agent_the_custom_logo' ) ) :
	function tour_travel_agent_the_custom_logo() {
		the_custom_logo();
	}
endif;

/**
 * Flush out the transients used in tour_travel_agent_categorized_blog
 */
function tour_travel_agent_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'tour_travel_agent_all_the_cool_cats' );
}
add_action( 'edit_category', 'tour_travel_agent_category_transient_flusher' );
add_action( 'save_post',     'tour_travel_agent_category_transient_flusher' );

/*-- Custom metafield --*/
function tour_travel_agent_custom_metafields() {
  	add_meta_box( 'bn_meta', __( 'Tour Travel Agent Meta Feilds', 'tour-travel-agent' ), 'tour_travel_agent_meta_tour_detail_callback', 'post', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'tour_travel_agent_custom_metafields');
}

function tour_travel_agent_meta_tour_detail_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'tour_travel_agent_traveler_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
  	$tour_travel_agent_traveler = get_post_meta( $post->ID, 'tour_travel_agent_traveler', true );
  	$tour_travel_agent_location = get_post_meta( $post->ID, 'tour_travel_agent_location', true );
  	$tour_travel_agent_duration = get_post_meta( $post->ID, 'tour_travel_agent_duration', true );
  	$tour_travel_agent_price = get_post_meta( $post->ID, 'tour_travel_agent_price', true );
  	?>
  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'No. of Travelers', 'tour-travel-agent' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="tour_travel_agent_traveler" id="tour_travel_agent_traveler" value="<?php echo esc_attr($tour_travel_agent_traveler); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Location', 'tour-travel-agent' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="tour_travel_agent_location" id="tour_travel_agent_location" value="<?php echo esc_attr($tour_travel_agent_location); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Duration', 'tour-travel-agent' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="tour_travel_agent_duration" id="tour_travel_agent_duration" value="<?php echo esc_attr($tour_travel_agent_duration); ?>" />
		          	</td>
		        </tr>
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Tour Price', 'tour-travel-agent' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="tour_travel_agent_price" id="tour_travel_agent_price" value="<?php echo esc_attr($tour_travel_agent_price); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function tour_travel_agent_save( $post_id ) {
  	if (!isset($_POST['tour_travel_agent_traveler_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['tour_travel_agent_traveler_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	}
  	if( isset( $_POST[ 'tour_travel_agent_traveler' ] ) ) {
    	update_post_meta( $post_id, 'tour_travel_agent_traveler', strip_tags( wp_unslash( $_POST[ 'tour_travel_agent_traveler' ]) ) );
  	}
  	if( isset( $_POST[ 'tour_travel_agent_location' ] ) ) {
    	update_post_meta( $post_id, 'tour_travel_agent_location', strip_tags( wp_unslash( $_POST[ 'tour_travel_agent_location' ]) ) );
  	}
  	if( isset( $_POST[ 'tour_travel_agent_duration' ] ) ) {
    	update_post_meta( $post_id, 'tour_travel_agent_duration', strip_tags( wp_unslash( $_POST[ 'tour_travel_agent_duration' ]) ) );
  	}
  	if( isset( $_POST[ 'tour_travel_agent_price' ] ) ) {
    	update_post_meta( $post_id, 'tour_travel_agent_price', strip_tags( wp_unslash( $_POST[ 'tour_travel_agent_price' ]) ) );
  	}
}
add_action( 'save_post', 'tour_travel_agent_save' );