<?php 
  $expert_healthcare_slider = get_theme_mod('expert_healthcare_slider_setting','1');
  
  if($expert_healthcare_slider == '1') {

  $topheader_phoneno = get_theme_mod( 'topheader_phoneno' );
?>
<section id="slider-section" class="slider-area home-slider">
  <!-- start of hero -->
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <?php $expert_healthcare_pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'slider' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $expert_healthcare_pages[] = $mod;
        }
      }
      if( !empty($expert_healthcare_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $expert_healthcare_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <?php }else { ?><div class="slider-color-box"></div> <?php } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php echo esc_html(wp_trim_words(get_the_content(),'25') );?></p>
              <div class="read-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html('MAKE APPOINTMENT','expert-healthcare'); ?><span class="screen-reader-text"><?php echo esc_html('MAKE APPOINTMENT','expert-healthcare'); ?></span></a>
              </div>
              <?php if( $topheader_phoneno != ''){?>
                <a class="slider_call" href="tel:<?php echo esc_html( apply_filters('expert_healthcare_topheader', $topheader_phoneno)); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html( apply_filters('expert_healthcare_topheader', $topheader_phoneno)); ?></a>
              <?php }?>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
    <i class="fas fa-angle-left" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Previous','expert-healthcare'); ?></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
    <i class="fas fa-angle-right" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Next','expert-healthcare'); ?></span>
    </button>
  </div> 
  <!-- end of hero slider -->
</section>
<?php } ?>