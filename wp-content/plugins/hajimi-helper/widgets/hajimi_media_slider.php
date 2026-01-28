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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'media_type',
            [
                'label' => __( 'Media Type', 'hajimi' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'library' => 'Media Library',
                    'youtube' => 'YouTube Link',
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
        
        echo '<div class="hajimi-media-slider">';
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
                    }

                }
                echo '</div>';
                echo '<div class="hajimi-media-navigation"><button type="button" class="hajimi-media-nav media-nav-prev"><i class="fa fa-chevron-left"></i></button><button type="button" class="hajimi-media-nav media-nav-next"><i class="fa fa-chevron-right"></i></button></div>';
                echo '<div class="hajimi-media-pagination"></div>';
            echo '</div>';
        }
        echo '</div>';
    }

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Media_Slider() );
