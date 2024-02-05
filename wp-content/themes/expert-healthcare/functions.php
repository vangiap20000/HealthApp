<?php
if ( ! function_exists( 'expert_healthcare_setup' ) ) :
function expert_healthcare_setup() {

// Root path/URI.
define( 'EXPERT_HEALTHCARE_PARENT_DIR', get_template_directory() );
define( 'EXPERT_HEALTHCARE_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'EXPERT_HEALTHCARE_PARENT_INC_DIR', EXPERT_HEALTHCARE_PARENT_DIR . '/inc');
define( 'EXPERT_HEALTHCARE_PARENT_INC_URI', EXPERT_HEALTHCARE_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );

	add_theme_support( 'responsive-embeds' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'expert-healthcare' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'  => esc_html__( 'Primary Menu', 'expert-healthcare' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
		
	add_theme_support('custom-logo');

	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', expert_healthcare_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'expert_healthcare_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'expert_healthcare_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function expert_healthcare_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'expert_healthcare_content_width', 1170 );
}
add_action( 'after_setup_theme', 'expert_healthcare_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function expert_healthcare_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'expert-healthcare' ),
		'id' => 'expert-healthcare-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'expert-healthcare' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'expert-healthcare' ),
		'id' => 'expert-healthcare-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'expert-healthcare' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );
}
add_action( 'widgets_init', 'expert_healthcare_widgets_init' );

/**
 * All Styles & Scripts.
 */

require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/wptt-webfont-loader.php';

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/aboutthemes/about-theme.php' );

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array('image','video','gallery','audio',) );


/* Excerpt Limit Begin */
function expert_healthcare_string_limit_words($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
    array_pop($words);
    return implode(' ', $words);
}

function expert_healthcare_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

add_filter( 'nav_menu_link_attributes', 'expert_healthcare_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function expert_healthcare_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function expert_healthcare_activation_notice() {
    // Check if the notice has already been dismissed
    if (get_option('expert_healthcare_notice_dismissed')) {
        return;
    }
    ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="expert-healthcare-getting-started-notice clearfix">
            <div class="expert-healthcare-theme-notice-content">
                <h2 class="expert-healthcare-notice-h2">
                    <?php
                    printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                        esc_html__('Welcome! Thank you for choosing %1$s!', 'expert-healthcare'), '<strong>' . wp_get_theme()->get('Name') . '</strong>');
                    ?>
                </h2>
            
                <a class="expert-healthcare-btn-get-started button button-primary button-hero expert-healthcare-button-padding" href="<?php echo esc_url(admin_url('themes.php?page=expert-healthcare-about')); ?>"><?php esc_html_e('Get started', 'expert-healthcare') ?></a><span class="expert-healthcare-push-down">
            </div>
        </div>
    </div>
    <?php
}

add_action('admin_notices', 'expert_healthcare_activation_notice');

// Add Ajax action to handle dismiss
add_action('wp_ajax_dismiss_expert_healthcare_notice', 'dismiss_expert_healthcare_notice');

// Reset the dismissed status when the theme is activated
function reset_expert_healthcare_notice_status() {
    delete_option('expert_healthcare_notice_dismissed');
}
add_action('after_switch_theme', 'reset_expert_healthcare_notice_status');

function dismiss_expert_healthcare_notice() {
    update_option('expert_healthcare_notice_dismissed', true);
    wp_die('Notice dismissed');
}


function remove_theme_customizer_setting($wp_customize) {
    // Remove the setting
    $wp_customize->remove_setting('display_header_text');
    // Remove the control
    $wp_customize->remove_control('display_header_text');
}
add_action('customize_register', 'remove_theme_customizer_setting', 20); 
// Use a priority greater than the one used for adding the setting

// Set the number of products per row to 3 on the shop page
add_filter('loop_shop_columns', 'expert_healthcare_custom_shop_loop_columns');

if (!function_exists('expert_healthcare_custom_shop_loop_columns')) {
    function expert_healthcare_custom_shop_loop_columns() {
        // Retrieve the number of columns from theme customizer setting (default: 3)
        $columns = get_theme_mod('expert_healthcare_custom_shop_per_columns', 3);
        return $columns;
    }
}

// Set the number of products per page on the shop page
add_filter('loop_shop_per_page', 'expert_healthcare_custom_shop_per_page', 20);

if (!function_exists('expert_healthcare_custom_shop_per_page')) {
    function expert_healthcare_custom_shop_per_page($products_per_page) {
        // Retrieve the number of products per page from theme customizer setting (default: 9)
        $products_per_page = get_theme_mod('expert_healthcare_custom_shop_product_per_page', 9);
        return $products_per_page;
    }
}

// This hook action add file custom.js
add_action('wp_enqueue_scripts', 'add_custom_js_script', 20);
function add_custom_js_script()
{
	wp_enqueue_script('custom_script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
}

// $ handle – Handle là tên duy nhất của script. Giả sử chúng ta gọi là “custom_script”
// array jquery WordPress sẽ tự động chuyển javascript xuống footer và tự động load jq
add_action('wp_footer', 'wpb_hook_javascript', 30);
function wpb_hook_javascript()
{
?>
	<script type="text/javascript">
		let urlAjax = "<?= admin_url('admin-ajax.php') ?>";
		let postId = <?= get_the_id() ?>;
	</script>
<?php
}

function add_likes_count_to_post()
{
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	global $wpdb;
	$table_name = $wpdb->prefix . 'posts';
	$column_name = 'likes_count';
	$create_ddl = "ALTER TABLE $table_name ADD $column_name bigint(20) NULL DEFAULT 0;";
	maybe_add_column($table_name, $column_name, $create_ddl);
}

add_action('init', 'add_likes_count_to_post');

/* Action da dang nhap */
add_action('wp_ajax_handel_like_post', 'handel_like_post');
/* Action chua dang nhap */
add_action('wp_ajax_nopriv_handel_like_post', 'handel_like_post');
function handel_like_post() {
	$postId = $_POST['post_id'];
	$post = get_post( $postId );
	global $wpdb;
	$table = $wpdb->prefix . 'posts';
	$data = [
		'likes_count' => $post->likes_count + 1,
	];
	$wpdb->update(
		$table,
		$data,
		['id' => $post->ID]
	);
}

// thêm một cột mới vào table all post có sẵn.
add_filter('manage_post_posts_columns', 'add_column_to_table_all_post', 10, 1);

function add_column_to_table_all_post($columns)
{
	return array_merge($columns, [
		'likes_count' => 'Count Like'
	]);
}

// Đổ dữ liệu vào cột vừa mới thêm vào ở trên
add_action('manage_post_posts_custom_column', function($columnKey, $postId) {
	if ($columnKey == 'likes_count') {
		echo get_post( $postId)->likes_count;
	}	
}, 10, 2);


// $accepted_args => tổng số param truyền vào