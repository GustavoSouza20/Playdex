<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Bame
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeforest.net/user/themeholy
 *
 */

// enqueue css
function bame_common_custom_css(){
	wp_enqueue_style( 'bame-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = bame_opt( 'bame_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $bame_header_bg =  get_header_image();
    }else{
        if( bame_meta( 'page_breadcrumb_settings' ) == 'page' ){
            if( ! empty( bame_meta( 'breadcumb_image' ) ) ){
                $bame_header_bg = bame_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $bame_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$bame_header_bg}')!important;
        }";
    }
    
	// Theme color
	$bamethemecolor = bame_opt('bame_theme_color'); 
    if( !empty( $bamethemecolor ) ){
        list($r, $g, $b) = sscanf( $bamethemecolor, "#%02x%02x%02x");

        $bame_real_color = $r.','.$g.','.$b;
        if( !empty( $bamethemecolor ) ) {
            $customcss .= ":root {
            --theme-color: rgb({$bame_real_color});
            }";
        }
    }
    // Theme color 2
	$bamethemecolor2 = bame_opt('bame_theme_color2'); 
    if( !empty( $bamethemecolor2 ) ){
        list($r, $g, $b) = sscanf( $bamethemecolor2, "#%02x%02x%02x");

        $bame_real_color = $r.','.$g.','.$b;
        if( !empty( $bamethemecolor2 ) ) {
            $customcss .= ":root {
            --theme-color2: rgb({$bame_real_color});
            }";
        }
    }
    // Theme color 3
	$bamethemecolor3 = bame_opt('bame_theme_color3'); 
    if( !empty( $bamethemecolor3 ) ){
        list($r, $g, $b) = sscanf( $bamethemecolor3, "#%02x%02x%02x");

        $bame_real_color = $r.','.$g.','.$b;
        if( !empty( $bamethemecolor3 ) ) {
            $customcss .= ":root {
            --theme-color3: rgb({$bame_real_color});
            }";
        }
    }
    // Heading  color
	$bameheadingcolor = bame_opt('bame_heading_color');
    if( !empty( $bameheadingcolor ) ){
        list($r, $g, $b) = sscanf( $bameheadingcolor, "#%02x%02x%02x");

        $bame_real_color = $r.','.$g.','.$b;
        if( !empty( $bameheadingcolor ) ) {
            $customcss .= ":root {
                --title-color: rgb({$bame_real_color});
            }";
        }
    }
    // White  color
	$bamewhitecolor = bame_opt('bame_white_color');
    if( !empty( $bamewhitecolor ) ){
        list($r, $g, $b) = sscanf( $bamewhitecolor, "#%02x%02x%02x");

        $bame_real_color = $r.','.$g.','.$b;
        if( !empty( $bamewhitecolor ) ) {
            $customcss .= ":root {
                --white-color: rgb({$bame_real_color});
            }";
        }
    }
    // Body color
	$bamebodycolor = bame_opt('bame_body_color');
    if( !empty( $bamebodycolor ) ){
        list($r, $g, $b) = sscanf( $bamebodycolor, "#%02x%02x%02x");

        $bame_real_color = $r.','.$g.','.$b;
        if( !empty( $bamebodycolor ) ) {
            $customcss .= ":root {
                --body-color: rgb({$bame_real_color});
            }";
        }
    }

     // Body font
     $bamebodyfont = bame_opt('bame_theme_body_font', 'font-family');
     if( !empty( $bamebodyfont ) ) {
         $customcss .= ":root {
             --body-font: $bamebodyfont ;
         }";
     }
 
     // Heading font
     $bameheadingfont = bame_opt('bame_theme_heading_font', 'font-family');
     if( !empty( $bameheadingfont ) ) {
         $customcss .= ":root {
             --title-font: $bameheadingfont ;
         }";
     }

    // Style font
    $bamestylefont = bame_opt('bame_theme_war_font', 'font-family');
    if( !empty( $bamestylefont ) ) {
        $customcss .= ":root {
            --war-font: $bamestylefont ;
        }";
    }
    // Style 2 font
    $bamestyle2font = bame_opt('bame_theme_war2_font', 'font-family');
    if( !empty( $bamestylefont ) ) {
        $customcss .= ":root {
            --war-font2: $bamestyle2font ;
        }";
    }
    // Style 3 font
    $bamestyle3font = bame_opt('bame_theme_war3_font', 'font-family');
    if( !empty( $bamestylefont ) ) {
        $customcss .= ":root {
            --goldman-font: $bamestyle3font ;
        }";
    }


    if(bame_opt('bame_menu_icon_class')){
        $menu_icon_class = bame_opt( 'bame_menu_icon_class' );
    }else{
        $menu_icon_class = 'f11b';
    }

    if( !empty( $menu_icon_class ) ) {
        $customcss .= ":root {
            .main-menu ul.sub-menu li a:before {
                content: \"\\$menu_icon_class\";
            }
        }";
    }

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'bame-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'bame_common_custom_css', 100 );