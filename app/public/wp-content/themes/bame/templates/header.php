<?php
/**
 * @Packge     : Bame
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $bame_post_id = get_the_ID();

            // Get the page settings manager
            $bame_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $bame_page_settings_model = $bame_page_settings_manager->get_model( $bame_post_id );

            // Retrieve the color we added before
            $bame_header_style = $bame_page_settings_model->get_settings( 'bame_header_style' );
            $bame_header_builder_option = $bame_page_settings_model->get_settings( 'bame_header_builder_option' );

            if( $bame_header_style == 'header_builder'  ) {

                if( !empty( $bame_header_builder_option ) ) {
                    $bameheader = get_post( $bame_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $bameheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $bame_header_builder_trigger = bame_opt('bame_header_options');
                if( $bame_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $bame_global_header_select = get_post( bame_opt( 'bame_header_select_options' ) );
                    $header_post = get_post( $bame_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    bame_global_header_option();
                }
            }
        } else {
            $bame_header_options = bame_opt('bame_header_options');
            if( $bame_header_options == '1' ) {
                bame_global_header_option();
            } else {
                $bame_header_select_options = bame_opt('bame_header_select_options');
                $bameheader = get_post( $bame_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $bameheader->ID );
                echo '</header>';
            }
        }
    } else {
        bame_global_header_option();
    }