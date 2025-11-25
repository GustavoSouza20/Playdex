<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Banner Widget.
 *
 */
class bame_Banner extends Widget_Base {

	public function get_name() {
		return 'bamebanner';
	}
	public function get_title() {
		return __( 'Banner / Slider', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'banner_section',
			[
				'label' 	=> __( 'Banner', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three'] );

        $repeater = new Repeater();

		bame_media_fields($repeater, 'image', 'Choose Image');
		bame_media_fields($repeater, 'overlay', 'Choose Overlay Image');
		bame_general_fields($repeater, 'subtitle', 'Subtitle', 'TEXT', 'We Clean, You Shine');
		bame_general_fields($repeater, 'title', 'Title', 'TEXTAREA', 'Quality Bamedry Every Thread');
		bame_general_fields($repeater, 'desc', 'Description', 'TEXTAREA', '');
		bame_general_fields($repeater, 'button_text', 'Button Text', 'TEXT', 'Discover More');
		bame_url_fields($repeater, 'button_url', 'Button URL');
		bame_general_fields($repeater, 'button_text2', 'Button Text 2', 'TEXT', 'Contact Us');
		bame_url_fields($repeater, 'button_url2', 'Button URL 2');

		$this->add_control(
			'banner_slides',
			[
				'label' 		=> __( 'Banners', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'subtitle' 	=> __( 'We Clean, You Shine', 'bame' ),
						'title' 		=> __( 'Quality Bamedry Every Thread', 'bame' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['1', '2']
				]
			]
		);

		
        $repeater = new Repeater();

		bame_media_fields($repeater, 'image', 'Choose Image');
		bame_general_fields($repeater, 'subtitle', 'Subtitle', 'TEXT', 'We Clean, You Shine');
		bame_general_fields($repeater, 'title', 'Title', 'TEXTAREA', 'Quality Bamedry Every Thread');
		bame_general_fields($repeater, 'desc', 'Description', 'TEXTAREA', '');
		bame_general_fields($repeater, 'button_text', 'Button Text', 'TEXT', 'Discover More');
		bame_url_fields($repeater, 'button_url', 'Button URL');
		bame_general_fields($repeater, 'button_text2', 'Button Text 2', 'TEXT', 'Contact Us');
		bame_url_fields($repeater, 'button_url2', 'Button URL 2');

		$this->add_control(
			'banner_slides_2',
			[
				'label' 		=> __( 'Banners', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'subtitle' 	=> __( 'We Clean, You Shine', 'bame' ),
						'title' 		=> __( 'Quality Bamedry Every Thread', 'bame' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['3']
				]
			]
		);

		bame_switcher_fields($this, 'show_shape', 'Show All Shape?', ['1', '2', '3']);

		$this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Subtitle Style-------
		bame_common_style_fields($this, 'subtitle', 'Subtitle', '{{WRAPPER}} .sub-title', '','--theme-color');
		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .hero-title');
		//-------Description Style-------
		bame_common_style_fields($this, 'desc', 'Description', '{{WRAPPER}} .hero-text');
		//------Button Style-------
		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th_btn');
		//------Button 2 Style-------
		bame_button_style_fields($this, '11', 'Button 2 Styling', '{{WRAPPER}} .th_btn2');


    }

	protected function render() {

    $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){


		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="th-hero-wrapper hero-2 " id="hero">';
				echo '<div class="swiper hero-slider2" id="heroSlider2">';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['banner_slides'] as $data ){
							echo '<div class="swiper-slide">';
								echo '<div class="hero-inner">';
									echo '<div class="th-hero-bg" data-bg-src="'.esc_url($data['image']['url']).'">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['overlay']['url'] ),
										));
									echo '</div>';
									echo '<div class="container">';
										echo '<div class="hero-style2">';
											if(!empty($data['subtitle'])){
												echo '<span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s">'.wp_kses_post($data['subtitle']).'</span>';
											}
											if(!empty($data['title'])){
												echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">'.wp_kses_post($data['title']).'</h1>';
											}
											if(!empty($data['desc'])){
												echo '<p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">'.wp_kses_post($data['desc']).'</p>';
											}
											echo '<div class="btn-group" data-ani="slideinup" data-ani-delay="0.7s">';
												if(!empty($data['button_text'])){
													echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="th-btn th_btn style2"  data-ani="slideinup" data-ani-delay="0.7s">'.wp_kses_post($data['button_text']).'</a>';
												}
												if(!empty($data['button_text2'])){
													echo '<a href="'.esc_url( $data['button_url2']['url'] ).'" class="th-btn th_btn2 style5"  data-ani="slideinup" data-ani-delay="0.7s">'.wp_kses_post($data['button_text2']).'</a>';
												}
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="swiper thumbsSlider">';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['banner_slides'] as $data ){
							echo '<div class="swiper-slide">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['image']['url'] ),
								));
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				if($settings['show_shape'] == 'yes'){
					echo '<div class="hero-animated-bubble">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_1.png" alt="Shape">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_2.png" alt="Shape">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_3.png" alt="Shape">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_4.png" alt="Shape">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_5.png" alt="Shape">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_6.png" alt="Shape">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_7.png" alt="Shape">';
						echo '<img src="'.BAME_ASSETS.'img/shape/bubble_8.png" alt="Shape">';
					echo '</div>';
				}

			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="th-hero-wrapper hero-3" id="hero">';
				echo '<div class="swiper th-slider hero-slider-3" id="heroSlider3" data-slider-options=\'{"effect":"slide"}\'>';
					echo '<div class="swiper-wrapper">';
					foreach( $settings['banner_slides_2'] as $data ){
						echo '<div class="swiper-slide">';
							echo '<div class="hero-inner">';
								echo '<div class="th-hero-bg" data-bg-src="'.esc_url($data['image']['url']).'"></div>';
								echo '<div class="container">';
									echo '<div class="hero-style3">';
										if(!empty($data['subtitle'])){
											echo '<span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s">'.wp_kses_post($data['subtitle']).'</span>';
										}
										if(!empty($data['title'])){
											echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">'.wp_kses_post($data['title']).'</h1>';
										}
										if(!empty($data['desc'])){
											echo '<p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">'.wp_kses_post($data['desc']).'</p>';
										}
										echo '<div class="btn-group" data-ani="slideinup" data-ani-delay="0.7s">';
											if(!empty($data['button_text'])){
												echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="th-btn th_btn style2"  data-ani="slideinup" data-ani-delay="0.7s">'.wp_kses_post($data['button_text']).'</a>';
											}
											if(!empty($data['button_text2'])){
												echo '<a href="'.esc_url( $data['button_url2']['url'] ).'" class="th-btn th_btn2 style5"  data-ani="slideinup" data-ani-delay="0.7s">'.wp_kses_post($data['button_text2']).'</a>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
				echo '</div>';
				if(!empty($settings['shape']['url'])){
					echo '<div class="shape-mockup d-none d-xl-block" data-bottom="0%" data-left="0%">';
						echo bame_img_tag( array(
							'url'   => esc_url( $settings['shape']['url'] ),
						));
					echo '</div>';
				}
				echo '<div class="icon-box">';
					echo '<button data-slider-prev="#heroSlider3" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>';
					echo '<button data-slider-next="#heroSlider3" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>';
				echo '</div>';
				if($settings['show_shape'] == 'yes'){
					echo '<div class="animation-bubble">
						<div class="bubble-1"></div>
						<div class="bubble-2"></div>
						<div class="bubble-3"></div>
						<div class="bubble-4"></div>
						<div class="bubble-5"></div>
						<div class="bubble-6"></div>
						<div class="bubble-7"></div>
						<div class="bubble-8"></div>
						<div class="bubble-9"></div>
						<div class="bubble-10"></div>
					</div>';
				}
			echo '</div>';
		}

		
	}

}