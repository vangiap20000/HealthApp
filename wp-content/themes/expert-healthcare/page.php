<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Expert Healthcare
 */

get_header(); ?>

<section class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row">
			<?php 
				if ( class_exists( 'woocommerce' ) ) 
					{
						if( is_account_page() || is_cart() || is_checkout() ) {
							echo '<div class="col-lg-8">'; 
						}
						else{
							echo '<div class="col-lg-8">';
						}
					}
					else
					{
						echo '<div class="col-lg-8">';
					} 
				?>
				<?php 	if( have_posts()) : the_post(); ?>
					<article class="post-items post-single">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumb mb-3"><?php the_post_thumbnail(); ?></div>
						<?php endif; ?>
						<div class="post-content">
							<?php the_content();
							wp_link_pages( array(
				                'before' => '<div class="page-links">' . __( 'Pages:', 'expert-healthcare' ),
				                'after'  => '</div>',
				            ) ); ?>
						</div>
					</article>
				<?php
					endif;
					
					if( $post->comment_status == 'open' ) { 
						comments_template( '', true ); // show comments 
					}
				?>
			</div>	
			<?php
				get_sidebar(); 
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>