<?php
 
function university_files(){  
    wp_enqueue_script('index_js_script', get_theme_file_uri('/build/index.js'), NULL, '1.0', 'true');  
    wp_enqueue_style( 'work_sans_google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style( 'font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_register_style( 'fictional-university-index',  get_template_directory_uri() .'/build/index.css', array(), null, 'all' );
    wp_register_style( 'fictional-university-style-index',  get_template_directory_uri() .'/build/style-index.css', array(), null, 'all' );
    wp_register_style( 'fictional-university-style', get_stylesheet_uri(), '', null, 'all' );
    wp_enqueue_style( 'fictional-university-index');
    wp_enqueue_style( 'fictional-university-style-index');
}

function university_theme_features() {
    //add_theme_support( 'menus');
    register_nav_menu ('main_menu', 'Header Main Menu');

    add_theme_support('title-tag');    	
    add_theme_support('post-thumbnails');
}

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

add_action( 'wp_enqueue_scripts', 'university_files');
add_action( 'after_setup_theme', 'university_theme_features');
