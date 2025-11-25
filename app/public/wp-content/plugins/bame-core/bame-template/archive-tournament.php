<?php 

// Block direct access
if( ! defined( 'ABSPATH' ) ){
    exit();
}

// header
get_header();

if( class_exists( 'ReduxFramework' ) ) {
    $bamesubtitle     = bame_opt( 'bame_tournament_subtitle' );
    $bametitle        = bame_opt( 'bame_tournament_title' );
    $all_display      =  bame_opt('bame_display_filter_all');
    $all_text         =  bame_opt('bame_tournament_all_title');
    $extra_text         =  bame_opt('bame_tournament_extra_title');
    $text_change      =  bame_opt('bame_display_filter_texts');
    $upcoming_text         =  bame_opt('bame_tournament_upcoming');
    $finished_text         =  bame_opt('bame_tournament_finished');
} else {
    $bamesubtitle     = __( '# Game Streaming Battle', 'bame' );
    $bametitle        = __( 'Our Gaming Tournaments', 'bame' );
    $all_display      = '';
    $all_text         = __( 'ALL MATCH', 'bame' );
    $extra_text         = __( 'MATCH', 'bame' );
    // $text_change      = '';
    // $upcoming_text         = __( 'UPCOMING', 'bame' );
    // $finished_text         = __( 'FINISHED', 'bame' );
}
$bg = bame_opt('bame_tournament_img', 'background-image' );
$sec_bg = $bg ? $bg : '#';

echo '<section class="tournament-sec-v2 space-top space-extra-bottom tournament-bg">';
    echo '<div class="container">';
        echo '<div class="row justify-content-between">';
            if(!empty($bamesubtitle) || !empty($bametitle)){
                echo '<div class="col-lg-12">';
                    echo '<div class="title-area text-center">';
                        if( !empty($bamesubtitle) ){
                            echo '<span class="sub-title b-sub style2">'.wp_kses_post( $bamesubtitle ).'</span>';
                        }
                        if( !empty($bametitle) ){
                            echo '<h2 class="sec-title b-title">'.wp_kses_post( $bametitle ).'</h2>';
                        }
                    echo '</div>';
                echo '</div>';
            }
            echo '<div class="col-lg-12">';
                echo '<div class="tournament-filter-btn2  filter-menu filter-menu-active">';
                    if( $all_display ){
                        echo '<button data-filter="*" class="tab-btn th-btn style-border3 active" type="button">';
                            echo '<span class="btn-border">';
                                echo wp_kses_post( $all_text );
                            echo '</span>';
                        echo '</button>';
                    }
                    
                    $unique_statuses = array(); // Array to store unique status values
                    
                    while (have_posts()) {
                        the_post();
                        $post_id = get_the_ID();
                    
                        // Replace $prefix with the actual prefix used in your CMB2 fields
                        $prefix = '_tournament_';
                        $status = get_post_meta($post_id, $prefix . 'status', true);
                    
                        // Check if the status is not in the unique_statuses array, then display a button
                        if (!in_array($status, $unique_statuses)) {
                            $unique_statuses[] = $status; // Add the current status to the array
                    
                            echo '<button data-filter=".' . strtolower($status) . '" class="tab-btn th-btn style-border3" type="button">';
                            echo '<span class="btn-border">';
                            
                            // Check if $text_change is true, print custom text, otherwise print the status
                            if ($text_change) {
                                if ($status === 'upcoming') {
                                    echo esc_html($upcoming_text) . ' ' . wp_kses_post($extra_text);
                                } elseif ($status === 'finished') {
                                    echo esc_html($finished_text) . ' ' . wp_kses_post($extra_text);
                                }
                            } else {
                                echo strtoupper(esc_html($status)) . ' ' . wp_kses_post($extra_text);
                            }
                    
                            echo '</span>';
                            echo '</button>';
                        }
                    }                  
                    
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<div class="row gy-40 filter-active">';
            while (have_posts()){
                the_post();
                $post_id = get_the_ID();
        
                // Replace $prefix with the actual prefix used in your CMB2 fields
                $prefix = '_tournament_';
        
                $image_url = get_post_meta($post_id, $prefix . 'image1', true);
                $subtitle = get_post_meta($post_id, $prefix . 'subtitle1', true);
                $title = get_post_meta($post_id, $prefix . 'title1', true);
        
                $image_url2 = get_post_meta($post_id, $prefix . 'image2', true);
                $subtitle2 = get_post_meta($post_id, $prefix . 'subtitle2', true);
                $title2 = get_post_meta($post_id, $prefix . 'title2', true);
        
                $vs_image = get_post_meta($post_id, $prefix . 'vs_image', true);
                $status = get_post_meta($post_id, $prefix . 'status', true);
                $time = get_post_meta($post_id, $prefix . 'time', true);
                $date = get_post_meta($post_id, $prefix . 'date', true);
                $points = get_post_meta($post_id, $prefix . 'points', true);

                echo '<div class="col-12 filter-item '. strtolower($status).'">';
                    echo '<div class="tournament-card style2">';
                        echo '<div class="tournament-card-img">';
                            echo '<img src="'.esc_url($image_url).'" alt="'.esc_attr__('tournament image', 'bame').'">';
                        echo '</div>';
                        echo '<div class="tournament-card-versus">';
                            echo '<img src="'.esc_url($vs_image).'" alt="'.esc_attr__('tournament image', 'bame').'">';
                        echo '</div>';
                        echo '<div class="tournament-card-content">';
                            echo '<div class="tournament-card-details" data-mask-src="'.get_template_directory_uri().'/assets/img/bg/tournament-card2-bg.png">';
                                echo '<div class="card-title-wrap text-md-end">';
                                    echo '<h6 class="tournament-card-subtitle">'.esc_html($subtitle).'</h6>';
                                    echo '<h3 class="tournament-card-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title).'</a></h3>';
                                echo '</div>';

                                echo '<div class="tournament-card-date-wrap">';
                                    echo '<h2 class="tournament-card-time">'.esc_html($time).'</h2>';
                                    echo '<p class="tournament-card-date">'.esc_html($date).'</p>';
                                echo '</div>';
                                echo '<div class="card-title-wrap">';
                                    echo '<h6 class="tournament-card-subtitle">'.esc_html($subtitle2).'</h6>';
                                    echo '<h3 class="tournament-card-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title2).'</a></h3>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="tournament-card-meta">';
                                echo '<span class="tournament-card-tag gradient-border">'.esc_html($status).'</span>';
                                echo '<span class="tournament-card-score gradient-border">'.esc_html($points).'</span>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="tournament-card-img">';
                            echo '<img src="'.esc_url($image_url2).'" alt="'.esc_attr__('tournament image', 'bame').'">';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        echo '</div>';
        
        echo '<div class="pt-60 text-center">';
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
        echo '</div>';
    echo '</div>';
echo '</section>';

get_footer();