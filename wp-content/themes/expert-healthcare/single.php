<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Expert Healthcare
 */

get_header();
?>
<section class="blog-area inarea-blog-single-page-two">
	<div class="container">
		<div class="row">
            <div class="col-lg-8">
				<div class="singel-page-area">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
							<?php get_template_part('template-parts/content/content-post', get_post_format() ); ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php comments_template( '', true ); // show comments  ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
