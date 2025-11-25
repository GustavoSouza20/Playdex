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
 * Service Widget .
 *
 */
class bame_Service extends Widget_Base {

	public function get_name() {
		return 'bameservice';
	}
	public function get_title() {
		return __( 'Services', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'service_section',
			[
				'label'     => __( 'Services', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three', 'Style Four'] );

		bame_media_fields( $this, 'shape', 'Choose Shape' );

		$fields_to_include = [ 'image' => ['Choose Image', 'Choose Icon'], 'title' => ['Title'], 'desc' => ['Description'], 'btn' => ['Button Text'], 'url' => ['URL'] ];
		bame_repeater_fields( $this, 'service_list', 'Service Lists', $fields_to_include );

		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', '', [ '1' ] );
		bame_general_fields( $this, 'button_text', 'Button Text', 'TEXT', 'Button Text', [ '1' ] );
		bame_url_fields( $this, 'button_url', 'Button URL', [ '1' ] );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .title');
		//-------Description Style-------
		bame_common_style_fields($this, 'desc', 'Description', '{{WRAPPER}} .desc');
		//------Button Style-------
		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th_btn');

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="row gy-4 justify-content-center">';
				foreach( $settings['service_list'] as $data ){
					echo '<div class="col-xl-3 col-lg-4 col-sm-6">';
						echo '<div class="service-card" data-bg-src="'.esc_url( $data['choose_image']['url'] ).'">';
							echo '<div class="box-shape">';
								echo bame_img_tag( array(
									'url'   => esc_url( $settings['shape']['url'] ),
								));
							echo '</div>';
							echo '<div class="box-icon">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['choose_icon']['url'] ),
								));
							echo '</div>';
							if(!empty($data['title'])){
								echo '<h3 class="box-title title"><a href="'.esc_url( $data['url']['url'] ).'">'.esc_html($data['title']).'</a></h3>';
							}
							if(!empty($data['description'])){
								echo '<p class="box-text desc">'.esc_html($data['description']).'</p>';
							}
							if(!empty($data['button_text'])){
								echo '<a href="'.esc_url( $data['url']['url'] ).'" class="th-btn btn-sm style2 theme-color th_btn">'.wp_kses_post($data['button_text']).'</a>';
							}
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';
			if(!empty($settings['button_text'])){
				echo '<div class="mt-5 pt-2">';
					echo '<p class="round-text"><span class="text">'.esc_html($settings['title']).' <a href="'.esc_url( $settings['button_url']['url'] ).'" class="line-btn">'.wp_kses_post($settings['button_text']).'</a></span></p>';
				echo '</div>';
			}

		}elseif( $settings['layout_style'] == '2' ){
		

		}


	}

}