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
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook bame_blog_start_wrap
    *
    * @Hooked bame_blog_start_wrap_cb 10
    *  
    */
    do_action( 'bame_blog_start_wrap' );

    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook bame_blog_col_start_wrap
    *
    * @Hooked bame_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'bame_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook bame_blog_content
    *
    * @Hooked bame_blog_content_cb 10
    *  
    */
    do_action( 'bame_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook bame_blog_pagination
    *
    * @Hooked bame_blog_pagination_cb 10
    *  
    */
    do_action( 'bame_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook bame_blog_col_end_wrap
    *
    * @Hooked bame_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'bame_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook bame_blog_sidebar
    *
    * @Hooked bame_blog_sidebar_cb 10
    *  
    */
    do_action( 'bame_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook bame_blog_end_wrap
    *
    * @Hooked bame_blog_end_wrap_cb 10
    *  
    */
    do_action( 'bame_blog_end_wrap' );

    //footer
    get_footer();