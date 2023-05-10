<?php
/**
 * The template part for displaying slider
 *
 * @package Tour Travel Agent
 * @subpackage tour_travel_agent
 * @since Tour Travel Agent 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="services-box p-3">    
      <?php if(has_post_thumbnail() && get_theme_mod( 'tour_travel_agent_feature_image_hide',true) != '') { ?>
        <div class="service-image my-2 p-3">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php  the_post_thumbnail(); ?>
            <span class="screen-reader-text"><?php the_title(); ?></span>
          </a>
        </div>
      <?php }?>
      <h2 class="pt-0"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
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
    <hr>
  </article>
</div>
<div class="clearfix"></div>