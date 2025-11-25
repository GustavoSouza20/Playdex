<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Brand Logo Widget .
 *
 */
class bame_Brand_Logo extends Widget_Base {

	public function get_name() {
		return 'bamebrandlogo';
	}
	public function get_title() {
		return __( 'Brand Logo', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Brand Logo', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One', 'Style Two', 'Style Three', 'Style Four' ] );

		bame_media_fields( $this, 'bg', 'Choose Background', ['2', '3'] );

		$fields_to_include = [ 'image' => ['Brand Logo'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'logos', 'Brand Logos', $fields_to_include, ['1', '2', '4'] );

		$fields_to_include2 = [ 'image' => ['Brand Logo'], 'title' => ['Title'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'logos2', 'Brand Logos', $fields_to_include2, ['3'] );

		bame_media_fields( $this, 'shape', 'Choose Background Shape', ['2', '4'] );
		bame_media_fields( $this, 'shape2', 'Choose Tema Logo Shape', ['2', '4'] );

        $this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title', ['3'] );

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="swiper th-slider client-slider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"400":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"7"},"1300":{"slidesPerView":"9"}}, "spaceBetween": "0", "loop": "true"}\'>';
				echo '<div class="swiper-wrapper">';
					foreach( $settings['logos'] as $data ){
						echo '<div class="swiper-slide">';
							echo ' <a href="'.esc_url($data['link']['url']).'" class="client-card">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['brand_logo']['url'] ),
								) );
							echo '</a>';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="space position-relative">';
				echo '<div class="brand-sec2-shape" data-bg-src="'.esc_url($settings['bg']['url']).'"></div>';
				echo '<div class="container th-container5">';
					echo '<div class="row gy-4 justify-content-center">';
						foreach( $settings['logos'] as $data ){
							echo '<div class="col-xxl-auto col-xl-3 col-lg-4 col-sm-6">';
								echo '<a href="#" class="brand-box">';
									echo '<div class="brand-box-shape" data-bg-src="'.esc_url($settings['shape']['url']).'"></div>';
									echo '<div class="brand-box-shape2" data-bg-src="'.esc_url($settings['shape2']['url']).'"></div>';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['brand_logo']['url'] ),
									) );
								echo '</a>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="client-area-3 overflow-hidden " data-bg-src="'.esc_url($settings['bg']['url']).'">';
				echo '<div class="container-fluid p-0">';
					echo '<div class="swiper th-slider client-slider2" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"400":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"6"},"1300":{"slidesPerView":"8"}}, "spaceBetween": "0", "loop": "true"}\'>';
						echo '<div class="swiper-wrapper">';
							foreach( $settings['logos2'] as $data ){
							echo '<div class="swiper-slide">';
								echo '<a href="#" class="client-card2">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['brand_logo']['url'] ),
									) );
									if(!empty($data['title'])){
										echo '<h6 class="client-card2-title title">'.wp_kses_post($data['title']).'</h6>';
									}
								echo '</a>';
							echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="swiper th-slider" id="blogSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"5"}}}\'>';
				echo '<div class="swiper-wrapper"> ';
					foreach( $settings['logos'] as $data ){
					echo '<div class="swiper-slide">';
						echo '<a href="#" class="brand-box style2">';
							echo '<div class="brand-box-shape" data-bg-src="'.esc_url($settings['shape']['url']).'"></div>';
							echo '<div class="brand-box-shape2" data-bg-src="'.esc_url($settings['shape2']['url']).'"></div>';
							echo bame_img_tag( array(
								'url'   => esc_url( $data['brand_logo']['url'] ),
							) );
						echo '</a>';
					echo '</div>';
					}
				echo '</div>';
			echo '</div>';

		}


	}
}