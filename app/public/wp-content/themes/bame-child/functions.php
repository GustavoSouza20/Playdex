<?php
/**
 *
 * @Packge      Bame 
 * @Author      Themeholy
 * @Author URL  https://themeforest.net/user/themeholy 
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme 
 */
function bame_child_enqueue_styles() {

    wp_enqueue_style( 'bame-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bame-child-style', get_stylesheet_directory_uri() . '/style.css',array( 'bame-style' ),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'bame_child_enqueue_styles', 100000 );  

