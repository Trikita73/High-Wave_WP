<?php 

// Enable support for post thumbnails (featured images)
add_theme_support( 'post-thumbnails' );

// add function hook download scripts
add_action('wp_enqueue_scripts', 'my_landing_scripts');

// Disable admin bar for all users
add_filter('show_admin_bar', '__return_false');

// include CSS and JS files:
function my_landing_scripts() {

    // jQuery is a dependency for our scripts, so we need to include it first:
    wp_enqueue_script('jquery');

    // add a main style file:
    wp_enqueue_style('main-style', get_stylesheet_uri() );

    // add CSS files:
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.min.css');
    wp_enqueue_style('fonts-css', get_template_directory_uri() . '/css/fonts.min.css');
    wp_enqueue_style('media-css', get_template_directory_uri() . '/css/media.min.css');
    wp_enqueue_style('skins-css', get_template_directory_uri() . '/css/skins/blue.css');

    // add CSS files with folder libs:
    wp_enqueue_style('libs-animate-css', get_template_directory_uri() . '/libs/animate/animate.css');
    wp_enqueue_style('libs-magnific-popup-css', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css');
    wp_enqueue_style('libs-linea-css', get_template_directory_uri() . '/libs/linea/styles.css');
    wp_enqueue_style('libs-font-awesome', get_template_directory_uri() . '/libs/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('libs-bootstrap', get_template_directory_uri() . '/libs/bootstrap/bootstrap-grid.min.css');

    // add JS files:
    wp_enqueue_script('parallax-js', get_template_directory_uri() . '/libs/parallax/parallax.min.js', array('jquery'), '2.1.3', true);
    wp_enqueue_script('magnific-js', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.min.js', array(), '2.1', true);
    wp_enqueue_script('mixitup-js', get_template_directory_uri() . '/libs/mixitup/mixitup.min.js', array(), '2.1', true);
    wp_enqueue_script('scroll2id-js', get_template_directory_uri() . '/libs/scroll2id/PageScroll2id.min.js', array('jquery'), '2.1', true);
    wp_enqueue_script('waypoints-js', get_template_directory_uri() . '/libs/waypoints/waypoints.min.js', array(), '2.1', true);
    wp_enqueue_script('anumate-js', get_template_directory_uri() . '/libs/animate/animate-css.js', array(), '2.1', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/libs/jqBootstrapValidation/jqBootstrapValidation.js', array(), '2.1', true);
    wp_enqueue_script('myparallax-js', get_template_directory_uri() . '/libs/myParallax/jquery.myParallax.js', array(), '2.1', true);

    // common.js - our main JS file where we will write all the scripts for the site:
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/common.js', array('jquery', 'parallax-js', 'scroll2id-js'), '2.22', true);
}

// Create a universal post-type "Sections"
function register_landing_sections() {
    $labels = array(
        'name' => 'Sections Landing',
        'singular_name' => 'Element Section',
        'menu_name' => 'Content Landing',
        'add_new' => 'Add Element',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-layout', // icon layers
        'menu_position' => 5,
        // Включаем поддержку: Заголовок, Редактор, Картинка, Атрибуты (порядок), Произвольные поля
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'),
        // Подключаем стандартные рубрики (category)
        'taxonomies' => array('category'),
    );

    register_post_type('landing_sections', $args);
}
add_action('init', 'register_landing_sections');


// Universal function when we get elements by category
function get_landing_items($category_slug) {
    $args = array(
        'post_type'       => 'landing_sections',
        'post_per_page'   => -1,
        'category_name'   => $category_slug, // Filter by category
        'orderby'         => 'menu_order',   // Сортировка (можно менять в админке в поле "Порядок")
        'order'           => 'ASC'
    );
    return new WP_Query($args);
}

// Register menu in header
add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu() {
    register_nav_menus( array(
        'header_menu' => 'Header Menu',
    ));
}