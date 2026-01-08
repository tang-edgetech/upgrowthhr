<?php
/**
 * Plugin Name: Hajimi - Your Best Buddy
 * Description: Custom Elementor widgets for the Chiwawa group.
 * Version: 1.0
 * Author: Hajimi
 * Text Domain: hajimi
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Define plugin path
define( 'HAJIMI_WIDGET_PATH', plugin_dir_path( __FILE__ ) );
define( 'HAJIMI_WIDGET_URL', plugin_dir_url( __FILE__ ) );
define( 'HAJIMI_VERSION', '1.0.'.time() );

// Load widget files
function hajimi_load_widget_files() {
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_clientele_slider.php';
}
add_action( 'elementor/widgets/widgets_registered', 'hajimi_load_widget_files' );

// Register Chiwawa category
function hajimi_add_elementor_category( $elements_manager ) {
    $elements_manager->add_category(
        'hajimi',
        [
            'title' => __( 'Hajimi', 'hajimi' ),
            'icon' => 'fa fa-paw'
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'hajimi_add_elementor_category' );


function hajimi_enqueue_styles() {
    wp_enqueue_style(
        'hajimi-style',                             
        HAJIMI_WIDGET_URL . 'css/hajimi.css',        
        HAJIMI_VERSION,
        filemtime( HAJIMI_WIDGET_PATH . 'css/hajimi.css' )
    );

    wp_enqueue_script(
        'hajimi-script',                             
        HAJIMI_WIDGET_URL . 'js/hajimi.js',   
        ['jquery'],     
        HAJIMI_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'hajimi_enqueue_styles' );
// add_action( 'elementor/editor/after_enqueue_styles', 'hajimi_enqueue_styles' );