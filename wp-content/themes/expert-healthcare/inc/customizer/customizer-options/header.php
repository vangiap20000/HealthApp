<?php
function expert_healthcare_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_site_title_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'expert-healthcare' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_healthcare_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'expert-healthcare' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_healthcare_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'expert-healthcare'),
		) 
	);

	/*=========================================
	Expert Healthcare Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','expert-healthcare'),
			'panel'  		=> 'header_section',
		)
    );    

	/*=========================================
	Top header
	=========================================*/
	$wp_customize->add_section(
        'top_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header','expert-healthcare'),
			'panel'  		=> 'header_section',
		)
    );

    // Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_header_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-healthcare' ),
			'section'     => 'top_header',
			'settings'    => 'expert_healthcare_header_setting',
			'type'        => 'checkbox'
		) 
	);

	// Header Search Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'header_search_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'header_search_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search', 'expert-healthcare' ),
			'section'     => 'top_header',
			'settings'    => 'header_search_setting',
			'type'        => 'checkbox'
		) 
	);

   	$wp_customize->add_setting(
    	'topheader_email',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);	
	$wp_customize->add_control( 
		'topheader_email',
		array(
		    'label'   		=> __('Email Address','expert-healthcare'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

   	$wp_customize->add_setting(
    	'topheader_phoneno',
    	array(
			'default' => '',
			'sanitize_callback' => 'expert_healthcare_sanitize_phone_number',
		)
	);	
	$wp_customize->add_control( 
		'topheader_phoneno',
		array(
		    'label'   		=> __('Phone Number','expert-healthcare'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

   	$wp_customize->add_setting(
    	'topheader_button_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'topheader_button_text',
		array(
		    'label'   		=> __('Header Button Text','expert-healthcare'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

   	$wp_customize->add_setting(
    	'topheader_button_link',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 
		'topheader_button_link',
		array(
		    'label'   		=> __('Header Button Link','expert-healthcare'),
		    'section'		=> 'top_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->register_panel_type( 'expert_healthcare_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'expert_healthcare_WP_Customize_Section' );

}
add_action( 'customize_register', 'expert_healthcare_header_settings' );


if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class expert_healthcare_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'expert_healthcare_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class expert_healthcare_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'expert_healthcare_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}