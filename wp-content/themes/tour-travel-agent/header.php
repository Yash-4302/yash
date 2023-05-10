<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ma">
 *
 * @package Tour Travel Agent
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="main-bodybox">
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<?php if(get_theme_mod('tour_travel_agent_preloader_hide',false)!= '' || get_theme_mod('tour_travel_agent_responsive_preloader_hide',false) != ''){ ?>
    <?php if(get_theme_mod( 'tour_travel_agent_preloader_type','center-square') == 'center-square'){ ?>
	    <div class='preloader'>
		    <div class='preloader-squares'>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
		    </div>
			</div>
    <?php }else if(get_theme_mod( 'tour_travel_agent_preloader_type') == 'chasing-square') {?>    
      <div class='preloader'>
				<div class='preloader-chasing-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
				</div>
			</div>
    <?php }?>
	<?php }?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'tour-travel-agent' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'tour-travel-agent' );?></span></a>
		<div id="header">
			<?php if(get_theme_mod('tour_travel_agent_show_topbar',false) == true || get_theme_mod('tour_travel_agent_hide_topbar_responsive',true) == true) {?>
		  	<div class="topbar">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col-lg-3 col-md-6 align-self-center contact">
		  					<?php if(get_theme_mod('tour_travel_agent_topbar_phone') != ''){?>
		  						<a href="tel:<?php echo esc_attr(get_theme_mod('tour_travel_agent_topbar_phone')); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html('Phone:','tour-travel-agent'); ?> <?php echo esc_html(get_theme_mod('tour_travel_agent_topbar_phone')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_travel_agent_topbar_phone')); ?></span></a>
		  					<?php }?>
		  				</div>
		  				<div class="col-lg-3 col-md-6 align-self-center contact">
		  					<?php if(get_theme_mod('tour_travel_agent_topbar_email') != ''){?>
		  						<a href="mailto:<?php echo esc_attr(get_theme_mod('tour_travel_agent_topbar_email')); ?>"><i class="fas fa-envelope me-2"></i><?php echo esc_html('Email:','tour-travel-agent'); ?> <?php echo esc_html(get_theme_mod('tour_travel_agent_topbar_email')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_travel_agent_topbar_email')); ?></span></a>
		  					<?php }?>
		  				</div>
		  				<div class="col-lg-4 col-md-6 align-self-center contact">
		  					<?php if(get_theme_mod('tour_travel_agent_topbar_location') != ''){?>
		  						<span><i class="fas fa-envelope me-2"></i><?php echo esc_html('Location:','tour-travel-agent'); ?> <?php echo esc_html(get_theme_mod('tour_travel_agent_topbar_location')); ?></span>
		  					<?php }?>
		  				</div>
		  				<div class="col-lg-2 col-md-6 align-self-center ps-md-0">
		  					<div class="social-icon text-lg-end text-center">
		  						<?php if(get_theme_mod('tour_travel_agent_facebook_url') != ''){ ?>
		  							<a href="<?php echo esc_url(get_theme_mod('tour_travel_agent_facebook_url')); ?>"><i class="fab fa-facebook-square"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'tour-travel-agent'); ?></span></a>
		  						<?php }?>
		  						<?php if(get_theme_mod('tour_travel_agent_twitter_url') != ''){ ?>
		  							<a href="<?php echo esc_url(get_theme_mod('tour_travel_agent_twitter_url')); ?>"><i class="fab fa-twitter-square"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'tour-travel-agent'); ?></span></a>
		  						<?php }?>
		  						<?php if(get_theme_mod('tour_travel_agent_linkedin_url') != ''){ ?>
		  							<a href="<?php echo esc_url(get_theme_mod('tour_travel_agent_linkedin_url')); ?>"><i class="fab fa-linkedin"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'tour-travel-agent'); ?></span></a>
		  						<?php }?>
		  						<?php if(get_theme_mod('tour_travel_agent_instagram_url') != ''){ ?>
		  							<a href="<?php echo esc_url(get_theme_mod('tour_travel_agent_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'tour-travel-agent'); ?></span></a>
		  						<?php }?>
		  					</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  <?php }?>
		  <div class="middle-header">
		  	<div class="container">
		  		<div class="row">
		  			<div class="col-lg-3 col-md-4 col-9 align-self-center">
		  				<div class="logo">
				     	 	<?php if ( has_custom_logo() ) : ?>
			     	    	<div class="site-logo"><?php the_custom_logo(); ?></div>
		            <?php endif; ?>
		            <?php if( get_theme_mod( 'tour_travel_agent_site_title',true) != '') { ?>
			            <?php $blog_info = get_bloginfo( 'name' ); ?>
			            <?php if ( ! empty( $blog_info ) ) : ?>
				            <?php if ( is_front_page() && is_home() ) : ?>
				              <h1 class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				            <?php else : ?>
				              <p class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				            <?php endif; ?>
			            <?php endif; ?>
				        <?php }?>
				        <?php if( get_theme_mod( 'tour_travel_agent_site_tagline',true) != '') { ?>
			            <?php
			            $description = get_bloginfo( 'description', 'display' );
			            if ( $description || is_customize_preview() ) :
			            ?>
				            <p class="site-description">
				              <?php echo esc_html($description); ?>
				            </p>
			            <?php endif; ?>
				        <?php }?>
					    </div>
		  			</div>
		  			<div class="<?php if(get_theme_mod('tour_travel_agent_book_btn_text') != '' || get_theme_mod('tour_travel_agent_book_btn_url') != ''){?> col-lg-7 col-md-5 <?php } else {?> col-lg-9 col-md-8 <?php }?> col-3 align-self-center">
		  				<div class="menubox <?php if( get_theme_mod( 'tour_travel_agent_sticky_header', false) != '' || get_theme_mod('tour_travel_agent_responsive_sticky_header',false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
								<?php if(has_nav_menu('primary')){ ?>
							   	<div class="toggle-menu responsive-menu text-end">
		               	<button role="tab" onclick="tour_travel_agent_menu_open()"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_responsive_open_menu_icon','fas fa-bars'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','tour-travel-agent'); ?></span></button>
		             	</div>
		             	<div id="menu-sidebar" class="nav side-menu">
		                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'tour-travel-agent' ); ?>">
		                  <?php 
		                    wp_nav_menu( array( 
		                      'theme_location' => 'primary',
		                      'container_class' => 'main-menu-navigation clearfix' ,
		                      'menu_class' => 'clearfix',
		                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 p-0">%3$s</ul>',
		                      'fallback_cb' => 'wp_page_menu',
		                    ) ); 
		                  ?>
		                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="tour_travel_agent_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_responsive_close_menu_icon','fas fa-times'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','tour-travel-agent'); ?></span></a>
		                </nav>
		            	</div>
		          	<?php }?>
		          </div>
						</div>
						<?php if (get_theme_mod('tour_travel_agent_book_btn_text') != '' || get_theme_mod('tour_travel_agent_book_btn_url') != ''){?>
							<div class="col-lg-2 col-md-3 align-self-center text-md-end text-center">
								<a href="<?php echo esc_url(get_theme_mod('tour_travel_agent_book_btn_url')); ?>" class="book-btn"><?php echo esc_html(get_theme_mod('tour_travel_agent_book_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_travel_agent_book_btn_text')); ?></span></a>
							</div>
						<?php }?>
		  		</div>
		  	</div>
		  </div>
		</div>
	</header>