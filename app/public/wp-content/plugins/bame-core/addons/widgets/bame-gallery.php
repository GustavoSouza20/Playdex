<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Gallery Widget .
 *
 */
class Bame_Gallery extends Widget_Base {

	public function get_name() {
		return 'bamegallery';
	}
	public function get_title() {
		return __( 'Gallery', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Gallery', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        ); 

		bame_select_field( $this, 'layout_style', 'Layout Style', ['Style One', 'Style Two', 'Style Three', 'Style Four'] );

		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Title', ['2'] );

		$fields_to_include = [ 'image' => ['Choose Image'], 'title' => ['Icon'] ];
		bame_repeater_fields( $this, 'gallery_list', 'Gallery Lists', $fields_to_include, ['1', '3'] );

		$fields_to_include2 = [ 'image' => ['Choose Image'], 'title' => ['Icon'], 'url' => ['URL'] ];
		bame_repeater_fields( $this, 'gallery_list_2', 'Gallery Lists', $fields_to_include2, ['2'] );

		$fields_to_include3 = [ 'image' => ['Choose Image'], 'title' => ['Subtitle', 'Title'], 'url' => ['URL'] ];
		bame_repeater_fields( $this, 'gallery_list_3', 'Gallery Lists', $fields_to_include3, ['4'] );

		$this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------
		// Title
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .instagram-sec-title', ['2'] );
		bame_common_style_fields( $this, 'title2', 'Subtitle', '{{WRAPPER}} .sub', ['4'] );
		bame_common2_style_fields( $this, 'title3', 'Title', '{{WRAPPER}} .title a', ['4'] );

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="gallery-area-1 overflow-hidden text-center">';
				echo '<div class="slider-area gallery-slider1">';
					echo '<div class="swiper th-slider" id="gallerySlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}},"effect":"coverflow","coverflowEffect":{"rotate":"0","stretch":"0","depth":"150","modifier":"1"},"centeredSlides":"true"}\'>';
						echo '<div class="swiper-wrapper">';
						foreach( $settings['gallery_list'] as $data ){
							echo '<div class="swiper-slide gallery-wrap1">';
								echo '<div class="th-video">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['choose_image']['url'] ),
									));
									echo '<a href="'.esc_url( $data['choose_image']['url'] ).'" class="play-btn popup-image style3">'.wp_kses_post($data['icon']).'</a>';
								echo '</div>';
							echo '</div>';
						}
						echo '</div>';
					echo '</div>';
					echo '<button data-slider-prev="#gallerySlider1" class="slider-arrow slider-prev"><i class="fas fa-angle-left"></i></button>';
					echo '<button data-slider-next="#gallerySlider1" class="slider-arrow slider-next"><i class="fas fa-angle-right"></i></button>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			if(!empty($settings['title'])){
			echo '<div class="text-center">';
                echo '<h2 class="instagram-sec-title custom-anim-top wow " data-wow-duration="1.5s" data-wow-delay="0.2s">'.esc_html($settings['title']).'</h2>';
            echo '</div>';
			}
            echo '<div class="slider-area">';
                echo '<div class="swiper th-slider instagram-slider1" id="instagramSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"3"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"5","spaceBetween":"30","autoHeight":"true"},"1500":{"slidesPerView":"5","spaceBetween":"70","autoHeight":"true"}}}\'>';
                    echo '<div class="swiper-wrapper">';
						foreach( $settings['gallery_list_2'] as $data ){
							echo '<div class="insta-box swiper-slide">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['choose_image']['url'] ),
								));
								echo '<a target="_blank" href="'.esc_url( $data['url']['url'] ).'" class="icon-btn">'.wp_kses_post($data['icon']).'</a>';
							echo '</div>';
						}
                    echo '</div>';
                echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="row gy-4 masonary-active">';
				foreach( $settings['gallery_list'] as $key => $data ){
					if($key == '0' || $key == '6'){
						$column = 'col-xl-8 col-md-6';
					}else{
						$column = 'col-xl-4 col-md-6';
					}
					echo '<div class="'.esc_attr($column).' filter-item">';
						echo '<div class="gallery-card">';
							echo '<div class="box-img">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['choose_image']['url'] ),
								));
								echo '<a href="'.esc_url( $data['choose_image']['url'] ).'" class="play-btn popup-image style3">'.wp_kses_post($data['icon']).'</a>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="gallery-area-3 space overflow-hidden position-relative">';
				echo '<div class="radient-border-top"></div>';
				echo '<div class="slider-area gallery-slider3">';
					echo '<div class="swiper th-slider" id="gallerySlider3" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"2"}},"centeredSlides":"true"}\'>';
						echo '<div class="swiper-wrapper">';
							foreach( $settings['gallery_list_3'] as $data ){
								echo '<div class="swiper-slide gallery-card style2">';
									echo '<div class="gallery-card-img">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['choose_image']['url'] ),
										)); 
										echo '<div class="img-overlay icon-masking">';
											echo '<span class="mask-icon" data-mask-src="'.BAME_ASSETS.'img/gallery3_shape.jpg"></span>';
											echo bame_img_tag( array(
												'url'   => esc_url( $settings['shape']['url'] ),
											));
										echo '</div>';
									echo '</div>';
									echo '<div class="gallery-content">';
										echo '<div class="media-body">';
											if(!empty($data['subtitle'])){
												echo '<span class="gallery-card-subtitle sub">'.wp_kses_post($data['subtitle']).'</span>';
											}
											if(!empty($data['title'])){
												echo '<h3 class="gallery-card-title title"><a href="'.esc_url( $data['url']['url'] ).'">'.wp_kses_post($data['title']).'</a></h3>';
											}
										echo '</div>';
										echo '<a href="'.esc_url( $data['choose_image']['url'] ).'" class="play-btn popup-image style6"><i class="fa-solid fa-plus"></i>';
											echo '<div class="icon-shape">';
												echo '<svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g filter="url(#filter0_i_935_1589)">
														<path d="M8.53554 1.46446C9.47322 0.526783 10.745 0 12.0711 0H43.9289C45.255 0 46.5268 0.526784 47.4645 1.46447L54.5355 8.53554C55.4732 9.47322 56 10.745 56 12.0711V14V28V42V43.9289C56 45.255 55.4732 46.5268 54.5355 47.4645L47.4645 54.5355C46.5268 55.4732 45.255 56 43.9289 56H12.0711C10.745 56 9.47322 55.4732 8.53553 54.5355L1.46446 47.4645C0.526783 46.5268 0 45.255 0 43.9289V42V28V14V12.0711C0 10.745 0.526784 9.47322 1.46447 8.53553L8.53554 1.46446Z" fill="#0F1C23" />
													</g>
													<defs>
														<filter id="filter0_i_935_1589" x="0" y="0" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
															<feFlood flood-opacity="0" result="BackgroundImageFix" />
															<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
															<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
															<feOffset />
															<feGaussianBlur stdDeviation="3.5" />
															<feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
															<feColorMatrix type="matrix" values="0 0 0 0 0.258824 0 0 0 0 0.890196 0 0 0 0 0.47451 0 0 0 0.7 0" />
															<feBlend mode="normal" in2="shape" result="effect1_innerShadow_935_1589" />
														</filter>
													</defs>
												</svg>';
											echo '</div>';
										echo '</a>';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
						echo '<div class="slider-pagination"></div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}


	}

}