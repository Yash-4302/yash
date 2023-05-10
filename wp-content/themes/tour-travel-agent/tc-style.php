<?php 
	$tour_travel_agent_custom_css ='';

	/*----------------Width Layout -------------------*/
	$tour_travel_agent_theme_lay = get_theme_mod( 'tour_travel_agent_width_options','Full Layout');
    if($tour_travel_agent_theme_lay == 'Full Layout'){
		$tour_travel_agent_custom_css .='body{';
			$tour_travel_agent_custom_css .='max-width: 100%;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == 'Contained Layout'){
		$tour_travel_agent_custom_css .='body{';
			$tour_travel_agent_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == 'Boxed Layout'){
		$tour_travel_agent_custom_css .='body{';
			$tour_travel_agent_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$tour_travel_agent_custom_css .='}';
	}

	/*------ Button Style -------*/
	$tour_travel_agent_top_buttom_padding = get_theme_mod('tour_travel_agent_top_button_padding');
	$tour_travel_agent_left_right_padding = get_theme_mod('tour_travel_agent_left_button_padding');
	if($tour_travel_agent_top_buttom_padding != false || $tour_travel_agent_left_right_padding != false ){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_top_buttom_padding).'px; padding-bottom: '.esc_attr($tour_travel_agent_top_buttom_padding).'px; padding-left: '.esc_attr($tour_travel_agent_left_right_padding).'px; padding-right: '.esc_attr($tour_travel_agent_left_right_padding).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_button_border_radius = get_theme_mod('tour_travel_agent_button_border_radius');
	$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_button_border_radius).'px;';
	$tour_travel_agent_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$tour_travel_agent_woocommerce_button_padding_top = get_theme_mod('tour_travel_agent_woocommerce_button_padding_top');
	if($tour_travel_agent_woocommerce_button_padding_top != false){
		$tour_travel_agent_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($tour_travel_agent_woocommerce_button_padding_top).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_button_padding_right = get_theme_mod('tour_travel_agent_woocommerce_button_padding_right');
	if($tour_travel_agent_woocommerce_button_padding_right != false){
		$tour_travel_agent_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$tour_travel_agent_custom_css .='padding-left: '.esc_attr($tour_travel_agent_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($tour_travel_agent_woocommerce_button_padding_right).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_button_border_radius = get_theme_mod('tour_travel_agent_woocommerce_button_border_radius');
	if($tour_travel_agent_woocommerce_button_border_radius != false){
		$tour_travel_agent_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_woocommerce_button_border_radius).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_related_product = get_theme_mod('tour_travel_agent_related_product',true);

	if($tour_travel_agent_related_product == false){
		$tour_travel_agent_custom_css .='.related.products{';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_product_border = get_theme_mod('tour_travel_agent_woocommerce_product_border',true);

	if($tour_travel_agent_woocommerce_product_border == false){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='border: none;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_product_padding_top = get_theme_mod('tour_travel_agent_woocommerce_product_padding_top',10);
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_woocommerce_product_padding_top).'px; padding-bottom: '.esc_attr($tour_travel_agent_woocommerce_product_padding_top).'px;';
		$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_woocommerce_product_padding_right = get_theme_mod('tour_travel_agent_woocommerce_product_padding_right',10);
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='padding-left: '.esc_attr($tour_travel_agent_woocommerce_product_padding_right).'px; padding-right: '.esc_attr($tour_travel_agent_woocommerce_product_padding_right).'px;';
		$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_woocommerce_product_border_radius = get_theme_mod('tour_travel_agent_woocommerce_product_border_radius');
	if($tour_travel_agent_woocommerce_product_border_radius != false){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_woocommerce_product_border_radius).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_product_box_shadow = get_theme_mod('tour_travel_agent_woocommerce_product_box_shadow');
	if($tour_travel_agent_woocommerce_product_box_shadow != false){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='box-shadow: '.esc_attr($tour_travel_agent_woocommerce_product_box_shadow).'px '.esc_attr($tour_travel_agent_woocommerce_product_box_shadow).'px '.esc_attr($tour_travel_agent_woocommerce_product_box_shadow).'px #aaa;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_product_sale_font_size = get_theme_mod('tour_travel_agent_product_sale_font_size');
	$tour_travel_agent_custom_css .='.woocommerce span.onsale {';
		$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_product_sale_font_size).'px;';
	$tour_travel_agent_custom_css .='}';

	/*---- Preloader Color ----*/
	$tour_travel_agent_preloader_color = get_theme_mod('tour_travel_agent_preloader_color');
	$tour_travel_agent_preloader_bg_color = get_theme_mod('tour_travel_agent_preloader_bg_color');

	if($tour_travel_agent_preloader_color != false){
		$tour_travel_agent_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_preloader_color).';';
		$tour_travel_agent_custom_css .='}';
	}
	if($tour_travel_agent_preloader_bg_color != false){
		$tour_travel_agent_custom_css .='.preloader{';
			$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_preloader_bg_color).';';
		$tour_travel_agent_custom_css .='}';
	}

	/*---- Copyright css ----*/
	$tour_travel_agent_copyright_fontsize = get_theme_mod('tour_travel_agent_copyright_fontsize',16);
	if($tour_travel_agent_copyright_fontsize != false){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_copyright_fontsize).'px; ';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_copyright_top_bottom_padding = get_theme_mod('tour_travel_agent_copyright_top_bottom_padding',15);
	if($tour_travel_agent_copyright_top_bottom_padding != false){
		$tour_travel_agent_custom_css .='#footer {';
			$tour_travel_agent_custom_css .='padding-top:'.esc_attr($tour_travel_agent_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($tour_travel_agent_copyright_top_bottom_padding).'px; ';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_copyright_alignment = get_theme_mod( 'tour_travel_agent_copyright_alignment','Center');
    if($tour_travel_agent_copyright_alignment == 'Left'){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='text-align:start;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_copyright_alignment == 'Center'){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='text-align:center;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_copyright_alignment == 'Right'){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='text-align:end;';
		$tour_travel_agent_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$tour_travel_agent_woocommerce_sale_top_padding = get_theme_mod('tour_travel_agent_woocommerce_sale_top_padding');
	$tour_travel_agent_woocommerce_sale_left_padding = get_theme_mod('tour_travel_agent_woocommerce_sale_left_padding');
	$tour_travel_agent_custom_css .=' .woocommerce span.onsale{';
		$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($tour_travel_agent_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($tour_travel_agent_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($tour_travel_agent_woocommerce_sale_left_padding).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_woocommerce_sale_border_radius = get_theme_mod('tour_travel_agent_woocommerce_sale_border_radius', 0);
	$tour_travel_agent_custom_css .='.woocommerce span.onsale{';
		$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_woocommerce_sale_border_radius).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_sale_position = get_theme_mod( 'tour_travel_agent_sale_position','right');
    if($tour_travel_agent_sale_position == 'left'){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product .onsale{';
			$tour_travel_agent_custom_css .='left: -10px; right: auto;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_sale_position == 'right'){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product .onsale{';
			$tour_travel_agent_custom_css .='left: auto; right: 0;';
		$tour_travel_agent_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$tour_travel_agent_footer_background_color = get_theme_mod('tour_travel_agent_footer_background_color');
	$tour_travel_agent_custom_css .='.footertown{';
		$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_footer_background_color).';';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_footer_background_img = get_theme_mod('tour_travel_agent_footer_background_img');
	if($tour_travel_agent_footer_background_img != false){
		$tour_travel_agent_custom_css .='.footertown{';
			$tour_travel_agent_custom_css .='background: url('.esc_attr($tour_travel_agent_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$tour_travel_agent_custom_css .='}';
	}

	/*---- Comment form ----*/
	$tour_travel_agent_comment_width = get_theme_mod('tour_travel_agent_comment_width', '100');
	$tour_travel_agent_custom_css .='#comments textarea{';
		$tour_travel_agent_custom_css .=' width:'.esc_attr($tour_travel_agent_comment_width).'%;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_comment_submit_text = get_theme_mod('tour_travel_agent_comment_submit_text', 'Post Comment');
	if($tour_travel_agent_comment_submit_text == ''){
		$tour_travel_agent_custom_css .='#comments p.form-submit {';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_comment_title = get_theme_mod('tour_travel_agent_comment_title', 'Leave a Reply');
	if($tour_travel_agent_comment_title == ''){
		$tour_travel_agent_custom_css .='#comments h2#reply-title {';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	// Sticky Header padding
	$tour_travel_agent_sticky_header_padding = get_theme_mod('tour_travel_agent_sticky_header_padding');
	$tour_travel_agent_custom_css .='.fixed-header{';
		$tour_travel_agent_custom_css .=' padding-top:'.esc_attr($tour_travel_agent_sticky_header_padding).'px; padding-bottom:'.esc_attr($tour_travel_agent_sticky_header_padding).'px;';
	$tour_travel_agent_custom_css .='}';

	// Navigation Font Size 
	$tour_travel_agent_nav_font_size = get_theme_mod('tour_travel_agent_nav_font_size');
	if($tour_travel_agent_nav_font_size != false){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_nav_font_size).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_navigation_case = get_theme_mod('tour_travel_agent_navigation_case', 'uppercase');
	if($tour_travel_agent_navigation_case == 'uppercase' ){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .=' text-transform: uppercase;';
		$tour_travel_agent_custom_css .='}';
	}elseif($tour_travel_agent_navigation_case == 'capitalize' ){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .=' text-transform: capitalize;';
		$tour_travel_agent_custom_css .='}';
	}


	//Site title Font size
	$tour_travel_agent_site_title_fontsize = get_theme_mod('tour_travel_agent_site_title_fontsize');
	$tour_travel_agent_custom_css .='.logo h1, .logo p.site-title{';
		$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_site_title_fontsize).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_site_description_fontsize = get_theme_mod('tour_travel_agent_site_description_fontsize');
	$tour_travel_agent_custom_css .='.logo p.site-description{';
		$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_site_description_fontsize).'px;';
	$tour_travel_agent_custom_css .='}';

	/*----- Featured image css -----*/
	$tour_travel_agent_featured_image_border_radius = get_theme_mod('tour_travel_agent_featured_image_border_radius');
	if($tour_travel_agent_featured_image_border_radius != false){
		$tour_travel_agent_custom_css .='.inner-service .service-image img{';
			$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_featured_image_border_radius).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_featured_image_box_shadow = get_theme_mod('tour_travel_agent_featured_image_box_shadow');
	if($tour_travel_agent_featured_image_box_shadow != false){
		$tour_travel_agent_custom_css .='.inner-service .service-image img{';
			$tour_travel_agent_custom_css .='box-shadow: 8px 8px '.esc_attr($tour_travel_agent_featured_image_box_shadow).'px #aaa;';
		$tour_travel_agent_custom_css .='}';
	} 

	/*------Shop page pagination ---------*/
	$tour_travel_agent_shop_page_pagination = get_theme_mod('tour_travel_agent_shop_page_pagination', true);
	if($tour_travel_agent_shop_page_pagination == false){
		$tour_travel_agent_custom_css .= '.woocommerce nav.woocommerce-pagination {';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	/*------- Post into blocks ------*/
	$tour_travel_agent_post_blocks = get_theme_mod('tour_travel_agent_post_blocks', 'Without box');
	if($tour_travel_agent_post_blocks == 'Within box' ){
		$tour_travel_agent_custom_css .='.services-box{';
			$tour_travel_agent_custom_css .=' border: 1px solid #222;';
		$tour_travel_agent_custom_css .='}';
	}

	//  ------------ Mobile Media Options ----------
	$tour_travel_agent_hide_topbar_responsive = get_theme_mod('tour_travel_agent_hide_topbar_responsive',false);
	if($tour_travel_agent_hide_topbar_responsive == true && get_theme_mod('tour_travel_agent_show_topbar',false) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.topbar{';
			$tour_travel_agent_custom_css .='display:none;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_hide_topbar_responsive == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.topbar{';
			$tour_travel_agent_custom_css .='display:none;';
		$tour_travel_agent_custom_css .='} }';
	}

	$tour_travel_agent_responsive_sticky_header = get_theme_mod('tour_travel_agent_responsive_sticky_header',false);
	if($tour_travel_agent_responsive_sticky_header == true && get_theme_mod('tour_travel_agent_sticky_header',false) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.fixed-header{';
			$tour_travel_agent_custom_css .='position:static !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_responsive_sticky_header == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.fixed-header{';
			$tour_travel_agent_custom_css .='position:static !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	// responsive slider
	if (get_theme_mod('tour_travel_agent_slider_responsive',true) == true && get_theme_mod('tour_travel_agent_slider_hide_show',false) == false) {
		$tour_travel_agent_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$tour_travel_agent_custom_css .=' display: none;';
		$tour_travel_agent_custom_css .='} }';
	}
	if (get_theme_mod('tour_travel_agent_slider_responsive',true) == false) {
		$tour_travel_agent_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$tour_travel_agent_custom_css .=' display: none;';
		$tour_travel_agent_custom_css .='} }';
	}

	$tour_travel_agent_responsive_show_back_to_top = get_theme_mod('tour_travel_agent_responsive_show_back_to_top',true);
	if($tour_travel_agent_responsive_show_back_to_top == true && get_theme_mod('tour_travel_agent_show_back_to_top',true) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.scrollup{';
			$tour_travel_agent_custom_css .='visibility:hidden;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_responsive_show_back_to_top == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.scrollup{';
			$tour_travel_agent_custom_css .='visibility:hidden;';
		$tour_travel_agent_custom_css .='} }';
	}

	$tour_travel_agent_responsive_preloader_hide = get_theme_mod('tour_travel_agent_responsive_preloader_hide',false);
	if($tour_travel_agent_responsive_preloader_hide == true && get_theme_mod('tour_travel_agent_preloader_hide',false) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.preloader{';
			$tour_travel_agent_custom_css .='display:none !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_responsive_preloader_hide == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.preloader{';
			$tour_travel_agent_custom_css .='display:none !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	// menu font weight
	$tour_travel_agent_theme_lay = get_theme_mod( 'tour_travel_agent_font_weight_menu_option','600');
    if($tour_travel_agent_theme_lay == '100'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight:100;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '200'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 200;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '300'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 300;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '400'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 400;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '500'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 500;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '600'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 600;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '700'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 700;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '800'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 800;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '900'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 900;';
		$tour_travel_agent_custom_css .='}';
	}

	// menu color
	$tour_travel_agent_menu_color = get_theme_mod('tour_travel_agent_menu_color');

	$tour_travel_agent_custom_css .='.primary-navigation a,.primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a{';
			$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_menu_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// menu hover color
	$tour_travel_agent_menu_hover_color = get_theme_mod('tour_travel_agent_menu_hover_color');
	$tour_travel_agent_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, .primary-navigation ul.sub-menu a:hover, .primary-navigation ul.sub-menu li a:hover{';
			$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_menu_hover_color).' !important;';
	$tour_travel_agent_custom_css .='}';

	// Submenu color
	$tour_travel_agent_submenu_menu_color = get_theme_mod('tour_travel_agent_submenu_menu_color');
	$tour_travel_agent_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a{';
			$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_submenu_menu_color).' !important;';
	$tour_travel_agent_custom_css .='}';

	/*-------- Copyright background css -------*/
	$tour_travel_agent_copyright_background_color = get_theme_mod('tour_travel_agent_copyright_background_color');
	$tour_travel_agent_custom_css .='#footer{';
		$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_copyright_background_color).';';
	$tour_travel_agent_custom_css .='}';

	// Logo padding
	$tour_travel_agent_logo_padding = get_theme_mod('tour_travel_agent_logo_padding');
	$tour_travel_agent_custom_css .='.logo{';
		$tour_travel_agent_custom_css .=' padding:'.esc_attr($tour_travel_agent_logo_padding).'px;';
	$tour_travel_agent_custom_css .='}';

	 // site title color option
	$tour_travel_agent_site_title_color_setting = get_theme_mod('tour_travel_agent_site_title_color_setting');
	$tour_travel_agent_custom_css .=' .logo h1 a, .logo p a{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_site_title_color_setting).';';
	$tour_travel_agent_custom_css .='} ';

	$tour_travel_agent_tagline_color_setting = get_theme_mod('tour_travel_agent_tagline_color_setting');
	$tour_travel_agent_custom_css .=' .logo p.site-description{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_tagline_color_setting).';';
	$tour_travel_agent_custom_css .='} ';

	// Logo margin
	$tour_travel_agent_logo_margin = get_theme_mod('tour_travel_agent_logo_margin');
	$tour_travel_agent_custom_css .='.logo{';
		$tour_travel_agent_custom_css .=' margin:'.esc_attr($tour_travel_agent_logo_margin).'px;';
	$tour_travel_agent_custom_css .='}';

   // menu color option
	$tour_travel_agent_menu_color_setting = get_theme_mod('tour_travel_agent_menu_color_setting');
	$tour_travel_agent_custom_css .='.toggle-menu i{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_menu_color_setting).';';
	$tour_travel_agent_custom_css .='} ';

	// Single post image border radious
	$tour_travel_agent_single_post_img_border_radius = get_theme_mod('tour_travel_agent_single_post_img_border_radius', 0);
	$tour_travel_agent_custom_css .='.feature-box img{';
		$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_single_post_img_border_radius).'px;';
	$tour_travel_agent_custom_css .='}';

	// Single post image box shadow
	$tour_travel_agent_single_post_img_box_shadow = get_theme_mod('tour_travel_agent_single_post_img_box_shadow',0);
	$tour_travel_agent_custom_css .='.feature-box img{';
		$tour_travel_agent_custom_css .='box-shadow: '.esc_attr($tour_travel_agent_single_post_img_box_shadow).'px '.esc_attr($tour_travel_agent_single_post_img_box_shadow).'px '.esc_attr($tour_travel_agent_single_post_img_box_shadow).'px #ccc;';
	$tour_travel_agent_custom_css .='}';