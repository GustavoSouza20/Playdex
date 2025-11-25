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

/**
 * Enqueue scripts and styles.
 */
function bame_essential_scripts() {

    wp_enqueue_style( 'bame-style', get_stylesheet_uri() ,array(), wp_get_theme()->get( 'Version' ) ); 

    // google font
    wp_enqueue_style( 'bame-fonts', bame_google_fonts() ,array(), null );

    // Bootstrap Min
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) ,array(), '5.0.0' );

    // Font Awesome Six
    wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome.min.css' ) ,array(), '6.0.0' );

    // Magnific Popup
    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.min.css' ), array(), '1.0' );

    // Swiper css
    wp_enqueue_style( 'swiper-css', get_theme_file_uri( '/assets/css/swiper-bundle.min.css' ) ,array(), '4.0.13' );

    // Wishlist css
    wp_enqueue_style( 'wishlist-css', get_theme_file_uri( '/assets/css/th-wl.css' ), array(), '1.0' );

    // bame main style
    wp_enqueue_style( 'bame-main-style', get_theme_file_uri('/assets/css/style.css') ,array(), wp_get_theme()->get( 'Version' ) );


    // Load Js

    // Bootstrap
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '5.0.0', true );

    // swiper js
    wp_enqueue_script( 'swiper-js', get_theme_file_uri( '/assets/js/swiper-bundle.min.js' ), array('jquery'), '1.0.0', true );

    // magnific popup
    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array('jquery'), '1.0.0', true );

     // jquery-ui
     wp_enqueue_script( 'jquery-ui', get_theme_file_uri( '/assets/js/jquery-ui.min.js' ), array( 'jquery' ), '1.12.1', true );

    // Isotope
    wp_enqueue_script( 'isototpe-pkgd', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '1.0.0', true );

    // Isotope Imagesloaded
    wp_enqueue_script( 'imagesloaded' ); 
     
    // counterup
    wp_enqueue_script( 'counterup', get_theme_file_uri( '/assets/js/jquery.counterup.min.js' ), array( 'jquery' ), '4.0.0', true );

    // gsap
    wp_enqueue_script( 'gsap', get_theme_file_uri( '/assets/js/gsap.min.js' ), array( 'jquery' ), '3.11.2', true );

    // waypoints
    wp_enqueue_script( 'waypoints', get_theme_file_uri( '/assets/js/waypoints.js' ), array( 'jquery' ), '1.1.0', true );

    // wow
    wp_enqueue_script( 'wow', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), '1.1.3', true );

    // smooth-scroll
    wp_enqueue_script( 'smooth-scroll', get_theme_file_uri( '/assets/js/smooth-scroll.js' ), array( 'jquery' ), '1.1.0', true );

    // main script
    wp_enqueue_script( 'bame-main-script', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), wp_get_theme()->get( 'Version' ), true );

    // comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bame_essential_scripts',99 );


function bame_block_editor_assets( ) {
    // Add custom fonts.
    wp_enqueue_style( 'bame-editor-fonts', bame_google_fonts(), array(), null );
}

add_action( 'enqueue_block_editor_assets', 'bame_block_editor_assets' );

/*
Register Fonts
*/
function bame_google_fonts() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
     
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'bame' ) ) {
        $font_url =  'https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@300;400;500;600;700&display=swap';
    }
    return $font_url;
}