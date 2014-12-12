<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),
	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'font-color' => array(
		'type' => 'select',
		'label' => __('Font Color', 'unyson'),
		'desc' => __('Dark or Light font color?', 'unyson'),
		'choices' => array(
			'light' => __('Light', 'fw'),
			'dark' => __('Dark', 'fw'),
		),
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	),
	'css-id' => array(
		'type' => 'text',
		'label' => __('HTML ID', 'fw'),
		'desc' => __('For anchors, CSS or Javascript', 'fw'),
	),
	'css-classes' => array(
		'type' => 'text',
		'label' => __('CSS classes', 'fw'),
		'desc' => __('CSS classes for styling. Classes must be separated with spaces', 'fw'),
	),
);
