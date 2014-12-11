<?php if (!defined('FW')) {
	die('Forbidden');
}

if (isset($data['slides'])) {

	$post_id = isset($data['settings']['post_id']) ? $data['settings']['post_id'] : rand();

	//include JS slick init
	include 'slick-init.php';

	?>

<div id="slick-<?php echo $post_id;?>" class="slick slick-default">
<?php

	foreach ($data['slides'] as $slide) {

		if (isset($slide['multimedia_type'])) {
			if ($slide['multimedia_type'] == 'image')//it's an image
			{
				$meta = wp_get_attachment_metadata($slide['post_id']);
			} else {
				//it's a video
				break;
			}
		} else {
			$meta = wp_get_attachment_metadata(get_post_thumbnail_id($slide['post_id']));
		}

		echo '<div class="image">';
		echo '<img src="' . $slide['src'] . '" alt="" class="slider-images"/>';
		echo '</div>';

	}
	?>
</div>

<?php }?>
