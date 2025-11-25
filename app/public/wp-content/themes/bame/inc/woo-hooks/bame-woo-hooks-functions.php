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

// bame gallery image size hook functions
add_filter('woocommerce_gallery_image_size','bame_woocommerce_gallery_image_size');
function bame_woocommerce_gallery_image_size( $imagesize ) {
    $imagesize = 'bame-shop-single';
    return $imagesize;
}

// bame shop main content hook functions
if( !function_exists('bame_shop_main_content_cb') ) {
    function bame_shop_main_content_cb( ) {
        if( is_shop() || is_product_category() || is_product_tag() ) {
            echo '<section class="th-product-wrapper product-details space-top space-extra-bottom">';
            if( class_exists('ReduxFramework') ) {
                $bame_shop_container = bame_opt('bame_shop_container');
                if( $bame_shop_container ) {
                    echo '<div class="container">';
                }else{
                    echo '<div class="container-fluid">';
                }
            } else {
                echo '<div class="container">';
            }
        } else {
            echo '<section class="th-product-wrapper product-details space-top space-extra-bottom">';
                echo '<div class="container">';
        }
            echo '<div class="row">';
    }
}

// bame shop main content hook function
if( !function_exists('bame_shop_main_content_end_cb') ) {
    function bame_shop_main_content_end_cb( ) {
            echo '</div>';
        echo '</div>';
    echo '</section>';
    }
}

// shop column start hook function
if( !function_exists('bame_shop_col_start_cb') ) {
    function bame_shop_col_start_cb( ) {
        if( class_exists('ReduxFramework') ) {
            if( class_exists('woocommerce') && is_shop() ) {
                $bame_woo_shoppage_sidebar = bame_opt('bame_woo_shoppage_sidebar');
                if( $bame_woo_shoppage_sidebar == '2' && is_active_sidebar('bame-woo-sidebar') ) {
                    echo '<div class="col-xl-9 col-lg-8 order-last">';
                } elseif( $bame_woo_shoppage_sidebar == '3' && is_active_sidebar('bame-woo-sidebar') ) {
                    echo '<div class="col-xl-9 col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12">';
            }
        } else {
            if( class_exists('woocommerce') && is_shop() ) {
                if( is_active_sidebar('bame-woo-sidebar') ) {
                    echo '<div class="col-xl-9 col-lg-8">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12">';
            }
        }

    }
}

// shop column end hook function
if( !function_exists('bame_shop_col_end_cb') ) {
    function bame_shop_col_end_cb( ) {
        echo '</div>';
    }
}

// bame woocommerce pagination hook function
if( ! function_exists('bame_woocommerce_pagination') ) {
    function bame_woocommerce_pagination( ) {
        if( ! empty( bame_pagination() ) ) {

            echo '<div class="th-pagination text-center pt-50">';
                echo '<ul>';
                    $prev   = '<span class="btn-border"></span><i class="far fa-arrow-left"></i> ';
                    $next   = '<span class="btn-border"></span><i class="far fa-arrow-right"></i>';
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
                echo '</ul>';
            echo '</div>';
        }
    }
}
// woocommerce filter wrapper hook function
if( ! function_exists('bame_woocommerce_filter_wrapper') ) {
    function bame_woocommerce_filter_wrapper( ) { ?>
        <div class="th-sort-bar">
            <div class="row justify-content-between align-items-center">

                <div class="col-md">
                    <?php echo woocommerce_result_count(); ?>
                </div>

                <div class="col-md-auto">
                    <?php echo woocommerce_catalog_ordering(); ?>
                </div>

            </div>
        </div>
    <?php }
}

// woocommerce tab content wrapper start hook function
if( ! function_exists('bame_woocommerce_tab_content_wrapper_start') ) {
    function bame_woocommerce_tab_content_wrapper_start( ) {
        echo '<!-- Tab Content -->';
        echo '<div class="tab-content" id="nav-tabContent">';
    }
}

// woocommerce tab content wrapper start hook function
if( ! function_exists('bame_woocommerce_tab_content_wrapper_end') ) {
    function bame_woocommerce_tab_content_wrapper_end( ) {
        echo '</div>';
        echo '<!-- End Tab Content -->';
    }
}
// bame grid tab content hook function
if( !function_exists('bame_grid_tab_content_cb') ) {
    function bame_grid_tab_content_cb( ) {
        echo '<!-- Grid -->';
            echo '<div class="tab-pane fade show active" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">';
                echo '<div class="shop-grid-area">';
                    woocommerce_product_loop_start();
                    if( class_exists('ReduxFramework') ) {
                        $bame_woo_product_col = bame_opt('bame_woo_product_col');
                        if( $bame_woo_product_col == '2' ) {
                            $bame_woo_product_col_val = 'col-xl-6 col-lg-4 col-sm-6';
                        } elseif( $bame_woo_product_col == '3' ) {
                            $bame_woo_product_col_val = 'col-xl-4 col-lg-4 col-sm-6';
                        } elseif( $bame_woo_product_col == '4' ) {
                            $bame_woo_product_col_val = 'col-xl-3 col-lg-4 col-sm-6';
                        }elseif( $bame_woo_product_col == '5' ) {
                            $bame_woo_product_col_val = 'col-xl-2 col-lg-4 col-sm-6';
                        } elseif( $bame_woo_product_col == '6' ) {
                            $bame_woo_product_col_val = 'col-xl-2 col-lg-3 col-md-4 col-sm-6';
                        }
                    } else {
                        $bame_woo_product_col_val = 'col-xl-3 col-lg-4 col-sm-6';
                    }

                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();

                            echo '<div class="'.esc_attr( $bame_woo_product_col_val ).'">';
                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );
                                
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    }

                    woocommerce_product_loop_end();
                echo '</div>';
            echo '</div>';
        echo '<!-- End Grid -->';
    }
}

