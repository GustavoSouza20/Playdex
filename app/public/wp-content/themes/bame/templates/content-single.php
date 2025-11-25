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

    bame_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?>>
    <?php
        if( class_exists('ReduxFramework') ) {
            $bame_post_details_title_position = bame_opt('bame_post_details_title_position');
        } else {
            $bame_post_details_title_position = 'header';
        }

        $allowhtml = array(
            'p'         => array(
                'class'     => array()
            ),
            'span'      => array(),
            'a'         => array(
                'href'      => array(),
                'title'     => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'b'         => array(),
        );
        // Blog Post Thumbnail
        do_action( 'bame_blog_post_thumb' );
        
        echo '<div class="blog-content">';
            // Blog Post Meta
            do_action( 'bame_blog_post_meta' );

            if( $bame_post_details_title_position != 'header' ) {
                echo '<h2 class="blog-title">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
            }

            if( get_the_content() ){

                the_content();
                // Link Pages
                bame_link_pages();
            }  

            if( class_exists('ReduxFramework') ) {
                $bame_post_details_share_options = bame_opt('bame_post_details_share_options');
                $bame_display_post_tags = bame_opt('bame_display_post_tags');
                $bame_author_options = bame_opt('bame_post_details_author_desc_trigger');
            } else {
                $bame_post_details_share_options = false;
                $bame_display_post_tags = false;
                $bame_author_options = false;
            }
            
            $bame_post_tag = get_the_tags();
            
            if( ! empty( $bame_display_post_tags ) || ( ! empty($bame_post_details_share_options )) ){
                echo '<div class="share-links clearfix">';
                    echo '<div class="row justify-content-between">';
                        if( is_array( $bame_post_tag ) && ! empty( $bame_post_tag ) ){
                            if( count( $bame_post_tag ) > 1 ){
                                $tag_text = __( 'Tags:', 'bame' );
                            }else{
                                $tag_text = __( 'Tag:', 'bame' );
                            }
                            if($bame_display_post_tags){
                                echo '<div class="col-md-auto">';
                                    echo '<span class="share-links-title">'.esc_html($tag_text).'</span>';
                                    echo '<div class="tagcloud">';
                                        foreach( $bame_post_tag as $tags ){
                                            echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
    
                        /**
                        *
                        * Hook for Blog Details Share Options
                        *
                        * Hook bame_blog_details_share_options
                        *
                        * @Hooked bame_blog_details_share_options_cb 10
                        *
                        */
                        do_action( 'bame_blog_details_share_options' );
    
                    echo '</div>';
    
                echo '</div>';    
            }  
        
        echo '</div>';

    echo '</div>'; 
        /**
        *
        * Hook for Blog Authro Bio
        *
        * Hook bame_blog_details_author_bio
        *
        * @Hooked bame_blog_details_author_bio_cb 10
        *
        */
        do_action( 'bame_blog_details_author_bio' );

        /**
        *
        * Hook for Post Navigation
        *
        * Hook bame_blog_details_post_navigation
        *
        * @Hooked bame_blog_details_post_navigation_cb 10
        *
        */
        do_action( 'bame_blog_details_post_navigation' );

        /**
        *
        * Hook for Blog Details Comments
        *
        * Hook bame_blog_details_comments
        *
        * @Hooked bame_blog_details_comments_cb 10
        *
        */
        do_action( 'bame_blog_details_comments' );
