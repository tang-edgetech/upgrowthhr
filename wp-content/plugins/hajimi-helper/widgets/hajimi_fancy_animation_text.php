<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Animated_Fancytext_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_animated_fancytext';
    }

    public function get_title() {
        return __( 'Hajimi Animated Fancy Text', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'hajimi_settings',
            [
                'label' => __( 'Settings', 'hajimi' ),
            ]
        );

		$this->add_control(
			'heading_style',
			[
				'label' => esc_html__( 'Title Style', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'hajimi' ),
					'hollow' => esc_html__( 'Hollow', 'hajimi' ),
					'hollow-shade' => esc_html__( 'Hollow Shade', 'hajimi' ),
				],
			]
		);

		$this->add_control(
			'heading_title_tag',
			[
				'label' => esc_html__( 'Title Tag', 'hajimi' ),
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
					'span' => esc_html__( 'SPAN', 'hajimi' ),
				],
			]
		);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'heading_title',
			[
				'label' => esc_html__( 'Title', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your title here', 'hajimi' ),
			]
		);

        $this->add_control(
            'heading',
            [
                'label' => __( 'Title', 'hajimi' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'heading_title' => esc_html__( 'SAMPLE #1', 'hajimi' ),
                    ]
                ],
				'title_field' => '{{{ heading_title }}}',
            ]
        );

		$this->add_responsive_control(
			'heading_align',
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
                'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hajimi-animated-fancytext' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'typing_speed',
			[
				'label' => esc_html__( 'Typing Speed', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 50,
				'max' => 1000,
				'step' => 50,
				'default' => 50,
			]
		);

		$this->add_control(
			'delay',
			[
				'label' => esc_html__( 'Delay', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 500,
				'max' => 10000,
				'step' => 500,
				'default' => 500,
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Loop', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hajimi' ),
				'label_off' => esc_html__( 'Hide', 'hajimi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'typing_cursor',
			[
				'label' => esc_html__( 'Show Typing Cursor', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hajimi' ),
				'label_off' => esc_html__( 'Hide', 'hajimi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'hajimi_styling',
            [
                'label' => __( 'Style', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'heading_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title, {{WRAPPER}} .hajimi-animated-fancytext .heading-cursor',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4f3d95',
				'selectors' => [
					'{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title, {{WRAPPER}} .hajimi-animated-fancytext.heading-hollow-shade .fancytext-title span::after' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'heading_outline_color',
			[
				'label' => esc_html__( 'Outline Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4f3d95bf',
				'selectors' => [
					'{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title, {{WRAPPER}} .hajimi-animated-fancytext.heading-hollow-shade .fancytext-title span::after' => 'text-shadow: 1px 1px 0 {{VALUE}}, -1px -1px 0 {{VALUE}}, 1px -1px 0 {{VALUE}}, -1px 1px 0 {{VALUE}};',
				],
                'condition' => [
                    'heading_style!' => 'default'
                ]
			]
		);

		$this->add_control(
			'cursor_color',
			[
				'label' => esc_html__( 'Text Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-animated-fancytext .heading-cursor' => 'color: {{VALUE}}',
				],
                'condition' => [
                    'typing_cursor' => 'yes'
                ]
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Margin', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'em',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .hajimi-animated-fancytext .fancytext-title',
			]
		);
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $heading_title = '';
        if( !empty( $settings['heading'] ) ) {
            $count = 0;
            foreach( $settings['heading'] as $item ) {
                if( $count > 0 ) {
                    $heading_title .= '|';
                }
                $heading_title .= $item['heading_title'];
                $count++;
            }
        }
        $heading_title_tag = $settings['heading_title_tag'];
        $heading_style = $settings['heading_style'];
        $loop = !empty($settings['loop']) ? 'true' : 'false';
        $typing_speed = empty($settings['typing_speed']) ? (int) $settings['typing_speed'] : 50;
        $delay = !empty($settings['delay']) ? (int) $settings['delay'] : 50;
    ?>
        <div class="hajimi-animated-fancytext heading-<?= $heading_style;?>">
            <<?= $heading_title_tag;?> class="fancytext-title" 
                data-text="<?= $heading_title;?>"
                data-loop="<?= $loop;?>"
                data-typing-speed="<?= $typing_speed;?>"
                data-delay="<?= $delay;?>"
            ></<?= $heading_title_tag;?>>
            <div class="heading-cursor">|</div>
        </div>
        <p style="display: none;"><?= json_encode($settings['heading_typography']);?></p>
    <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Animated_Fancytext_Widget() );
