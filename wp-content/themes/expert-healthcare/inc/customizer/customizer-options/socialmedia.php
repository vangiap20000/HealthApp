<?php
function expert_healthcare_social_media_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Social Media
	=========================================*/
	$wp_customize->add_section(
        'social_media_header',
        array(
        	'priority'      => 3,
            'title' 		=> __('Social Media','expert-healthcare'),
			'panel'  		=> 'header_section',
		)
    );

    // Social Media Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'topheader_social_media_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'topheader_social_media_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Social Media', 'expert-healthcare' ),
			'section'     => 'social_media_header',
			'settings'    => 'topheader_social_media_setting',
			'type'        => 'checkbox'
		) 
	);

   	$wp_customize->add_setting(
    	'topheader_social_media_facebook',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_social_media_facebook',
		array(
		    'label'   		=> __('Facebook URL','expert-healthcare'),
		    'section'		=> 'social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'topheader_social_media_twitter',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_social_media_twitter',
		array(
		    'label'   		=> __('Twitter URL','expert-healthcare'),
		    'section'		=> 'social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);	

	$wp_customize->add_setting(
    	'topheader_social_media_instagram',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_social_media_instagram',
		array(
		    'label'   		=> __('Instagram URL','expert-healthcare'),
		    'section'		=> 'social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'topheader_social_media_linkedin',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_social_media_linkedin',
		array(
		    'label'   		=> __('Linkedin URL','expert-healthcare'),
		    'section'		=> 'social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'topheader_social_media_youtube',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'topheader_social_media_youtube',
		array(
		    'label'   		=> __('Youtube URL','expert-healthcare'),
		    'section'		=> 'social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

}
add_action( 'customize_register', 'expert_healthcare_social_media_header_settings' );