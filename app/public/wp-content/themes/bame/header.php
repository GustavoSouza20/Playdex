<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<?php
    // Cursor Circle effect Display
    if( class_exists('ReduxFramework') ){
        $bame_display_cursor              =  bame_opt('bame_display_cursor');
        $bame_display_cursor_image              =  bame_opt('bame_display_cursor_image');
        if( $bame_display_cursor ){
            $class = 'cursor-animation';
        }else{
            $class = '';
        }
        
        if( $bame_display_cursor_image ){
            $class2 = 'cursor-image';
        }else{
            $class2 = '';
        }
        
        echo '<div class="'.esc_attr($class .' '. $class2).'"></div>';
    }

    wp_body_open();

    /**
    *
    * Preloader
    *
    * Hook bame_preloader_wrap
    *
    * @Hooked bame_preloader_wrap_cb 10
    *
    */
    do_action( 'bame_preloader_wrap' );

    /**
    *
    * bame header
    *
    * Hook bame_header
    *
    * @Hooked bame_header_cb 10
    *
    */
    do_action( 'bame_header' );