<?php
/**
 * Custom post type and taxonomy helpers.
 *
 * @category CPT
 * @package  JM_CORE
 * @author   Jethro May <hello@jethromay.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://jethromay.com/
 */

/**
 * Helper method to register a custom post type.
 *
 * @param $name - The name of the custom post type.
 * @param $icon - The icon used for the custom post type.
 * @param array $supports - An array of what the custom post type supports.
 * @param string $type - The type used for the custom post type.
 * @param bool $taxonomies - The taxonomies that this custom post type must use.
 * @param bool $public - Should the the custom post type be public or private.
 * @param bool $searchable - Should the custom post type be searchable.
 * @param null $slug - A custom slug.
 * @param null $label - A custom label.
 * @param bool $plural - A boolean to override pluralization of the taxonomy.
 *
 * @return string|string[]
 */
function jm_register_cpt($name, $icon, $supports = ['title'], $type = 'post', $taxonomies = false, $public = true, $searchable = true, $slug = null, $label = null, $plural = true)
{
    $label = $label ?? $name;

    $singular = ucwords(str_replace('-', ' ', $label));
    $plural   = $plural ? Inflect::pluralize($singular) : $singular;

    $slug = $slug ?? sanitize_title($plural);

    if (!$taxonomies) {
        $taxonomies = [$taxonomies];
    }

    $labels = [
        'name'                  => $plural,
        'singular_name'         => "$singular",
        'menu_name'             => $plural,
        'name_admin_bar'        => $plural,
        'archives'              => "$singular Archives",
        'parent_item_colon'     => "Parent $singular:",
        'all_items'             => "All $plural",
        'add_new_item'          => "Add New $singular",
        'add_new'               => 'Add New',
        'new_item'              => "New $singular",
        'edit_item'             => "Edit $singular",
        'update_item'           => "Update $singular",
        'view_item'             => "View $singular",
        'search_items'          => "Search $singular",
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => "Insert into " . $singular,
        'uploaded_to_this_item' => "Uploaded to this $singular",
        'items_list'            => "$plural list",
        'items_list_navigation' => "$plural list navigation",
        'filter_items_list'     => "Filter $plural list"
    ];
    $args = [
        'label'               => $plural,
        'description'         => $plural,
        'labels'              => $labels,
        'supports'            => array_merge(['revisions'], $supports),
        'hierarchical'        => $type === 'page',
        'public'              => $public,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-'.$icon,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => $public,
        'can_export'          => true,
        'has_archive'         => $public && $searchable ? $slug : false,
        'rewrite'             => empty($slug) ? false : ['slug' => $slug, 'with_front' => false],
        'exclude_from_search' => !$searchable || !$public,
        'publicly_queryable'  => $public,
        'capability_type'     => $type,
        'taxonomies'          => $taxonomies
    ];
    register_post_type($name, $args);
}

/**
 * Helper method to register a custom taxonomy.
 *
 * @param $name - The name of the taxonomy.
 * @param array $supports - An array of what the taxonomy supports.
 * @param bool $hierarchical - A boolean if hierarchical.
 * @param bool $public - A boolean whether or not the taxonomy should be public or private.
 * @param null $label - A custom label.
 * @param bool $plural - A boolean to override pluralization of the taxonomy.
 *
 * @return string|string[]
 */
function jm_register_taxonomies($name, $supports = [], $hierarchical = false, $public = true, $label = null, $plural = true)
{
    $label = $label ?? $name;

    $singular = ucwords(str_replace('-', ' ', $label));
    $plural   = Inflect::pluralize($singular);

    $labels = [
        'name'                       => $plural,
        'singular_name'              => $singular,
        'menu_name'                  => $plural,
        'all_items'                  => "All $plural",
        'parent_item'                => "Parent $singular",
        'parent_item_colon'          => "Parent $singular:",
        'new_item_name'              => "New $singular Name",
        'add_new_item'               => "Add New $singular",
        'edit_item'                  => "Edit $singular",
        'update_item'                => "Update $singular",
        'view_item'                  => "View $singular",
        'separate_items_with_commas' => "Separate $plural with commas",
        'add_or_remove_items'        => "Add or remove $plural",
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => "Popular $plural",
        'search_items'               => "Search $plural",
        'not_found'                  => 'Not Found',
        'no_terms'                   => "No $plural",
        'items_list'                 => "$plural list",
        'items_list_navigation'      => "$plural list navigation"
    ];
    $args = [
        'labels'            => $labels,
        'hierarchical'      => $hierarchical,
        'public'            => $public,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_tagcloud'     => false,
        'rewrite'           => ['slug' => sanitize_title($plural), 'with_front' => false, 'hierarchical' => $hierarchical]
    ];
    register_taxonomy($name, $supports, $args);
}
