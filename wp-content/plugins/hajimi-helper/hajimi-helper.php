<?php
/**
 * Plugin Name: Hajimi - Your Best Buddy
 * Description: Custom Elementor widgets for the Chiwawa group.
 * Version: 1.0
 * Author: Hajimi
 * Text Domain: hajimi
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Define plugin path
define( 'HAJIMI_WIDGET_PATH', plugin_dir_path( __FILE__ ) );
define( 'HAJIMI_WIDGET_URL', plugin_dir_url( __FILE__ ) );
define( 'HAJIMI_VERSION', '1.0.'.time() );

// Load widget files
function hajimi_load_widget_files() {
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_accordion.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_back_to_top_button.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_content_card_slider.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_copyright_label.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_custom_navigation.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_fancy_animation_text.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_fancy_text.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_gallery_view.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_marquee.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_magic_button.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_media_slider.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_responsive_image.php';
    require_once HAJIMI_WIDGET_PATH . 'widgets/hajimi_template_renderer.php';
}
add_action( 'elementor/widgets/widgets_registered', 'hajimi_load_widget_files' );

// Register Chiwawa category
function hajimi_add_elementor_category( $elements_manager ) {
    $elements_manager->add_category(
        'hajimi',
        [
            'title' => __( 'Hajimi', 'hajimi' ),
            'icon' => 'fa fa-paw'
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'hajimi_add_elementor_category' );


function hajimi_enqueue_styles() {
    wp_enqueue_style(
        'hamburger-style',                             
        HAJIMI_WIDGET_URL . 'css/hamburger.min.css',        
        HAJIMI_VERSION,
        filemtime( HAJIMI_WIDGET_PATH . 'css/hamburger.min.css' )
    );
    wp_enqueue_style(
        'hajimi-style',                             
        HAJIMI_WIDGET_URL . 'css/hajimi.css',        
        HAJIMI_VERSION,
        filemtime( HAJIMI_WIDGET_PATH . 'css/hajimi.css' )
    );

    wp_enqueue_script(
        'hajimi-script',                             
        HAJIMI_WIDGET_URL . 'js/hajimi.js',   
        ['jquery'],     
        HAJIMI_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'hajimi_enqueue_styles', 100 );
// add_action( 'elementor/editor/after_enqueue_styles', 'hajimi_enqueue_styles' );

add_action( 'admin_menu', function () {
    add_menu_page(
        __( 'Hajimi Settings', 'hajimi' ),
        __( 'Hajimi Settings', 'hajimi' ),
        'manage_options',
        'hajimi-settings',
        'hajimi_settings_page',
        'dashicons-admin-generic',
        61
    );
});

add_action( 'admin_init', function () {    
    register_setting(
        'hajimi_settings_group', 
        'hajimi_menu_dialogues'
    );
});

function my_custom_elementor_css() {
    if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
        wp_enqueue_style( 'my-elementor-editor-css', get_stylesheet_directory_uri() . '/page-editor.css');
    }
}
add_action('wp_enqueue_scripts', 'my_custom_elementor_css');

function hajimi_settings_page() {
    wp_enqueue_editor();
    $items = get_option('hajimi_menu_dialogues', []);
    $pages = get_pages( [
        'sort_column' => 'post_title',
        'sort_order'  => 'asc',
    ] );
    ?>

    <div class="wrap">
        <h1>Hajimi Settings</h1>

        <form method="post" action="options.php">
            <?php 
                settings_fields( 'hajimi_settings_group' );
                do_settings_sections( 'hajimi_settings_group' );
            ?>

            <div class="table-group">
                <table class="widefat" id="hajimi-repeater-table">
                    <thead>
                        <tr>
                            <th width="30%">Page</th>
                            <th width="60%">Content</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if (!empty($items)) : ?>
                        <?php foreach ($items as $index => $item) : ?>
                            <tr>
                                <td>
                                    <?php
                                    wp_dropdown_pages([
                                        'name' => "hajimi_menu_dialogues[$index][page]",
                                        'selected' => $item['page'] ?? '',
                                        'show_option_none' => 'Select Page',
                                    ]);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    wp_editor(
                                        $item['content'] ?? '',
                                        "hajimi_editor_$index",
                                        [
                                            'textarea_name' => "hajimi_menu_dialogues[$index][content]",
                                            'textarea_rows' => 5,
                                            'media_buttons' => true,
                                            'teeny' => false,
                                            'quicktags' => true,
                                            'tinymce' => [
                                                'toolbar1' => 'formatselect,bold,italic,underline,bullist,numlist,link,unlink,undo,redo',
                                                'toolbar2' => '',
                                            ],
                                        ]
                                    );
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="button remove-row">Remove</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>

            <p>
                <button type="button" class="button button-primary" id="add-row">Add Dialogue</button>
            </p>

            <?php submit_button(); ?>
        </form>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        let rowIndex = <?php echo !empty($items) ? count($items) : 0; ?>;
        $('#add-row').on('click', function(){
            let editorID = 'hajimi_editor_' + rowIndex;
            let row = `
            <tr>
                <td>
                    <?php
                    $dropdown = wp_dropdown_pages([
                        'echo' => 0,
                        'name' => '__name__',
                        'show_option_none' => 'Select Page',
                    ]);
                    echo str_replace('__name__', 'hajimi_menu_dialogues[__index__][page]', $dropdown);
                    ?>
                </td>
                <td>
                    <textarea id="` + editorID + `" 
                        name="hajimi_menu_dialogues[` + rowIndex + `][content]" 
                        rows="5"></textarea>
                </td>
                <td>
                    <button type="button" class="button remove-row">Remove</button>
                </td>
            </tr>`;

            row = row.replace(/__index__/g, rowIndex);

            $('#hajimi-repeater-table tbody').append(row);

            if (typeof tinymce !== "undefined") {

                tinymce.init({
                    selector: '#' + editorID,
                    height: 200,
                    menubar: false,
                    plugins: 'lists link paste',
                    toolbar: 'formatselect bold italic underline | bullist numlist | link unlink | undo redo'
                });

                if (typeof quicktags !== "undefined") {
                    quicktags({ id: editorID });
                }
            }

            rowIndex++;
        });

        $(document).on('click', '.remove-row', function(){

            let textarea = $(this).closest('tr').find('textarea');
            let id = textarea.attr('id');

            if (typeof tinymce !== "undefined") {
                let editor = tinymce.get(id);
                if (editor) {
                    editor.remove();
                }
            }

            $(this).closest('tr').remove();
        });

    });
    </script>

    <?php
}