// bame list tab content hook function
if( !function_exists('bame_list_tab_content_cb') ) {
    function bame_list_tab_content_cb( ) {
        echo '<!-- List -->';
        echo '<div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">';
            echo '<div class="shop-list-area">';
                woocommerce_product_loop_start();

                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();
                        echo '<div class="col-md-6 col-lg-6 col-xl-3">';
                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content-horizontal', 'product' );
                        echo '</div>';
                    }
                    wp_reset_postdata();
                }

                woocommerce_product_loop_end();
            echo '</div>';
        echo '</div>';
        echo '<!-- End List -->';
    }
}

// bame woocommerce get sidebar hook function
if( ! function_exists('bame_woocommerce_get_sidebar') ) {
    function bame_woocommerce_get_sidebar( ) {
        if( class_exists('ReduxFramework') ) {
            $bame_woo_shoppage_sidebar = bame_opt('bame_woo_shoppage_sidebar');
        } else {
            if( is_active_sidebar('bame-woo-sidebar') ) {
                $bame_woo_shoppage_sidebar = '2';
            } else {
                $bame_woo_shoppage_sidebar = '1';
            }
        }

        if( is_shop() ) {
            if( $bame_woo_shoppage_sidebar != '1' ) {
                get_sidebar('shop');
            }
        }
    }
}

// bame loop product thumbnail hook function
if( !function_exists('bame_loop_product_thumbnail') ) {
    function bame_loop_product_thumbnail( ) {
        global $product;
        $count = $product->get_review_count();
        echo '<div class="th-product th-product-box">';
            echo '<div class="product-img">';
            // $image_url = wp_get_attachment_image_url( $single_image, 'bame-shop-single' );
            if( has_post_thumbnail() ){
                    the_post_thumbnail( 'bame-shop-small-image' );
                echo '<div class="actions">';
                    // Quick View Button
                    if( class_exists( 'WPCleverWoosq' ) ){
                        echo do_shortcode('[woosq]');
                    }
                    // Cart Button
                    woocommerce_template_loop_add_to_cart();
                    // Wishlist Button
                    if (class_exists('WPCleverWoosw')) {
                        echo do_shortcode('[woosw]');
                    }

                echo '</div>';
                if( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ) {

                    $regular_price  = get_post_meta( $product->get_id(), '_regular_price', true ); 
                    $sale_price     = get_post_meta( $product->get_id(), '_sale_price', true );
                    if( !empty($sale_price) ) {
                        if( $regular_price > $sale_price ){
                            echo '<span class="product-tag">'.esc_html__('Sale', 'bame').'</span>';
                        }
                    }
                }
            }
            echo '</div>';
            echo '<div class="product-content">'; 
                // Rating code here if need
                
                // Product Title
                echo '<h3 class="product-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h3>';

                echo woocommerce_template_loop_price();

            echo '</div>';
        echo '</div>';
    }
}

