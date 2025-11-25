(function($){
    "use strict";
    
    let $bame_page_breadcrumb_area      = $("#_bame_page_breadcrumb_area");
    let $bame_page_settings             = $("#_bame_page_breadcrumb_settings");
    let $bame_page_breadcrumb_image     = $("#_bame_breadcumb_image");
    let $bame_page_title                = $("#_bame_page_title");
    let $bame_page_title_settings       = $("#_bame_page_title_settings");

    if( $bame_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--bame-page-breadcrumb-settings").show();
        if( $bame_page_settings.val() == 'global' ) {
            $(".cmb2-id--bame-breadcumb-image").hide();
            $(".cmb2-id--bame-page-title").hide();
            $(".cmb2-id--bame-page-title-settings").hide();
            $(".cmb2-id--bame-custom-page-title").hide();
            $(".cmb2-id--bame-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--bame-breadcumb-image").show();
            $(".cmb2-id--bame-page-title").show();
            $(".cmb2-id--bame-page-breadcrumb-trigger").show();
    
            if( $bame_page_title.val() == '1' ) {
                $(".cmb2-id--bame-page-title-settings").show();
                if( $bame_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--bame-custom-page-title").hide();
                } else {
                    $(".cmb2-id--bame-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--bame-page-title-settings").hide();
                $(".cmb2-id--bame-custom-page-title").hide();
    
            }
        }
    } else {
        $bame_page_breadcrumb_area.parents('.cmb2-id--bame-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $bame_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--bame-page-breadcrumb-settings").show();
            if( $bame_page_settings.val() == 'global' ) {
                $(".cmb2-id--bame-breadcumb-image").hide();
                $(".cmb2-id--bame-page-title").hide();
                $(".cmb2-id--bame-page-title-settings").hide();
                $(".cmb2-id--bame-custom-page-title").hide();
                $(".cmb2-id--bame-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--bame-breadcumb-image").show();
                $(".cmb2-id--bame-page-title").show();
                $(".cmb2-id--bame-page-breadcrumb-trigger").show();
        
                if( $bame_page_title.val() == '1' ) {
                    $(".cmb2-id--bame-page-title-settings").show();
                    if( $bame_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--bame-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--bame-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--bame-page-title-settings").hide();
                    $(".cmb2-id--bame-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--bame-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $bame_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--bame-page-title-settings").show();
            if( $bame_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--bame-custom-page-title").hide();
            } else {
                $(".cmb2-id--bame-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--bame-page-title-settings").hide();
            $(".cmb2-id--bame-custom-page-title").hide();

        }
    });

    //page settings
    $bame_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--bame-breadcumb-image").hide();
            $(".cmb2-id--bame-page-title").hide();
            $(".cmb2-id--bame-page-title-settings").hide();
            $(".cmb2-id--bame-custom-page-title").hide();
            $(".cmb2-id--bame-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--bame-breadcumb-image").show();
            $(".cmb2-id--bame-page-title").show();
            $(".cmb2-id--bame-page-breadcrumb-trigger").show();
    
            if( $bame_page_title.val() == '1' ) {
                $(".cmb2-id--bame-page-title-settings").show();
                if( $bame_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--bame-custom-page-title").hide();
                } else {
                    $(".cmb2-id--bame-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--bame-page-title-settings").hide();
                $(".cmb2-id--bame-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $bame_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--bame-custom-page-title").hide();
        } else {
            $(".cmb2-id--bame-custom-page-title").show();
        }
    });
    
})(jQuery);