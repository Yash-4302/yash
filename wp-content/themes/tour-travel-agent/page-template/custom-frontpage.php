<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Tour Travel Agent
 */
get_header(); ?>

<main id="main" role="main">
  
  <?php if( get_theme_mod( 'tour_travel_agent_slider_hide_show') != '' || get_theme_mod('tour_travel_agent_slider_responsive') != ''){ ?>
    <section id="slider">
      <div class="slider-bgimage">
        <?php if(get_theme_mod('tour_travel_agent_slider_background_img') != ''){ ?>
          <img src="<?php echo esc_url(get_theme_mod('tour_travel_agent_slider_background_img')); ?>" alt="<?php echo esc_attr('Slider Background Image', 'tour-travel-agent'); ?>">
        <?php } else{?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider-bg.png" alt="" />
        <?php } ?>
      </div>
      <div class="slider-content">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center ps-lg-5">
            <div class="slider-text ms-md-5 me-4">
              <?php if(get_theme_mod('tour_travel_agent_slider_title') != ''){?>
                <h1><?php echo esc_html(get_theme_mod('tour_travel_agent_slider_title')); ?></h1>
              <?php }?>
              <?php if(get_theme_mod('tour_travel_agent_slider_text') != ''){?>
                <p><?php echo esc_html(get_theme_mod('tour_travel_agent_slider_text')); ?></p>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <?php if(get_theme_mod('tour_travel_agent_location_text') != ''){?>
              <h2><?php echo esc_html(get_theme_mod('tour_travel_agent_location_text')); ?></h2>
            <?php }?>
            <div class="owl-carousel">
              <?php
              $tour_travel_agent_slider_category = get_theme_mod('tour_travel_agent_slider_category');
              if($tour_travel_agent_slider_category){
                $page_query = new WP_Query(array( 'category_name' => esc_html( $tour_travel_agent_slider_category ,'tour-travel-agent')));
                while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="slider-box position-relative">
                    <div class="bx-image">
                      <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                      } else{?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" />
                      <?php } ?>
                    </div>
                    <div class="location-title">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    </div>
                  </div>
                <?php endwhile;
                wp_reset_postdata();
              } ?>
            </div>
          </div>
        </div>
      </div>
    </section> 
  <?php }?>

  <?php do_action( 'tour_travel_agent_before_product_section' ); ?>

  <section id="tour-section" class="py-4">
    <div class="container">
      <div class="tour-head mb-5">
        <?php if(get_theme_mod('tour_travel_agent_section_bg_title') != ''){ ?>
          <h3 class="text-center"><?php echo esc_html(get_theme_mod('tour_travel_agent_section_bg_title')); ?></h4>
        <?php }?>
        <?php if(get_theme_mod('tour_travel_agent_section_title') != ''){ ?>
          <h4 class="text-center"><?php echo esc_html(get_theme_mod('tour_travel_agent_section_title')); ?></h4>
        <?php }?>
      </div>
      <div class="row">
        <?php
        $tour_travel_agent_popular_tour_category = get_theme_mod('tour_travel_agent_popular_tour_category');
        if($tour_travel_agent_popular_tour_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $tour_travel_agent_popular_tour_category ,'tour-travel-agent')));
          while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-3 col-md-6">
              <div class="tour-box mb-4">
                <?php the_post_thumbnail(); ?>
                <div class="tour-content">
                  <h5><?php the_title();?></h5>
                  <p><?php $tour_travel_agent_excerpt = get_the_excerpt(); echo esc_html( tour_travel_agent_string_limit_words( $tour_travel_agent_excerpt, 10)); ?></p>
                  <div class="tour-detail mb-3">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-4">
                        <?php if( get_post_meta($post->ID, 'tour_travel_agent_traveler', true) ) {?>
                          <span><i class="fas fa-user me-1"></i><?php echo esc_html(get_post_meta($post->ID,'tour_travel_agent_traveler',true)); ?></span>
                        <?php }?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-4 px-0">
                        <?php if( get_post_meta($post->ID, 'tour_travel_agent_location', true) ) {?>
                          <span><i class="fas fa-map-marker-alt me-1"></i><?php echo esc_html(get_post_meta($post->ID,'tour_travel_agent_location',true)); ?></span>
                        <?php }?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-4">
                        <?php if( get_post_meta($post->ID, 'tour_travel_agent_duration', true) ) {?>
                          <span><i class="fas fa-clock me-1"></i><?php echo esc_html(get_post_meta($post->ID,'tour_travel_agent_duration',true)); ?></span>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                  <div class="view-price">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-6 align-self-center">
                        <a href="<?php the_permalink(); ?>" class="tour-btn"><?php echo esc_html('View Tour', 'tour-travel-agent'); ?><span class="screen-reader-text"><?php echo esc_html('View Tour', 'tour-travel-agent'); ?></span></a>
                      </div>
                      <div class="col-lg-6 col-md-6 col-6 align-self-center">
                        <?php if( get_post_meta($post->ID, 'tour_travel_agent_price', true) ) {?>
                          <p class="price mb-0"><?php echo esc_html('Price', 'tour-travel-agent'); ?> <span><?php echo esc_html(get_post_meta($post->ID,'tour_travel_agent_price',true)); ?></span></p>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php do_action( 'tour_travel_agent_after_product_section' ); ?>

  <div id="content-ma">
  	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
  	</div>
  </div>
</main>

<?php get_footer(); ?>