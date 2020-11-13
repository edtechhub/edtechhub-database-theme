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

  wp_enqueue_style( 'preconnect', 'https://fonts.gstatic.com', array(), null);
  wp_enqueue_style( 'ethdb-font', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), null);
  wp_enqueue_style( 'tp-fontello-css', 'https://edtechhub.org/wp-content/plugins/essential-grid/public/assets/font/fontello/css/fontello.css?ver=3.0.7', array(), null);
  wp_enqueue_style( 'ekoterra-icons-css', 'https://edtechhub.org/wp-content/themes/edtechhub/css/font-icons/css/fontello-embedded.css', array(), null);
  wp_enqueue_style( 'ethdb-bootstrap', get_template_directory_uri().'/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'ethdb-style', get_stylesheet_uri(), array(), $theme_version );

}

function ethdb_register_scripts() {

  $theme_version = wp_get_theme()->get( 'Version' );

  wp_enqueue_script(  'ethdb-bootstrap-js', get_template_directory_uri().'/bootstrap.min.js', array(), null);
  wp_enqueue_script(  'ethdb-script-js', get_template_directory_uri().'/script.js', array(), null);

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

function ethdb_build_filter_list($query) {

  $primary_taxonomy = $query->query_vars['taxonomy'];
  $search_terms = $query->tax_query->queries;

  $taxonomies = array();

  foreach($search_terms as $term) {
    if(! array_key_exists($term['taxonomy'],$taxonomies)) {

      $this_taxonomy = get_taxonomy($term['taxonomy']);

      $taxonomies[$term['taxonomy']] = array(
        'taxonomy' => $term['taxonomy'],
        'object' => $this_taxonomy,
        'items' => array(),
      );
    }

    foreach($term['terms'] as $t) {
      $t_info = get_term_by( 'slug', $t, $term['taxonomy'] );
      array_push($taxonomies[$term['taxonomy']]['items'],$t_info);
    }

  }

  $filter_list = array(
    'filters' => $taxonomies,
    'primary_taxonomy' => $primary_taxonomy,
    'advanced_filter' => false,
  );
  if(count($taxonomies) > 1) { $filter_list['advanced_filter'] = true; }

  return $filter_list;

}

function ethdb_display_filters($query,$filter_list=NULL) {
  if(is_null($filter_list)) {
    $filter_list = ethdb_build_filter_list($query);
  }


  $output = "";

  if($filter_list['advanced_filter']) {

    $output .= "<ul>";

    foreach($filter_list['filters'] as $filter) {
      if($filter['taxonomy']!=$filter_list['primary_taxonomy']) {

        $taxonomy_name = $filter['object']->labels->name;

        $output .= "<li>";
        $output .= $taxonomy_name.": ";

        $terms_in_this_filter = array();
        foreach($filter['items'] as $item) {
          $term_name = $item->name;

          $url = ethdb_build_filter_url($filter_list,array('tax'=>$filter['taxonomy'],'term'=>$item->slug));

          $text = "<span>";
          $text .= $term_name;
          $text .= " <a href=\"$url\" title=\"Remove the filter $taxonomy_name: $term_name\">x</a>";
          $text .= "</span> ";

          array_push($terms_in_this_filter,$text);
        }
        $output .= implode(" &amp; ",$terms_in_this_filter);
        $output .= "</li>\n";
      }
    }

    $output .= "</ul>";
  }

  return $output;

}

function ethdb_build_filter_url($filter_list,$remove=NULL) {
  $url = "/";

  //build primary taxonomy url
  $primary = $filter_list['filters'][$filter_list['primary_taxonomy']];
  //add primary taxonomy slug
  $url .= $primary['object']->rewrite['slug'].'/';
  //build item list and separate with "+"
  $primary_items = array();
  foreach($primary['items'] as $item) {
    array_push($primary_items,$item->slug);
  }
  $url .= implode("+",$primary_items)."/";

  if($filter_list['advanced_filter']) {

    //build secondary filters
    $secondary_filters = array();
    foreach($filter_list['filters'] as $filter) {
      if($filter['taxonomy'] != $filter_list['primary_taxonomy']) {
        $filter_url = $filter['object']->query_var."=";
        $filter_items = array();
        foreach($filter['items'] as $item) {

          if(!is_null($remove) && ($remove['tax']===$filter['taxonomy'] && $remove['term']===$item->slug)) {
            //this item should be removed, so don't do anything
          } else {
            array_push($filter_items,$item->slug);
          }

        }
        if(!empty($filter_items)) {
          $filter_url .= implode("+",$filter_items);
          array_push($secondary_filters,$filter_url);
        }
      }
    }

    if(!empty($secondary_filters)) {
      $url .= "?".implode("&",$secondary_filters);
    }

  }

  return $url;
}

function ethdb_get_filter_title($query,$page,$fiter_list=NULL) {

  if(is_tax()) {


    if(is_null($filter_list)) {
      $filter_list = ethdb_build_filter_list($query);
    }

    $title = "";
    $search_terms = $query->tax_query->queries;

    //primary taxonomy defines how the title starts
    switch($filter_list['primary_taxonomy']) {
      case 'tool_region':
      case 'tool_country':
      case 'tool_language':
        $title .= "Tools available in ";
        break;
      case 'tool_connectivity_requirement':
      case 'tool_hardware_requirement':
        $title .= "Tools which require ";
        break;
      case 'tool_terms_and_costs':
      case 'tool_code_type':
        $title .= "Tools which are ";
        break;
      default:
        $title .= "Tools for ";
    }

    //get the primary search terms
    $primary_terms = array();
    foreach($search_terms as $term) {
      if($term['taxonomy']==$filter_list['primary_taxonomy']) {

        foreach($term['terms'] as $t) {
          $t_name = get_term_by( 'slug', $t, $term['taxonomy'] );
          array_push($primary_terms,$t_name->name);
        }
      }
    }

    $title.= implode(" &amp; ",$primary_terms);

    $title.=$page;

    return $title;
  } else {
    return "";
  }

}
