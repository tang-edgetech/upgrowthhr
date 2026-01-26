<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Copyright_Label extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_copyright_label';
    }

    public function get_title() {
        return __( 'Hajimi Copyright Label', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-info-circle-o';
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
            'label_prefix',
            [
                'label' =>  __( 'Copyright Prefix', 'hajimi' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__( 'Type 1', 'hajimi' ),
                    'type-2' => esc_html__( 'Type 2', 'hajimi' ),
                ]
            ]
        );

        $this->add_control(
            'label_tag',
            [
                'label' =>  __( 'Copyright Tag', 'hajimi' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'p',
                'options' => [
                    'h1' => esc_html__( 'h1', 'hajimi' ),
                    'h2' => esc_html__( 'h2', 'hajimi' ),
                    'h3' => esc_html__( 'h3', 'hajimi' ),
                    'h4' => esc_html__( 'h4', 'hajimi' ),
                    'h5' => esc_html__( 'h5', 'hajimi' ),
                    'h6' => esc_html__( 'h6', 'hajimi' ),
                    'p' => esc_html__( 'P', 'hajimi' ),
                ]
            ]
        );

        $this->add_control(
            'label_text',
            [
                'label' => __( 'Copyright Text', 'hajimi' ),
                'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'All Rights Reserved.', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your title here', 'hajimi' ),
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

		$this->add_responsive_control(
			'content_align',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'hajimi' ),
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
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'prefix_class' => 'text-align-%s',
                'selectors' => [
                    '{{WRAPPER}} .hajimi-copyright-wrapper ' => 'text-align: {{VALUE}}'
                ]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .hajimi-copyright-wrapper .copyright-label',
			]
		);

		$this->add_control(
			'heading_title_color',
			[
				'label' => esc_html__( 'Text Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-copyright-wrapper .copyright-label' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $label_prefix = $settings['label_prefix'];
        $year = date('Y');
        if( $label_prefix == 'type-2' ) {
            $prefix = 'Copyright &copy ' . $year . ' ';
        }
        else {
            $prefix = '&copy ' . $year . ' ';
        }
        $label_tag = $settings['label_tag'];
        $label_text = $settings['label_text'];
        $copyright = $prefix . $label_text;
        echo '<div class="hajimi-copyright-wrapper"><'.$label_tag.' class="copyright-label">'.$copyright.'</'.$label_tag.'></div>';
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Copyright_Label() );
