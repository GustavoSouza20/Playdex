<?php 

// Block direct access
if( ! defined( 'ABSPATH' ) ){
    exit();
}

get_header();

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

        echo '<section class="tournament-details-page space-top space-extra-bottom">';
            echo '<div class="container">';
                echo '<div class="row gx-40">';
                    echo '<div class="col-12">';
                        echo '<div class="tournament-card style2 active mb-60">';
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
                                        echo '<h3 class="tournament-card-title text-white">'.esc_html($title).'</h3>';
                                    echo '</div>';

                                    echo '<div class="tournament-card-date-wrap">';
                                        echo '<h2 class="tournament-card-time">'.esc_html($time).'</h2>';
                                        echo '<p class="tournament-card-date">'.esc_html($date).'</p>';
                                    echo '</div>';
                                    echo '<div class="card-title-wrap">';
                                        echo '<h6 class="tournament-card-subtitle">'.esc_html($subtitle2).'</h6>';
                                        echo '<h3 class="tournament-card-title text-white">'.esc_html($title2).'</h3>';
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

                    echo '<div class="col-12">';
                        the_content();
                    echo '</div>';

                    echo '<div class="col-12">';
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</section>';

    }

get_footer();
