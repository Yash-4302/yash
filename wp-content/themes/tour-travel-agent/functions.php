<?php
/**
 * Tour Travel Agent functions and definitions
 *
 * @package Tour Travel Agent
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
/* Breadcrumb Begin */
function tour_travel_agent_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'tour_travel_agent_setup' ) ) :

function tour_travel_agent_setup() {

	$GLOBALS['content_width'] = apply_filters( 'tour_travel_agent_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('tour-travel-agent-homepage-thumb',240,145,true);
	
   	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tour-travel-agent' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', tour_travel_agent_font_url() ) );
	
		// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'tour_travel_agent_activation_notice' );
	}	

}
endif;
add_action( 'after_setup_theme', 'tour_travel_agent_setup' );

// Dashboard Theme Notification
function tour_travel_agent_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dimdissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'tour-travel-agent' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our Tour Travel Agent theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'tour-travel-agent' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=tour_travel_agent_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'tour-travel-agent' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function tour_travel_agent_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'tour-travel-agent' ),
		'description'   => __( 'Appears on blog page sidebar', 'tour-travel-agent' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'tour-travel-agent' ),
		'description'   => __( 'Appears on page sidebar', 'tour-travel-agent' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'         => __( 'Third Column Sidebar', 'tour-travel-agent' ),
		'description' => __( 'Appears on page sidebar', 'tour-travel-agent' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$tour_travel_agent_widget_areas = get_theme_mod('tour_travel_agent_footer_widget_layout', '4');
	for ($i=1; $i<=$tour_travel_agent_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'tour-travel-agent' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'tour-travel-agent' ),
		'description'   => __( 'Appears on shop page', 'tour-travel-agent' ),	
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'tour-travel-agent' ),
		'description'   => __( 'Appears on shop page', 'tour-travel-agent' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'tour_travel_agent_widgets_init' );

/* Theme Font URL */
function tour_travel_agent_font_url() {
	$font_url = '';
	$font_family = array(
	    'ABeeZee:ital@0;1',
		'Abril+Fatfac',
		'Acme',
		'Anton',
		'Architects+Daughter',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Alfa+Slab+One',
		'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad+Script',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree+Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Cherry+Swash:wght@400;700',
		'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming+Soon',
		'Chewy',
		'Days+One',
		'Dosis:wght@200;300;400;500;600;700;800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka+One',
		'Fjalla+One',
		'Francois+One',
		'Frank+Ruhl+Libre:wght@300;400;500;700;900',
		'Gloria+Hallelujah',
		'Great+Vibes',
		'Handlee',
		'Hammersmith+One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie+Flower',
		'IM+Fell+English+SC',
		'Julius+Sans+One',
		'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Lobster',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Marck+Script',
		'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass+Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua+One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent+Marker',
		'Poiret+One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Russo+One',
		'Righteous',
		'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Satisfy',
		'Slabo+13px',
		'Slabo+27px',
		'Sen:wght@400;700;800',
		'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Shadows+Into+Light+Two',
		'Shadows+Into+Light',
		'Sacramento',
		'Shrikhand',
		'Staatliches',
		'Tangerine:wght@400;700',
		'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Unica+One',
		'VT323',
		'Varela+Round',
		'Vampiro+One',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
		'ZCOOL+XiaoWei'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function tour_travel_agent_scripts() {
	wp_enqueue_style( 'tour-travel-agent-font', tour_travel_agent_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'tour-travel-agent-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'owl.carousel-style', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_style( 'tour-travel-agent-block-style', get_template_directory_uri().'/css/block-style.css' );

    // Body
    $tour_travel_agent_body_color = get_theme_mod('tour_travel_agent_body_color', '');
    $tour_travel_agent_body_font_family = get_theme_mod('tour_travel_agent_body_font_family', '');
    $tour_travel_agent_body_font_size = get_theme_mod('tour_travel_agent_body_font_size', '');

	// Paragraph
    $tour_travel_agent_paragraph_color = get_theme_mod('tour_travel_agent_paragraph_color', '');
    $tour_travel_agent_paragraph_font_family = get_theme_mod('tour_travel_agent_paragraph_font_family', '');
    $tour_travel_agent_paragraph_font_size = get_theme_mod('tour_travel_agent_paragraph_font_size', '');
	// "a" tag
	$tour_travel_agent_atag_color = get_theme_mod('tour_travel_agent_atag_color', '');
    $tour_travel_agent_atag_font_family = get_theme_mod('tour_travel_agent_atag_font_family', '');
	// "li" tag
	$tour_travel_agent_li_color = get_theme_mod('tour_travel_agent_li_color', '');
    $tour_travel_agent_li_font_family = get_theme_mod('tour_travel_agent_li_font_family', '');
	// H1
	$tour_travel_agent_h1_color = get_theme_mod('tour_travel_agent_h1_color', '');
    $tour_travel_agent_h1_font_family = get_theme_mod('tour_travel_agent_h1_font_family', '');
    $tour_travel_agent_h1_font_size = get_theme_mod('tour_travel_agent_h1_font_size', '');
	// H2
	$tour_travel_agent_h2_color = get_theme_mod('tour_travel_agent_h2_color', '');
    $tour_travel_agent_h2_font_family = get_theme_mod('tour_travel_agent_h2_font_family', '');
    $tour_travel_agent_h2_font_size = get_theme_mod('tour_travel_agent_h2_font_size', '');
	// H3
	$tour_travel_agent_h3_color = get_theme_mod('tour_travel_agent_h3_color', '');
    $tour_travel_agent_h3_font_family = get_theme_mod('tour_travel_agent_h3_font_family', '');
    $tour_travel_agent_h3_font_size = get_theme_mod('tour_travel_agent_h3_font_size', '');
	// H4
	$tour_travel_agent_h4_color = get_theme_mod('tour_travel_agent_h4_color', '');
    $tour_travel_agent_h4_font_family = get_theme_mod('tour_travel_agent_h4_font_family', '');
    $tour_travel_agent_h4_font_size = get_theme_mod('tour_travel_agent_h4_font_size', '');
	// H5
	$tour_travel_agent_h5_color = get_theme_mod('tour_travel_agent_h5_color', '');
    $tour_travel_agent_h5_font_family = get_theme_mod('tour_travel_agent_h5_font_family', '');
    $tour_travel_agent_h5_font_size = get_theme_mod('tour_travel_agent_h5_font_size', '');
	// H6
	$tour_travel_agent_h6_color = get_theme_mod('tour_travel_agent_h6_color', '');
    $tour_travel_agent_h6_font_family = get_theme_mod('tour_travel_agent_h6_font_family', '');
    $tour_travel_agent_h6_font_size = get_theme_mod('tour_travel_agent_h6_font_size', '');

	$tour_travel_agent_custom_css ='
	    body{
		    color:'.esc_html($tour_travel_agent_body_color).'!important;
		    font-family: '.esc_html($tour_travel_agent_body_font_family).'!important;
		    font-size: '.esc_html($tour_travel_agent_body_font_size).'px !important;
		}
		p,span{
		    color:'.esc_attr($tour_travel_agent_paragraph_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_paragraph_font_family).'!important;
		    font-size: '.esc_attr($tour_travel_agent_paragraph_font_size).'!important;
		}
		a{
		    color:'.esc_attr($tour_travel_agent_atag_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_atag_font_family).';
		}
		li{
		    color:'.esc_attr($tour_travel_agent_li_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_li_font_family).';
		}
		h1{
		    color:'.esc_attr($tour_travel_agent_h1_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_h1_font_family).'!important;
		    font-size: '.esc_attr($tour_travel_agent_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_attr($tour_travel_agent_h2_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_h2_font_family).'!important;
		    font-size: '.esc_attr($tour_travel_agent_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_attr($tour_travel_agent_h3_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_h3_font_family).'!important;
		    font-size: '.esc_attr($tour_travel_agent_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_attr($tour_travel_agent_h4_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_h4_font_family).'!important;
		    font-size: '.esc_attr($tour_travel_agent_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_attr($tour_travel_agent_h5_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_h5_font_family).'!important;
		    font-size: '.esc_attr($tour_travel_agent_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_attr($tour_travel_agent_h6_color).'!important;
		    font-family: '.esc_attr($tour_travel_agent_h6_font_family).'!important;
		    font-size: '.esc_attr($tour_travel_agent_h6_font_size).'!important;
		}'
	;
	wp_add_inline_style( 'tour-travel-agent-basic-style',$tour_travel_agent_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'tour-travel-agent-basic-style',$tour_travel_agent_custom_css );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'tour-travel-agent-custom-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri(). '/js/owl.carousel.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tour_travel_agent_scripts' );

/*radio button sanitization*/

function tour_travel_agent_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function tour_travel_agent_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function tour_travel_agent_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );

  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// URL DEFINES
define('TOUR_TRAVEL_AGENT_SITE_URL',__('https://www.themescaliber.com/themes/free-travel-wordpress-theme/','tour-travel-agent'));
define('TOUR_TRAVEL_AGENT_FREE_THEME_DOC',__('https://www.themescaliber.com/demo/doc/free-travel-wordpress-theme/','tour-travel-agent'));
define('TOUR_TRAVEL_AGENT_SUPPORT',__('https://wordpress.org/support/theme/tour-travel-agent/','tour-travel-agent'));
define('TOUR_TRAVEL_AGENT_REVIEW',__('https://wordpress.org/support/theme/tour-travel-agent/reviews/','tour-travel-agent'));
define('TOUR_TRAVEL_AGENT_BUY_NOW',__('https://www.themescaliber.com/themes/travel-agent-wordpress-theme/','tour-travel-agent'));
define('TOUR_TRAVEL_AGENT_LIVE_DEMO',__('https://www.themescaliber.com/tour-travel-agent-pro/','tour-travel-agent'));
define('TOUR_TRAVEL_AGENT_PRO_DOC',__('https://themescaliber.com/demo/doc/tour-travel-agent-pro/','tour-travel-agent'));
define('TOUR_TRAVEL_AGENT_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','tour-travel-agent'));

function tour_travel_agent_credit_link() {
    echo "<a href=".esc_url(TOUR_TRAVEL_AGENT_SITE_URL)." target='_blank'>".esc_html__('Travel Agent WordPress Theme','tour-travel-agent')."</a>";
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'tour_travel_agent_loop_columns');
if (!function_exists('tour_travel_agent_loop_columns')) {
	function tour_travel_agent_loop_columns() {
		$columns = get_theme_mod( 'tour_travel_agent_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'tour_travel_agent_shop_per_page', 9 );
function tour_travel_agent_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'tour_travel_agent_product_per_page', 9 );
	return $cols;
}

function tour_travel_agent_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function tour_travel_agent_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/** Posts navigation. */
if ( ! function_exists( 'tour_travel_agent_post_navigation' ) ) {
	function tour_travel_agent_post_navigation() {
		$tour_travel_agent_pagination_type = get_theme_mod( 'tour_travel_agent_post_navigation_type', 'numbers' );
		if ( $tour_travel_agent_pagination_type == 'numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation( array(
	            'prev_text'          => __( 'Previous page', 'tour-travel-agent' ),
	            'next_text'          => __( 'Next page', 'tour-travel-agent' ),
	            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'tour-travel-agent' ) . ' </span>',
	        ) );
		}
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';