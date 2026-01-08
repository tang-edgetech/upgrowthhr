<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Custom_Navigation_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_custom_navigation';
    }

    public function get_title() {
        return __( 'Hajimi Custom Navigation', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-menu-bar';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_general',
            [
                'label' => __( 'General', 'hajimi' ),
            ]
        );


        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Typography', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );



        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Custom_Navigation_Widget() );
