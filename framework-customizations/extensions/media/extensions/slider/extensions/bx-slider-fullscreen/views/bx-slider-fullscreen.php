<?php if (!defined('FW')) {
	die('Forbidden');
}
?>
<?php if (isset($data['slides'])):

	print_r($data);

	?>
	<script type="text/javascript">

						        var slider;
						        var images = [
	<?php
	foreach ($data['slides'] as $slide) {
		echo '"' . $slide['src'] . '",';
	}
	?>
						        ];
						        var index = 0;
						        var transitionSpeed = 500;
						        var imageIntervals = 5000;
						        var startIntervals;
						        var intervalSetTime;
								var contentOpen = false;

						        jQuery(document).ready(function () {

									jQuery('header h1.entry-title').hide();

								    slider = jQuery('#bxslider-fullscreen').bxSlider({
									mode: 'fade',
									controls: true,
									pager: true,
									pause: imageIntervals,
									onSlideBefore : function($slideElement, oldIndex, newIndex){
										goToContent(newIndex)
									}
								    });

								    jQuery(function () {
										jQuery.preload(images, {
										    init: function (loaded, total) {
											//    		    jQuery("#indicator").html("<img src='<?php echo get_template_directory_uri()?>images/load.gif' />");
										    },
										    loaded_all: function (loaded, total) {

											jQuery('div.bx-wrapper').css('margin-top',jQuery(window).height()/4);

											// jQuery('.content-container').show();
											jQuery('#indicator').fadeOut('slow', function () {

												$('#thumb-container').fadeIn('slow');
											    jQuery.backstretch(images[index], {speed: transitionSpeed});

											    startIntervals = function () {
												intervalSetTime = setInterval(function () {
												    index = (index >= images.length - 1) ? 0 : index + 1;
												    jQuery.backstretch(images[index]);
												    slider.goToNextSlide()
												}, imageIntervals)
											    };
											    startIntervals();

											});
										    }
										});
								    });

						        });



						function goToContent(slideNum){
							clearInterval(intervalSetTime);
							index = slideNum;
							$.backstretch(images[index]);
							slider.goToSlide(slideNum);
							if (contentOpen == false){
								startIntervals();
							}
						};

						function showContent(){
							$('.content-bg').fadeIn('slow');
							clearInterval(intervalSetTime);
							contentOpen = true;
						};
						function closeContent(){
							$('.content-bg').fadeOut('slow');
							startIntervals();
							contentOpen = false;
						};

						    </script>


						    <div id="indicator"></div>

						    <div id="bxslider-fullscreen" class="bx-sliders">
	<?php
	$i = 0;
	foreach ($data['slides'] as $slide):
	?>
							    <div class="bx-content-container">
								<div class="bx-content-inner" id="bx-content-<?php echo $i;?>">
	<?php echo isset($data['settings']['post_id']) ? '<a href="' . post_permalink($data['settings']['post_id']) . '">Link</a>' : '';?>
								    <h2><?php echo $slide['title'];?></h2>
								    <div class="desc">
	<?php echo $slide['desc'];?>
	</div>
						</div>
							    </div>
	<?php
	$i++;
	endforeach;
	?>
	</div>

	<?php endif;?>