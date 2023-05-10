<?php
//about theme info
add_action( 'admin_menu', 'tour_travel_agent_gettingstarted' );
function tour_travel_agent_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'tour-travel-agent'), esc_html__('Get Started', 'tour-travel-agent'), 'edit_theme_options', 'tour_travel_agent_guide', 'tour_travel_agent_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function tour_travel_agent_admin_theme_style() {
   wp_enqueue_style('tour-travel-agent-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'tour_travel_agent_admin_theme_style');

//guidline for about theme
function tour_travel_agent_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'tour-travel-agent' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="tour_travel_agent_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'tour-travel-agent' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="tour_travel_agent_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'tour-travel-agent' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="tour_travel_agent_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'tour-travel-agent' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to tour travel agent Theme', 'tour-travel-agent' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'tour-travel-agent' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'tour-travel-agent'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( TOUR_TRAVEL_AGENT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'tour-travel-agent'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Tour Travel Agent is a stunning WordPress theme for representing visa passport support, travel package arrangers, immigration support, visa and passport services, reservations as well as hotel bookings, yacht bookings, travel destinations explorer and tour companies, travel guides and also suits any travel and tourism blog. It is a multipurpose theme with a clean and user-friendly interface giving an easy-to-use layout for beginners as well as novices for sure. Professionals have crafted this theme with some well-written and highly optimized codes in order to get a lightweight design that loads without any delay and delivers faster page load times. With its responsive design supporting multiple devices, your website is going to look absolutely phenomenal. Retina-ready display along with nicely crafted content spaces for publishing the details look absolutely great. Call to Action Button (CTA) are useful for guiding the audience and making the whole website interactive. CSS animations add more style and life to the existing design and with social media icons, you can extend your reach to the audience far and wide. With SEO friendly theme, getting to the top ranks in the SERP is no more a tough task.', 'tour-travel-agent' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'tour travel agent Theme Information', 'tour-travel-agent' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'tour-travel-agent' ); ?></a></p>
				<p><a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'tour-travel-agent' ); ?></a></p>
				<p><a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'tour-travel-agent' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Tour Travel Agent Pro Theme', 'tour-travel-agent' ); ?></h4>
				<P><?php esc_html_e( 'Travel is the most adventurous and interesting thing and if you are looking to create a travel-related website, it needs to look equally interesting and engaging. With this Travel Agent WordPress Theme, it is easily possible for you to get a wonderful website for your travel agency. You may also share your portfolio as a travel agent through your personalized website. With this theme, you get a stunning homepage that features a full-width slider for the display of beautiful travel destinations, hotels, and resorts from all over the world. Loaded with useful Call to Action Buttons (CTA), it will help you get better conversion rates. Travel Agent WordPress Theme gives you a completely customizable design that makes it possible for you to transform the entire default design into something that reflects your business and services. For that, easy customization options are provided and the best part is you don’t need to know the coding stuff. There is a space to show your achievements and with its Testimonial section, you can share the experience of your clients for a positive impression on the target audience. The Woocommerce compatibility of this theme is going to make it easy to sell travel tickets online. Handy shortcodes are also available with this Travel Agent WordPress Theme.', 'tour-travel-agent' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'tour-travel-agent' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'tour-travel-agent' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'tour-travel-agent' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'tour-travel-agent' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'tour-travel-agent' ); ?></P>
					<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'tour-travel-agent' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'tour-travel-agent'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'tour-travel-agent' ); ?></P>
					<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'tour-travel-agent'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>