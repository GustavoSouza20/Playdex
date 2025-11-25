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
 * features Widget .
 *
 */
class Bame_Features extends Widget_Base {

	public function get_name() {
		return 'bamefeatures';
	}
	public function get_title() {
		return __( 'features', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'arrow_section',
			[
				'label'     => __( 'features', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',[ 'Style One', 'Style Two', 'Style Three', 'Style Four', 'Style Five', 'Style Six' ] );

		bame_media_fields( $this, 'bg', 'Choose Background', ['3'] );

		// Layout Style 1
		$fields_to_include = [ 'image' => ['Choose Icon'], 'title' => ['Title'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'feature_lists', 'Features List', $fields_to_include, [ '1' ] );

		// Layout Style 2
		$fields_to_include2 = [  'image' => ['Choose Icon'], 'title' => ['Title'], 'desc' => ['Description'] ];
		bame_repeater_fields( $this, 'feature_lists_2', 'Features List', $fields_to_include2, [ '2', '3', '4' ] );

		// Layout Style 5
		$fields_to_include3 = [ 'image' => ['Choose Image'], 'title' => ['Title'], 'desc' => ['Description'], 'btn' => ['Button Text'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'feature_lists_3', 'Features List', $fields_to_include3, [ '5' ] ); 


		bame_general_fields($this, 'faq_id', 'Faq ID', 'TEXT2', '6' );

        $repeater = new Repeater();

		bame_general_fields($repeater, 'faq_question', 'Faq Question', 'TEXTAREA', 'What Services Do You Offer?');
		bame_general_fields($repeater, 'faq_answer', 'Faq Answer', 'WYSIWYG', 'We specialize in providing top-notch pool service and maintenance');

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq Lists', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'What Services Do You Offer?', 'bame' ),
					],

				],
			]
		);
		
        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------	

		//-------Title Style-------
		bame_common_style_fields( $this, 'marquee_title', 'Title', '{{WRAPPER}} .marquee-title a', ['1'] );
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title', ['2', '3', '4', '6'] );
		bame_common_style_fields( $this, 'title2', 'Title', '{{WRAPPER}} .title a', ['5'] );
		//-------Description Style-------
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc', ['2', '3', '4', '5', '6'] );

		//------Button Style-------
		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th_btn', ['5']);


	}

	protected function render() {

    $settings = $this->get_settings_for_display(); 

		if( $settings['layout_style'] == '1' ){
			echo '<div class="swiper th-slider" id="marqueeSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":"auto"}},"autoplay":{"delay":1500,"disableOnInteraction":false},"spaceBetween":50}\'>';
				echo '<div class="swiper-wrapper">';
					foreach( $settings['feature_lists'] as $data ){
						echo '<div class="marquee-item swiper-slide">';
							if(!empty($data['choose_icon']['url'])){
								echo '<div class="marquee_icon">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['choose_icon']['url'] ),
									));
								echo '</div>';
							}
							if(!empty($data['title'])){
								echo '<h3 class="marquee-title"><a href="'.esc_url($data['link']['url']).'">'.wp_kses_post($data['title']).'</a></h3>';
							}
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			foreach( $settings['feature_lists_2'] as $data ){
				echo '<div class="about-grid">';
					if(!empty($data['choose_icon']['url'])){
						echo '<div class="icon custom-anim-top wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
							echo bame_img_tag( array(
								'url'   => esc_url( $data['choose_icon']['url'] ),
							));
						echo '</div>';
					}
					echo '<div class="about-grid-details custom-anim-left wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
						if(!empty($data['title'])){
							echo '<h3 class="about-grid_title title h5">'.wp_kses_post($data['title']).'</h3>';
						}
						if(!empty($data['description'])){
							echo '<p class="about-grid_text desc">'.wp_kses_post($data['description']).'</p>';
						}
					echo '</div>';
				echo '</div>';
			}

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="feature-sec-wrap1" data-bg-src="'.esc_url($settings['bg']['url']).'">';
				foreach( $settings['feature_lists_2'] as $data ){
					echo '<div class="feature-card-wrap">';
						echo '<div class="feature-card-border">';
							echo '<div class="feature-card">';
								if(!empty($data['choose_icon']['url'])){
									echo '<div class="feature-card-icon custom-anim-top wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
										echo '<span class="feature-card-icon-mask" data-mask-src="'.esc_url($data['choose_icon']['url']).'"></span>';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['choose_icon']['url'] ),
										));
									echo '</div>';
								}
								echo '<div class="feature-card-details custom-anim-top wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
									if(!empty($data['title'])){
										echo '<h3 class="feature-card-title title">'.wp_kses_post($data['title']).'</h3>';
									}
									if(!empty($data['description'])){
										echo '<p class="feature-card-text desc">'.wp_kses_post($data['description']).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="about-feature-wrap">';
				echo '<div class="slider-area">';
					echo '<div class="swiper th-slider about-feature-slider1" id="aboutfeature1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2,"mousewheel":false},"576":{"slidesPerView":"2","mousewheel":false},"768":{"slidesPerView":"3","mousewheel":false},"992":{"slidesPerView":"3","mousewheel":false},"1200":{"slidesPerView":"3"}},"direction":"vertical","mousewheel":true}\'>';
						echo '<div class="swiper-wrapper">';
							foreach( $settings['feature_lists_2'] as $data ){
								echo '<div class="swiper-slide">';
									echo '<div class="about-feature">';
										if(!empty($data['choose_icon']['url'])){
											echo '<div class="about-feature-icon icon-masking">';
												echo '<span class="mask-icon" data-mask-src="'.esc_url($data['choose_icon']['url']).'"></span>';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_icon']['url'] ),
												));
											echo '</div>';
										}
										echo '<div class="about-feature-content">';
											if(!empty($data['title'])){
												echo '<h3 class="about-feature-title title">'.wp_kses_post($data['title']).'</h3>';
											}
											if(!empty($data['description'])){
												echo '<p class="about-feature-text desc">'.wp_kses_post($data['description']).'</p>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '5' ){
			echo '<div class="slider-area feature-game-slider1">';
				echo '<div class="swiper th-slider" id="featureGameSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
					foreach( $settings['feature_lists_3'] as $data ){
						echo '<div class="swiper-slide">';
							echo '<div class="feature-game-card">';
								echo '<div class="feature-game-card-img">';
									echo '<a href="'.esc_url( $data['link']['url'] ).'">';
										if(!empty($data['choose_shape']['url'])){
										echo '<div class="feature-card-img-shape icon-masking">';
											echo '<span class="mask-icon" data-mask-src="'.BAME_ASSETS.'img/feature-card-bg.png"></span>';
											echo bame_img_tag( array(
												'url'   => esc_url( $data['choose_shape']['url'] ),
											));
										echo '</div>';
										}
										echo bame_img_tag( array(
											'url'   => esc_url( $data['choose_image']['url'] ),
										));
									echo '</a>';
									if(!empty($data['button_text'])){
										echo '<a href="'.esc_url( $data['link']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($data['button_text']).'</a>';
									}
								echo '</div>';
								echo '<div class="feature-game-card-details">';
									if(!empty($data['title'])){
										echo '<h3 class="box-title title"><a href="'.esc_url( $data['link']['url'] ).'">'.wp_kses_post($data['title']).'</a></h3>';
									}
									if(!empty($data['description'])){
										echo '<p class="text desc">'.wp_kses_post($data['description']).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
				echo '</div>';
				echo '<button data-slider-prev="#featureGameSlider1" class="slider-arrow style3 slider-prev"><i class="fas fa-angle-left"></i></button>';
				echo '<button data-slider-next="#featureGameSlider1" class="slider-arrow style3 slider-next"><i class="fas fa-angle-right"></i></button>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '6' ){
			echo '<div class="accordion faq-wrap2" id="faqAccordion'.esc_attr($settings['faq_id']).'">';
				$x = 0;
				foreach( $settings['faq_repeater'] as $single_data ){
					$unique_id = uniqid();
					$x++;
					if( $x == '1' ){
						$ariaexpanded 	= 'true';
						$class 			= 'show';
						$collesed 		= '';
						$is_active 		= 'active';
					}else{
						$ariaexpanded 	= 'false';
						$class 			= '';
						$collesed 		= 'collapsed';
						$is_active 		= '';
					}
					echo '<div class="accordion-card style2">';
						echo '<div class="accordion-header" id="collapse-item-'.esc_attr( $unique_id ).'">';
							echo '<button class="accordion-button '.esc_attr( $collesed ).' title" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.esc_attr( $unique_id ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="collapse-'.esc_attr( $unique_id ).'">'.wp_kses_post($single_data['faq_question']).'</button>';
						echo '</div>';
						echo '<div id="collapse-'.esc_attr( $unique_id ).'" class="accordion-collapse collapse '.esc_attr( $class ).'" aria-labelledby="collapse-item-'.esc_attr( $unique_id ).'" data-bs-parent="#faqAccordion'.esc_attr($settings['faq_id']).'">';
							echo '<div class="accordion-body desc">'.wp_kses_post($single_data['faq_answer']).'</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}

			
	}
}