<?php
/**
 * Tour Travel Agent Theme Customizer
 *
 * @package Tour Travel Agent
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tour_travel_agent_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'tour_travel_agent_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'tour_travel_agent_customize_partial_blogdescription',
		)
	);

	//add home page setting pannel
	$wp_customize->add_panel( 'tour_travel_agent_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'tour-travel-agent' ),
	) );

    $tour_travel_agent_font_array= array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'tour_travel_agent_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'tour-travel-agent' ),
		'priority'   => 30,
		'panel' => 'tour_travel_agent_panel_id'
	) );

	// This is Body Color setting
	$wp_customize->add_setting( 'tour_travel_agent_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_body_color', array(
		'label' => __('Body Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('tour_travel_agent_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
		'tour_travel_agent_body_font_family', array(
		'section'  => 'tour_travel_agent_typography',
		'label'    => __( 'Body Fonts','tour-travel-agent'),
		'type'     => 'select',
		'choices'  => $tour_travel_agent_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('tour_travel_agent_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_body_font_size',array(
		'label'	=> __('Body Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_body_font_size',
		'type'	=> 'text'
	));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_paragraph_color', array(
		'label' => __('Paragraph Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_paragraph_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( 'Paragraph Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	$wp_customize->add_setting('tour_travel_agent_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_atag_color', array(
		'label' => __('"a" Tag Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_atag_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( '"a" Tag Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_li_color', array(
		'label' => __('"li" Tag Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_li_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( '"li" Tag Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_h1_color', array(
		'label' => __('h1 Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_h1_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( 'h1 Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('tour_travel_agent_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_h1_font_size',array(
		'label'	=> __('h1 Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_h2_color', array(
		'label' => __('h2 Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_h2_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( 'h2 Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('tour_travel_agent_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_h2_font_size',array(
		'label'	=> __('h2 Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_h3_color', array(
		'label' => __('h3 Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_h3_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( 'h3 Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('tour_travel_agent_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_h3_font_size',array(
		'label'	=> __('h3 Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_h4_color', array(
		'label' => __('h4 Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_h4_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( 'h4 Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('tour_travel_agent_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_h4_font_size',array(
		'label'	=> __('h4 Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_h5_color', array(
		'label' => __('h5 Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_h5_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( 'h5 Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('tour_travel_agent_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_h5_font_size',array(
		'label'	=> __('h5 Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'tour_travel_agent_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_h6_color', array(
		'label' => __('h6 Color', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_typography',
		'settings' => 'tour_travel_agent_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('tour_travel_agent_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_travel_agent_h6_font_family', array(
	    'section'  => 'tour_travel_agent_typography',
	    'label'    => __( 'h6 Fonts','tour-travel-agent'),
	    'type'     => 'select',
	    'choices'  => $tour_travel_agent_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('tour_travel_agent_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_travel_agent_h6_font_size',array(
		'label'	=> __('h6 Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_typography',
		'setting'	=> 'tour_travel_agent_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'tour_travel_agent_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'tour-travel-agent' ),
		'priority'   => 30,
		'panel' => 'tour_travel_agent_panel_id'
	) );

	$wp_customize->add_setting('tour_travel_agent_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control('tour_travel_agent_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','tour-travel-agent'),
        'section' => 'tour_travel_agent_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','tour-travel-agent'),
            'Contained Layout' => __('Contained Layout','tour-travel-agent'),
            'Boxed Layout' => __('Boxed Layout','tour-travel-agent'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tour_travel_agent_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	) );
	$wp_customize->add_control('tour_travel_agent_theme_options', array(
        'type' => 'radio',
        'label' => __('Sidebar Layout','tour-travel-agent'),
        'section' => 'tour_travel_agent_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','tour-travel-agent'),
            'Right Sidebar' => __('Right Sidebar','tour-travel-agent'),
            'One Column' => __('One Column','tour-travel-agent'),
            'Three Columns' => __('Three Columns','tour-travel-agent'),
            'Four Columns' => __('Four Columns','tour-travel-agent'),
            'Grid Layout' => __('Grid Layout','tour-travel-agent')
        ),
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tour_travel_agent_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	) );
	$wp_customize->add_control('tour_travel_agent_single_post_sidebar', array(
        'type' => 'radio',
        'label' => __('Single Post Sidebar Layout','tour-travel-agent'),
        'section' => 'tour_travel_agent_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','tour-travel-agent'),
            'Right Sidebar' => __('Right Sidebar','tour-travel-agent'),
            'One Column' => __('One Column','tour-travel-agent'),
        ),
    ));

    $wp_customize->add_setting( 'tour_travel_agent_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_travel_agent_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','tour-travel-agent' ),
        'section' => 'tour_travel_agent_left_right'
    ));

    //Topbar
	$wp_customize->add_section('tour_travel_agent_topbar',array(
		'title'	=> __('Topbar','tour-travel-agent'),
		'priority'	=> null,
		'panel' => 'tour_travel_agent_panel_id',
	));

	$wp_customize->add_setting( 'tour_travel_agent_show_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_travel_agent_show_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show/Hide Topbar','tour-travel-agent' ),
        'section' => 'tour_travel_agent_topbar'
    ));

    $wp_customize->add_setting('tour_travel_agent_topbar_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_topbar_phone',array(
		'label'	=> __('Add Phone Number','tour-travel-agent'),
		'section' => 'tour_travel_agent_topbar',
		'type'	=> 'text'
	));

    $wp_customize->add_setting('tour_travel_agent_topbar_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('tour_travel_agent_topbar_email',array(
		'label'	=> __('Add Email Address','tour-travel-agent'),
		'section' => 'tour_travel_agent_topbar',
		'type'	=> 'text'
	));

    $wp_customize->add_setting('tour_travel_agent_topbar_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_topbar_location',array(
		'label'	=> __('Add Location','tour-travel-agent'),
		'section' => 'tour_travel_agent_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tour_travel_agent_facebook_url',array(
		'label'	=> __('Add Facebook URL','tour-travel-agent'),
		'section' => 'tour_travel_agent_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tour_travel_agent_twitter_url',array(
		'label'	=> __('Add Twitter URL','tour-travel-agent'),
		'section' => 'tour_travel_agent_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tour_travel_agent_linkedin_url',array(
		'label'	=> __('Add Linkedin URL','tour-travel-agent'),
		'section' => 'tour_travel_agent_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tour_travel_agent_instagram_url',array(
		'label'	=> __('Add Instagram URL','tour-travel-agent'),
		'section' => 'tour_travel_agent_topbar',
		'type'	=> 'text'
	));

	//Header
	$wp_customize->add_section('tour_travel_agent_header',array(
		'title'	=> __('Header','tour-travel-agent'),
		'priority'	=> null,
		'panel' => 'tour_travel_agent_panel_id',
	));

	//Sticky Header
	$wp_customize->add_setting( 'tour_travel_agent_sticky_header',array(
      	'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_travel_agent_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','tour-travel-agent' ),
        'section' => 'tour_travel_agent_header'
    ));

    $wp_customize->add_setting('tour_travel_agent_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_sticky_header_padding', array(
		'label'	=> __('Sticky Header Padding','tour-travel-agent'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'tour_travel_agent_header',
		'type'=> 'number',
	));

	$wp_customize->add_setting('tour_travel_agent_book_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_book_btn_text',array(
		'label'	=> __('Add Button Text','tour-travel-agent'),
		'section' => 'tour_travel_agent_header',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_book_btn_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('tour_travel_agent_book_btn_url',array(
		'label'	=> __('Add Button URL','tour-travel-agent'),
		'section' => 'tour_travel_agent_header',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control('tour_travel_agent_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','tour-travel-agent'),
        'section' => 'tour_travel_agent_header',
        'choices' => array(
            'uppercase' => __('Uppercase','tour-travel-agent'),
            'capitalize' => __('Capitalize','tour-travel-agent'),
        ),
	) );

	$wp_customize->add_setting( 'tour_travel_agent_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float',
	) );
	$wp_customize->add_control( 'tour_travel_agent_nav_font_size', array(
		'label' => __( 'Navigation Font Size','tour-travel-agent' ),
		'section'     => 'tour_travel_agent_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('tour_travel_agent_font_weight_menu_option',array(
        'default' => '600',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
    ));
    $wp_customize->add_control('tour_travel_agent_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','tour-travel-agent'),
        'section' => 'tour_travel_agent_header',
        'choices' => array(
            '100' => __('100','tour-travel-agent'),
            '200' => __('200','tour-travel-agent'),
            '300' => __('300','tour-travel-agent'),
            '400' => __('400','tour-travel-agent'),
            '500' => __('500','tour-travel-agent'),
            '600' => __('600','tour-travel-agent'),
            '700' => __('700','tour-travel-agent'),
            '800' => __('800','tour-travel-agent'),
            '900' => __('900','tour-travel-agent'),
        ),
	) );

	$wp_customize->add_setting('tour_travel_agent_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_travel_agent_menu_color', array(
		'label'    => __('Menu Color', 'tour-travel-agent'),
		'section'  => 'tour_travel_agent_header',
		'settings' => 'tour_travel_agent_menu_color',
	)));

	$wp_customize->add_setting('tour_travel_agent_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_travel_agent_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'tour-travel-agent'),
		'section'  => 'tour_travel_agent_header',
		'settings' => 'tour_travel_agent_menu_hover_color',
	)));

	$wp_customize->add_setting('tour_travel_agent_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_travel_agent_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'tour-travel-agent'),
		'section'  => 'tour_travel_agent_header',
		'settings' => 'tour_travel_agent_submenu_menu_color',
	)));

	// Preloader
	$wp_customize->add_setting( 'tour_travel_agent_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_travel_agent_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','tour-travel-agent' ),
        'section' => 'tour_travel_agent_header'
    ));

    $wp_customize->add_setting('tour_travel_agent_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control( 'tour_travel_agent_preloader_type', array(
		'label' => __( 'Preloader Type','tour-travel-agent' ),
		'section' => 'tour_travel_agent_header',
		'type'  => 'select',
		'settings' => 'tour_travel_agent_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','tour-travel-agent'),
		    'chasing-square' => __('Chasing Square','tour-travel-agent'),
	    ),
	));

	$wp_customize->add_setting( 'tour_travel_agent_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'tour_travel_agent_header',
	    'settings' => 'tour_travel_agent_preloader_color',
  	)));

  	$wp_customize->add_setting( 'tour_travel_agent_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'tour_travel_agent_header',
	    'settings' => 'tour_travel_agent_preloader_bg_color',
  	)));

	//home page slider
	$wp_customize->add_section( 'tour_travel_agent_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'tour-travel-agent' ),
		'priority'   => null,
		'panel' => 'tour_travel_agent_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'tour_travel_agent_slider_hide_show',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'tour_travel_agent_customize_partial_tour_travel_agent_slider_hide_show',
		)
	);

	$wp_customize->add_setting('tour_travel_agent_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_travel_agent_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider','tour-travel-agent'),
	   'section' => 'tour_travel_agent_slidersettings',
	));

	$wp_customize->add_setting('tour_travel_agent_slider_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_slider_title',array(
		'label'	=> esc_html__('Slider Title','tour-travel-agent'),
		'section'=> 'tour_travel_agent_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_slider_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_slider_text',array(
		'label'	=> esc_html__('Slider Text','tour-travel-agent'),
		'section'=> 'tour_travel_agent_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_slider_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'tour_travel_agent_slider_background_img',array(
        'label' => __('Slider Background Image','tour-travel-agent'),
        'description' => __('Image Size 1200px x 550px','tour-travel-agent'),
        'section' => 'tour_travel_agent_slidersettings'
	)));

	$wp_customize->add_setting('tour_travel_agent_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_location_text',array(
		'label'	=> esc_html__('Location Title','tour-travel-agent'),
		'section'=> 'tour_travel_agent_slidersettings',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_posts = array();
	$i = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('tour_travel_agent_slider_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'tour_travel_agent_sanitize_choices',
	));
	$wp_customize->add_control('tour_travel_agent_slider_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Location Category','tour-travel-agent'),
		'section' => 'tour_travel_agent_slidersettings',
	));

	//Popular Section
	$wp_customize->add_section('tour_travel_agent_popular_tour_section',array(
		'title'	=> __('Popular Tour Section','tour-travel-agent'),
		'panel' => 'tour_travel_agent_panel_id',
	));

	$wp_customize->add_setting('tour_travel_agent_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_section_title',array(
		'label'	=> esc_html__('Section Title','tour-travel-agent'),
		'section'=> 'tour_travel_agent_popular_tour_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_section_bg_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('tour_travel_agent_section_bg_title',array(
		'label'	=> esc_html__('Section Background Title','tour-travel-agent'),
		'section'=> 'tour_travel_agent_popular_tour_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_posts = array();
	$i = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('tour_travel_agent_popular_tour_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'tour_travel_agent_sanitize_choices',
	));
	$wp_customize->add_control('tour_travel_agent_popular_tour_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Popular Tour Category','tour-travel-agent'),
		'section' => 'tour_travel_agent_popular_tour_section',
	));

	//Blog Post
	$wp_customize->add_section('tour_travel_agent_blog_post',array(
		'title'	=> __('Post Settings','tour-travel-agent'),
		'panel' => 'tour_travel_agent_panel_id',
	));	

	$wp_customize->add_setting('tour_travel_agent_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','tour-travel-agent'),
       'section' => 'tour_travel_agent_blog_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','tour-travel-agent'),
       'section' => 'tour_travel_agent_blog_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','tour-travel-agent'),
       'section' => 'tour_travel_agent_blog_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','tour-travel-agent'),
       'section' => 'tour_travel_agent_blog_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_feature_image_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','tour-travel-agent'),
       'section' => 'tour_travel_agent_blog_post'
    ));

    $wp_customize->add_setting( 'tour_travel_agent_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	) );
	$wp_customize->add_control( 'tour_travel_agent_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','tour-travel-agent' ),
		'section' => 'tour_travel_agent_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'tour_travel_agent_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	) );
	$wp_customize->add_control( 'tour_travel_agent_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','tour-travel-agent' ),
		'section' => 'tour_travel_agent_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting('tour_travel_agent_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control('tour_travel_agent_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','tour-travel-agent'),
        'section' => 'tour_travel_agent_blog_post',
        'choices' => array(
            'No Content' => __('No Content','tour-travel-agent'),
            'Full Content' => __('Full Content','tour-travel-agent'),
            'Excerpt Content' => __('Excerpt Content','tour-travel-agent'),
        ),
	) );

    $wp_customize->add_setting( 'tour_travel_agent_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	) );
	$wp_customize->add_control( 'tour_travel_agent_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','tour-travel-agent' ),
		'section'  => 'tour_travel_agent_blog_post',
		'type'  => 'number',
		'settings' => 'tour_travel_agent_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'tour_travel_agent_button_excerpt_suffix', array(
		'default'   => __('[...]','tour-travel-agent' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tour_travel_agent_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','tour-travel-agent' ),
		'section'     => 'tour_travel_agent_blog_post',
		'type'        => 'text',
		'settings' => 'tour_travel_agent_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'tour_travel_agent_post_button_text', array(
		'default'   => esc_html__('READ MORE','tour-travel-agent' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tour_travel_agent_post_button_text', array(
		'label' => esc_html__('Post Button Text','tour-travel-agent' ),
		'section'     => 'tour_travel_agent_blog_post',
		'type'        => 'text',
		'settings'    => 'tour_travel_agent_post_button_text'
	) );

	$wp_customize->add_setting('tour_travel_agent_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','tour-travel-agent'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'tour_travel_agent_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('tour_travel_agent_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','tour-travel-agent'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_travel_agent_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'tour_travel_agent_button_border_radius', array(
		'default'=> '0',
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	) );
	$wp_customize->add_control('tour_travel_agent_button_border_radius', array(
        'label'  => __('Button Border Radius','tour-travel-agent'),
        'type'=> 'number',
        'section'  => 'tour_travel_agent_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    $wp_customize->add_setting( 'tour_travel_agent_post_blocks', array(
        'default'			=> 'Without box',
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_choices'
    ));
    $wp_customize->add_control( 'tour_travel_agent_post_blocks', array(
        'section' => 'tour_travel_agent_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'tour-travel-agent' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'tour-travel-agent' ),
            'Without box' => __( 'Without box', 'tour-travel-agent' ),
    )));

    $wp_customize->add_setting('tour_travel_agent_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','tour-travel-agent'),
       'section' => 'tour_travel_agent_blog_post'
    ));

    $wp_customize->add_setting( 'tour_travel_agent_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_choices'
    ));
    $wp_customize->add_control( 'tour_travel_agent_post_navigation_type', array(
        'section' => 'tour_travel_agent_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'tour-travel-agent' ),
        'choices' => array(
            'numbers'  => __( 'Number', 'tour-travel-agent' ),
            'next-prev' => __( 'Next/Prev Button', 'tour-travel-agent' ),
    )));

    $wp_customize->add_setting( 'tour_travel_agent_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_choices'
    ));
    $wp_customize->add_control( 'tour_travel_agent_post_navigation_position', array(
        'section' => 'tour_travel_agent_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'tour-travel-agent' ),
        'choices' => array(
            'top'  => __( 'Top', 'tour-travel-agent' ),
            'bottom' => __( 'Bottom', 'tour-travel-agent' ),
            'both' => __( 'Both', 'tour-travel-agent' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('tour_travel_agent_single_post',array(
		'title'	=> __('Single Post Settings','tour-travel-agent'),
		'panel' => 'tour_travel_agent_panel_id',
	));	

	$wp_customize->add_setting( 'tour_travel_agent_single_post_breadcrumb',array(
		'default' => true,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_travel_agent_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','tour-travel-agent' ),
        'section' => 'tour_travel_agent_single_post'
    ));

	$wp_customize->add_setting('tour_travel_agent_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_feature_image',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Feature Image','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting( 'tour_travel_agent_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float',
	) );
	$wp_customize->add_control( 'tour_travel_agent_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','tour-travel-agent' ),
		'section'     => 'tour_travel_agent_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'tour_travel_agent_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'tour_travel_agent_sanitize_float',
	));
	$wp_customize->add_control('tour_travel_agent_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','tour-travel-agent' ),
		'section' => 'tour_travel_agent_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	 $wp_customize->add_setting('tour_travel_agent_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
 	));
 	$wp_customize->add_control('tour_travel_agent_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Categories','tour-travel-agent'),
		'section' => 'tour_travel_agent_single_post'
	));

    $wp_customize->add_setting('tour_travel_agent_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting( 'tour_travel_agent_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	) );
	$wp_customize->add_control( 'tour_travel_agent_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_single_post',
		'type' => 'number',
		'settings' => 'tour_travel_agent_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('tour_travel_agent_comment_title',array(
       'default' => __('Leave a Reply','tour-travel-agent'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_comment_submit_text',array(
       'default' => __('Post Comment','tour-travel-agent'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting('tour_travel_agent_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','tour-travel-agent'),
       'section' => 'tour_travel_agent_single_post'
    ));

    $wp_customize->add_setting( 'tour_travel_agent_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	) );
	$wp_customize->add_control( 'tour_travel_agent_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','tour-travel-agent' ),
		'section' => 'tour_travel_agent_single_post',
		'type' => 'number',
		'settings' => 'tour_travel_agent_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'tour_travel_agent_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_choices'
    ));
    $wp_customize->add_control( 'tour_travel_agent_post_order', array(
        'section' => 'tour_travel_agent_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'tour-travel-agent' ),
        'choices' => array(
            'categories' => __('Categories', 'tour-travel-agent'),
            'tags' => __( 'Tags', 'tour-travel-agent' ),
    )));

    //404 page settings
	$wp_customize->add_section('tour_travel_agent_404_page',array(
		'title'	=> __('404 & No Result Page Settings','tour-travel-agent'),
		'priority'	=> null,
		'panel' => 'tour_travel_agent_panel_id',
	));

	$wp_customize->add_setting('tour_travel_agent_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','tour-travel-agent'),
       'section' => 'tour_travel_agent_404_page'
    ));

    $wp_customize->add_setting('tour_travel_agent_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','tour-travel-agent'),
       'section' => 'tour_travel_agent_404_page'
    ));

    $wp_customize->add_setting('tour_travel_agent_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','tour-travel-agent'),
       'section' => 'tour_travel_agent_404_page'
    ));

    $wp_customize->add_setting('tour_travel_agent_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','tour-travel-agent'),
       'section' => 'tour_travel_agent_404_page'
    ));

    $wp_customize->add_setting('tour_travel_agent_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_travel_agent_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','tour-travel-agent'),
       'section' => 'tour_travel_agent_404_page'
    ));

    $wp_customize->add_setting('tour_travel_agent_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_travel_agent_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','tour-travel-agent'),
      	'section' => 'tour_travel_agent_404_page',
	));

	//Footer
	$wp_customize->add_section('tour_travel_agent_footer_section',array(
		'title'	=> __('Footer Section','tour-travel-agent'),
		'priority'	=> null,
		'panel' => 'tour_travel_agent_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'tour_travel_agent_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'tour_travel_agent_customize_partial_tour_travel_agent_show_back_to_top',
		)
	);

	$wp_customize->add_setting('tour_travel_agent_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_travel_agent_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','tour-travel-agent'),
      	'section' => 'tour_travel_agent_footer_section',
	));

	$wp_customize->add_setting('tour_travel_agent_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Tour_Travel_Agent_Icon_Changer(
        $wp_customize, 'tour_travel_agent_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_travel_agent_back_to_top_text',array(
		'default'	=> __('Back to Top','tour-travel-agent'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('tour_travel_agent_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control('tour_travel_agent_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','tour-travel-agent'),
        'section' => 'tour_travel_agent_footer_section',
        'choices' => array(
            'Left' => __('Left','tour-travel-agent'),
            'Right' => __('Right','tour-travel-agent'),
            'Center' => __('Center','tour-travel-agent'),
        ),
	) );

	$wp_customize->add_setting('tour_travel_agent_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_travel_agent_footer_background_color', array(
		'label'    => __('Footer Background Color', 'tour-travel-agent'),
		'section'  => 'tour_travel_agent_footer_section',
	)));

	$wp_customize->add_setting('tour_travel_agent_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'tour_travel_agent_footer_background_img',array(
        'label' => __('Footer Background Image','tour-travel-agent'),
        'section' => 'tour_travel_agent_footer_section'
	)));

	$wp_customize->add_setting('tour_travel_agent_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices',
    ));
    $wp_customize->add_control('tour_travel_agent_footer_widget_layout',array(
        'type' => 'radio',
        'label'  => __('Footer widget layout', 'tour-travel-agent'),
        'section'     => 'tour_travel_agent_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'tour-travel-agent'),
        'choices' => array(
            '1'     => __('One', 'tour-travel-agent'),
            '2'     => __('Two', 'tour-travel-agent'),
            '3'     => __('Three', 'tour-travel-agent'),
            '4'     => __('Four', 'tour-travel-agent')
        ),
    ));

    $wp_customize->add_setting('tour_travel_agent_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control('tour_travel_agent_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','tour-travel-agent'),
        'section' => 'tour_travel_agent_footer_section',
        'choices' => array(
            'Left' => __('Left','tour-travel-agent'),
            'Right' => __('Right','tour-travel-agent'),
            'Center' => __('Center','tour-travel-agent'),
        ),
	) );

	$wp_customize->add_setting('tour_travel_agent_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float',
	));	
	$wp_customize->add_control('tour_travel_agent_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('tour_travel_agent_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float',
	));	
	$wp_customize->add_control('tour_travel_agent_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_footer_section',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'tour_travel_agent_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'tour_travel_agent_customize_partial_tour_travel_agent_footer_copy',
		)
	);
	
	$wp_customize->add_setting('tour_travel_agent_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('tour_travel_agent_footer_copy',array(
		'label'	=> __('Copyright Text','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('tour_travel_agent_copyright_background_color', array(
		'default'           => '#db0607',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_travel_agent_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'tour-travel-agent'),
		'section'  => 'tour_travel_agent_footer_section',
	)));

	//Mobile Media Section
	$wp_customize->add_section( 'tour_travel_agent_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'tour-travel-agent' ),
		'priority'   => null,
		'panel' => 'tour_travel_agent_panel_id'
	) );

	$wp_customize->add_setting('tour_travel_agent_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Tour_Travel_Agent_Icon_Changer(
        $wp_customize, 'tour_travel_agent_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'tour_travel_agent_menu_color_setting', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_travel_agent_menu_color_setting', array(
  		'label' => __('Menu Icon Color Option', 'tour-travel-agent'),
		'section' => 'tour_travel_agent_mobile_media_options',
		'settings' => 'tour_travel_agent_menu_color_setting',
  	)));

	$wp_customize->add_setting('tour_travel_agent_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Tour_Travel_Agent_Icon_Changer(
        $wp_customize, 'tour_travel_agent_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_travel_agent_hide_topbar_responsive',array(
		'default' => true,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_travel_agent_hide_topbar_responsive',array(
     	'type' => 'checkbox',
		'label' => __('Show / Hide Topbar','tour-travel-agent'),
		'section' => 'tour_travel_agent_mobile_media_options',
	));

	$wp_customize->add_setting('tour_travel_agent_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_travel_agent_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider','tour-travel-agent'),
      	'section' => 'tour_travel_agent_mobile_media_options',
	));

	$wp_customize->add_setting('tour_travel_agent_responsive_sticky_header',array(
        'default' => false,
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_travel_agent_responsive_sticky_header',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Sticky Header','tour-travel-agent'),
      	'section' => 'tour_travel_agent_mobile_media_options',
	));

    $wp_customize->add_setting('tour_travel_agent_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_travel_agent_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','tour-travel-agent'),
      	'section' => 'tour_travel_agent_mobile_media_options',
	));

	$wp_customize->add_setting( 'tour_travel_agent_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_travel_agent_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','tour-travel-agent' ),
        'section' => 'tour_travel_agent_mobile_media_options'
    ));

	//Woocommerce Section
	$wp_customize->add_section( 'tour_travel_agent_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'tour-travel-agent' ),
		'priority'   => null,
		'panel' => 'tour_travel_agent_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'tour_travel_agent_products_per_row' , array(
		'default'           => '3',
		'sanitize_callback' => 'tour_travel_agent_sanitize_choices',
	) );

	$wp_customize->add_control('tour_travel_agent_products_per_row', array(
		'label' => __( 'Product per row', 'tour-travel-agent' ),
		'section'  => 'tour_travel_agent_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('tour_travel_agent_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_float'
	));	
	$wp_customize->add_control('tour_travel_agent_product_per_page',array(
		'label'	=> __('Product per page','tour-travel-agent'),
		'section'	=> 'tour_travel_agent_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('tour_travel_agent_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','tour-travel-agent'),
       'section' => 'tour_travel_agent_woocommerce_options',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('tour_travel_agent_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'tour_travel_agent_sanitize_choices',
	));
	$wp_customize->add_control('tour_travel_agent_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'tour-travel-agent'),
		'section'        => 'tour_travel_agent_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tour-travel-agent'),
			'Right Sidebar' => __('Right Sidebar', 'tour-travel-agent'),
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_travel_agent_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Enable / Disable Single Product Page Sidebar','tour-travel-agent'),
		'section' => 'tour_travel_agent_woocommerce_options'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('tour_travel_agent_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'tour_travel_agent_sanitize_choices',
	));
	$wp_customize->add_control('tour_travel_agent_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'tour-travel-agent'),
		'section'        => 'tour_travel_agent_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tour-travel-agent'),
			'Right Sidebar' => __('Right Sidebar', 'tour-travel-agent'),
		),
	));

	$wp_customize->add_setting('tour_travel_agent_shop_page_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_shop_page_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page pagination','tour-travel-agent'),
       'section' => 'tour_travel_agent_woocommerce_options',
    ));

    $wp_customize->add_setting('tour_travel_agent_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','tour-travel-agent'),
       'section' => 'tour_travel_agent_woocommerce_options',
    ));

    $wp_customize->add_setting('tour_travel_agent_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','tour-travel-agent'),
       'section' => 'tour_travel_agent_woocommerce_options',
    ));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control( 'tour_travel_agent_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('tour_travel_agent_woocommerce_product_border',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_travel_agent_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_travel_agent_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','tour-travel-agent'),
       'section' => 'tour_travel_agent_woocommerce_options',
    ));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_product_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_product_padding_right',array(
		'default' => 10,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control( 'tour_travel_agent_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('tour_travel_agent_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'tour_travel_agent_sanitize_choices'
	));
	$wp_customize->add_control('tour_travel_agent_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','tour-travel-agent'),
        'section' => 'tour_travel_agent_woocommerce_options',
        'choices' => array(
            'left' => __('Left','tour-travel-agent'),
            'right' => __('Right','tour-travel-agent'),
        ),
	) );

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_sale_top_padding',array(
		'default' => 0,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control( 'tour_travel_agent_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_woocommerce_sale_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_travel_agent_product_sale_font_size',array(
		'default' => '',
		'sanitize_callback' => 'tour_travel_agent_sanitize_float'
	));
	$wp_customize->add_control('tour_travel_agent_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','tour-travel-agent' ),
		'type' => 'number',
		'section' => 'tour_travel_agent_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'tour_travel_agent_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tour_Travel_Agent_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );
		
		// Register custom section types.
		$manager->register_section_type( 'Tour_Travel_Agent_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Tour_Travel_Agent_Customize_Section_Pro(
				$manager,
				'tour_travel_agent_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Travel Pro Theme', 'tour-travel-agent' ),
					'pro_text' => esc_html__( 'Go Pro','tour-travel-agent' ),
					'pro_url'  => esc_url( 'https://themescaliber.com/themes/travel-agent-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'tour-travel-agent-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'tour-travel-agent-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Tour_Travel_Agent_Customize::get_instance();