<?php

function expert_healthcare_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'expert-healthcare'),
		) 
	);

	// Footer Bottom // 
	$wp_customize->add_section(
        'footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','expert-healthcare'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_healthcare_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_healthcare_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copytight', 'expert-healthcare' ),
			'section'     => 'footer_bottom',
			'settings'    => 'footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'footer_copyright',
		array(
		    'label'   		=> __('Copytight','expert-healthcare'),
		    'section'		=> 'footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);
}
add_action( 'customize_register', 'expert_healthcare_footer' );

// Footer selective refresh
function expert_healthcare_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'expert_healthcare_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'expert_healthcare_footer_partials' );

// copyright_content
function expert_healthcare_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}