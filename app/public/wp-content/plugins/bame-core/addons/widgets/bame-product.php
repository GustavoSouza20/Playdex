<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Product Widget
 *
 */
class Bame_Product extends Widget_Base{

	public function get_name() {
		return 'bameeproduct';
	}
	public function get_title() {
		return esc_html__( 'Product', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	public function get_script_depends() {
		return [ 'bame-frontend-script' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'product_content',
			[
				'label'		=> esc_html__( 'Product','bame' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One' ] );

		bame_general_fields( $this, 'subtitle', 'Subtitle', 'TEXTAREA2', 'Subtitle', ['1'] );
		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Title', ['1'] );

		bame_general_fields( $this, 'divider', 'DIVIDER', 'DIVIDER', '', '1' );
 
		$this->add_control(
			'product_count',
			[
				'label' 		=> __( 'Product Count', 'bame' ),
				'type' 			=> Controls_Manager::NUMBER,
				'min' 			=> 1,
				'max' 			=> 50,
				'step' 			=> 1,
				'default' 		=> 6,
			]
		);

		// bame_general_fields( $this, 'product_col', 'Product Column', 'TEXT', 'col-lg-4 col-sm-6', '1' );

        $this->add_control(
			'product_cats',
			[
				'label' 		=> __( 'Product Categories', 'bame' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
                'label_block'   => true,
                'options' 		=> $this->product_cats_get(), 
			]
        );

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Subtitle Style-------
		bame_common_style_fields( $this, 'subtitle', 'Subtitle', '{{WRAPPER}} .sub' );
		//-------Title Style-------
		bame_common_style_fields( $this, 'title3', 'Title', '{{WRAPPER}} .title' );

		//-------Product Title Style-------
		bame_common2_style_fields( $this, 'title2', 'Product Title', '{{WRAPPER}} .product-title a' );

	}

	protected function product_cats_get() {
        $terms = get_terms( array( 'taxonomy' => 'product_cat' ) );
        $term_array = array();
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            foreach ( $terms as $term ) {
                $term_array[$term->slug] = $term->name;
            }
        }

        return $term_array;
    }

	protected function render() {

    $settings = $this->get_settings_for_display(); 

	$args = array(
		"post_type" 		=> "product",
		"posts_per_page"    => esc_attr( $settings['product_count'] )
	);

	$args['order'] 		= 'ASC';
	$args['orderby'] 	= 'title';

	if( ! empty( $settings['product_cats'] ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => $settings['product_cats'],
			),
		);
	}

	$prods = new WP_Query( $args );

		if( $settings['layout_style'] == '1' ){
			echo '<div class="row justify-content-between align-items-center">';
                echo '<div class="col-md-auto">';
					echo '<div class="title-area custom-anim-left wow  text-md-start text-center" data-wow-duration="1.5s" data-wow-delay="0.2s">';
						if(!empty($settings['subtitle'])){
							echo '<span class="sub-title sub">'.wp_kses_post($settings['subtitle']).'</span>';
						}
						if(!empty($settings['title'])){
							echo '<h2 class="sec-title title">'.wp_kses_post($settings['title']).'</h2>';
						}
					echo '</div>';
                echo '</div>';
                echo '<div class="col-md-auto d-none d-md-block">';
                    echo '<div class="sec-btn">';
                        echo '<div class="icon-box">';
                            echo '<button data-slider-prev="#productSlider1" class="slider-arrow style2 default"><i class="far fa-arrow-left"></i></button>';
                            echo '<button data-slider-next="#productSlider1" class="slider-arrow style2 default"><i class="far fa-arrow-right"></i></button>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            echo '<div class="swiper th-slider has-shadow" id="productSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}\'>';
                echo '<div class="swiper-wrapper">';
					while( $prods->have_posts() ) { 
						$prods->the_post();
						global $product;
						$product_categories = get_the_terms( get_the_ID(), 'product_cat' );
						$first_category_name = $product_categories[0]->name;
						$first_category_url = get_term_link( $product_categories[0] );
						echo '<div class="swiper-slide">';
							echo '<div class="th-product product-grid">';
								echo '<div class="product-img">';
									if( has_post_thumbnail() ){
											the_post_thumbnail( 'mediax-shop-product-list' );
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
													echo '<span class="product-tag">'.esc_html__('Sale', 'mediax').'</span>';
												}
											}
										}
									}
								echo '</div>';
								echo ' <div class="product-content">';
									echo '<h3 class="product-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h3>';
									echo woocommerce_template_loop_price();
								echo '</div>';
							echo '</div>';
						echo '</div>';
					} wp_reset_postdata();
                echo '</div>';
            echo '</div>';

            echo '<div class="d-block d-md-none mt-40 text-center">';
                echo '<div class="icon-box">';
                    echo '<button data-slider-prev="#productSlider1" class="slider-arrow style2 default"><i class="far fa-arrow-left"></i></button>';
                    echo '<button data-slider-next="#productSlider1" class="slider-arrow style2 default"><i class="far fa-arrow-right"></i></button>';
                echo '</div>';
            echo '</div>';

		}

		
	}
}