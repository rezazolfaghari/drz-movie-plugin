<?php
function registerPostType()
{

    $labels = array(
        'name' => __('movies', textDomain),
        'singular_name' => __('movie', textDomain),
        'menu_name' => __('movie', textDomain),
        'name_admin_bar' => __('movie', textDomain),
        'archives' => __('Item Archives', textDomain),
        'attributes' => __('Item Attributes', textDomain),
        'parent_item_colon' => __('Parent Item:', textDomain),
        'all_items' => __('All Items', textDomain),
        'add_new_item' => __('Add New Item', textDomain),
        'add_new' => __('Add New', textDomain),
        'new_item' => __('New Item', textDomain),
        'edit_item' => __('Edit Item', textDomain),
        'update_item' => __('Update Item', textDomain),
        'view_item' => __('View Item', textDomain),
        'view_items' => __('View Items', textDomain),
        'search_items' => __('Search Item', textDomain),
        'not_found' => __('Not found', textDomain),
        'not_found_in_trash' => __('Not found in Trash', textDomain),
        'featured_image' => __('Featured Image', textDomain),
        'set_featured_image' => __('Set featured image', textDomain),
        'remove_featured_image' => __('Remove featured image', textDomain),
        'use_featured_image' => __('Use as featured image', textDomain),
        'insert_into_item' => __('Insert into item', textDomain),
        'uploaded_to_this_item' => __('Uploaded to this item', textDomain),
        'items_list' => __('Items list', textDomain),
        'items_list_navigation' => __('Items list navigation', textDomain),
        'filter_items_list' => __('Filter items list', textDomain),
    );
    $args = array(
        'label' => __('movie', textDomain),
        'description' => __('suggest movie', textDomain),
        'labels' => $labels,
        'taxonomies' => array('movie_cat', 'movie_tax'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'excerpt', 'comments'),

    );
    register_post_type('movie', $args);

}

add_action('init', 'registerPostType', 0);