<?php
/**
 * @Packge     : Bame
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$selected_options   =   get_option('et_selected_bame_demo_plugin');

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/bame-constants.php';

//theme setup
require_once BAME_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once BAME_DIR_PATH_INC . 'essential-scripts.php';

if($selected_options == 'with_woocommerce'){
    // Woo Hooks
    require_once BAME_DIR_PATH_INC . 'woo-hooks/bame-woo-hooks.php';

    // Woo Hooks Functions
    require_once BAME_DIR_PATH_INC . 'woo-hooks/bame-woo-hooks-functions.php';
}
// plugin activation
require_once BAME_DIR_PATH_FRAM . 'plugins-activation/bame-active-plugins.php';

// theme dynamic css
require_once BAME_DIR_PATH_INC . 'bame-commoncss.php';

// meta options
require_once BAME_DIR_PATH_FRAM . 'bame-meta/bame-config.php';

// page breadcrumbs
require_once BAME_DIR_PATH_INC . 'bame-breadcrumbs.php';

// sidebar register
require_once BAME_DIR_PATH_INC . 'bame-widgets-reg.php';

//essential functions
require_once BAME_DIR_PATH_INC . 'bame-functions.php';

// helper function
require_once BAME_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once BAME_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once BAME_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// bame options
require_once BAME_DIR_PATH_FRAM . 'bame-options/bame-options.php';

// hooks
require_once BAME_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once BAME_DIR_PATH_HOOKS . 'hooks-functions.php'; 


add_action('wp_ajax_update_cart_count', 'update_cart_count');
add_action('wp_ajax_nopriv_update_cart_count', 'update_cart_count');

function update_cart_count() {
    if (class_exists('woocommerce')) {
        global $woocommerce;
        $product_id = intval($_POST['product_id']);
        $woocommerce->cart->add_to_cart($product_id); // Add the product to the cart

        $count = $woocommerce->cart->cart_contents_count;
        echo esc_html($count);
    }
    wp_die();
}

// Code with & without woocommerce
if ( is_admin() ) {
    include_once get_template_directory() . '/inc/bame-dashboard/et-admin.php';
}

function bame_enqueue_scripts() {
    wp_enqueue_style(
        'bame-admin-styles',
        get_template_directory_uri() . '/inc/bame-dashboard/css/admin-pages.css',
        array(),
        time()
    );
}
add_action( 'admin_enqueue_scripts', 'bame_enqueue_scripts' );

function bame_dashboard_submenu_page() {

    if(!function_exists('bame_init')) {
        add_menu_page(
            esc_html__( 'ThemeHoly', 'bame' ),
            esc_html__( 'ThemeHoly', 'bame' ),
            'manage_options',
            'bame-dashboard',
            '',
            get_template_directory_uri() . '/assets/img/favicon.png',
            2
        );
    }
    
    add_submenu_page(
        'bame-dashboard',
        esc_html__( 'Dashboard', 'bame' ),
        esc_html__( 'Dashboard', 'bame' ),
        'manage_options',
        'bame-dashboard',
        'bame_screen_welcome'
    );
}
add_action( 'admin_menu', 'bame_dashboard_submenu_page' );

function bame_screen_welcome() {
    echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
    require_once get_parent_theme_file_path( '/inc/bame-dashboard/welcome.php' );
}

function bame_plugins_submenu_page() {

    add_submenu_page(
        'bame-dashboard',
        esc_html__( 'Install Plugins', 'bame' ),
        esc_html__( 'Install Plugins', 'bame' ),
        'manage_options',
        'bame-admin-plugins',
        'bame_screen_plugin'
    );

}
add_action( 'admin_menu', 'bame_plugins_submenu_page' );

function bame_screen_plugin() {
    echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
    require_once get_parent_theme_file_path( '/inc/bame-dashboard/install-plugins.php' );
}