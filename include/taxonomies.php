<?php
// Register Custom taxonomy
function registerTaxonomies()
{
    $taxonomyArgs = array(
        [
            'name' => 'genres',
            'singular_name' => 'genre',
            'menu_name' => 'genres',
            'hierarchical' => false,
            'taxonomy' => 'genre',
            'post_types' => array('movie'),
        ],
        [
            'name' => 'countries',
            'singular_name' => 'country',
            'menu_name' => 'countries',
            'hierarchical' => false,
            'taxonomy' => 'country',
            'post_types' => array('movie'),
        ],
        [
            'name' => 'directors',
            'singular_name' => 'director',
            'menu_name' => 'directors',
            'hierarchical' => false,
            'taxonomy' => 'director',
            'post_types' => array('movie'),
        ],
        [
            'name' => 'writers',
            'singular_name' => 'writer',
            'menu_name' => 'writers',
            'hierarchical' => false,
            'taxonomy' => 'writer',
            'post_types' => array('movie'),
        ],
        [
            'name' => 'actors',
            'singular_name' => 'actor',
            'menu_name' => 'actors',
            'hierarchical' => false,
            'taxonomy' => 'actor',
            'post_types' => array('movie'),
        ],
    );
    foreach ($taxonomyArgs as $item) {
        $labels = array(
            'name' => __($item['name'], textDomain),
            'singular_name' => __($item['singular_name'], textDomain),
            'menu_name' => __($item['name'], textDomain),
            'all_items' => __('All Items', textDomain),
            'parent_item' => __('Parent Item', textDomain),
            'parent_item_colon' => __('Parent Item:', textDomain),
            'new_item_name' => __('New Item Name', textDomain),
            'add_new_item' => __('Add New Item', textDomain),
            'edit_item' => __('Edit Item', textDomain),
            'update_item' => __('Update Item', textDomain),
            'view_item' => __('View Item', textDomain),
            'separate_items_with_commas' => __('Separate items with commas', textDomain),
            'add_or_remove_items' => __('Add or remove items', textDomain),
            'choose_from_most_used' => __('Choose from the most used', textDomain),
            'popular_items' => __('Popular Items', textDomain),
            'search_items' => __('Search Items', textDomain),
            'not_found' => __('Not Found', textDomain),
            'no_terms' => __('No items', textDomain),
            'items_list' => __('Items list', textDomain),
            'items_list_navigation' => __('Items list navigation', textDomain),
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => $item['hierarchical'],
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
        );
        register_taxonomy($item['taxonomy'], $item['post_types'], $args);
    }
}

add_action('init', 'registerTaxonomies', 0);
