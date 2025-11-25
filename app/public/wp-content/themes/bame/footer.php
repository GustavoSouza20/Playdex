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
    
    /**
    *
    * Hook for Footer Content
    *
    * Hook bame_footer_content
    *
    * @Hooked bame_footer_content_cb 10
    *
    */
    do_action( 'bame_footer_content' );


    /**
    *
    * Hook for Back to Top Button
    *
    * Hook bame_back_to_top
    *
    * @Hooked bame_back_to_top_cb 10
    *
    */
    do_action( 'bame_back_to_top' );

    /**
    *
    * bame grid lines
    *
    * Hook bame_grid_lines
    *
    * @Hooked bame_grid_lines_cb 10
    *
    */
    do_action( 'bame_grid_lines' );

    wp_footer();
    ?>
</body>
</html>