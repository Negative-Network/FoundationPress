<?php
get_header();

global $wp_query;
$ext_people_instance = fw()->extensions->get('people');
$ext_people_settings = $ext_people_instance->get_settings();

$taxonomy = $ext_people_settings['taxonomy_name'];
$term = get_term_by('slug', get_query_var('term'), $taxonomy);
$term_id = (!empty($term->term_id)) ? $term->term_id : 0;
$categories = fw_ext_people_get_listing_categories($term_id, $taxonomy);

$listing_classes = fw_ext_people_get_sort_classes($wp_query->posts, $ext_people_settings['taxonomy_name'], $categories);
$loop_data = array(
	'settings' => $ext_people_instance->get_settings(),
	'categories' => $categories,
	'image_sizes' => $ext_people_instance->get_image_sizes(),
	'listing_classes' => $listing_classes,
);
set_query_var('fw_people_loop_data', $loop_data);
?>
<div class="content-area">
		<section id="primary" class="site-content people-content">
			<div id="content" role="main">
				<header class="entry-header">
<?php //fw_print($backup); fw_print($categories);fw_print($listing_classes);
if (!empty($term)) {
	echo '<h1 class="entry-title">' . $term->name . '</h1>';
} else {
	echo '<h1 class="entry-title">' . __('Peoples', 'fw') . '</h1>';
}

if (function_exists('fw_ext_breadcrumbs_render')) {
	echo fw_ext_breadcrumbs_render();
}
?>

<?php if (!empty($categories)):?>
						<div class="wrapp-categories-people">
							<ul id="categories-people" class="people-categories">
								<li class="filter categories-item" data-filter=".category_all"><a
										href='#'><?php _e('All', 'unyson');?></a></li>
<?php foreach ($categories as $category):?>
									<span class="separator">/</span>
									<li class="filter categories-item"
									    data-filter=".category_<?php echo $category->term_id?>"><a
											href='#'><?php echo $category->name;?></a></li>
<?php endforeach;?>
</ul>
						</div>
<?php endif?>
</header>
				<div class="entry-content">
					<section class="people" id="Container">
<?php if (have_posts()):?>
<ul id="people-list" class="people-list">
<?php
while (have_posts()):the_post();
	get_template_part('framework-customizations/extensions' . $ext_people_instance->get_rel_path() . '/views/loop', 'item');//fixme hardcoded 'framework-customizations/extensions'
endwhile;
fw_theme_paging_nav();
?>
</ul>
<?php else:?>
							<?php get_template_part('content', 'none');?>
						<?php endif;?>
<div class="clear"></div>
					</section>
				</div>
			</div>
		</section>
	</div>
<?php
//free memory
unset($ext_people_instance);
unset($ext_people_settings);
set_query_var('fw_people_loop_data', '');
get_sidebar('content');
get_sidebar();
get_footer();