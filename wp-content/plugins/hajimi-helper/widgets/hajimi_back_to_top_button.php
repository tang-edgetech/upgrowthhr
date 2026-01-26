<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Back_To_Top_Button extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_back_to_top_button';
    }

    public function get_title() {
        return __( 'Hajimi Back To Top Button', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-upload-circle-o';
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
            'button_style',
            [
                'label' =>  __( 'Style', 'hajimi' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__( 'Default', 'hajimi' ),
                    'rounded' => esc_html__( 'Rounded', 'hajimi' ),
                    'circle' => esc_html__( 'Circle', 'hajimi' ),
                ]
            ]
        );

		$this->add_control(
			'button_icon',
			[
				'label' => esc_html__( 'Icon', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-chevron-up',
					'library' => 'fa-solid',
				],
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
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .hajimi-back2top',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .hajimi-back2top',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} button.hajimi-back2top',
			]
		);
        
        $this->add_responsive_control(
            'box_width',
            [
                'label' => __( 'Width', 'hajimi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hajimi-back2top' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_height',
            [
                'label' => __( 'Height', 'hajimi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hajimi-back2top' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
		$this->add_control(
			'button_icon_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-back2top *' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hajimi-back2top *' => 'fill: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
            'box_icon_size',
            [
                'label' => __( 'Icon Size', 'hajimi' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .hajimi-back2top *' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .hajimi-back2top *' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $style = $settings['button_style'];
    ?>
        <button type="button" class="hajimi-back2top button-<?= $style;?>" id="hajimi-back2top">
			<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </button>  
    <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Back_To_Top_Button() );
