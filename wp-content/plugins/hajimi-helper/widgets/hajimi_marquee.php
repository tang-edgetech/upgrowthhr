<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Marquee extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_marquee';
    }

    public function get_title() {
        return __( 'Hajimi Marquee', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-animation';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_marquee',
            [
                'label' => __( 'Marquee', 'hajimi' ),
            ]
        );
        
        $this->add_control(
            'marquee_text_style',
            [
				'label' => esc_html__( 'Text Style', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'solid' => esc_html__( 'Solid', 'hajimi' ),
                    'outline' => esc_html__( 'Outline', 'hajimi' ),
                    'hollow-outline' => esc_html__( 'Hollow Outline', 'hajimi' ),
                ]
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

		$this->add_responsive_control(
			'space_between',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Spacing', 'hajimi' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'laptop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-fancy-marquee .marquee-track' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'marquee_speed',
			[
				'label' => esc_html__( 'Speed', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 500,
				'max' => 100000,
				'step' => 100,
				'default' => 30000,
                'selectors' => [
                    '{{WRAPPER}} .hajimi-fancy-marquee .marquee-track' => 'animation-duration: {{VALUE}}ms;',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_marquee_style',
            [
                'label' => __( 'Style', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'marquee_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-fancy-marquee' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'fancy_heading_text_alignment',
			[
				'label' => esc_html__( 'Alignment', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hajimi' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hajimi' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hajimi' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hajimi-fancy-heading' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .hajimi-fancy-marquee .hajimi-heading-title',
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
					'{{WRAPPER}} .hajimi-fancy-marquee .hajimi-heading-title' => 'color: {{VALUE}}',
				],
			]
		);
        
		$this->add_control(
			'heading_outline_color',
			[
				'label' => esc_html__( 'Outline Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-fancy-marquee .hajimi-heading-title' => 'text-shadow: 1px 1px 0 {{VALUE}}, -1px -1px 0 {{VALUE}}, 1px -1px 0 {{VALUE}}, -1px 1px 0 {{VALUE}}',
				],
                'condition' => [
                    'marquee_text_style' => 'outline',
                ]
			]
		);

		$this->add_control(
			'heading_title_shadow',
			[
				'label' => esc_html__( 'Heading Shadow', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::TEXT_SHADOW,
				'selectors' => [
					'{{SELECTOR}} .hajimi-fancy-marquee .hajimi-heading-title' => 'text-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{COLOR}};',
				],
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $heading_title = $settings['heading_title'];
        $heading_title_tag = $settings['heading_title_tag'];
        $heading_style = $settings['marquee_text_style'];

        echo '<div class="hajimi-fancy-marquee">';
            echo '<div class="marquee-track">';
                echo '<'.$heading_title_tag.' class="hajimi-heading-title heading-'.$heading_style.'">'.$heading_title.'</'.$heading_title_tag.'>';
            echo '</div>';  
        echo '</div>';  
    }

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Marquee() );
