<?php
/**
 * @Packge     : Bame
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( bame_meta('page_breadcrumb_area') ) ) {
            $bame_page_breadcrumb_area  = bame_meta('page_breadcrumb_area');
        } else {
            $bame_page_breadcrumb_area = '1';
        }
    }else{
        $bame_page_breadcrumb_area = '1';
    }
    
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );
    
    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $bame_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title 2 -->';
            
            if( class_exists( 'ReduxFramework' ) ){
                $ex_class = '';
            }else{
                $ex_class = ' th-breadcumb';   
            }
            echo '<div class="breadcumb-wrapper '. esc_attr($ex_class).'" id="breadcumbwrap">';
                echo '<div class="container">';
                    echo '<div class="breadcumb-content">';
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                            if( !empty( bame_meta('page_breadcrumb_settings') ) ) {
                                if( bame_meta('page_breadcrumb_settings') == 'page' ) {
                                    $bame_page_title_switcher = bame_meta('page_title');
                                } else {
                                    $bame_page_title_switcher = bame_opt('bame_page_title_switcher');
                                }
                            } else {
                                $bame_page_title_switcher = '1';
                            }
                        } else {
                            $bame_page_title_switcher = '1';
                        }

                        if( $bame_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $bame_page_title_tag    = bame_opt('bame_page_title_tag');
                            }else{
                                $bame_page_title_tag    = 'h1';
                            }

                            if( defined( 'CMB2_LOADED' )  ){
                                if( !empty( bame_meta('page_title_settings') ) ) {
                                    $bame_custom_title = bame_meta('page_title_settings');
                                } else {
                                    $bame_custom_title = 'default';
                                }
                            }else{
                                $bame_custom_title = 'default';
                            }

                            if( $bame_custom_title == 'default' ) {
                                echo bame_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $bame_page_title_tag ),
                                        "text"  => esc_html( get_the_title( ) ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                echo bame_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $bame_page_title_tag ),
                                        "text"  => esc_html( bame_meta('custom_page_title') ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }

                        }
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                            if( bame_meta('page_breadcrumb_settings') == 'page' ) {
                                $bame_breadcrumb_switcher = bame_meta('page_breadcrumb_trigger');
                            } else {
                                $bame_breadcrumb_switcher = bame_opt('bame_enable_breadcrumb');
                            }

                        } else {
                            $bame_breadcrumb_switcher = '1';
                        }

                        if( $bame_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                                bame_breadcrumbs(
                                    array(
                                        'breadcrumbs_classes' => '',
                                    )
                                );
                        }
                    echo '</div>';
                echo '</div>';

            echo '</div>';
            echo '<!-- End of Page title -->';
            
        }
    } else {
        echo '<!-- Page title 3 -->';
         if( class_exists( 'ReduxFramework' ) ){
            $ex_class = '';
            if (class_exists( 'woocommerce' ) && is_shop()){
            $breadcumb_bg_class = 'custom-woo-class';
            }elseif(is_404()){
                $breadcumb_bg_class = 'custom-error-class';
            }elseif(is_search()){
                $breadcumb_bg_class = 'custom-search-class';
            }elseif(is_archive()){
                $breadcumb_bg_class = 'custom-archive-class';
            }else{
                $breadcumb_bg_class = '';
            }
        }else{
            $breadcumb_bg_class = ''; 
            $ex_class = ' th-breadcumb';     
        }
        echo '<div class="breadcumb-wrapper '. esc_attr($breadcumb_bg_class . $ex_class).'">'; 
            echo '<div class="container z-index-common">';
                    echo '<div class="breadcumb-content">';
                        if( class_exists( 'ReduxFramework' )  ){
                            $bame_page_title_switcher  = bame_opt('bame_page_title_switcher');
                        }else{
                            $bame_page_title_switcher = '1';
                        }

                        if( $bame_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $bame_page_title_tag    = bame_opt('bame_page_title_tag');
                            }else{
                                $bame_page_title_tag    = 'h1';
                            }
                            if( class_exists('woocommerce') && is_shop() ) {
                                echo bame_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $bame_page_title_tag ),
                                        "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_archive() ){
                                echo bame_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $bame_page_title_tag ),
                                        "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_home() ){
                                $bame_blog_page_title_setting = bame_opt('bame_blog_page_title_setting');
                                $bame_blog_page_title_switcher = bame_opt('bame_blog_page_title_switcher');
                                $bame_blog_page_custom_title = bame_opt('bame_blog_page_custom_title');
                                if( class_exists('ReduxFramework') ){
                                    if( $bame_blog_page_title_switcher ){
                                        echo bame_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $bame_page_title_tag ),
                                                "text"  => !empty( $bame_blog_page_custom_title ) && $bame_blog_page_title_setting == 'custom' ? esc_html( $bame_blog_page_custom_title) : esc_html__( 'Latest News', 'bame' ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }else{
                                    echo bame_heading_tag(
                                        array(
                                            "tag"   => "h1",
                                            "text"  => esc_html__( 'Latest News', 'bame' ),
                                            'class' => 'breadcumb-title',
                                        )
                                    );
                                }
                            }elseif( is_search() ){
                                echo bame_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $bame_page_title_tag ),
                                        "text"  => esc_html__( 'Search Result', 'bame' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_404() ){
                                echo bame_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $bame_page_title_tag ),
                                        "text"  => esc_html__( 'Error Page', 'bame' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_singular( 'product' ) ){
                                $posttitle_position  = bame_opt('bame_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }

                                if( $postTitlePos != true ){
                                    echo bame_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $bame_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $bame_post_details_custom_title  = bame_opt('bame_product_details_custom_title');
                                    }else{
                                        $bame_post_details_custom_title = __( 'Shop Details','bame' );
                                    }

                                    if( !empty( $bame_post_details_custom_title ) ) {
                                        echo bame_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $bame_page_title_tag ),
                                                "text"  => wp_kses( $bame_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }else{
                                $posttitle_position  = bame_opt('bame_post_details_title_position');
                                $postTitlePos = false;
                                if( is_single() ){
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }
                                if( is_singular( 'product' ) ){
                                    $posttitle_position  = bame_opt('bame_product_details_title_position');
                                    $postTitlePos = false;
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }

                                if( $postTitlePos != true ){
                                    echo bame_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $bame_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $bame_post_details_custom_title  = bame_opt('bame_post_details_custom_title');
                                    }else{
                                        $bame_post_details_custom_title = __( 'Blog Details','bame' );
                                    }

                                    if( !empty( $bame_post_details_custom_title ) ) {
                                        echo bame_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $bame_page_title_tag ),
                                                "text"  => wp_kses( $bame_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }
                        }
                        if( class_exists('ReduxFramework') ) {
                            $bame_breadcrumb_switcher = bame_opt( 'bame_enable_breadcrumb' );
                        } else {
                            $bame_breadcrumb_switcher = '1';
                        }
                        if( $bame_breadcrumb_switcher == '1' ) {
                            if(bame_breadcrumbs()){
                            echo '<div>';
                                bame_breadcrumbs(
                                    array(
                                        'breadcrumbs_classes' => 'nav',
                                    )
                                );
                            echo '</div>';
                            }
                        }
                    echo '</div>';
            echo '</div>';

        echo '</div>';
        echo '<!-- End of Page title -->';
    }