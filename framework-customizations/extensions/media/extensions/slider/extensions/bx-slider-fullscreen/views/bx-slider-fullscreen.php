<?php if (!defined('FW')) {
	die('Forbidden');
}
?>
<?php if (isset($data['slides'])):

	// fw_print(fw_get_db_post_option($data['settings']['post_id']));
	// fw_print($data);

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
						        var imageIntervals = 8000;
						        var startIntervals;
						        var intervalSetTime;
								var contentOpen = false;

						        jQuery(document).ready(function () {

									jQuery('header h1.entry-title').hide();

								    slider = jQuery('#bxslider-fullscreen').bxSlider({
									mode: 'fade',
									controls: true,
									nextText: '',
									prevText: '',
									pager: true,
									pause: imageIntervals,
									onSlideBefore : function($slideElement, oldIndex, newIndex){
										goToContent(newIndex)
									}
								    });

								    jQuery(function () {
										jQuery.preload(images, {
										    init: function (loaded, total) {
											   		    jQuery("#indicator").html("<img src='<?php echo get_template_directory_uri()?>images/load.gif' />");
										    },
										    loaded_all: function (loaded, total) {

										    	console.log(jQuery(window).height());
										    if(jQuery(window).height()>450)
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

									$('body').css('overflow','hidden');

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
										<?php  
										if(isset($slide['post_id']))
										{
											$category = '';
											foreach(get_the_terms($slide['post_id'],'fw-portfolio-category') as $category) { 
												switch($category->slug) 
												{
													case 'carnets-de-voyage': $category = 'le carnet';break;
													case 'dessins': $category =  'le dessin';break;
													case 'huiles': $category =  'l\'huile';break;
													default: $category =  $category->name;break;
												}; 
											} 

											echo '<a href="' . post_permalink($slide['post_id']) . '"><h2>'.$slide['title'].' - <span class="date">'.get_the_time('Y',$slide['post_id']).'</span></h2><span class="link">Voir '.$category.'</span></a>';

										} 
										else {
											echo '<h2>'.$slide['title'].'</h2>';
										}
										?>
									</div>
							    </div>
								<?php
								$i++;
								endforeach;
								?>
							</div>

	<?php endif;?>