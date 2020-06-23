<?php 

function newTheme_setup(){

    // This is for adding customized image sizes

    add_image_size('smaller', 170, 100, true);
    add_image_size('regular', 231, 100, true);
}

add_action('after_setup_theme', 'newTheme_setup');

// Adding styles and scripts

function newTheme_styles(){
    // The main styles sheet
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css', array(), '1.0.0');
    wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css', array(), '1.0.0');
}

add_action('wp_enqueue_scripts', 'newTheme_styles');


// Adding new menus

function newTheme_menus(){
    register_nav_menus(
        array(
            'main_menu' => __('Main menu', 'newTheme'),
            'secondary_menu' => __('Secondary menu', 'newTheme')
        ));
}

add_action('init', 'newTheme_menus');

// Adding fontAwesome icons

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
    
function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );
}



