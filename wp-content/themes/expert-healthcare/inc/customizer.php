<?php
/**
 * Expert Healthcare Theme Customizer.
 *
 * @package Expert Healthcare
 */

 if ( ! class_exists( 'Expert_Healthcare_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Expert_Healthcare_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'expert_healthcare_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'expert_healthcare_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'expert_healthcare_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'expert_healthcare_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function expert_healthcare_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Helper files
			 */
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function expert_healthcare_customize_preview_js() {
			wp_enqueue_script( 'expert-healthcare-customizer', EXPERT_HEALTHCARE_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}		
		
		function expert_healthcare_customizer_script() {
			 wp_enqueue_script( 'expert-healthcare-customizer-section', EXPERT_HEALTHCARE_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function expert_healthcare_customizer_settings() {
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/customizer-options/socialmedia.php';
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/customizer-options/header.php';
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/customizer-options/frontpage.php';
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/customizer-options/general.php';
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/customizer-options/footer.php';
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/customizer-options/post.php';
			require EXPERT_HEALTHCARE_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Expert_Healthcare_Customizer::get_instance();