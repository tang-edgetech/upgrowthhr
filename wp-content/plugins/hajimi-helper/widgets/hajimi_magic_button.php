<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Magic_Button extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_magic_button';
    }

    public function get_title() {
        return __( 'Hajimi Magic Button', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'button_content',
            [
                'label' => __( 'Button', 'hajimi' ),
            ]
        );

		$this->add_control(
			'button_icon_alignment',
			[
				'label' => esc_html__( 'Icon Alignment', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'row' => [
						'title' => esc_html__( 'Left', 'hajimi' ),
						'icon' => 'eicon-h-align-left',
					],
					'row-reverse' => [
						'title' => esc_html__( 'Right', 'hajimi' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'row',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hajimi-magic-button > .btn' => 'flex-direction: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Title', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your title here', 'hajimi' ),
			]
		);
        
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Link', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label' => esc_html__( 'Icon', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-long-right',
					'library' => 'fa-solid',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .hajimi-magic-button > .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .hajimi-magic-button > .btn',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .hajimi-magic-button > .btn',
			]
		);

		$this->add_responsive_control(
			'button_border_radius',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Border Radius', 'hajimi' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hajimi-magic-button > .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Padding', 'hajimi' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hajimi-magic-button > .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->start_controls_tabs(
            'button_bg_tabs'
        );

        $this->start_controls_tab(
            'button_bg_tab',
            [
                'label' => esc_html__( 'Normal', 'hajimi' ),
            ]
        );

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-magic-button > .btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hajimi-magic-button > .btn::before',
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_bg_tab_hover',
            [
                'label' => esc_html__( 'Hover', 'hajimi' ),
            ]
        );

		$this->add_control(
			'button_text_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hajimi-magic-button > .btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hajimi-magic-button > .btn:hover svg' => 'fill: {{VALUE}}!important',
					'{{WRAPPER}} .hajimi-magic-button > .btn:hover svg path' => 'fill: {{VALUE}}!important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hajimi-magic-button > .btn:hover::before',
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'button_icon_style',
            [
                'label' => __( 'Icon', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
			'button_icon_gap',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Icon Spacing', 'hajimi' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 1,
                ],
				'selectors' => [
					'{{WRAPPER}} .hajimi-magic-button > .btn' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_icon_size',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Icon Size', 'hajimi' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 1.5,
                ],
				'selectors' => [
					'{{WRAPPER}} .hajimi-magic-button > .btn svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .hajimi-magic-button > .btn svg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $button_text = $settings['button_text'];
		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button_link', $settings['button_link'] );
		}
		?>
        <div class="hajimi-magic-button">
            <a class="btn btn-outline" <?php $this->print_render_attribute_string( 'button_link' ); ?>><?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?><span><?= $button_text;?></span></a>
        </div>
        <?php
    }

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Magic_Button() );
