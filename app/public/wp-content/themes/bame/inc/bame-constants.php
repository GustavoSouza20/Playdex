<?php
/**
 * @Packge     : Bame
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant 
 *
 */

// Base URI
if ( ! defined( 'BAME_DIR_URI' ) ) {
    define('BAME_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'BAME_DIR_ASSIST_URI' ) ) {
    define( 'BAME_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'BAME_DIR_CSS_URI' ) ) {
    define( 'BAME_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('BAME_DIR_JS_URI')) {
    define('BAME_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('BAME_DIR_PATH')) {
    define('BAME_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('BAME_DIR_PATH_INC')) {
    define('BAME_DIR_PATH_INC', BAME_DIR_PATH . 'inc/');
}

//BAME framework Folder Directory
if (!defined('BAME_DIR_PATH_FRAM')) {
    define('BAME_DIR_PATH_FRAM', BAME_DIR_PATH_INC . 'bame-framework/');
}

//Hooks Folder Directory
if (!defined('BAME_DIR_PATH_HOOKS')) {
    define('BAME_DIR_PATH_HOOKS', BAME_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'BAME_DEMO_DIR_PATH' ) ){
    define( 'BAME_DEMO_DIR_PATH', BAME_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'BAME_DEMO_DIR_URI' ) ){
    define( 'BAME_DEMO_DIR_URI', BAME_DIR_URI.'inc/demo-data/' );
}