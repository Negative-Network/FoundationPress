<?php if (!defined('FW')) die('Forbidden');

$extra_classes = '';
$bg_color = '';
if (!empty($atts['background_color'])) {
	$bg_color = 'background-color:' . $atts['background_color'] . ';';
}

$bg_image = '';
if (!empty($atts['background_image']['data']['icon'])) {
	$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
}

$bg_video_data_attr = '';
if (!empty($atts['video'])) {
	$bg_video_data_attr = 'data-wallpaper-options=' . json_encode(array('source' => array('video' => $atts['video'])));
	$extra_classes .= ' background-video';
}
if (!empty($atts['font_color'])) {
	$extra_classes .= ' '.$atts['font_color'].'-font';
}
if (!empty($atts['css_classes'])) {
	$extra_classes .= ' '.$atts['css_classes'];
}
$css_id = '';
if (!empty($atts['css_id'])) {
	$css_id = 'id="'.$atts['css_id'].'"';
}


$container_class = (isset($atts['is_fullwidth']) && $atts['is_fullwidth']) ? 'fullwidth' : 'row';
?>
<section <?php echo $css_id?> class="fw-main-row <?php echo $extra_classes ?>" style="<?php echo $bg_color; ?> <?php echo $bg_image; ?>" <?php echo $bg_video_data_attr; ?>>
	<div class="<?php echo $container_class; ?>">
		<?php echo do_shortcode($content); ?>
	</div>
</section>