// bame loop horizontal product thumbnail hook function
if( !function_exists('bame_loop_horiontal_product_thumbnail') ) {
    function bame_loop_horiontal_product_thumbnail( ) {
        global $product;
        echo '<div class="th-product th-product-box list-view">';
            echo '<div class="product-img">';
            if( has_post_thumbnail() ){
                    the_post_thumbnail( 'bame-shop-product-list' );
                echo '<div class="actions">';
                    
                    // Quick View Button
                    if( class_exists( 'WPCleverWoosq' ) ){
                        echo do_shortcode('[woosq]');
                    }
                    // Cart Button
                    woocommerce_template_loop_add_to_cart();
                    // Wishlist Button
                    if (class_exists('WPCleverWoosw')) {
                        echo do_shortcode('[woosw]');
                    }
                echo '</div>';
                if( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ) {

                    $regular_price  = get_post_meta( $product->get_id(), '_regular_price', true ); 
                    $sale_price     = get_post_meta( $product->get_id(), '_sale_price', true );
                    if( !empty($sale_price) ) {
                        if( $regular_price > $sale_price ){
                            echo '<span class="product-tag">'.esc_html__('Sale', 'bame').'</span>';
                        }
                    }
                }
            }
            echo '</div>';
            echo '<div class="product-content">';
                echo '<div class="rating-wrap">';
                // Product Rating
                    woocommerce_template_loop_rating();
                echo '</div>';
                
                // Product Title
                echo '<h3 class="product-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h3>';

            echo '</div>';
        echo '</div>';
    }
}

// before single product summary hook
if( ! function_exists('bame_woocommerce_before_single_product_summary') ) {
    function bame_woocommerce_before_single_product_summary( ) {

        global $post,$product;

        $attachments = $product->get_gallery_image_ids();

        if( $attachments ){
            $slider_class = "swiper th-slider"; 
        }else{
            $slider_class = "img-fullsize";
        }

        echo '<div class="product-big-img">';
           echo ' <div class="img">';
            if( $attachments ){
                $x = 0;
                echo '<div class="'.esc_attr( $slider_class ).'" data-slider-options=\'{"effect":"slide","spaceBetween":"0"}\'>';
                    echo '<div class="swiper-wrapper">';
                        foreach( $attachments as $single_image ){
                            $image_url = wp_get_attachment_image_url( $single_image, 'bame-shop-single' );
                            echo '<div class="swiper-slide">';
                                echo '<div class="product-img-wrapper">';
                                    echo '<div class="product-img-box">';
                                        echo bame_img_tag( array(
                                            'url'   => esc_url( wp_get_attachment_image_url( $attachments[$x], 'bame-shop-single' ) ),
                                            'class' => 'w-100 11',
                                        ) );
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            $x++;
                        }
                    echo '</div>';
                    echo '<div class="slider-pagination"></div>';
                echo '</div>';
            }elseif( has_post_thumbnail() ){
                the_post_thumbnail( 'bame-shop-single', [ 'class' => 'w-100', ] );

            }
            echo '</div>';
            
        echo '</div>';
    }
}

// single product price rating hook function
if( !function_exists('bame_woocommerce_single_product_price_rating') ) {
    function bame_woocommerce_single_product_price_rating() {
        global $product;
        $count = $product->get_review_count(); 
        echo woocommerce_template_loop_price();
    }
}

