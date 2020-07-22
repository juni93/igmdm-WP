<?php 

/**
 * Add Css to the theme
 */
function load_stylesheets() 
{
    /* wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', 
    array(), false, 'all');
    wp_enqueue_style('bootstrap'); */

    wp_register_style('stylesheet', get_template_directory_uri() . '/dist/app.css', 
    array(), false, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

/**
 * Add Jquery to the theme
 */
function include_jquery()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', '', 1, true);
    add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');

/**
 * Add Js to the theme
 */
function load_js()
{
    wp_register_script('customjs', get_template_directory_uri() . '/js/custom.js', '', 1, true);
    wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts', 'load_js');

/**
 * Activate theme features
 */
add_action('after_setup_theme', 'activate_features');
function activate_features()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        )
    );
}

/**
 * custom_post_type
 * Add a custom post type in this case Decklist
 * @return void
 */
add_action('init', 'custom_post_type');
function custom_post_type()
{
    register_post_type('decklists',
        array(
            'rewrite' => array('slug' => 'decklists'),
            'labels' => array(
                'name' => __('Decklists'),
                'singular' => __('Decklist'),
                'add_new_item' => 'Add New Decklist',
                'edit_item' => 'Edit Decklist'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
            'taxonomies' => array( 'formats' ),
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        )
    );
}

/**
 * create_topics_hierarchical_taxonomy()
 * To create a custom Taxanomy called Formats for decklist posts
 */
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
function create_topics_hierarchical_taxonomy() 
{

    //GUI Part
    $labels = array(
        'name' => _x( 'Formats', 'taxonomy general name' ),
        'singular_name' => _x( 'Format', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Format' ),
        'all_items' => __( 'All Formats' ),
        'parent_item' => __( 'Parent Format' ),
        'parent_item_colon' => __( 'Parent Format:' ),
        'edit_item' => __( 'Edit Format' ), 
        'update_item' => __( 'Update Format' ),
        'add_new_item' => __( 'Add New Format' ),
        'new_item_name' => __( 'New Format Name' ),
        'menu_name' => __( 'Formats' ),
    );    
 
    // Now register the taxonomy
    register_taxonomy('formats',array('decklists'), array(
        //make it hierarchical to make it act like categories
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'format' ),
        'show_in_rest' => true,
    ));
 
}

/**
 * tn_custom_excerpt_length
 * customize number of words in excerpt
 * @param  mixed $length
 * @return excerpt
 */
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );
function tn_custom_excerpt_length( $length ) 
{
    return 15;
}

/**
 * Register Top and bottom Menus to the theme
 */
register_nav_menus(
    array(
        'top-menu' => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme'),
        'social-menu' => __('Social Menu', 'theme'),
    )
);

/* 
* Register sidebar widget areas.
*/
add_action('widgets_init', 'register_widget_areas');
function register_widget_areas() 
{
    register_sidebar( 
        array(
            'name' => __('SideBar Widget Area', 'theme'),
            'id' => 'sidebar-1',
            'description' => __('Add Widgets here to appear in the sidebar', 'theme'),
            'before_wdiget' => '',
            'after_widget' => '',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>'
        )
    );
}
