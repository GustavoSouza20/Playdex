<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme ecohost for publication on Themeforest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */



/**
 * Include the TGM_Plugin_Activation class.
 */
require_once BAME_DIR_PATH_FRAM . 'plugins-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'bame_register_required_plugins' );
function bame_register_required_plugins() {

    /*
    * Array of plugin arrays. Required keys are name and slug.
    * If the source is NOT from the .org repo, then source is also required.
    */

    $selected_options   =   get_option('et_selected_bame_demo_plugin');

    if($selected_options == 'with_woocommerce'){
        $plugins = array(

            array(
                'name'                  => esc_html__( 'Bame Core', 'bame' ),
                'slug'                  => 'bame-core',
                'version'               => '1.0',
                'source'                => BAME_DIR_PATH_FRAM . 'plugins/bame-core.zip',
                'required'              => true,
            ),

            array(
                'name'                  => esc_html__( 'One Click Demo Importer', 'bame' ),
                'slug'                  => 'one-click-demo-import',
                'required'              => true,
            ),

            array(
                'name'      => esc_html__( 'Elementor', 'bame' ),
                'slug'      => 'elementor',
                'version'   => '',
                'required'  => true,
            ),

            array(
                'name'      => esc_html__( 'Redux Framework', 'bame' ),
                'slug'      => 'redux-framework',
                'version'   => '',
                'required'  => true,
            ),

            array(
                'name'      => esc_html__( 'CMB2', 'bame' ),
                'slug'      => 'cmb2',
                'required'  => true,
            ),

            array(
                'name'      => esc_html__( 'Contact Form 7', 'bame' ),
                'slug'      => 'contact-form-7',
                'version'   => '',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'WooCommerce', 'bame' ),
                'slug'      => 'woocommerce',
                'version'   => '',
                'required'  => true,
            ),

            array(
                'name'      => esc_html__( 'WPC Smart Quick View for WooCommerce', 'bame' ),
                'slug'      => 'woo-smart-quick-view',
                'version'   => '',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'WPC Smart Wishlist for WooCommerce', 'bame' ),
                'slug'      => 'woo-smart-wishlist',
                'version'   => '',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'GTranslate', 'bame' ),
                'slug'      => 'gtranslate',
                'version'   => '',
                'required'  => true,
            ),

        );

    }else{
        $plugins = array(

            array(
                'name'                  => esc_html__( 'Bame Core', 'bame' ),
                'slug'                  => 'bame-core',
                'version'               => '1.0',
                'source'                => BAME_DIR_PATH_FRAM . 'plugins/bame-core.zip',
                'required'              => true,
            ),

            array(
                'name'                  => esc_html__( 'One Click Demo Importer', 'bame' ),
                'slug'                  => 'one-click-demo-import',
                'required'              => true,
            ),

            array(
                'name'      => esc_html__( 'Elementor', 'bame' ),
                'slug'      => 'elementor',
                'version'   => '',
                'required'  => true,
            ),

            array(
                'name'      => esc_html__( 'Redux Framework', 'bame' ),
                'slug'      => 'redux-framework',
                'version'   => '',
                'required'  => true,
            ),

            array(
                'name'      => esc_html__( 'CMB2', 'bame' ),
                'slug'      => 'cmb2',
                'required'  => true,
            ),

            array(
                'name'      => esc_html__( 'Contact Form 7', 'bame' ),
                'slug'      => 'contact-form-7',
                'version'   => '',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'GTranslate', 'bame' ),
                'slug'      => 'gtranslate',
                'version'   => '',
                'required'  => true,
            ),

        );

    }

    $config = array(
        'id'           => 'bame',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}