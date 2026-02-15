<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Media_Slider extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_media_slider';
    }

    public function get_title() {
        return __( 'Hajimi Media Slider', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
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
            'media_scroll_type',
            [
                'label' => __( 'Scroll Type', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'hajimi' ),
                    'infinite' => __( 'Infinite Smooth Scroll', 'hajimi' ),
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'slides_item_size',
            [
                'label' => __( 'Child Items Size', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'hajimi' ),
                    'custom' => __( 'Custom', 'hajimi' ),
                ],
                'default' => 'default',
            ]
        );

		$this->add_responsive_control(
			'slides_per_view',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Slides per View', 'hajimi' ),
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
                    'slides_item_size' => 'default',
                ]
			]
		);

		$this->add_responsive_control(
			'slider_width',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Item Width', 'hajimi' ),
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
				'devices' => [ 'desktop', 'laptop', 'tablet', 'mobile' ],
				'default' => [
					'size' => 500,
					'unit' => 'px',
				],
				'laptop_default' => [
					'size' => 500,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .hajimi-media-slider.child-size-custom .swiper-slide' => 'width: {{SIZE}}{{UNIT}}!important;',
				],
                'condition' => [
                    'slides_item_size' => 'custom', 
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

        $this->end_controls_section();


        $this->start_controls_section(
            'section_items',
            [
                'label' => __( 'Items', 'hajimi' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'media_type',
            [
                'label' => __( 'Media Type', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'library' => 'Media Library',
                    'youtube' => 'YouTube Link',
                    'embed' => 'Embed',
                ],
                'default' => 'library',
            ]
        );

        // Media Library: Image or Video
        $repeater->add_control(
            'media_file',
            [
                'label' => __( 'Select Image/Video', 'hajimi' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'media_type' => 'library',
                ],
            ]
        );

        // YouTube URL
        $repeater->add_control(
            'youtube_url',
            [
                'label' => __( 'YouTube URL', 'hajimi' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => 'https://www.youtube.com/watch?v=example',
                'condition' => [
                    'media_type' => 'youtube',
                ],
            ]
        );

		$repeater->add_control(
			'embed_code',
			[
				'label' => esc_html__( 'Custom HTML', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 20,
                'condition' => [
                    'media_type' => 'youtube',
                ],
			]
		);

        $this->add_control(
            'slides',
            [
                'label' => __( 'Slides', 'hajimi' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'media_type' => 'library',
                    ],
                ],
                'title_field' => 'Item',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $type = $settings['media_scroll_type'];
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
        echo '<div class="hajimi-media-slider type-'.$type.'"'.$setting_loop.$setting_space_between.$settings_slidesperview.$settings_speed.'>';
        if ( ! empty( $settings['slides'] ) ) {
            echo '<div class="swiper">';
                echo '<div class="swiper-wrapper">';
                foreach ( $settings['slides'] as $slide ) {

                    if ( $slide['media_type'] === 'library' && ! empty( $slide['media_file']['url'] ) ) {
                        $url = esc_url( $slide['media_file']['url'] );
                        
                        $temp_url = str_replace('\\', '', $url);

                        $path = parse_url($temp_url, PHP_URL_PATH);

                        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

                        $imageExts = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'tiff'];
                        $videoExts = ['mp4', 'avi', 'mov', 'mkv', 'webm', 'flv', 'wmv'];

                        if (in_array($ext, $imageExts)) {
                            $type = 'image';
                        } elseif (in_array($ext, $videoExts)) {
                            $type = 'video';
                        } else {
                            $type = 'other';
                        }

                        if ( strpos( $type, 'image' ) !== false ) {
                            echo '<div class="swiper-slide"><img src="'. $url .'" alt="" /></div>';
                        } elseif ( strpos( $type, 'video' ) !== false ) {
                            echo '<div class="swiper-slide"><video src="'. $url .'" controls></video></div>';
                        }

                    } elseif ( $slide['media_type'] === 'youtube' && ! empty( $slide['youtube_url'] ) ) {
                        $youtube_url = esc_url( $slide['youtube_url'] );
                        // Convert to embed iframe
                        preg_match('/v=([^\&]+)/', $youtube_url, $matches);
                        if ( isset($matches[1]) ) {
                            $video_id = $matches[1];
                            echo '<div class="swiper-slide"><iframe width="560" height="315" src="https://www.youtube.com/embed/'. $video_id .'" frameborder="0" allowfullscreen></iframe></div>';
                        }
                    } elseif ( $slide['media_type'] === 'embed' && ! empty( $slide['embed_code'] ) ) {
                        $embed_code = esc_url( $slide['embed_code'] );
                        echo '<div class="swiper-slide">'.$embed_code.'</div>';
                    }

                }
                echo '</div>';
                if( $settings['show_navigation'] ) {
                    echo '<div class="hajimi-media-navigation"><button type="button" class="hajimi-media-nav media-nav-prev"><i class="fa fa-chevron-left"></i></button><button type="button" class="hajimi-media-nav media-nav-next"><i class="fa fa-chevron-right"></i></button></div>';
                }
                if( $settings['show_pagination'] ) {
                    echo '<div class="hajimi-media-pagination"></div>';
                }
            echo '</div>';
        }
        echo '</div>';
    }

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Media_Slider() );
