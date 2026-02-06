<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Gallery_View extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_gallery_view';
    }

    public function get_title() {
        return __( 'Hajimi Gallery View', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-instagram-nested-gallery';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Slides', 'hajimi' ),
            ]
        );

		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => false,
				'default' => [],
			]
		);

        $this->add_control(
            'gallery_type',
            [
                'label' => __( 'Items per view', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'grid' => __( 'Grid', 'hajimi' ),
                    'slider' => __( 'Slider', 'hajimi' ),
                ],
                'default' => 'grid',
            ]
        );

        $this->add_control(
            'gallery_slider_motion',
            [
                'label' => __( 'Items Change Motion', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'hajimi' ),
                    'smooth-infinite' => __( 'Smooth Infinite', 'hajimi' ),
                ],
                'default' => 'default',
                'condition' => [
                    'gallery_type' => 'slider'
                ]
            ]
        );

		$this->add_responsive_control(
			'slides_per_view_grid',
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
                'selectors' => [
                    '{{WRAPPER}} .hajimi-magic-gallery' => 'grid-template-columns: {{SIZE}}'
                ],
                'condition' => [
                    'gallery_type' => 'grid'
                ]
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
                'condition' => [
                    'gallery_type' => 'slider'
                ]
			]
		);

		$this->add_responsive_control(
			'space_between_grid',
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
                'selectors' => [
                    '{{WRAPPER}} .hajimi-magic-gallery' => 'gap: {{SIZE}}{{UNIT}}'
                ],
                'condition' => [
                    'gallery_type' => 'grid'
                ]
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
                'condition' => [
                    'gallery_type' => 'slider'
                ]
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
                'condition' => [
                    'gallery_type' => 'slider'
                ]
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
                'condition' => [
                    'gallery_type' => 'slider'
                ]
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
                'condition' => [
                    'gallery_type' => 'slider'
                ]
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
                'condition' => [
                    'gallery_type' => 'slider'
                ]
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $type = $settings['gallery_type'];
        $setting_loop = '';
		$setting_space_between = '';
		$settings_slidesperview = '';
		$settings_speed = '';
		if( $type==='slider') {
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
		}
        echo '<div class="hajimi-magic-gallery type-'.$type.'"'.$setting_loop.$setting_space_between.$settings_slidesperview.$settings_speed.'>';
        if ( ! empty( $settings['gallery'] ) ) {
			if( $type==='grid') {
				foreach ( $settings['gallery'] as $item ) {
				?>
					<div class="gallery-item"><img src="<?= $item['url'];?>"<?= (!empty($item['alt'])) ? ' alt="'.$item['alt'].'"' : '';?>></div>
				<?php
				}
			}
			else {
				echo '<div class="swiper">';
					echo '<div class="swiper-wrapper">';
					foreach ( $settings['gallery'] as $item ) {
					?>
						<div class="swiper-slide gallery-item"><img src="<?= $item['url'];?>"<?= (!empty($item['alt'])) ? ' alt="'.$item['alt'].'"' : '';?>></div>
					<?php
					}
					echo '</div>';
				echo '</div>';
			}
        }
        echo '</div>';
    }

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Gallery_View() );
