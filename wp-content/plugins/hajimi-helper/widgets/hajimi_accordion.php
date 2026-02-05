<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Accordion extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_accordion';
    }

    public function get_title() {
        return __( 'Hajimi Accordion', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_accordion_settings',
            [
                'label' => __( 'Settings', 'hajimi' ),
            ]
        );

        $this->add_control(
            'accordion_layout_style',
            [
                'label' => __( 'Layout Style', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default', 'hajimi' ),
                    'style-1' => __( 'Style 1', 'hajimi' ),
                ]
            ]
        );

        $this->add_control(
            'accordion_subtitle_tag',
            [
                'label' => __( 'Sub Title Tag', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1' => __( 'H1', 'hajimi' ),
                    'h2' => __( 'H2', 'hajimi' ),
                    'h3' => __( 'H3', 'hajimi' ),
                    'h4' => __( 'H4', 'hajimi' ),
                    'h5' => __( 'H5', 'hajimi' ),
                    'h6' => __( 'H6', 'hajimi' ),
                    'p' => __( 'Paragraph', 'hajimi' ),
                    'span' => __( 'Span', 'hajimi' ),
                ]
            ]
        );

        $this->add_control(
            'accordion_title_tag',
            [
                'label' => __( 'Title Tag', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1' => __( 'H1', 'hajimi' ),
                    'h2' => __( 'H2', 'hajimi' ),
                    'h3' => __( 'H3', 'hajimi' ),
                    'h4' => __( 'H4', 'hajimi' ),
                    'h5' => __( 'H5', 'hajimi' ),
                    'h6' => __( 'H6', 'hajimi' ),
                    'p' => __( 'Paragraph', 'hajimi' ),
                    'span' => __( 'Span', 'hajimi' ),
                ]
            ]
        );

		$this->add_responsive_control(
			'header_arrow_alignment',
			[
				'label' => esc_html__( 'Icon Alignment', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'row-reverse' => [
						'title' => esc_html__( 'Left', 'hajimi' ),
						'icon' => 'eicon-h-align-left',
					],
					'row' => [
						'title' => esc_html__( 'Right', 'hajimi' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'row',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-header-title' => 'flex-direction: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_vertical_alignment',
			[
				'label' => esc_html__( 'Header Alignment', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Top', 'hajimi' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hajimi' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'Bottom', 'hajimi' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-header-title' => 'align-items: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_title_alignment',
			[
				'label' => esc_html__( 'Title Vertical Alignment', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'column' => [
						'title' => esc_html__( 'Down', 'hajimi' ),
						'icon' => 'eicon-v-align-bottom',
					],
					'column-reverse' => [
						'title' => esc_html__( 'Up', 'hajimi' ),
						'icon' => 'eicon-v-align-top',
					],
				],
				'default' => 'column',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-header-title-inner' => 'flex-direction: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'accordion_icon_open',
			[
				'label' => esc_html__( 'Icon', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-chevron-down',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'accordion_icon_close',
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
            'section_accordion_items',
            [
                'label' => __( 'Items', 'hajimi' ),
            ]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_subtitle',
            [
                'label' => __( 'Sub Title', 'hajimi' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Sub Title', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your sub title here', 'hajimi' ),
            ]
        );

        $repeater->add_control(
            'accordion_title',
            [
                'label' => __( 'Title', 'hajimi' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Title', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your title here', 'hajimi' ),
            ]
        );

		$repeater->add_control(
			'accordion_description',
			[
				'label' => esc_html__( 'Description', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your description here', 'hajimi' ),
			]
		);

        $this->add_control(
            'accordions',
            [
                'label' => __( 'Accordion', 'hajimi' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_subtitle' => esc_html__( 'Sub Title #1', 'hajimi' ),
                        'accordion_title' => esc_html__( 'Title #1', 'hajimi' ),
                        'accordion_description' => esc_html__( 'Lorem ipsum dolor sit amet..', 'hajimi' ),
                    ]
                ],
				'title_field' => '{{{ accordion_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_style',
            [
                'label' => __( 'Style', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
			'accordion_item_gap',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Item Spacing', 'hajimi' ),
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'default' => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'laptop_default' => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'tablet_default' => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'mobile_default' => [
					'size' => 1,
					'unit' => 'rem',
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 1.5,
					'right' => 1.5,
					'bottom' => 1.5,
					'left' => 1.5,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'accordion_border',
				'selector' => '{{WRAPPER}} .hajimi-accordion .hajimi-accordion-item',
			]
		);

		$this->add_control(
			'accordion_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 0.5,
					'right' => 0.5,
					'bottom' => 0.5,
					'left' => 0.5,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_item_box_shadow',
				'selector' => '{{WRAPPER}} .hajimi-accordion .hajimi-accordion-item',
			]
		);

		$this->add_responsive_control(
			'accordion_content_gap',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Content Spacing', 'hajimi' ),
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'default' => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'laptop_default' => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'tablet_default' => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'mobile_default' => [
					'size' => 1,
					'unit' => 'rem',
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-body-inner' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_header_style',
            [
                'label' => __( 'Header', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'accordion_header_border',
				'selector' => '{{WRAPPER}} .hajimi-accordion .hajimi-header-title',
			]
		);

		$this->add_control(
			'accordion_header_padding',
			[
				'label' => esc_html__( 'Padding', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 1.5,
					'right' => 1.5,
					'bottom' => 1.5,
					'left' => 1.5,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-header-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title', 'hajimi' ),
				'name' => 'accordion_title_typography',
				'selector' => '{{WRAPPER}} .hajimi-accordion .hajimi-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Sub Title', 'hajimi' ),
				'name' => 'accordion_subtitle_typography',
				'selector' => '{{WRAPPER}} .hajimi-accordion .hajimi-subtitle',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'accordion_body_style',
            [
                'label' => __( 'Body', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'accordion_body_padding',
			[
				'label' => esc_html__( 'Padding', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 1.5,
					'right' => 1.5,
					'bottom' => 1.5,
					'left' => 1.5,
					'unit' => 'rem',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-accordion .hajimi-body-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'accordion_bottom_border',
				'selector' => '{{WRAPPER}} .hajimi-accordion .hajimi-body-inner',
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $layout_style = $settings['accordion_layout_style'];
        $accordion_subtitle_tag = $settings['accordion_subtitle_tag'];
        $accordion_title_tag = $settings['accordion_title_tag'];
        $icon_open = $settings['accordion_icon_open'];
        $icon_close = $settings['accordion_icon_close'];
    ?>
    <div class="hajimi-accordion layout-<?= $layout_style;?>">
    <?php $index = 1;
    foreach( $settings['accordions'] as $item ) {
        $accordion_subtitle = $item['accordion_subtitle'];
        $accordion_title = $item['accordion_title'];
        $accordion_description = $item['accordion_description'];
        ?>
        <div class="hajimi-accordion-item<?= ($index===1) ? ' opened' : '';?>">
            <div class="hajimi-accordion-item-inner">
                <div class="hajimi-header">
                    <button type="button" class="hajimi-header-title">
                        <div class="hajimi-header-title-inner">
                            <?php if( $accordion_subtitle ) : ?>
                            <<?= $accordion_subtitle_tag;?> class="hajimi-subtitle"><?= $accordion_subtitle;?></<?= $accordion_subtitle_tag;?>>
                            <?php endif;?>
                            <?php if( $accordion_title ) : ?>
                            <<?= $accordion_title_tag;?> class="hajimi-title"><?= $accordion_title;?></<?= $accordion_title_tag;?>>
                            <?php endif;?>
                        </div>
                        <div class="accordion-arrow" data-icon-open="<?= $icon_open['value'];?>" data-icon-close="<?= $icon_close['value'];?>"><i class="<?= $icon_open['value'];?>" aria-hidden="true"></i></div>
                    </button>
                </div>
                <div class="hajimi-body"<?= ($index===1) ? ' style="display:block;"' : '';?>>
                    <div class="hajimi-body-inner"><?= $accordion_description;?></div>
                </div>
            </div>
        </div>
    <?php $index++;
    } ?>
    </div>
    <?php
    }

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Accordion() );
