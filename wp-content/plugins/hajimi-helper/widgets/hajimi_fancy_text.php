<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Fancy_Heading_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_fancy_heading';
    }

    public function get_title() {
        return __( 'Hajimi Fancy Heading', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'General', 'hajimi' ),
            ]
        );

		$this->add_control(
			'heading_title',
			[
				'label' => esc_html__( 'Heading', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your title here', 'hajimi' ),
			]
		);

		$this->add_control(
			'heading_title_tag',
			[
				'label' => esc_html__( 'Heading Tag', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h2',
                'options' => [
                    'h1' => esc_html__( 'H1', 'hajimi' ),
                    'h2' => esc_html__( 'H2', 'hajimi' ),
                    'h3' => esc_html__( 'H3', 'hajimi' ),
                    'h4' => esc_html__( 'H4', 'hajimi' ),
                    'h5' => esc_html__( 'H5', 'hajimi' ),
                    'h6' => esc_html__( 'H6', 'hajimi' ),
                    'p' => esc_html__( 'Paragraph', 'hajimi' ),
                ]
			]
		);

		$this->add_control(
			'heading_title_style',
			[
				'label' => esc_html__( 'Heading Style', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
                'options' => [
                    'solid' => esc_html__( 'Solid', 'hajimi' ),
                    'outline' => esc_html__( 'Outline', 'hajimi' ),
                    'hollow-outline' => esc_html__( 'Hollow Outline', 'hajimi' ),
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_typography',
            [
                'label' => __( 'Typography', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .hajimi-fancy-heading .hajimi-heading-title',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Cosmetic', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'heading_title_color',
			[
				'label' => esc_html__( 'Text Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-fancy-heading .hajimi-heading-title' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_control(
			'heading_outline_color',
			[
				'label' => esc_html__( 'Heading Outline Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-fancy-heading .hajimi-heading-title' => '1px 1px 0 {{VALUE}},
                    -1px -1px 0 {{VALUE}},  
                    1px -1px 0 {{VALUE}},
                    -1px 1px 0 {{VALUE}}',
				],
                'condition' => [
                    'heading_title_style' => 'outline',
                ]
			]
		);

		$this->add_control(
			'heading_title_shadow',
			[
				'label' => esc_html__( 'Heading Shadow', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .hajimi-fancy-heading .hajimi-heading-title' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $heading_title = $settings['heading_title'];
        $heading_title_tag = $settings['heading_title_tag'];
        $heading_style = $settings['heading_title_style'];
        echo '<div class="hajimi-fancy-heading heading-'.$heading_style.'"><'.$heading_title_tag.' class="hajimi-heading-title">'.$heading_title.'</'.$heading_title_tag.'></div>';
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Fancy_Heading_Widget() );
