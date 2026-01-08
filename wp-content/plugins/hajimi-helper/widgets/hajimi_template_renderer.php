<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Template_Renderer_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_template_renderer';
    }

    public function get_title() {
        return __( 'Hajimi Template Renderer', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-library-folder';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function register_controls() {
        
        $options = [];

        $posts = get_posts([
            'post_type'      => 'elementor_library',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ]);
        
        foreach ( $posts as $post ) {
            $options[ $post->ID ] = $post->post_title;
        }

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'General', 'hajimi' ),
            ]
        );

		$this->add_control(
			'post_id',
			[
				'label' => esc_html__( 'Select Template', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => false,
				'options' => $options,
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'template_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hajimi-template-base',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'template_border',
				'selector' => '{{WRAPPER}} .hajimi-template-base',
			]
		);

		$this->add_responsive_control(
			'template_border_radius',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Border Radius', 'hajimi' ),
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .hajimi-template-base' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();


        function fovtytech_elementor_shortcode( $atts ) {
            $atts = shortcode_atts(
                array(
                    'id' => '',
                ),
                $atts,
                'fovtytech_elementor_shortcode'
            );

            if ( empty( $atts['id'] ) ) {
                return 'Elementor template ID not provided.';
            }

            if ( ! did_action( 'elementor/loaded' ) ) {
                return 'Elementor is not active.';
            }

            $template_id = intval( $atts['id'] );
            $content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template_id );

            return $content;
        }
        add_shortcode( 'fovtytech_elementor_shortcode', 'fovtytech_elementor_shortcode' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Template_Renderer_Widget() );
