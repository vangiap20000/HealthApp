<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Expert Healthcare
 */

if ( ! function_exists( 'expert_healthcare_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function expert_healthcare_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'expert-healthcare' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'expert-healthcare' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;


if ( ! function_exists( 'expert_healthcare_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function expert_healthcare_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'expert-healthcare' ) );
		if ( $categories_list && expert_healthcare_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'expert-healthcare' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'expert-healthcare' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'expert-healthcare' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'expert-healthcare' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'expert-healthcare' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function expert_healthcare_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'expert_healthcare_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'expert_healthcare_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so expert_healthcare_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so expert_healthcare_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in expert_healthcare_categorized_blog.
 */
function expert_healthcare_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'expert_healthcare_categories' );
}
add_action( 'edit_category', 'expert_healthcare_category_transient_flusher' );
add_action( 'save_post',     'expert_healthcare_category_transient_flusher' );

/**
 * Register Google fonts.
 */
function expert_healthcare_google_font() {
	$font_url      = '';
	$font_family   = array(
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900'
	);
	$font_family   = array(
		'Roboto Slab:wght@100;200;300;400;500;600;700;800;900'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

function expert_healthcare_scripts_styles() {
    wp_enqueue_style( 'expert-healthcare-fonts', expert_healthcare_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'expert_healthcare_scripts_styles' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function expert_healthcare_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');
}

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'expert_healthcare_post_layout' )) :
function expert_healthcare_post_layout(){
	if(is_active_sidebar('expert-healthcare-sidebar-primary'))
		{ echo 'col-lg-8'; } 
	else 
		{ echo 'col-lg-12'; }  
} endif;