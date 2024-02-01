<?php
function expert_healthcare_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_healthcare_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Option', 'expert-healthcare' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'expert-healthcare' ),
			'priority' => 1,
			'panel' => 'expert_healthcare_post',
		)
	);
	
	// Archive Post Settings 
	$wp_customize->add_setting(
		'archive_post_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_healthcare_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'archive_post_settings',
		array(
			'type' => 'hidden',
			'label' => __('Archive Post Section Setting','expert-healthcare'),
			'section' => 'archive_post_setting',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'expert-healthcare' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'expert_healthcare_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'expert-healthcare' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'expert_healthcare_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'expert-healthcare' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'expert_healthcare_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'expert-healthcare' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'expert_healthcare_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'expert-healthcare' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'expert_healthcare_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'expert-healthcare' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'expert_healthcare_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_healthcare_single_post', array(
			'title' => esc_html__( 'Single Post', 'expert-healthcare' ),
			'priority' => 3,
			'panel' => 'expert_healthcare_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_single_post',
			'settings'    => 'expert_healthcare_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_single_post',
			'settings'    => 'expert_healthcare_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_single_post',
			'settings'    => 'expert_healthcare_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_single_post',
			'settings'    => 'expert_healthcare_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_single_post',
			'settings'    => 'expert_healthcare_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_healthcare_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_healthcare_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'expert-healthcare' ),
			'section'     => 'expert_healthcare_single_post',
			'settings'    => 'expert_healthcare_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);
}

add_action( 'customize_register', 'expert_healthcare_post_setting' );