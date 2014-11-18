<?php if (!defined('FW')) die('Forbidden'); ?>
<?php if (isset($data['slides'])): ?>
    <script type="text/javascript">

        var slider;
        var images = [
    <?php
    foreach ($data['slides'] as $slide)
    {
	echo '"' . $slide['src'] . '",';
    }
    ?>
        ];
        var index = 0;
        var transitionSpeed = 500;
        var imageIntervals = 5000;
        var startIntervals;
        var intervalSetTime;

        jQuery(document).ready(function () {

	    slider = jQuery('#slider1').bxSlider({
		mode: 'fade',
		controls: false,
		pause: imageIntervals
	    });

	    jQuery(function () {

		jQuery.preload(images, {
		    init: function (loaded, total) {
			//    		    jQuery("#indicator").html("<img src='<?php echo get_template_directory_uri() ?>images/load.gif' />");
		    },
		    loaded_all: function (loaded, total) {
			jQuery('.content-container').show();
			jQuery('#indicator').fadeOut('slow', function () {
			    //    			jQuery('#left-side').fadeIn('slow');
			    //    			jQuery('#thumb-container').fadeIn('slow');
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

    </script>


<!--    <div id="left-side">
        <a href="javascript:showContent();" class="content-button"></a>
    </div>-->
    <div id="indicator"></div>

    <div id="slider1" class="bx-sliders">
	<?php foreach ($data['slides'] as $slide) : ?>
	    <div class="content-container">
		<div class="content-inner">
		    <h2><?php echo $slide['title']; ?></h2>
		    <?php echo $slide['desc']; ?>
		</div>
	    </div>
	<?php endforeach; ?>
    </div>

    <!--<div id="thumb-container"></div>-->

<?php endif; ?>
