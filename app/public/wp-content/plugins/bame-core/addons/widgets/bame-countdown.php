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
 * Countdown Widget .
 *
 */
class Bame_Countdown extends Widget_Base {

	public function get_name() {
		return 'bamecountdown';
	}
	public function get_title() {
		return __( 'countdown', 'bame' );
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
				'label'     => __( 'countdown', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',[ 'Style One' ] );

		bame_media_fields( $this, 'bg', 'Choose Background', ['1'] );
		bame_media_fields( $this, 'image', 'Choose Image', ['1'] );
		bame_media_fields( $this, 'image2', 'Choose Image', ['1'] );
        bame_general_fields( $this, 'subtitle', 'Subtitle', 'TEXT', 'Big Match', ['1', '3']);
		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Valorant Game', ['1', '3']);
		bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA', '21 February, 2024 - 6:00 PM', ['1', '3'] );
        $this->add_control(
			'date', [
				'label' 		=> __( 'Offer End Date With Time', 'bame' ),
				'type' 			=> Controls_Manager::DATE_TIME,
				'label_block' 	=> true,
			]
        );
        bame_general_fields( $this, 'button_text', 'Button Text', 'TEXT', 'EXPLORE MORE');
		bame_url_fields( $this, 'button_url', 'Button URL');

		
        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------	

		bame_common_style_fields( $this, 'subtitle', 'Subtitle', '{{WRAPPER}} .sub', ['1'] );
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title', ['1', '3', '4'] );
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc', ['1', '3', '4', '5'] );
		//------Button Style-------
		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th_btn', ['1']);


	}

	protected function render() {

    $settings = $this->get_settings_for_display(); 

		if( $settings['layout_style'] == '1' ){
            $offer_date_end = $settings['date'];
            $replace 	= array('-');
            $with 		= array('/');
    
            $date 	= str_replace( $replace, $with, $offer_date_end ); 

			echo '<div class="countdown-sec1 overflow-hidden" data-bg-src="'.esc_url($settings['bg']['url']).'" data-overlay="black" data-opacity="8">';
                if(!empty($settings['image']['url'])){
                    echo '<div class="countdown-thumb1-1 shape-mockup d-xl-block d-none" data-bottom="0" data-left="5%">';
                        echo bame_img_tag( array(
                            'url'   => esc_url( $settings['image']['url'] ),
                        ));
                    echo '</div>';
                }
                if(!empty($settings['image2']['url'])){
                    echo '<div class="countdown-thumb1-2 shape-mockup d-xl-block d-none" data-bottom="0" data-right="3%">';
                        echo bame_img_tag( array(
                            'url'   => esc_url( $settings['image2']['url'] ),
                        ));
                    echo '</div>';
                }
                echo '<div class="container">';
                    echo '<div class="countdown-wrap1 z-index-common text-center space">';
                        if(!empty($settings['subtitle'])){
                            echo '<h3 class="countdown-subtitle sub custom-anim-top wow">'.wp_kses_post($settings['subtitle']).'</h3>';
                        }
                        if(!empty($settings['title'])){
                            echo '<h2 class="countdown-title title custom-anim-top wow">'.wp_kses_post($settings['title']).'</h2>';
                        }
                        if(!empty($settings['desc'])){
                            echo '<h4 class="countdown-time desc custom-anim-top wow">'.wp_kses_post($settings['desc']).'</h4>';
                        }
                        echo '<ul class="counter-list custom-anim-top wow" data-offer-date="'.esc_attr($date).'">';
                            echo '<li>';
                                echo '<div class="day count-number" data-bg-src="'.get_template_directory_uri().'/assets/img/bg/countdown_item_bg.png">00</div>';
                                echo '<span class="count-name">'.esc_html__('Days', 'bame').'</span>';
                            echo '</li>';
                            echo '<li>';
                                echo '<div class="hour count-number" data-bg-src="'.get_template_directory_uri().'/assets/img/bg/countdown_item_bg.png">00</div>';
                                echo '<span class="count-name">'.esc_html__('Hour', 'bame').'</span>';
                            echo '</li>';
                            echo '<li>';
                                echo '<div class="minute count-number" data-bg-src="'.get_template_directory_uri().'/assets/img/bg/countdown_item_bg.png">00</div>';
                                echo '<span class="count-name">'.esc_html__('Minute', 'bame').'</span>';
                            echo '</li>';
                            echo '<li>';
                                echo '<div class="seconds count-number" data-bg-src="'.get_template_directory_uri().'/assets/img/bg/countdown_item_bg.png">00</div>';
                                echo '<span class="count-name">'.esc_html__('Second', 'bame').'</span>';
                            echo '</li>';
                        echo '</ul>';
                        if(!empty($settings['button_text'])){
                            echo '<div class="btn-wrap mt-40 justify-content-center custom-anim-top wow">';
								echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="th-btn th_btn">'.wp_kses_post($settings['button_text']).'</a>';
                            echo '</div>';
						}
                    echo '</div>';
                echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
		
		}

			
	}
}