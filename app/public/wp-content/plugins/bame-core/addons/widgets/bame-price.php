<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Price Widget .
 *
 */
class Bame_Price extends Widget_Base {

	public function get_name() {
		return 'bameprice';
	}
	public function get_title() {
		return __( 'Price Box', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'price_section',
			[
				'label' 	=> __( 'Price Box', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two'] );

		//Style 1
		$fields_to_include = [ 'title' => ['Title', 'Description'], 'desc' => ['Price', 'Features'], 'btn' => ['Button Text'], 'url' => ['Button URL'] ];
		bame_repeater_fields( $this, 'price_list', 'Price Lists', $fields_to_include, ['1'] );

		//Style 2
		$fields_to_include2 = [ 'image' => ['Icon'], 'title' => ['Title', 'Description'], 'desc' => ['Price', 'Features'], 'btn' => ['Button Text'], 'url' => ['Button URL'] ];
		bame_repeater_fields( $this, 'price_list_2', 'Price Lists', $fields_to_include2, ['2'] );

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .box-title' );
		//-------Price Style-------
		bame_common_style_fields( $this, 'price', 'Price', '{{WRAPPER}} .price' );
		//-------Price Style-------
		bame_common_style_fields( $this, 'description', 'Description', '{{WRAPPER}} .desc' );
		//------Button Style-------
		bame_button_style_fields( $this, '11', 'Button Styling', '{{WRAPPER}} .th_btn' );

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="row gy-4 justify-content-center">';
				foreach( $settings['price_list'] as $data ){
					echo '<div class="col-xl-4 col-md-6">';
						echo '<div class="price-card ">';
							if(!empty($data['title'])){
								echo '<h3 class="box-title">'.esc_html($data['title']).'</h3>';
							}
							echo '<div class="price-card_content">';
								if(!empty($data['price'])){
									echo '<h4 class="price-card_price price">'.wp_kses_post($data['price']).'</h4>';
								}
								if(!empty($data['description'])){
									echo '<p class="price-card_text desc">'.wp_kses_post($data['description']).'</p>';
								}
								if(!empty($data['features'])){
									echo '<div class="available-list">';
										echo wp_kses_post($data['features']);
									echo '</div>';
								}
								if(!empty($data['button_text'])){
									echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="th-btn style3 th_btn">'.wp_kses_post($data['button_text']).'</a>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="row gy-4 justify-content-center">';
				foreach( $settings['price_list_2'] as $data ){
					echo '<div class="col-xl-4 col-md-6">';
						echo '<div class="price-box">';
							if(!empty($data['icon']['url'])){
								echo '<div class="price-box_icon">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['icon']['url'] ),
									));
								echo '</div>';
							}
							if(!empty($data['title'])){
								echo '<h3 class="box-title">'.esc_html($data['title']).'</h3>';
							}
							if(!empty($data['description'])){
								echo '<h6 class="price-box_text desc">'.wp_kses_post($data['description']).'</h6>';
							}
							echo '<div class="price-box_content">';
								if(!empty($data['price'])){
									echo '<h4 class="price-box_price price">'.wp_kses_post($data['price']).'</h4>';
								}
								if(!empty($data['features'])){
									echo '<div class="available-list">';
										echo wp_kses_post($data['features']);
									echo '</div>';
								}
								if(!empty($data['button_text'])){
									echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="th-btn btn-fw th-radius th_btn">'.wp_kses_post($data['button_text']).'</a>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}


	}

}