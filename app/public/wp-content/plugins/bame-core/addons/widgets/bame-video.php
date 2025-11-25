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
 * Video Widget .
 *
 */
class Bame_Video extends Widget_Base {

	public function get_name() {
		return 'bamevideo';
	}
	public function get_title() {
		return __( 'Video Box', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'video_section',
			[
				'label' 	=> __( 'video Box', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three', 'Style Four'] ); 

		bame_media_fields( $this, 'image', 'Choose Image', ['1', '2'] );
		bame_url_fields( $this, 'video_url', 'Video URL', ['1', '2'] );

		$fields_to_include = [ 'image' => ['Choose Image'], 'title' => ['Title'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'video_lists', 'Game Lists', $fields_to_include, [ '3' ] );

		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'SHAPING THE FUTURE OF', ['3'] );

		$repeater = new Repeater();

		bame_media_fields($repeater, 'image', 'Choose Image');
		bame_url_fields($repeater, 'video_url', 'Video URL');

		bame_general_fields($repeater, 'button_text', 'Button Text', 'TEXT', 'Twitch');
		bame_url_fields($repeater, 'button_url', 'Button URL');
		bame_general_fields($repeater, 'button_text2', 'Button Text 2', 'TEXT', 'YouTube');
		bame_url_fields($repeater, 'button_url2', 'Button URL 2');
		bame_general_fields($repeater, 'button_text3', 'Button Text 3', 'TEXT', 'Discord');
		bame_url_fields($repeater, 'button_url3', 'Button URL 3');

		$this->add_control(
			'video_slides',
			[
				'label' 		=> __( 'Video Lists', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'condition'	=> [
					'layout_style' => ['4']
				]
			]
		);

		

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------
		bame_common_style_fields($this, 'title3', 'Title', '{{WRAPPER}} .video-tab-btn a', ['3'], '--white-color');
		bame_common_style_fields($this, 'title2', 'Title', '{{WRAPPER}} .video-tab-btn button', ['4']);

	}

	protected function render() {
 
        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
		    echo '<div class="video-area-1  overflow-hidden" data-bg-src="'.esc_url( $settings['image']['url'] ).'" data-mask-src="'.BAME_ASSETS.'img/video-sec2-bg-shape.png">';
				echo '<div class="container">';
					if(!empty($settings['video_url']['url'])){
						echo '<div class="text-center">';
							echo '<a href="'.esc_url( $settings['video_url']['url'] ).'" class="play-btn style4 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="text-xl-end video-box1 custom-anim-right wow">';
				echo bame_img_tag( array(
					'url'   => esc_url( $settings['image']['url'] ),
				));
				if(!empty($settings['video_url']['url'])){
					echo '<a href="'.esc_url( $settings['video_url']['url'] ).'" class="play-btn style3 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="row justify-content-between">';
				echo '<div class="col-lg-12">';
					echo '<div class="video-box3 custom-anim-top wow">';
						echo '<div class="tab-content" id="videoTabContent">';
							foreach( $settings['video_lists'] as $key=> $data ){
								$active = ($key==1) ? 'show active':'';
								echo '<div class="tab-pane fade '.esc_attr($active).'" id="video'.esc_attr($key).'" role="tabpanel" aria-labelledby="video-tab'.esc_attr($key).'">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['choose_image']['url'] ),
									));
									if(!empty($data['link']['url'])){
										echo '<a href="'.esc_url($data['link']['url']).'" class="play-btn style4 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>';
									}
								echo '</div>';
							}
						echo '</div>'; 
					echo '</div>';
					echo '<ul class="nav video-tab-btn" id="videoTab" role="tablist">';
						foreach( $settings['video_lists'] as $key => $data ){
							$active = ($key==1) ? 'active':'';
							$aria = ($key==1) ? 'true':'false';
							echo '<li class="nav-item" role="presentation">';
								echo '<a class="nav-link '.esc_attr($active).'" id="video-tab'.esc_attr($key).'" data-bs-toggle="tab" href="#video'.esc_attr($key).'" role="tab" aria-controls="video'.esc_attr($key).'" aria-selected="'.esc_attr($aria).'">'.esc_html($data['title']).'</a>';
							echo '</li>';
						}
					echo '</ul>';
					if(!empty($settings['title'])){
						echo '<div class="video-shadow-title shadow-title title">'.wp_kses_post($settings['title']).'</div>';
					}
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="slider-area">';
				echo '<div class="swiper th-slider" id="blogSlider4" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['video_slides'] as $data ){
							echo '<div class="col-lg-3 swiper-slide">';
								echo '<div class="video-box4">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									));
									if(!empty($data['video_url']['url'])){
										echo '<a href="'.esc_url( $data['video_url']['url'] ).'" class="play-btn style4 popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>';
									}
									echo '<div class="video-tab-btn filter-menu-cat-active">';
										if(!empty($data['button_text'])){
											echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="popup-video">'.wp_kses_post($data['button_text']).'</a>';
										}
										if(!empty($data['button_text2'])){
											echo '<a href="'.esc_url( $data['button_url2']['url'] ).'" class="popup-video">'.wp_kses_post($data['button_text2']).'</a>';
										}
										if(!empty($data['button_text3'])){
											echo '<a href="'.esc_url( $data['button_url3']['url'] ).'" class="popup-video">'.wp_kses_post($data['button_text3']).'</a>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}


	}

}