<?php if (!defined('FW')) {die('Forbidden');}

/**
 * Display all existing people posts on the page (without pagination)
 * Because in this theme we use the https://mixitup.kunkalabs.com/ plugin to display people posts
 * If your theme displays people posts in a different way, feel free to change or remove this function
 * @internal
 * @param WP_Query $query
 */
function _fw_ext_people_theme_action_set_posts_per_page($query) {
	if (!$query->is_main_query()) {
		return;
	}

	/**
	 * @var FW_Extension_People $people
	 */
	$people = fw()->extensions->get('people');

	$is_people_taxonomy = $query->is_tax($people->get_taxonomy_name());
	$is_people_archive = $query->is_archive()
	&& isset($query->query['post_type'])
	&& $query->query['post_type'] == $people->get_post_type_name();

	if ($is_people_taxonomy || $is_people_archive) {
		$query->set('posts_per_page', -1);
	}
}
add_action('pre_get_posts', '_fw_ext_people_theme_action_set_posts_per_page');