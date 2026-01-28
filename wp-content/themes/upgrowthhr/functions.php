<?php
/**
 * Upgrowthhr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Upgrowthhr
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.'.time() );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function upgrowthhr_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Upgrowthhr, use a find and replace
		* to change 'upgrowthhr' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'upgrowthhr', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'upgrowthhr' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'upgrowthhr_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'upgrowthhr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function upgrowthhr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'upgrowthhr_content_width', 640 );
}
add_action( 'after_setup_theme', 'upgrowthhr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function upgrowthhr_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'upgrowthhr' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'upgrowthhr' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'upgrowthhr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function upgrowthhr_scripts() {
	wp_enqueue_style( 'upgrowthhr-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'upgrowthhr-style', 'rtl', 'replace' );
	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), '12.0.3', 'all' );
	wp_enqueue_style( 'animations-css', get_template_directory_uri() . '/css/animations.css', array(), _S_VERSION, 'all' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION, 'all' );
	wp_enqueue_style( 'media-query', get_template_directory_uri() . '/css/media.css', array(), _S_VERSION, 'all' );

	wp_enqueue_script( 'upgrowthhr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if( !is_admin() ) {
   		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array(), '3.7.1', true );
	}
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), '12.0.3', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'upgrowthhr_scripts' );

function customize_enqueue_scripts() {
    if ( ! is_singular() ) {
        return;
    }
	global $post;

    if ( ! $post instanceof WP_Post ) {
        return;
    }

    if ( has_shortcode( $post->post_content, 'upgrowthhr_career_listing' ) ) {
        wp_enqueue_style( 'career-listing-style', get_template_directory_uri() . '/css/career-listing.css', [], _S_VERSION, 'all' );
        wp_enqueue_script( 'career-listing-script', get_template_directory_uri() . '/js/career-listing.js', [ 'jquery' ], _S_VERSION, true );
        wp_localize_script( 'career-listing-script', 'career', array(
            'admin_ajax' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('career-listing-filter'),
        ) );
    }
	if( is_singular('career') || ( is_page_template('page-job-application.php') || is_page('job-application') ) ) {
		wp_enqueue_style( 'single-career', get_template_directory_uri() . '/css/single-career.css', [], _S_VERSION, 'all' );
	}
	if( is_page_template('page-job-application.php') || is_page('job-application')  ) {
		wp_enqueue_script( 'career-job-application', get_template_directory_uri() . '/js/career-job-application.js', [], _S_VERSION, true );
		wp_localize_script( 'career-job-application', 'job', array(
			'admin_ajax' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('job-application'),
		));
	}
}
add_action( 'wp_enqueue_scripts', 'customize_enqueue_scripts', 20);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

function upgrowthhr_career_listing() {
	$args = array(
		'post_type' => 'career',
		'post_status' => 'publish',
	);
	$get_department = ( isset($_GET['department']) && !empty($_GET['department']) ) ? $_GET['department'] : 'all';
	$taxonomyArgs = array( 'taxonomy' => 'department', 'hide_empty' => false );
	$nav_departments = get_terms( $taxonomyArgs );
	if( !empty($get_department) && $get_department !== 'all' ) {
		$taxonomyArgs['slug'] = $get_department;
	}
	$departments = get_terms( $taxonomyArgs );
	ob_start();
	?>
	<div class="career-listing">
		<div class="career-nav">
			<div class="swiper swiper-career-nav" id="swiper-career-nav">
				<div class="swiper-wrapper">
					<div class="swiper-slide career-nav-item<?= ( !isset($_GET['department']) || 'all' === $get_department ) ? ' selected' : '';?>" data-department="all">
						<button type="button" class="career-nav-link" data-filter="all"><span>All</span></button>
					</div>
				<?php
				if( !empty($nav_departments) ) {
					foreach( $nav_departments as $dep ) {
					?>
					<div class="swiper-slide career-nav-item career-nav-item-<?= $dep->term_id;?> <?= ( $get_department === $dep->slug ) ? ' selected' : '';?>" data-department="<?= $dep->slug;?>">
						<button type="button" class="career-nav-link" data-filter="<?= $dep->slug;?>"><span><?= $dep->name;?></span></button>
					</div>
					<?php
					}
				}
				?>
				</div>
			</div>
		</div>
		<div class="career-body">
			<div class="career-body-inner">
			<?php
			foreach( $departments as $dep ) {
				$dep_id = $dep->term_id;
				$dep_slug = $dep->slug;
				$dep_name = $dep->name;
				$dep_color = get_field('main_color', 'term_'.$dep_id);
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'department',
						'field' => 'slug',
						'terms' => $dep_slug,
					),
				);
				$career = new WP_Query($args);
				$initial = array(
					'dep_name' => $dep_name,
				);
				?>
				<div class="career-dep career-dep-<?= $dep_id;?> career-dep-<?= $dep_slug;?>" style="--bg-career-color:<?= $dep_color;?>">
					<h3 class="career-dep-title"><?= $dep_name;?></h3>
					<div class="career-dep-inner"><!-- Grid start -->
					<?php
					if( $career->have_posts() ) {
						while( $career->have_posts() ) {
							$career->the_post();
							get_template_part('template-parts/loop-career', 'department-row', $initial);
						}
						wp_reset_postdata();
					}
					?>
					</div>
				</div>
			<?php
			}
			?>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('upgrowthhr_career_listing', 'upgrowthhr_career_listing');

function upgrowthhr_career_listing_deparment_filter() {
    $response = [];
    $html = '';
    if ( ! wp_verify_nonce( $_POST['nonce'], 'career-listing-filter' ) ) {
        $response['status'] = 2000;
        $response['message'] = 'Unauthorized funciton calling detected!';
        echo json_encode($response);
        wp_die();
    }
    $current_url = $_POST['current_url'];
    $dep_slug = ( !empty( $_POST['department'] ) ) ? sanitize_text_field( $_POST['department'] ) : '';
    $target_dep = $dep_slug;
    if( $dep_slug !== 'all' ) {
        $term = term_exists( $dep_slug, 'department' );
        if ( !$term || is_wp_error( $term ) ) {
            $response['status'] = 2000;
            $response['message'] = 'This deparment is invalid!';
            echo json_encode($response);
            wp_die();
        }
    }

    $args = array(
        'post_type' => 'career',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );
	$taxonomyArgs = array( 'taxonomy' => 'department', 'hide_empty' => false );
	if( !empty($dep_slug) && $dep_slug !== 'all' ) {
		$taxonomyArgs['slug'] = $dep_slug;
	}
	$departments = get_terms( $taxonomyArgs );

    ob_start();
    foreach( $departments as $dep ) {
        $dep_id = $dep->term_id;
        $dep_slug = $dep->slug;
        $dep_name = $dep->name;
        $dep_color = get_field('main_color', 'term_'.$dep_id);

        $args['tax_query'] = array(
            array(
                'taxonomy' => 'department',
                'field' => 'slug',
                'terms' => $dep_slug,
            ),
        );
        $career = new WP_Query($args);
        $initial = array(
            'target_dep' => $target_dep,
            'dep_name' => $dep_name,
            'current_url' => $current_url,
        );
        if( $career->have_posts() ) { 
        ?>
            <div class="career-dep career-dep-<?= $dep_id;?> career-dep-<?= $dep_slug;?>" style="--bg-career-color:<?= $dep_color;?>">
                <h3 class="career-dep-title"><?= $dep_name;?></h3>
                <div class="career-dep-inner"><!-- Grid start -->
        <?php
            while( $career->have_posts() ) {
                $career->the_post();
                get_template_part('template-parts/loop-career', 'department-row', $initial);
            } // end of while-have_posts
            wp_reset_postdata();
        ?>
                </div>
            </div>
        <?php
        } // end of if-have_posts
    }
    $html = ob_get_clean();
    $response['status'] = 1000;
    $response['message'] = 'Successful!';
    $response['html'] = $html;
    $response['current_url'] = $current_url;

    echo json_encode($response);
    wp_die();
}
add_action('wp_ajax_upgrowthhr_career_listing_deparment_filter', 'upgrowthhr_career_listing_deparment_filter');
add_action('wp_ajax_nopriv_upgrowthhr_career_listing_deparment_filter', 'upgrowthhr_career_listing_deparment_filter');

// Generate existing job position into WPCF7 dropdown field __job_application__
function populate_job_application_dropdown($tag, $unused) {
    if (is_array($tag)) {
        $tag = new WPCF7_FormTag($tag);
    }

    if ($tag->name !== 'job_position') {
        return $tag;
    }

    $args = [
        'post_type'      => 'career',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            $tag->values[] = $post->post_title;
            $tag->labels[] = $post->post_title;
        }
    }

    wp_reset_postdata();

    return $tag;
}
add_filter('wpcf7_form_tag', 'populate_job_application_dropdown', 10, 2);

function retrieving_job_position_details() {
	$response = array();
	$html = '';
    if ( ! wp_verify_nonce( $_POST['nonce'], 'job-application' ) ) {
        $response['status'] = 2000;
        $response['message'] = 'Unauthorized funciton calling detected!';
        echo json_encode($response);
        wp_die();
    }
	
	$job_position = $_POST['job_position'];
	if( empty($job_position) ) {
        $response['status'] = 2000;
        $response['message'] = 'There is no job position selected!';
        echo json_encode($response);
        wp_die();
	}

	$job = get_page_by_path( sanitize_title($job_position), OBJECT, 'career');
	if( !$job ) {
        $response['status'] = 2000;
        $response['message'] = 'Invalid job position!!';
        echo json_encode($response);
        wp_die();
	}
	ob_start();

    $job_id = $job->ID;
    $job_title = $job->post_title;
    $departments = get_the_terms($job_id, 'department');
    $tagging = get_field('tagging', $job_id);
	?>
	<div class="career-dep-title btn btn-outline"><?= $departments[0]->name;?></div>
	<h1 class="career-title"><?= $job_title;?></h1>
	<div class="career-metas">
	<?php
	if( $tagging ) {
		foreach( $tagging as $tag ) { ?>
			<div class="meta-item btn btn-outline"><?= $tag->name;?></div>
		<?php }
	}
	?>
	</div>
	<?php
	$html = ob_get_clean();

	$response['status'] = 1000;
	$response['message'] = 'Successful!';
	$response['html'] = $html;
	$response['back_url'] = get_permalink($job->ID);
	echo json_encode($response);
	wp_die();
}
add_action('wp_ajax_retrieving_job_position_details', 'retrieving_job_position_details');
add_action('wp_ajax_nopriv_retrieving_job_position_details', 'retrieving_job_position_details');