<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Content_Card_Slider extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_content_card_slider';
    }

    public function get_title() {
        return __( 'Hajimi Content Card Slider', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-slider-device';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_column_settings',
            [
                'label' => __( 'Settings', 'hajimi' ),
            ]
        );

        $this->add_control(
            'column_title_tag',
            [
				'label' => esc_html__( 'Column Title Tag', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1' => __( 'H1', 'hajimi' ),
                    'h2' => __( 'H2', 'hajimi' ),
                    'h3' => __( 'H3', 'hajimi' ),
                    'h4' => __( 'H4', 'hajimi' ),
                    'h5' => __( 'H5', 'hajimi' ),
                    'h6' => __( 'H6', 'hajimi' ),
                    'p' => __( 'Paragraph', 'hajimi' ),
                    'span' => __( 'SPAN', 'hajimi' ),
                ]
            ]
        );

		$this->add_responsive_control(
			'column_header_align',
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .hajimi-content-column-slider .column-header .column-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'slides_per_view',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Items per View', 'hajimi' ),
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'default' => [
					'size' => 3,
				],
				'laptop_default' => [
					'size' => 3,
				],
				'tablet_default' => [
					'size' => 2,
				],
				'mobile_default' => [
					'size' => 1,
				],
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Spacing', 'hajimi' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
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
					'size' => 30,
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
			]
		);

		$this->add_control(
			'slider_loop',
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
			'autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hajimi' ),
				'label_off' => esc_html__( 'Hide', 'hajimi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_timeout',
			[
				'label' => esc_html__( 'Autoplay Timeout', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100000,
				'step' => 100,
				'default' => 5000,
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => esc_html__( 'Speed', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 300,
				'max' => 100000,
				'step' => 50,
				'default' => 300,
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__( 'Show Pagination', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hajimi' ),
				'label_off' => esc_html__( 'Hide', 'hajimi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_navigation',
			[
				'label' => esc_html__( 'Show Navigation', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hajimi' ),
				'label_off' => esc_html__( 'Hide', 'hajimi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_column_items',
            [
                'label' => __( 'Items', 'hajimi' ),
            ]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'column_title',
            [
                'label' => __( 'Title', 'hajimi' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Title', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your title here', 'hajimi' ),
            ]
        );

		$repeater->add_control(
			'column_description',
			[
				'label' => esc_html__( 'Description', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your description here', 'hajimi' ),
			]
		);

        $this->add_control(
            'columns',
            [
                'label' => __( 'Columns', 'hajimi' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'column_title' => esc_html__( 'Title #1', 'hajimi' ),
                        'column_description' => esc_html__( 'Lorem ipsum dolor sit amet.', 'hajimi' ),
                    ]
                ],
				'title_field' => '{{{ column_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'column_style',
            [
                'label' => __( 'Style', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .hajimi-content-column-slider .column-item-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'column_border',
				'selector' => '{{WRAPPER}} .hajimi-content-column-slider .column-item-inner',
			]
		);

		$this->add_control(
			'column_border_radius',
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
					'{{WRAPPER}} .hajimi-content-column-slider .column-item-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'column_item_box_shadow',
				'selector' => '{{WRAPPER}} .hajimi-content-column-slider .column-item',
			]
		);

		$this->add_responsive_control(
			'column_content_gap',
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
					'{{WRAPPER}} .hajimi-content-column-slider .column-item-inner' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
		$this->add_responsive_control(
			'column_minimum_height',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Item Min. Height', 'hajimi' ),
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
                'default' => [
                    'size' => 6.25,
                    'unit' => 'rem',
                ],
                'laptop_default' => [
                    'size' => 6.25,
                    'unit' => 'rem',
                ],
                'tablet_default' => [
                    'size' => 6.25,
                    'unit' => 'rem',
                ],
                'mobile_default' => [
                    'size' => 6.25,
                    'unit' => 'rem',
                ],
				'selectors' => [
					'{{WRAPPER}} .hajimi-content-column-slider .column-item' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'column_content_style',
            [
                'label' => __( 'Content', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title', 'hajimi' ),
				'name' => 'column_title_typography',
				'selector' => '{{WRAPPER}} .hajimi-content-column-slider .column-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Sub Title', 'hajimi' ),
				'name' => 'column_subtitle_typography',
				'selector' => '{{WRAPPER}} .hajimi-content-column-slider .column-body',
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    	$unique_id = $this->get_id();
        $column_title_tag = $settings['column_title_tag'];
        $setting_space_between = '';
        $settings_slidesperview = '';
        $loop = ( $settings['slider_loop'] ) ? true : false;
        $setting_loop = ' data-loop="'.$loop.'"';
        $space_between = ( !empty($settings['space_between'] ) ) ? $settings['space_between']['size'] : 20;
        $space_between_laptop = ( !empty($settings['space_between_laptop'] ) ) ? $settings['space_between_laptop']['size'] : 20;
        $space_between_tablet = ( !empty($settings['space_between_tablet'] ) ) ? $settings['space_between_tablet']['size'] : 20;
        $space_between_mobile = ( !empty($settings['space_between_mobile'] ) ) ? $settings['space_between_mobile']['size'] : 20;
        $setting_space_between = ' data-space="'.$space_between.'" data-space-laptop="'.$space_between_laptop.'" data-space-tablet="'.$space_between_tablet.'" data-space-mobile="'.$space_between_mobile.'"';
        $slides_per_view = ( !empty($settings['slides_per_view'] ) ) ? $settings['slides_per_view']['size'] : 3;
        $slides_per_view_laptop = ( !empty($settings['slides_per_view_laptop'] ) ) ? $settings['slides_per_view_laptop']['size'] : 3;
        $slides_per_view_tablet = ( !empty($settings['slides_per_view_tablet'] ) ) ? $settings['slides_per_view_tablet']['size'] : 2;
        $slides_per_view_mobile = ( !empty($settings['slides_per_view_mobile'] ) ) ? $settings['slides_per_view_mobile']['size'] : 2;
        $settings_slidesperview = ' data-ppp="'.$slides_per_view.'" data-ppp-laptop="'.$slides_per_view_laptop.'" data-ppp-tablet="'.$slides_per_view_tablet.'" data-ppp-mobile="'.$slides_per_view_mobile.'"';
        $autoplay = ( $settings['autoplay'] ) ? true : false;
        $autoplayTimeout = $settings['autoplay_timeout'];
        $speed = $settings['speed'];
        $settings_speed = ' data-autoplay="'.$autoplay.'" data-autoplay-timeout="'.$autoplayTimeout.'" data-speed="'.$speed.'"';
        echo '<div class="hajimi-content-column-slider"'.$setting_loop.$setting_space_between.$settings_slidesperview.$settings_speed.' data-element-id="'.$unique_id.'" id="slider-'.$unique_id.'">';
        if ( !empty( $settings['columns'] ) ) {
            echo '<div class="swiper">';
                echo '<div class="swiper-wrapper">';
                foreach ( $settings['columns'] as $slide ) {
                ?>
                    <div class="swiper-slide column-item">
                        <div class="column-item-inner">
                            <div class="column-header"><<?= $column_title_tag;?> class="column-title"><?= $slide['column_title'];?></<?= $column_title_tag;?>></div>
                            <div class="column-body"><?= $slide['column_description'];?></div>
                        </div>
                    </div>
                <?php
                }
                echo '</div>';
                if( $settings['show_navigation'] ) {
                    echo '<div class="hajimi-column-navigation"><button type="button" class="hajimi-column-nav column-nav-prev nav-'.$unique_id.'-prev"><i class="fa fa-chevron-left"></i></button><button type="button" class="hajimi-column-nav column-nav-next nav-'.$unique_id.'-next"><i class="fa fa-chevron-right"></i></button></div>';
                }
                if( $settings['show_pagination'] ) {
                    echo '<div class="hajimi-column-pagination hajimi-pagination-'.$unique_id.'"></div>';
                }
            echo '</div>';
        }
        echo '</div>';
    }

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Content_Card_Slider() );
