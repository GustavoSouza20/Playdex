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

    if( !empty( bame_pagination() ) ) :
?>
<!-- Post Pagination -->
<div class="th-pagination ">
    <ul>
        <?php
            $prev   = '<span class="btn-border"></span> <i class="fa-solid fa-arrow-left"></i>';
            $next   = '<span class="btn-border"></span> <i class="fa-solid fa-arrow-right"></i>';
            // previous
            if( get_previous_posts_link() ){
                echo '<li>';
                previous_posts_link( $prev );
                echo '</li>';
            }

            echo bame_pagination();

            // next
            if( get_next_posts_link() ){
                echo '<li>';
                next_posts_link( $next );
                echo '</li>';
            }
        ?>
    </ul>
</div>
<!-- End of Post Pagination -->
<?php endif;