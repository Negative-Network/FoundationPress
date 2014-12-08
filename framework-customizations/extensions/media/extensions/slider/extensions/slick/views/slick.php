<?php if (!defined('FW')) {
    die('Forbidden');
}
?>
  <?php if (isset($data['slides'])){

      // fw_print(fw_get_db_post_option($data['settings']['post_id']));
      // fw_print($data);

  ?>
    <script type="text/javascript">
     $.fn.fullscreen = function () {
	 $(this).height($(window).height()).width($(window).width());
     };

     jQuery(document).ready(function () {
	 $('#slick-home').slick({
	     // accessibility: true,
	     // adaptiveHeight: false,
	     // appendArrows: $(element),
	     // appendDots: $(element),
	     // arrows: true,
	     // asNavFor: null,
	     prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
	     nextArrow: '<button type="button" data-role="none" class="slick-next">Next</button>',
	     autoplay: false,
	     // autoplay: true,
	     // autoplaySpeed: 3000,
	     autoplaySpeed: 5000,
	     // centerMode: false,
	     // centerPadding: '50px',
	     // cssEase: 'ease',
	     // customPaging: function(slider, i) {
	     //     return '<button type="button" data-role="none">' + (i + 1) + '</button>';
	     // },
	     // dots: false,
	     dots: true,
	     // dotsClass: 'slick-dots',
	     // draggable: true,
	     // easing: 'linear',
	     easing: 'easeInOutExpo',
	     // fade: false,
	     // focusOnSelect: false,
	     // infinite: true,
	     // lazyLoad: 'ondemand',
	     lazyLoad: 'progressive',
	     // onBeforeChange: null,
	     // onAfterChange: null,
	     // onAfterChange: showplusbutton,
	     // onInit: null,
	     // onReInit: null,
	     // onReInit: showplusbutton,
	     // pauseOnHover: true,
	     // pauseOnDotsHover: false,
	     // responsive: null,
	     // rtl: false,
	     // slide: 'div',
	     // slide: 'div',
	     slidesToShow: 1,
	     // slidesToScroll: 1,
	     // speed: 300,
	     speed: 1000,
	     // swipe: true,
	     // swipeToSlide: false,
	     // touchMove: true,
	     // touchThreshold: 5,
	     touchThreshold: 100,
	     // useCSS: true,
	     // variableWidth: false,
	     variableWidth: true,
	     // vertical: false,
	     // waitForAnimate: true
	 });

	 $(window).resize(function(){
	     $(".fullscreen").fullscreen();
	 });

	 $(".fullscreen").fullscreen();
	 $('.focuspoint').focusPoint();
     });


    </script>


    <div id="slick-home" class="slick">
      <?php
      $i = 0;
      
      foreach ($data['slides'] as $slide){
	  if (isset($slide['multimedia_type']))
	  {
	      if ($slide['multimedia_type'] == 'image') //it's an image
	      {
		  $meta = wp_get_attachment_metadata($slide['post_id']);
	      }
	      else{ //it's a video
		  break;
	      }
	  }
	  else $meta = wp_get_attachment_metadata(get_post_thumbnail_id($slide['post_id'])); //it's a post (Category)
	  echo '<div class="fullscreen">';
	  echo  '<div class="info-slider focuspoint" data-focus-x="0" data-focus-y="0" data-image-w="'.$meta["width"].'" data-image-h="'.$meta["height"].'" >';

	  echo '<div class="image">';
	  echo '<img data-lazy="'.$slide['src'].'" alt="" class="slider-images"/>';
	  echo '</div>';

	  echo '<div class="in-slide">';
	  echo '<div class="in-slide-wrap">';
	  echo '<div class="in-slide-inner-wrap">';
	  echo '<div class="in-slide-content">';
	      echo '<h2>'.$slide['title'].'</h2>';
	  echo '</div>';
	  echo '</div>';
	  echo '</div>';
	  echo '</div>';
	  
	  echo '</div>';
	  echo '</div>';

	  $i++;
      }
      ?>
    </div>

    <?php } ?>
