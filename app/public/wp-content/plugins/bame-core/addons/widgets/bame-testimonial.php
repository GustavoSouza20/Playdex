<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class bame_Testimonial extends Widget_Base{

	public function get_name() {
		return 'bametestimonialslider';
	}
	public function get_title() {
		return __( 'Testimonials', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two'] );

		bame_media_fields( $this, 'quote_image', 'Quote Icon', ['1', '2'] );
		bame_media_fields( $this, 'shape', 'Choose Shape', ['2'] );

		$repeater = new Repeater();

		bame_media_fields( $repeater, 'client_image', 'Client Image' );
		bame_general_fields( $repeater, 'client_name', 'Client Name', 'TEXT', 'Alex Michel' );
		bame_general_fields( $repeater, 'client_desig', 'Client Designation', 'TEXT', 'Ui/Ux Designer' );
		bame_general_fields( $repeater, 'client_feedback', 'Client Feedback', 'TEXTAREA', 'Our knowledgeable technicians are happy to provide tips' );

		bame_select_field( $repeater, 'client_rating', 'Client Rating', [ 'One Star', 'Two Star', 'Three Star', 'Four Star', 'Five Star' ] );

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_image'	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
				'condition'	=> [
					'layout_style' => ['1'] 
				]
			]
		);

		$repeater = new Repeater();

		bame_media_fields( $repeater, 'client_image', 'Client Image' );
		bame_general_fields( $repeater, 'client_name', 'Client Name', 'TEXT', 'Alex Michel' );
		bame_general_fields( $repeater, 'client_desig', 'Client Designation', 'TEXT', 'Ui/Ux Designer' );
		bame_general_fields( $repeater, 'client_feedback', 'Client Feedback', 'TEXTAREA', 'Our knowledgeable technicians are happy to provide tips' );

		$this->add_control(
			'slides2',
			[
				'label' 		=> __( 'Slides', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_image'	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
				'condition'	=> [
					'layout_style' => ['2'] 
				]
			]
		);

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Name Style-------
		bame_common_style_fields( $this, 'name', 'Name', '{{WRAPPER}} .name' );
		//-------Designation Style-------
		bame_common_style_fields( $this, 'designation', 'Designation', '{{WRAPPER}} .desig' );
		//-------Feedback Style-------
		bame_common_style_fields( $this, 'feedback', 'Feedback', '{{WRAPPER}} .text' );
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="swiper th-slider" id="testiSlide1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"2"}}}\'>';
				echo '<div class="swiper-wrapper">';
					foreach( $settings['slides'] as $data ){
						echo '<div class="swiper-slide">';
							echo '<div class="testi-card">';
								echo '<div class="box-review">';
									if( $data['client_rating'] == '1' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}elseif( $data['client_rating'] == '2' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}elseif( $data['client_rating'] == '3' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}elseif( $data['client_rating'] == '4' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}else{
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
									}
								echo '</div>';
								if(!empty($settings['quote_image']['url'])){
									echo '<div class="box-quote">';
										echo bame_img_tag( array(
											'url'	=> esc_url( $settings['quote_image']['url'] ), 
										) ); 
									echo '</div>';
								}
								if(!empty($data['client_feedback'])){
									echo '<p class="box-text text">'.wp_kses_post( $data['client_feedback'] ).'</p>';
								}
								echo '<div class="box-profile">';
									echo '<div class="box-img">';
										echo bame_img_tag( array(
											'url'	=> esc_url( $data['client_image']['url'] ),
										) );
									echo '</div>';
									echo '<div class="box-content">';
										if(!empty($data['client_name'])){
											echo '<h3 class="box-title name">'.wp_kses_post( $data['client_name'] ).'</h3>';
										}
										if(!empty($data['client_desig'])){
											echo '<span class="box-desig desig">'.wp_kses_post( $data['client_desig'] ).'</span>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="slider-area testi-slider1">';
				echo '<div class="swiper th-slider" id="testiSlide1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}},"effect":"slide","loop":false,"thumbs":{"swiper":".testi-grid-thumb"}}\'>';
					echo '<div class="swiper-wrapper">';
					foreach( $settings['slides2'] as $data ){
						echo '<div class="swiper-slide">';
							echo '<div class="testi-card" data-bg-src="'.esc_url( $settings['shape']['url'] ).'">';
								if(!empty($data['client_feedback'])){
									echo '<p class="testi-card_text text">'.wp_kses_post( $data['client_feedback'] ).'</p>';
								}
								echo '<div class="testi-card_profile">';
									echo '<div class="testi-card_content">';
										echo '<div class="testi-card_avater">';
											echo bame_img_tag( array(
												'url'	=> esc_url( $data['client_image']['url'] ),
											) );
										echo '</div>';
										if(!empty($data['client_name'])){
											echo '<h3 class="testi-card_name name">'.wp_kses_post( $data['client_name'] ).'</h3>';
										}
										if(!empty($data['client_desig'])){
											echo '<span class="testi-card_desig desig">'.wp_kses_post( $data['client_desig'] ).'</span>';
										}
									echo '</div>';
									if(!empty($settings['quote_image']['url'])){
										echo '<div class="quote-icon icon-masking">';
										echo '<span class="mask-icon" data-mask-src="'.esc_url( $settings['quote_image']['url'] ).'"></span>';
											echo bame_img_tag( array(
												'url'	=> esc_url( $settings['quote_image']['url'] ), 
											) ); 
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
					echo '<div class="slider-pagination"></div>';
				echo '</div>';
				echo '<button data-slider-prev="#testiSlide1" class="slider-arrow style2 slider-prev"><i class="far fa-arrow-left"></i></button>';
				echo '<button data-slider-next="#testiSlide1" class="slider-arrow style2 slider-next"><i class="far fa-arrow-right"></i></button>';
			echo '</div>';
			
		}


	}

}