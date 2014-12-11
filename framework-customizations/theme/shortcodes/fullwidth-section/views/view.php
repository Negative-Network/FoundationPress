<?php
$bg_video = '';
$bg_video_class = '';
$font_color = empty($atts['option_values']['font-color']) ? '' : $atts['option_values']['font-color'] . '-font';
$bg_color = empty($atts['option_values']['background-color']) ? '' : 'background-color:' . $atts['option_values']['background-color'] . ';';
$bg_image = empty($atts['option_values']['background-image']) ? '' : 'background-image:url(' . $atts['option_values']['background-image']['data']['icon'] . ');';

$row = empty($atts['option_values']['section-row']) ? 'row' : '';
?>
<?php if (!empty($atts['option_values']['video'])):?>
    <?php
$bg_video = 'data-wallpaper-options=' . json_encode(array('source' => array('video' => $atts['option_values']['video'])));
$bg_video_class = 'wallpapered';
?>
<script>
        jQuery(document).ready(function ($) {
    	$(".wallpapered").wallpaper();
        });
    </script>
<?php endif;?>

    <div class="fullwidth-section <?php echo $bg_video_class;echo $font_color;?>"
	 style="<?php echo $bg_color?> <?php echo $bg_image?>" <?php echo $bg_video?>>


<?php echo ($row != '') ? '<div class="row">' : '';?>


<?php echo do_shortcode($content);?>
<!--<div style="clear:both"></div>-->


<?php echo ($row != '') ? '</div>' : '';?>

    </div>