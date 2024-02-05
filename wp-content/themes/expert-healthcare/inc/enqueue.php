<?php

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'expert-healthcare-customize-section-button',
		get_theme_file_uri( 'assets/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);
	wp_localize_script(
		'expert-healthcare-customize-section-button',
		'expert_healthcare_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		)
	);

	wp_enqueue_style(
		'expert-healthcare-customize-section-button',
		get_theme_file_uri( 'assets/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

 /**
 * Enqueue scripts and styles.
 */
function expert_healthcare_scripts() {
	
	// Styles	 

	wp_enqueue_style('all-min',get_template_directory_uri().'/assets/css/all.min.css');

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('expert-healthcare-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('expert-healthcare-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('expert-healthcare-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'expert-healthcare-booking-style', get_stylesheet_uri() );
	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('expert-healthcare-sliderscript', get_template_directory_uri().'/assets/js/sliderscript.js', array('jquery'), '1.1', true);

	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false, true);

	wp_enqueue_script('expert-healthcare-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'expert_healthcare_scripts' );

//Admin Enqueue for Admin
function expert_healthcare_admin_enqueue_scripts(){
	wp_enqueue_style('expert-healthcare-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
	wp_enqueue_script('dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'expert_healthcare_admin_enqueue_scripts' );