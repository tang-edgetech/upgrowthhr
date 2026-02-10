<?php
if ( ! defined( 'ABSPATH' ) ) exit;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Hajimi_Custom_Navigation_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'hajimi_custom_navigation';
    }

    public function get_title() {
        return __( 'Hajimi Custom Navigation', 'hajimi' );
    }

    public function get_icon() {
        return 'eicon-menu-bar';
    }

    public function get_categories() {
        return [ 'hajimi' ];
    }

    private function get_wp_menus() {
        $menus = wp_get_nav_menus();
        $options = [];

        if ( ! empty( $menus ) ) {
            foreach ( $menus as $menu ) {
                $options[ $menu->term_id ] = $menu->name;
            }
        }

        return $options;
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_general',
            [
                'label' => __( 'General', 'hajimi' ),
            ]
        );

		$this->add_control(
			'hamburger_style',
			[
				'label' => esc_html__( 'Hamburger Style', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'hamburger--slider',
				'options' => [
					'hamburger--slider' => esc_html__( 'Slider', 'hajimi' ),
					'hamburger--squeeze' => esc_html__( 'Squeeze', 'hajimi' ),
					'hamburger--spin' => esc_html__( 'Spin', 'hajimi' ),
					'hamburger--elastic' => esc_html__( 'Elastic', 'hajimi' ),
					'hamburger--emphatic' => esc_html__( 'Emphatic', 'hajimi' ),
					'hamburger--collapse' => esc_html__( 'Collapse', 'hajimi' ),
					'hamburger--vortex' => esc_html__( 'Vortex', 'hajimi' ),
					'hamburger--stand' => esc_html__( 'stand', 'hajimi' ),
					'hamburger--spring' => esc_html__( 'Spring', 'hajimi' ),
				],
			]
		);

		$this->add_control(
			'hajimi_menu',
			[
				'label' => esc_html__( 'Menu', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_wp_menus(),
            ]
        );
        
        if ( function_exists( 'pll_the_languages' ) ) {
            $this->add_control(
                'hajimi_menu_2',
                [
                    'label' => esc_html__( 'Menu 2', 'hajimi' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '',
                    'options' => $this->get_wp_menus(),
                ]
            );
        }

		$this->add_control(
			'hajimi_breakpoint',
			[
				'label' => esc_html__( 'Breakpoint', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'breakpoint-none',
				'options' => [
					'breakpoint-none' => esc_html__( 'None', 'hajimi' ),
					'breakpoint-laptop' => esc_html__( '> 1200px', 'hajimi' ),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_enquiry',
            [
                'label' => __( 'Enquiry Button', 'hajimi' ),
            ]
        );

		$this->add_control(
			'add_cta_button',
			[
				'label' => esc_html__( 'Show Enquiry Button', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hajimi' ),
				'label_off' => esc_html__( 'Hide', 'hajimi' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'cta_button_label',
			[
				'label' => esc_html__( 'Button Label', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'hajimi' ),
				'placeholder' => esc_html__( 'Type your title here', 'hajimi' ),
                'condition' => [
                    'add_cta_button' => 'yes',
                ]
			]
		);

		$this->add_control(
			'cta_button',
			[
				'label' => esc_html__( 'Button Link', 'hajimi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
                'condition' => [
                    'add_cta_button' => 'yes',
                ]
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_language_switcher',
            [
                'label' => __( 'Language Switcher', 'hajimi' ),
            ]
        );

        if ( function_exists( 'pll_the_languages' ) ) {
            $this->add_control(
                'show_language_switcher',
                [
                    'label' => esc_html__( 'Show Language Switcher', 'hajimi' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'hajimi' ),
                    'label_off' => esc_html__( 'Hide', 'hajimi' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'pll_show_name',
                [
                    'label' => esc_html__( 'Show Name', 'hajimi' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'hajimi' ),
                    'label_off' => esc_html__( 'Hide', 'hajimi' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'show_language_switcher' => 'yes'
                    ],
                ]
            );

            $this->add_control(
                'pll_show_flag',
                [
                    'label' => esc_html__( 'Show Flag', 'hajimi' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'hajimi' ),
                    'label_off' => esc_html__( 'Hide', 'hajimi' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'show_language_switcher' => 'yes'
                    ],
                ]
            );
        }
        else {
            $this->add_control(
                'check_pll',
                [
                    'type' => \Elementor\Controls_Manager::NOTICE,
                    'notice_type' => 'warning',
                    'dismissible' => true,
                    'heading' => esc_html__( 'Notice', 'hajimi' ),
                    'content' => esc_html__( 'Install Polylang to unlock language switcher.', 'hajimi' ),
                ]
		    );
        }
        
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Typography', 'hajimi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );



        $this->end_controls_section();
    }

    private function build_menu_tree( $items, $parent_id = 0 ) {
        $branch = [];

        foreach ( $items as $item ) {
            if ( (int) $item->menu_item_parent === (int) $parent_id ) {

                $children = $this->build_menu_tree( $items, $item->ID );

                if ( ! empty( $children ) ) {
                    $item->children = $children;
                }

                $branch[] = $item;
            }
        }

        return $branch;
    }

    private function render_menu_items( $items, $depth = 0 ) {
        foreach ( $items as $item ) {

            $has_children = ! empty( $item->children );

            $classes = [ 'menu-item', 'hajimi-nav-item' ];
            if( $depth == 0 ) {
                $classes[] = 'menu-main-page';
            }

            if ( $has_children ) {
                $classes[] = 'menu-has-children';
            }
            $current_page_id = get_the_ID();
            if( $current_page_id == $item->object_id ) {
                $classes[] = 'current-page-item';
            }

            if ( in_array( 'current-menu-item', $item->classes, true ) ) {
                $classes[] = 'current';
            }

            echo '<li class="' . esc_attr( implode( ' ', $classes ) ) . '" data-ids="'.$current_page_id.'-'.$item->object_id.'">';

            echo '<a href="' . esc_url( $item->url ) . '" class="hajimi-nav-link">';
            echo '<span>'.esc_html( $item->title ).'</span>';
            if( $depth > 0 ) {
                echo '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
            }
            echo '</a>';

            if ( $has_children ) {
                echo '<button type="button" class="hajimi-dropdown-button"><i class="fa fa-chevron-down"></i></button>';
                echo '<div class="hajimi-menu-popup">';
                    echo '<div class="hajimi-row">';
                        echo '<div class="hajimi-col hajimi-col-menu">';
                            echo '<ul class="sub-menu">';
                            $this->render_menu_items_inner( $item->children, $depth + 1 );
                            echo '</ul>';
                        echo '</div>';
                        echo '<div class="hajimi-col hajimi-col-description">';
                        $dialogue = get_field('hajimi_menu_dialogues', 'option');
                        if ($dialogues) {
                            echo '<div class="hajimi-col-inner">';
                            echo json_encode($dialogues)."\r\n";
                            foreach ($dialogues as $item) {
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

            echo '</li>';
        }
    }

    private function render_menu_items_inner( $items, $depth = 0 ) {

        foreach ( $items as $item ) {

            $has_children = ! empty( $item->children );

            $classes = [ 'menu-item', 'hajimi-nav-item' ];
            if ( $has_children ) {
                $classes[] = 'menu-has-children';
            }
            $check_page_id = get_the_ID();
            if( $check_page_id == $item->object_id ) {
                $classes[] = 'current-page-item';
            }

            if ( in_array( 'current-menu-item', $item->classes, true ) ) {
                $classes[] = 'current';
            }

            echo '<li class="' . esc_attr( implode( ' ', $classes ) ) . '">';

            echo '<a href="' . esc_url( $item->url ) . '" class="hajimi-nav-link">';
            echo '<span>'.esc_html( $item->title ).'</span>';
            echo '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
            echo '</a>';
            if ( $has_children ) {
                echo '<ul class="sub-menu">';
                $this->render_menu_items( $item->children, $depth + 1 );
                echo '</ul>';
            }

            echo '</li>';
        }
    }

    protected function render() {
        $settings = $this->get_settings();
        $home_url = home_url();
        $site_title = get_bloginfo('name');
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $hajimi_menu = $settings['hajimi_menu'];
        $hajimi_breakpoint = $settings['hajimi_breakpoint'];
        $hamburger_style = empty($settings['hamburger_style']) ? 'hamburger--slider' : $settings['hamburger_style'];
        $show_language_switcher = (isset($settings['show_language_switcher'])) ? $settings['show_language_switcher'] : false;
    ?>
        <nav class="hajimi-navigation <?= $hajimi_breakpoint;?>">
            <div class="hajimi-row">
                <button type="button" class="hajimi-menu-button hamburger <?= $hamburger_style;?>">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <a href="<?= $home_url;?>" class="hajimi-site-brand">
                <?php
                if( $custom_logo_id) {
                    $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
                    echo '<img src="'.$logo_url.'" class="img-fluid w-100 h-auto"/>';
                }
                else {
                    echo '<p>'.$site_title.'</p>';
                }
                ?>
                </a>
                <?php
                if ( function_exists( 'pll_the_languages' ) ) {
                    if( 'zh_CN' === pll_current_language() ) {
                        $hajimi_menu_2 = $settings['hajimi_menu_2'];
                        $menu_id = $hajimi_menu_2;
                    }
                    else {
                        $menu_id = $hajimi_menu;
                    }
                }
                ?>
                <div class="hajimi-nav-wrapper">
                    <div class="hajimi-nav-inner">
                        <ul class="hajimi-nav">
                        <?php
                            $menu_items = wp_get_nav_menu_items( $menu_id );
                            $menu_tree = $this->build_menu_tree( $menu_items );
                            $this->render_menu_items( $menu_tree );
                        
                        $show_cta_button = $settings['add_cta_button'];
                        if( $show_cta_button ) {
                            $cta_button = $settings['cta_button'];
                            $cta_button_label = (!empty($settings['cta_button_label'])) ? $settings['cta_button_label'] : 'Enquiry Now';
                            if( !empty($cta_button['url']) ) {
                                $this->add_link_attributes( 'cta_button', $settings['cta_button'] );
                                ?>
                                <li class="menu-item hajimi-nav-item menu-enquiry-now d-none d-xl-block"><a <?php $this->print_render_attribute_string( 'cta_button' );?>><?= $cta_button_label;?></a></li>
                                <?php
                            }
                        }

                        if( $show_language_switcher ) { 
                            $langArgs = array();
                            $langArgs['show_names'] = $settings['pll_show_name'] ? 1 : '';
                            $langArgs['show_flags'] = $settings['pll_show_flag'] ? 1 : '';
                        ?>
                            <li class="menu-item hajimi-nav-item menu-language-switcher">
                                <?php 
                                echo '<ul class="hajimi-pll">';
                                pll_the_languages( $langArgs );
                                echo '</ul>';
                                ?>
                            </li>
                        <?php 
                        } 
                        ?>
                        </ul>
                    </div>
                    <?php
                        if( $show_cta_button ) {
                            $cta_button = $settings['cta_button'];
                            $cta_button_label = (!empty($settings['cta_button_label'])) ? $settings['cta_button_label'] : 'Enquiry Now';
                            if( !empty($cta_button['url']) ) {
                                $this->add_link_attributes( 'cta_button', $settings['cta_button'] );
                                ?>
                                <div class="menu-item hajimi-nav-item menu-enquiry-now d-block d-xl-none"><a <?php $this->print_render_attribute_string( 'cta_button' );?>><?= $cta_button_label;?></a></div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </nav>
    <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Hajimi_Custom_Navigation_Widget() );
