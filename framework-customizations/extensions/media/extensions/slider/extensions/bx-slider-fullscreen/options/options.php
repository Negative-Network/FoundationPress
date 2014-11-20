<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'test1z' => array(
		'label' => __('Type of Transition', 'fw'),
		'desc' => __('Type of transition between slides', 'fw'),
		'type' => 'select',
		'choices' => array(
			'horizontal' => __('Horizontal', 'fw'),
			'vertical' => __('Vertical', 'fw'),
			'fade' => __('Fade', 'fw')
		),
		'value' => 'horizontal',
	),
	'speed' => array(
		'label' => __('Transition speed', 'fw'),
		'desc' => __('Time in milliseconds in betweens slides', 'fw'),
		'type' => 'text',
		'value' => '5000',
	),
);
