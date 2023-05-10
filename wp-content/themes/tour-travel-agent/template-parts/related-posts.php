<?php 
if ( ! function_exists( 'tour_travel_agent_related_posts_function' ) ) {
	function tour_travel_agent_related_posts_function() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'    => absint( get_theme_mod( 'tour_travel_agent_related_post_count', '3' ) ),
		);
		// Related by categories
		if ( get_theme_mod( 'tour_travel_agent_post_order', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'tour_travel_agent_post_order', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();

		return $query;
	}
}

$related_posts = tour_travel_agent_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

	<div class="related-posts clearfix py-3">
		<?php if ( get_theme_mod('tour_travel_agent_related_posts_title','Related Posts') != '' ) {?>
			<h2 class="related-posts-main-title"><?php echo esc_html( get_theme_mod('tour_travel_agent_related_posts_title',__('Related Posts','tour-travel-agent')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
				<div class="col-lg-4 col-md-4">
					<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
					    <div class="services-box p-3">    
					      	<?php if(has_post_thumbnail() && get_theme_mod( 'tour_travel_agent_feature_image_hide',true) != '') { ?>
						        <div class="service-image mb-2">
						          <a href="<?php echo esc_url( get_permalink() ); ?>">
						            <?php  the_post_thumbnail(); ?>
						            <span class="screen-reader-text"><?php esc_html(the_title()); ?></span>
						          </a>
						        </div>
					      	<?php }?>
					      <h3 class="pt-0"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
					      <div class="lower-box">
					        <?php if(get_the_excerpt()) { ?>
					            <p><?php $tour_travel_agent_excerpt = get_the_excerpt(); echo esc_html( tour_travel_agent_string_limit_words( $tour_travel_agent_excerpt, esc_attr(get_theme_mod('tour_travel_agent_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('tour_travel_agent_button_excerpt_suffix','[...]') ); ?></p>
					        <?php }?>
					        <?php if ( get_theme_mod('tour_travel_agent_post_button_text','READ MORE') != '' ) {?>
					          	<div class="read-btn mt-4">
					            	<a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('tour_travel_agent_post_button_text',__( 'READ MORE','tour-travel-agent' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('tour_travel_agent_post_button_text',__( 'READ MORE','tour-travel-agent' )) ); ?></span>
					            	</a>
					          	</div>
					        <?php }?>
					      </div>
					    </div>
				    </article>
				</div> 
			<?php endwhile; ?>
		</div>

	</div><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_postdata(); ?>