// single product title hook function
if( !function_exists('bame_woocommerce_single_product_title') ) {
    function bame_woocommerce_single_product_title( ) {
        global $product;
        $count = $product->get_review_count();

        if( class_exists( 'ReduxFramework' ) ) {
            $producttitle_position = bame_opt('bame_product_details_title_position');
        } else {
            $producttitle_position = 'header';
        }
        if($count == 1){
            $review = 'Review';
        }else{
            $review = 'Reviews';
        }
        if( $producttitle_position != 'header' ) {
            echo '<!-- Product Title -->';
            echo '<h2 class="product-title">'.esc_html( get_the_title() ).'</h2>';
            echo '<div class="woocommerce-product-rating product-rating">';
            woocommerce_template_loop_rating();
            echo '<a href="'.esc_url('#').'" class="woocommerce-review-link">(<span class="count">'.esc_html( $count ).'</span> '.esc_html( $review ).')</a>';
            echo '</div>';
        }else{
            echo '<div class="woocommerce-product-rating product-rating">';
            woocommerce_template_loop_rating();
            echo '<a href="'.esc_url('#').'" class="woocommerce-review-link">(<span class="count">'.esc_html( $count ).'</span> '.esc_html( $review ).')</a>';
            echo '</div>';
        }
        
    }
}

// single product title hook function
if( !function_exists('bame_woocommerce_quickview_single_product_title') ) {
    function bame_woocommerce_quickview_single_product_title( ) {
        echo '<!-- Product Title -->';
        echo '<h2 class="product-title mb-1">'.esc_html( get_the_title() ).'</h2>';
        echo '<!-- End Product Title -->';
    }
}

// single product excerpt hook function
if( !function_exists('bame_woocommerce_single_product_excerpt') ) {
    function bame_woocommerce_single_product_excerpt( ) {
        echo '<!-- Product Description -->';
            the_excerpt();
        echo '<!-- End Product Description -->';
    }
}

// single product availability hook function
if( !function_exists('bame_woocommerce_single_product_availability') ) {
    function bame_woocommerce_single_product_availability( ) {
        global $product;
        $availability = $product->get_availability();

        if( $availability['class'] != 'out-of-stock' ) { ?>
            <!-- Product Availability -->
                <div class="mt-2 link-inherit">
                    <p>
                        <strong class="text-white me-3"><?php echo esc_html__( 'Availability:', 'bame' ); ?></strong>
                        <?php
                        if( $product->get_stock_quantity() ){ ?>
                            <span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i><?php echo esc_html( $product->get_stock_quantity() ) ?></span>
                        <?php }else{ ?>
                            <span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i><?php echo esc_html__( 'In Stock', 'bame' ) ?></span>
                        <?php } ?>
                    </p>
                </div>
            <!--End Product Availability -->
        <?php } else { ?>
            <!-- Product Availability -->
            <div class="mt-2 link-inherit">
                <p>
                    <strong class="text-white me-3"><?php echo esc_html__( 'Availability:', 'bame' ) ?></strong>
                    <span class="stock out-of-stock"><i class="far fa-check-square me-2 ms-1"></i><?php echo esc_html__( 'Out Of Stock', 'bame' ) ?></span>
                </p>
            </div>
            <!--End Product Availability -->
        <?php }
    }
}

// single product add to cart fuunction
if( !function_exists('bame_woocommerce_single_add_to_cart_button') ) {
    function bame_woocommerce_single_add_to_cart_button( ) {
        woocommerce_template_single_add_to_cart();
    }
}

// single product ,eta hook function 
if( !function_exists('bame_woocommerce_single_meta') ) {
    function bame_woocommerce_single_meta( ) {
        global $product;
        echo '<div class="product_meta">';
            if( ! empty( $product->get_sku() ) ){
                echo '<span class="sku_wrapper">'.esc_html__( 'SKU:', 'bame' ).'<span class="sku">'.$product->get_sku().'</span></span>';
            }
            echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'bame' ) . ' ', '</span>' );
            echo wc_get_product_tag_list( $product->get_id(), '', '<span>' . _n( 'Tag:', 'Tags:', count( $product->get_category_ids() ), 'bame' ) . ' ', '</span>' );
        echo '</div>';

    }
}

// single produt sidebar hook function
if( !function_exists('bame_woocommerce_single_product_sidebar_cb') ) {
    function bame_woocommerce_single_product_sidebar_cb(){
        if( class_exists('ReduxFramework') ) {
            $bame_woo_singlepage_sidebar = bame_opt('bame_woo_singlepage_sidebar');
            if( ( $bame_woo_singlepage_sidebar == '2' || $bame_woo_singlepage_sidebar == '3' ) && is_active_sidebar('bame-woo-sidebar') ) {
                get_sidebar('shop');
            }
        } else {
            if( is_active_sidebar('bame-woo-sidebar') ) {
                get_sidebar('shop');
            }
        }
    }
}

