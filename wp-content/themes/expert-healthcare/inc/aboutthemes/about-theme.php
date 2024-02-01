<?php
/**
 * Theme Page
 *
 * @package Expert Healthcare
 */

if ( ! defined( 'EXPERT_HEALTHCARE_FREE_THEME_URL' ) ) {
	define( 'EXPERT_HEALTHCARE_FREE_THEME_URL', 'https://www.seothemesexpert.com/wordpress/free-healthcare-wordpress-theme/' );
}
if ( ! defined( 'EXPERT_HEALTHCARE_PRO_THEME_URL' ) ) {
	define( 'EXPERT_HEALTHCARE_PRO_THEME_URL', 'https://www.seothemesexpert.com/wordpress/healthcare-website-template/' );
}
if ( ! defined( 'EXPERT_HEALTHCARE_DEMO_THEME_URL' ) ) {
	define( 'EXPERT_HEALTHCARE_DEMO_THEME_URL', 'https://seothemesexpert.com/demo/expert-healthcare/' );
}
if ( ! defined( 'EXPERT_HEALTHCARE_DOCS_THEME_URL' ) ) {
    define( 'EXPERT_HEALTHCARE_DOCS_THEME_URL', 'https://www.seothemesexpert.com/docs/expert-healthcare-website-template-pro/' );
}
if ( ! defined( 'EXPERT_HEALTHCARE_RATE_THEME_URL' ) ) {
    define( 'EXPERT_HEALTHCARE_RATE_THEME_URL', 'https://wordpress.org/support/theme/expert-healthcare/reviews/#new-post' );
}
if ( ! defined( 'EXPERT_HEALTHCARE_SUPPORT_THEME_URL' ) ) {
    define( 'EXPERT_HEALTHCARE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/expert-healthcare/' );
}

/**
 * Add theme page
 */
function expert_healthcare_menu() {
	add_theme_page( esc_html__( 'About Theme', 'expert-healthcare' ), esc_html__( 'About Theme', 'expert-healthcare' ), 'edit_theme_options', 'expert-healthcare-about', 'expert_healthcare_about_display' );
}
add_action( 'admin_menu', 'expert_healthcare_menu' );

/**
 * Display About page
 */
function expert_healthcare_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'expert-healthcare' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'expert-healthcare-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'expert-healthcare-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'expert-healthcare' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'expert-healthcare-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'expert-healthcare' ); ?></a>
		</nav>

		<?php
			expert_healthcare_main_screen();

			expert_healthcare_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'expert-healthcare' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'expert-healthcare' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'expert-healthcare' ) : esc_html_e( 'Go to Dashboard', 'expert-healthcare' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function expert_healthcare_main_screen() {
	if ( isset( $_GET['page'] ) && 'expert-healthcare-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'expert-healthcare' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'expert-healthcare' ) ?><span class="usecode">" STEPro10 "</span></p>
					<p><a href="<?php echo esc_url( EXPERT_HEALTHCARE_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'expert-healthcare' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'expert-healthcare' ); ?></h2>
					<p><?php esc_html_e( 'Know more about film studio.', 'expert-healthcare' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_HEALTHCARE_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'expert-healthcare' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'expert-healthcare' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'expert-healthcare' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'expert-healthcare' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'expert-healthcare' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'expert-healthcare' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_HEALTHCARE_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'expert-healthcare' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'expert-healthcare' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'expert-healthcare' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_HEALTHCARE_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'expert-healthcare' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $expert_healthcare_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $expert_healthcare_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'expert-healthcare' ); ?>: <?php echo esc_html($expert_healthcare_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a href="<?php echo esc_url( EXPERT_HEALTHCARE_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'expert-healthcare' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_HEALTHCARE_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'expert-healthcare' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_HEALTHCARE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'expert-healthcare' ); ?></a>
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $expert_healthcare_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function expert_healthcare_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a href="<?php echo esc_url( EXPERT_HEALTHCARE_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'expert-healthcare' ); ?></a>

					<a href="<?php echo esc_url( EXPERT_HEALTHCARE_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'expert-healthcare' ); ?></a>

					<a href="<?php echo esc_url( EXPERT_HEALTHCARE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'expert-healthcare' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'expert-healthcare' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'expert-healthcare' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'expert-healthcare' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'expert-healthcare' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'expert-healthcare' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(EXPERT_HEALTHCARE_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'expert-healthcare' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
