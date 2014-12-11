<script type="text/javascript">

     jQuery(document).ready(function () {
	 $('#slick-<?php echo $post_id;?>.slick').slick({
	     accessibility: true,
	     adaptiveHeight: <?php echo (isset($data['settings']['extra']['adaptiveHeight']) and $data['settings']['extra']['adaptiveHeight'] == 1) ? 'true' : 'false';?>,
	     arrows: <?php echo (isset($data['settings']['extra']['arrows']) and $data['settings']['extra']['arrows'] == 1) ? 'true' : 'false';?>,
	     prevArrow: '<button type="button" data-role="none" class="slick-prev">Previous</button>',
	     nextArrow: '<button type="button" data-role="none" class="slick-next">Next</button>',
	     autoplay: <?php echo (isset($data['settings']['extra']['autoplay']) and $data['settings']['extra']['autoplay'] == 1) ? 'true' : 'false';?>,
	     autoplaySpeed: <?php echo (isset($data['settings']['extra']['autoplaySpeed']) and $data['settings']['extra']['autoplay'] != '') ? $data['settings']['extra']['autoplaySpeed'] : '3000';?>,
	     dots: <?php echo (isset($data['settings']['extra']['dots']) and $data['settings']['extra']['dots'] == 1) ? 'true' : 'false';?>,
	     easing: 'easeInOutExpo',
	     fade: <?php echo (isset($data['settings']['extra']['transition']) and $data['settings']['extra']['transition'] == 'fade') ? 'true' : 'false';?>,
	     infinite: true,
	     lazyLoad: 'ondemand',
<?php echo (isset($data['settings']['extra']['variableWidth']) and $data['settings']['extra']['slidesToShow'] != '') ? 'slidesToShow: ' . $data['settings']['extra']['slidesToShow'] . ',' : '';?>
<?php echo (isset($data['settings']['extra']['variableWidth']) and $data['settings']['extra']['slidesToScroll'] != '') ? 'slidesToScroll: ' . $data['settings']['extra']['slidesToScroll'] . ',' : '';?>
	     speed: <?php echo isset($data['settings']['extra']['speed']) ? $data['settings']['extra']['speed'] : '1000';?>,
	     touchThreshold: 100,
	     variableWidth: <?php echo (isset($data['settings']['extra']['dots']) and $data['settings']['extra']['dots'] == 1) ? 'true' : 'false';?>,
<?php echo (isset($data['settings']['extra']['transition']) and $data['settings']['extra']['transition'] == 'vertical') ? 'vertical: true ' : '';?>

	 });

     });


    </script>