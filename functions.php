<?php

include 'functions-admin.php';

// Enqueue styles and scripts
function bc_styles() {
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
    wp_register_style( 'bc-styles', get_template_directory_uri() . '/style.css', array(), 1.0, 'all' );
    wp_register_style( 'google-fonts',
        'https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic|Zilla+Slab+Highlight', array(), 1.0, 'all' );
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'bc-styles' );
    wp_enqueue_style( 'google-fonts' );
}
add_action( 'wp_enqueue_scripts', 'bc_styles' );

function bc_scripts() {
    wp_register_script( 'jquery-js', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '2.2.4' );
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
    wp_register_script( 'global-js', get_template_directory_uri() . '/js/bc.js', array(), '1.0', true );
    wp_enqueue_script( 'jquery-js' );
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'global-js' );
}
add_action( 'wp_enqueue_scripts', 'bc_scripts' );

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Navigation Menu', 'blankcanvas' ) );
}

add_theme_support( 'post-thumbnails' );

function bc_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'bc_wp_title', 10, 2 );

function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-default"';
}

function apply_https( $url ) {
    if (strpos(get_site_url(), 'https') !== false) {
        $new = str_replace('http:','https:', $url);
        return $new;
    } else {
        return $url;
    }
}
