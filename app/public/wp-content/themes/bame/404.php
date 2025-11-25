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

    if( class_exists( 'ReduxFramework' ) ) {
        $bame404title     = bame_opt( 'bame_error_title' );
        $bame404description  = bame_opt( 'bame_error_description' );
        $bame404btntext      = bame_opt( 'bame_error_btn_text' );
    } else {
        $bame404title     = __( 'OooPs! Page Not Found', 'bame' );
        $bame404description  = __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bame' );
        $bame404btntext      = __( ' Back To Home', 'bame');

    }

    // get header //
    get_header(); 
    
        echo '<section class="space error-page">'; 
            echo '<div class="container">';
                echo '<div class="error-img">';
                    if(!empty(bame_opt('bame_error_img', 'url' ) )){
                        echo '<img src="'.esc_url( bame_opt('bame_error_img', 'url' ) ).'" alt="'.esc_attr__('404 image', 'bame').'">';
                    }else{
                        echo '<img src="'.get_template_directory_uri().'/assets/img/error.svg" alt="'.esc_attr__('404 image', 'bame').'">';
                    }
                echo '</div>';
                echo '<div class="error-content">';
                    echo '<h2 class="error-title">'.wp_kses_post( $bame404title ).'</h2>';
                    echo '<p class="error-text">'.esc_html( $bame404description ).'</p>';
                    echo '<a href="'.esc_url( home_url('/') ).'" class="th-btn error-btn"><i class="fas fa-home me-2"></i>'.esc_html( $bame404btntext ).'</a>';
                echo '</div>';
            echo '</div>';
        echo '</section>';

    //footer
    get_footer();