// reviewer meta hook function
if( !function_exists('bame_woocommerce_reviewer_meta') ) {
    function bame_woocommerce_reviewer_meta( $comment ){
        $verified = wc_review_is_from_verified_owner( $comment->comment_ID );
        if ( '0' === $comment->comment_approved ) { ?>
            <em class="woocommerce-review__awaiting-approval">
                <?php esc_html_e( 'Your review is awaiting approval', 'bame' ); ?>
            </em>

        <?php } else { ?>
            <div class="comment-author">
                <h4 class="name h4"><?php echo ucwords( get_comment_author() ); ?> </h4>
                <span class="commented-on"><time class="woocommerce-review__published-date" datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>"> <i class="fal fa-calendar-alt"></i><?php printf( esc_html__('%1$s', 'bame'), get_comment_date(wc_date_format()) ); ?> </time></span>
            </div>
                <?php
                if ( 'yes' === get_option( 'woocommerce_review_rating_verification_label' ) && $verified ) {
                    echo '<em class="woocommerce-review__verified verified">(' . esc_attr__( 'verified owner', 'bame' ) . ')</em> ';
                }

                ?>
        <?php
        }

        woocommerce_review_display_rating();
    }
}

// woocommerce proceed to checkout hook function
if( !function_exists('bame_woocommerce_button_proceed_to_checkout') ) {
    function bame_woocommerce_button_proceed_to_checkout() {
        echo '<a href="'.esc_url( wc_get_checkout_url() ).'" class="checkout-button button alt wc-forward th-btn">';
            esc_html_e( 'Proceed to checkout', 'bame' );
        echo '</a>';
    }
}

// bame woocommerce cross sell display hook function
if( !function_exists('bame_woocommerce_cross_sell_display') ) {
    function bame_woocommerce_cross_sell_display( ){
        woocommerce_cross_sell_display();
    }
}

// bame minicart view cart button hook function
if( !function_exists('bame_minicart_view_cart_button') ) {
    function bame_minicart_view_cart_button() {
        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button checkout wc-forward th-btn style1">' . esc_html__( 'View cart', 'bame' ) . '</a>';
    }
}

// bame minicart checkout button hook function
if( !function_exists('bame_minicart_checkout_button') ) {
    function bame_minicart_checkout_button() {
        echo '<a href="' .esc_url( wc_get_checkout_url() ) . '" class="button wc-forward th-btn style1">' . esc_html__( 'Checkout', 'bame' ) . '</a>';
    }
}

// bame woocommerce before checkout form
if( !function_exists('bame_woocommerce_before_checkout_form') ) {
    function bame_woocommerce_before_checkout_form() {
        echo '<div class="row">';
            if ( ! is_user_logged_in() && 'yes' === get_option('woocommerce_enable_checkout_login_reminder') ) {
                echo '<div class="col-lg-12">';
                    woocommerce_checkout_login_form();
                echo '</div>';
            }

            echo '<div class="col-lg-12">';
                woocommerce_checkout_coupon_form();
            echo '</div>';
        echo '</div>';
    }
}

// add to cart button
function woocommerce_template_loop_add_to_cart( $args = array() ) {
    global $product;

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'cart-button icon-btn',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = wp_parse_args( $args, $defaults );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button icon-btn' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '<i class="far fa-cart-plus"></i>'
        );
}

// product searchform
add_filter( 'get_product_search_form' , 'bame_custom_product_searchform' );
function bame_custom_product_searchform( $form ) {

    $form = '<form class="search-form" role="search" method="get" action="' . esc_url( home_url( '/'  ) ) . '">
        <label class="screen-reader-text" for="s">' . __( 'Search for:', 'bame' ) . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__( 'Search', 'bame' ).'" />
        <button class="submit-btn" type="submit"><i class="far fa-search"></i></button>
        <input type="hidden" name="post_type" value="product" />
    </form>';

    return $form;
}

// cart empty message
add_action('woocommerce_cart_is_empty','bame_wc_empty_cart_message',10);
function bame_wc_empty_cart_message( ) {
    echo '<h3 class="cart-empty d-none">'.esc_html__('Your cart is currently empty.','bame').'</h3>';
}