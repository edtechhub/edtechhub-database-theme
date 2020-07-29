<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

add_action( 'init', 'ethdb_register_menus' );
add_action( 'wp_enqueue_scripts', 'ethdb_register_styles' );
add_action( 'wp_enqueue_scripts', 'ethdb_register_scripts' );
add_action( 'pre_get_posts', 'ethdb_change_post_order' );

add_theme_support( 'title-tag' );

function ethdb_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

  wp_enqueue_style( 'ethdb-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap', array(), null);
  wp_enqueue_style( 'ethdb-bootstrap', get_template_directory_uri().'/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'ethdb-style', get_stylesheet_uri(), array(), $theme_version );

}

function ethdb_register_scripts() {

  $theme_version = wp_get_theme()->get( 'Version' );

  wp_enqueue_script(  'ethdb-bootstrap-js', get_template_directory_uri().'/bootstrap.min.js', array(), null);

}

function ethdb_register_menus() {
  register_nav_menu('ethdb-header-menu',__( 'Header Menu' ));
}

function ethdb_change_post_order($query)
{
    if ( ($query->is_tax() || $query->is_post_type_archive('tools')) && $query->is_main_query())
    {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC');
    }
}
