<?php

/**
 * @Packge     : Bame
 * @Version    : 1.0
 * @Author     : BAME
 * @Author URI : https://themeforest.net/user/BAME
 *
 */

    // Block direct access

    if( ! defined( 'ABSPATH' ) ){

        exit();

    }

/**

 * Admin Custom Login Logo

 */

function bame_custom_login_logo() {

    $logo = ! empty( bame_opt( 'bame_admin_login_logo', 'url' ) ) ? bame_opt( 'bame_admin_login_logo', 'url' ) : '' ;

    if( isset( $logo ) && ! empty( $logo ) ){

        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}

add_action( 'login_enqueue_scripts', 'bame_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'bame_admin_styles' );

function bame_admin_styles() {

  if ( ! empty( $bame_admin_custom_css ) ) {
        $bame_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $bame_admin_custom_css);
        echo '<style rel="stylesheet" id="bame-admin-custom-css" >';
            echo esc_html( $bame_admin_custom_css );
        echo '</style>';
    }
}

// share button code

 function bame_social_sharing_buttons( ) {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
    // $pinterest   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());

    // Add sharing button at the end of page/page content

    $content = '';

    $content .= '<a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><span><i class="fab fa-facebook-f"></i></span></a>';
    $content .= '<a class="twitter"  href="'.esc_url( $twitterURL ).'" target="_blank"><span><i class="fab fa-twitter"></i></span></a>';
    $content .= '<a class="linkedin"  href="'.esc_url( $linkedin ).'" target="_blank"><span><i class="fab fa-linkedin-in"></i></span></a>';
    // $content .= '<a class="pinterest"  href="'.esc_url( $pinterest ).'" target="_blank"><span><i class="fa-brands fa-pinterest-p"></i></span></a>';


    return $content;

};


//Post Reading Time Count

function bame_estimated_reading_time() {
    global $post;
    // get the content
    $the_content = $post->post_content;
    // count the number of words
    $words = str_word_count( strip_tags( $the_content ) );
    // rounding off and deviding per 100 words per minute
    $minute = floor( $words / 100 );
    // rounding off to get the seconds
    $second = floor( $words % 100 / ( 100 / 60 ) );
    // calculate the amount of time needed to read
    $estimate = $minute . esc_html__(' Min', 'bame') . ( $minute == 1 ? '' : 's' ) . esc_html__(' Read', 'bame');
    // create output
    $output = $estimate;
    // return the estimate
    return $output;
}



//add SVG to allowed file uploads

function bame_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svgz+xml';
    $mimes['exe'] = 'program/exe';
    $mimes['dwg'] = 'image/vnd.dwg';
    return $mimes;
}

add_filter('upload_mimes', 'bame_mime_types');



function bame_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );

}

add_filter( 'wp_check_filetype_and_ext', 'bame_wp_check_filetype_and_ext', 10, 4 );

// Tournament Post Type

add_action( 'init','tournament', 0 );

function tournament(){

    $labels = array(
        'name'               => esc_html__( 'Tournaments', 'post Category general name', 'BAME' ),
        'singular_name'      => esc_html__( 'Tournament', 'post Category singular name', 'BAME' ),
        'menu_name'          => esc_html__( 'Tournaments', 'admin menu', 'BAME' ),
        'name_admin_bar'     => esc_html__( 'Tournament', 'add new on admin bar', 'BAME' ),
        'add_new'            => esc_html__( 'Add New', 'Tournament', 'BAME' ),
        'add_new_item'       => esc_html__( 'Add New Tournament', 'BAME' ),
        'new_item'           => esc_html__( 'New Tournament', 'BAME' ),
        'edit_item'          => esc_html__( 'Edit Tournament', 'BAME' ),
        'view_item'          => esc_html__( 'View Tournament', 'BAME' ),
        'all_items'          => esc_html__( 'All Tournaments', 'BAME' ),
        'search_items'       => esc_html__( 'Search Tournaments', 'BAME' ),
        'parent_item_colon'  => esc_html__( 'Parent Tournaments:', 'BAME' ),
        'not_found'          => esc_html__( 'No Tournaments found.', 'BAME' ),
        'not_found_in_trash' => esc_html__( 'No Tournaments found in Trash.', 'BAME' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'BAME' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-list-view',
        'supports'           => array( 'title', 'editor', 'comments', 'author', 'elementor' ),
        // 'supports'           => array( 'title', 'thumbnail', 'editor', 'comments', 'author', 'elementor' ),
        'rewrite'            => array( 'slug' => 'Tournaments' ),
        'menu_position' => 10,
    );

    register_post_type( 'tournament', $args );


    $labels = array(
        'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'BAME' ),
        'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'BAME' ),
        'search_items'               => esc_html__( 'Search Categorys', 'BAME' ),
        'popular_items'              => esc_html__( 'Popular Categorys', 'BAME' ),
        'all_items'                  => esc_html__( 'All Categorys', 'BAME' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Category', 'BAME' ),
        'update_item'                => esc_html__( 'Update Category', 'BAME' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'BAME' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'BAME' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'BAME' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'BAME' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'BAME' ),
        'not_found'                  => esc_html__( 'No Categorys found.', 'BAME' ),
        'menu_name'                  => esc_html__( 'Categories', 'BAME' ),
    );



    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'Tournament-category' ),
    );

    register_taxonomy( 'Tournament_category', 'tournament', $args );



    // Add new taxonomy, NOT hierarchical (like tags)

    $labels = array(
        'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'BAME' ),
        'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'BAME' ),
        'search_items'               => esc_html__( 'Search Tags', 'BAME' ),
        'popular_items'              => esc_html__( 'Popular Tags', 'BAME' ),
        'all_items'                  => esc_html__( 'All Tags', 'BAME' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Tag', 'BAME' ),
        'update_item'                => esc_html__( 'Update Tag', 'BAME' ),
        'add_new_item'               => esc_html__( 'Add New Tag', 'BAME' ),
        'new_item_name'              => esc_html__( 'New Tag Name', 'BAME' ),
        'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'BAME' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'BAME' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'BAME' ),
        'not_found'                  => esc_html__( 'No Tags found.', 'BAME' ),
        'menu_name'                  => esc_html__( 'Tags', 'BAME' ),

    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'Tournament-tag' ),
    );

    register_taxonomy( 'Tournament_tag', 'tournament', $args );
}

/**
 * Single Template
 */

add_filter( 'single_template', 'BAME_core_template_redirect' );

if( ! function_exists( 'BAME_core_template_redirect' ) ){

    function BAME_core_template_redirect( $single_template ){
        global $post;

        if( $post ){

            if( $post->post_type == 'tournament' ){ 

                $single_template = BAME_CORE_PLUGIN_TEMP . 'single-tournament.php';

            }
        }

        return $single_template;
    }

}


/**
 * Archive Template
 */

add_filter( 'archive_template', 'BAME_core_template_archive' );

if( ! function_exists( 'BAME_core_template_archive' ) ){

    function BAME_core_template_archive( $archive_template ){

        global $post;


        if( $post ){

            if( $post->post_type == 'tournament' ){

                $archive_template = BAME_CORE_PLUGIN_TEMP . 'archive-tournament.php';
            }
        }

        return $archive_template;
    }

}


// Add Image Size
add_image_size( 'bame_85X85', 85, 85, true );
add_image_size( 'bame_392X300', 392, 300, true );
add_image_size( 'bame_344X252', 344, 252, true );
add_image_size( 'bame_521X350', 521, 350, true );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );