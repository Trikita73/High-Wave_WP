<?php 

function my_landing_scripts() {

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
    wp_enqueue_script('jquery-files', get_template_directory_uri() . '/libs/jquery/jquery-2.1.3.min.js', array(), '2.1.3', true);
    wp_enqueue_script('parallax-files', get_template_directory_uri() . '/libs/jquery/jquery-2.1.3.min.js', array(), '2.1.3', true);
    wp_enqueue_script('magnific-files', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.min.js', array(), '2.1', true);
    wp_enqueue_script('mixitup-files', get_template_directory_uri() . '/libs/mixitup/mixitup.min.js', array(), '2.1', true);
    wp_enqueue_script('scroll2id-files', get_template_directory_uri() . '/libs/scroll2id/PageScroll2id.min.js', array(), '2.1', true);
    wp_enqueue_script('waypoints-files', get_template_directory_uri() . '/libs/waypoints/waypoints.min.js', array(), '2.1', true);
    wp_enqueue_script('anumate-files', get_template_directory_uri() . '/libs/animate/animate-css.js', array(), '2.1', true);
    wp_enqueue_script('bootstrap-files', get_template_directory_uri() . '/libs/jqBootstrapValidation/jqBootstrapValidation.js', array(), '2.1', true);
    wp_enqueue_script('myparallax-files', get_template_directory_uri() . '/libs/myParallax/jquery.myParallax.js', array(), '2.1', true);
    wp_enqueue_script('main-js-file', get_template_directory_uri() . '/js/common.js', array(), '2.22', true);
}


// add function hook download scripts
add_action('wp_enqueue_scripts', 'my_landing_scripts');



