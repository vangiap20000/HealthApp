<header class="main-header">
<?php 
  $expert_healthcare_header = get_theme_mod('expert_healthcare_header_setting','1');
  
  if($expert_healthcare_header == '1') {
?>
  <div class="upper-header-area">
  	<div class="container">
    	<?php 
    	        $header_search_setting = get_theme_mod('header_search_setting');
    	        $topheader_social_media_setting = get_theme_mod('topheader_social_media_setting');
				$topheader_social_media_facebook = get_theme_mod('topheader_social_media_facebook');
				$topheader_social_media_twitter = get_theme_mod('topheader_social_media_twitter');
				$topheader_social_media_instagram = get_theme_mod('topheader_social_media_instagram');
				$topheader_social_media_linkedin = get_theme_mod('topheader_social_media_linkedin');
				$topheader_social_media_youtube = get_theme_mod('topheader_social_media_youtube');

				$topheader_email = get_theme_mod( 'topheader_email' );
				$topheader_phoneno = get_theme_mod( 'topheader_phoneno' );

				$topheader_button_text = get_theme_mod('topheader_button_text');
				$topheader_button_link = get_theme_mod('topheader_button_link');
			?>
			<div class="row">
				<div class="col-lg-5 col-md-8 contact text-md-start text-center align-self-center">
					<?php if( $topheader_phoneno != ''){?>
						<a class="me-3" href="tel:<?php echo esc_html( apply_filters('expert_healthcare_topheader', $topheader_phoneno)); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html( apply_filters('expert_healthcare_topheader', $topheader_phoneno)); ?></a>
					<?php }?>
					<?php if( $topheader_email != ''){?>
						<a href="mailto:<?php echo esc_html( apply_filters('expert_healthcare_topheader', $topheader_email)); ?>"><i class="fas fa-envelope me-2"></i><?php echo esc_html( apply_filters('expert_healthcare_topheader', $topheader_email)); ?></a>
					<?php }?>
				</div>
				<div class="offset-lg-2 col-lg-5 col-md-4 text-md-end text-center align-self-center">
					<?php if( $topheader_social_media_setting != ''){?>
						<?php if( $topheader_social_media_facebook != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $topheader_social_media_facebook)); ?>"><i class="fab fa-facebook-f"></i></a>
						<?php }?>
						<?php if( $topheader_social_media_twitter != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $topheader_social_media_twitter)); ?>"><i class="fab fa-twitter"></i></a>
						<?php }?>
						<?php if( $topheader_social_media_instagram != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $topheader_social_media_instagram)); ?>"><i class="fab fa-instagram"></i></a>
						<?php }?>
						<?php if( $topheader_social_media_linkedin != ''){?>
							<a class="me-3" href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $topheader_social_media_linkedin)); ?>"><i class="fab fa-linkedin-in"></i></a>
						<?php }?>
						<?php if( $topheader_social_media_youtube != ''){?>
							<a href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $topheader_social_media_youtube)); ?>"><i class="fab fa-youtube"></i></a>
						<?php }?>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
<?php }?>
	<div class="lower-header-area py-3">
		<div class="container">
      <nav class="navbar navbar-expand-lg navbaroffcanvase">
    		<div class="row">
    			<div class="col-lg-2 col-md-6 align-self-center">
						<div class="logo">
							<?php if(has_custom_logo()) {
								the_custom_logo();
							} else { 
									$expert_healthcare_site_title = get_theme_mod('expert_healthcare_site_title_setting','1');
									if($expert_healthcare_site_title == '1') { ?>
										<h4 class="site-title">
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
												<?php 
													esc_html(bloginfo('name'));
												?>
											</a>
										</h4>
									<?php }
									$expert_healthcare_tagline = get_theme_mod('expert_healthcare_tagline_setting' );
									if($expert_healthcare_tagline  ) { ?>
								<?php
									$expert_healthcare_site_desc = get_bloginfo( 'description'); ?>
									<p class="site-description"><?php echo esc_html($expert_healthcare_site_desc); ?></p>
								<?php } ?>
							<?php }?>
						</div>
					</div>
      		<div class="col-lg-5 col-md-6 align-self-center">
      			<div class="navbar-menubar responsive-menu">
      				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php esc_attr('Toggle navigation','expert-healthcare'); ?>"> 
          			<i class="fa fa-bars"></i>
          		</button>
              <div class="collapse navbar-collapse navbar-menu">
              	<button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-label="<?php esc_attr('Toggle navigation','expert-healthcare'); ?>"> 
              		<i class="fa fa-times"></i>
          			</button> 
					<?php
		                wp_nav_menu( array( 
		                  'theme_location' => 'primary',
		                  'container_class' => 'main-menu clearfix' ,
		                  'menu_class' => 'clearfix',
		                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
		                  'fallback_cb' => 'wp_page_menu',
		                ) ); 
		            ?>
              </div>
            </div>
      		</div>
	    		<div class="col-lg-3 col-md-8 align-self-center">
	    			<?php if( $header_search_setting != ''){?>
						<div class="search_feild my-3 my-md-0">
	          				<?php get_search_form(); ?>
	        			</div>
	        		<?php }?>
     			</div>
				<div class="col-lg-2 col-md-4 align-self-center">
					<?php if( $topheader_button_link != '' || $topheader_button_text != ''){?>
						<div class="button_header text-center text-md-end">
							<a href="<?php echo esc_url( apply_filters('expert_healthcare_topheader', $topheader_button_link)); ?>"><?php echo esc_html( apply_filters('expert_healthcare_topheader', $topheader_button_text)); ?></a>
						</div>
					<?php }?>
          		</div>
      	</div>
      </nav>
    </div>
  </div>
</header>