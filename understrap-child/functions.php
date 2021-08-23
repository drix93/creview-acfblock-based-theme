<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_style( 'print-styles', get_stylesheet_directory_uri() . '/css/print.css', array(), $the_theme->get( 'Version' ), 'print' );
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

add_filter( 'theme_page_templates', 'understrap_child_remove_page_template', 30, 3);
function understrap_child_remove_page_template( $page_templates ) {
    // Remove the template we don’t need.
    unset( $page_templates['page-templates/both-sidebarspage.php'] );
    unset( $page_templates['page-templates/left-sidebarpage.php'] );
    unset( $page_templates['page-templates/right-sidebarpage.php'] );
    unset( $page_templates['page-templates/empty.php'] );
    unset( $page_templates['page-templates/fullwidthpage.php'] );
    unset( $page_templates['page-templates/blank.php'] );

    return $page_templates;
}

// Remove footerfull sidebar
function go_away_extra_sidebar(){
    unregister_sidebar( 'footerfull' );
}

/**
 * Register support for Gutenberg wide images in your theme
 * src: https://weblines.com.au/gutenberg-blocks-wide-alignment-full-width/
 */
function mytheme_setup() {
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

// Enqueue block styles
function theme_gutenberg_scripts() {
    wp_enqueue_script(
        'theme-editor', 
        get_stylesheet_directory_uri() . '/js/editor.js', 
        array('wp-blocks', 'wp-dom'), 
        filemtime(get_stylesheet_directory() . '/js/editor.js'), 
        true 
    );
}
add_action('enqueue_block_editor_assets', 'theme_gutenberg_scripts');


// Functions
require_once 'inc/sidebars.php';
require_once 'inc/other-funcs.php';
require_once 'inc/menu-positions.php';
require_once 'inc/acf-settings.php';
require_once 'inc/acf-blocks.php';

// Create default block template layout when adding a new page.
function block_template() {
    $post_type_object = get_post_type_object( 'page' );
    $page_title = get_the_title();
    $post_type_object->template = array(
        array( 'core/spacer', array( 'height' => '66' ) ),
        array( 'cgb/containers-block' , array( 'containerType' => 'offset-md-1 col-md-10' ), array(
            array( 'core/heading' , array( 'content' => 'Heading' ) ),
            array( 'core/spacer' , array( 'height' => '21' ) ),
            array( 'core/paragraph' , array( 'content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ) ),
        ) ),
        array( 'core/spacer', array( 'height' => '66' ) ),
    );
  }
  add_action( 'init', 'block_template' );

// Enable editor on Blog/Posts edit page, this is hidden by default
if( ! function_exists( 'editor_on_posts_page' ) ) {

    function editor_on_posts_page( $post_type, $post ) {
        if( $post->ID != get_option('page_for_posts') ) {
            return;
        }

        // Remove warning about editing the blog/posts page.
        // remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
        add_post_type_support( 'page', 'editor' );
    }

    add_action( 'add_meta_boxes', 'editor_on_posts_page', 0, 2 );

}

// Add image thumbnail size
add_image_size( 'general', 445, 250, array( 'center', 'center' ) );
add_image_size( 'video-thumb', 600, 400, array( 'center', 'center' ) );

// Add registered custom thumbnails to the backend edit areas where possible
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'video-thumb' => __( 'Video Thumbnail' ),
        'general' => __( 'General' ),
    ) );
}

// Add the aria-hidden attribute to any img tag that doesn't have an alt
function custom_aria_hidden( $attr ){
	if ( empty( $attr['alt'] ) ) $attr['aria-hidden'] = 'true';
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'custom_aria_hidden' );