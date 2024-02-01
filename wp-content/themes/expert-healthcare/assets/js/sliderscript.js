jQuery(function($) {

    //slider
    var carousel_thumbs = jQuery("#carousel-thumbs").owlCarousel({
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        loop: true,
        nav:false,
        slide:1,
        responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 2
        }
      },
        navText : ["",""]
      
    });

    $('#carousel-thumbs .owl-item.active:first').addClass('review-center');

    $('#carousel-thumbs .owl-item.active:first').addClass('review-center');

    carousel_thumbs.on('changed.owl.carousel', function(event) {
     
      $('#carousel-thumbs .owl-item').removeClass('review-center');

      setTimeout(function(){
        $('#carousel-thumbs .owl-item.active').first().addClass('review-center');
        },50)
     
      $('#carouselExampleInterval [data-bs-slide="next"]').trigger('click');
    });


    $(document).on('click', '.owl-item>div', function() {
      var $speed = 300;  // in ms,
    });

  $('button#prev').click(function(){
    carousel_thumbs.trigger('#carousel-thumbs button.owl-prev');
    $('#carousel-thumbs .owl-item').removeClass('review-center');
    $('#carousel-thumbs .owl-item.active:first').addClass('review-center');
  });
   
  $('button#next').click(function(){
    carousel_thumbs.trigger('#carousel-thumbs button.owl-next');
    $('#carousel-thumbs .owl-item').removeClass('review-center');
    $('#carousel-thumbs .owl-item.active:first').addClass('review-center');
  });

});