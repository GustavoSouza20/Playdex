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

	/**
	* Hook for preloader
	*/
	add_action( 'bame_preloader_wrap', 'bame_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'bame_main_wrapper_start', 'bame_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'bame_header', 'bame_header_cb', 10 );
	
	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'bame_blog_start_wrap', 'bame_blog_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'bame_blog_col_start_wrap', 'bame_blog_col_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'bame_blog_col_end_wrap', 'bame_blog_col_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'bame_blog_end_wrap', 'bame_blog_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Pagination
	*/
    add_action( 'bame_blog_pagination', 'bame_blog_pagination_cb', 10 );
    
    /**
	* Hook for Blog Content
	*/
	add_action( 'bame_blog_content', 'bame_blog_content_cb', 10 );
    
    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'bame_blog_sidebar', 'bame_blog_sidebar_cb', 10 );
    
    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'bame_blog_details_sidebar', 'bame_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'bame_blog_details_wrapper_start', 'bame_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'bame_blog_post_meta', 'bame_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'bame_blog_details_share_options', 'bame_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Post Share Options
	*/
	add_action( 'bame_blog_post_share_options', 'bame_blog_post_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'bame_blog_details_author_bio', 'bame_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'bame_blog_details_tags_and_categories', 'bame_blog_details_tags_and_categories_cb', 10 );

	/**
	* Hook for Blog Details Related Post Navigation
	*/
	add_action( 'bame_blog_details_post_navigation', 'bame_blog_details_post_navigation_cb', 10 ); 

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'bame_blog_details_comments', 'bame_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('bame_blog_details_col_start','bame_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('bame_blog_details_col_end','bame_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('bame_blog_details_wrapper_end','bame_blog_details_wrapper_end_cb');
	
	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('bame_blog_post_thumb','bame_blog_post_thumb_cb');
    
	/**
	* Hook for Blog Post Content
	*/
	add_action('bame_blog_post_content','bame_blog_post_content_cb');
	
    
	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('bame_blog_postexcerpt_read_content','bame_blog_postexcerpt_read_content_cb');
	
	/**
	* Hook for footer content
	*/
	add_action( 'bame_footer_content', 'bame_footer_content_cb', 10 );
	
	/**
	* Hook for main wrapper end
	*/
	add_action( 'bame_main_wrapper_end', 'bame_main_wrapper_end_cb', 10 );
	
	/**
	* Hook for Back to Top Button
	*/
	add_action( 'bame_back_to_top', 'bame_back_to_top_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'bame_page_start_wrap', 'bame_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'bame_page_end_wrap', 'bame_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'bame_page_col_start_wrap', 'bame_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'bame_page_col_end_wrap', 'bame_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'bame_page_sidebar', 'bame_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'bame_page_content', 'bame_page_content_cb', 10 );