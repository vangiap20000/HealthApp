<?php 
  $expert_healthcare_tourist = get_theme_mod('expert_healthcare_tourist_setting','1');
  
  if($expert_healthcare_tourist == '1') {
?>

	<section id="tourist-section" class="py-5">
		<div class="container"> 
			<div class="tourist-head text-center mb-5">
				<?php if(get_theme_mod('expert_healthcare_section_title') != '') {?>
					<h2><?php echo esc_html(get_theme_mod('expert_healthcare_section_title')); ?></h2>
				<?php }?>
				<?php if(get_theme_mod('expert_healthcare_section_text') != '') {?>
					<p><?php echo esc_html(get_theme_mod('expert_healthcare_section_text')); ?></p>
				<?php }?>
			</div>
			<?php
	      for ( $s = 1; $s <= 12; $s++ ) {
	        $expert_healthcare_mod =  get_theme_mod( 'expert_healthcare_section_settigs' .$s );
	        if ( 'page-none-selected' != $expert_healthcare_mod ) {
	          $expert_healthcare_post[] = $expert_healthcare_mod;
	        }
	      }
	       if( !empty($expert_healthcare_post) ) :
	      $expert_healthcare_args = array(
	        'post_type' =>array('post','page'),
	        'post__in' => $expert_healthcare_post
	      );
	      $expert_healthcare_query = new WP_Query( $expert_healthcare_args );
	      if ( $expert_healthcare_query->have_posts() ) :
	        $s = 1;
	    ?>
	    <div class="owl-carousel">
	      <?php  while ( $expert_healthcare_query->have_posts() ) : $expert_healthcare_query->the_post(); ?>
            <div class="inner-box-image ">
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              <div class="inner-box">
                <h4 class="p-2"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>                
              </div>
            </div>
	      <?php $s++; endwhile; ?>
	    </div>
	    <?php wp_reset_postdata();
	    else : ?>
	    <div class="no-postfound"></div>
	      <?php endif;
	    endif;?>
		</div>
	</section>
<?php }?>