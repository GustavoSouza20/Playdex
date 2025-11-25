<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class Bame_Image extends Widget_Base {

	public function get_name() {
		return 'bameimage';
	}
	public function get_title() {
		return __( 'Image', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Image', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',[ 'Style One', 'Style Two', 'Style Three', 'Style Four'] );

		bame_media_fields( $this, 'image1', 'Choose Image' );
		bame_media_fields( $this, 'image2', 'Choose Image', ['3'] );
		// bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Title', ['3'] );

       $this->end_controls_section();

      	//---------------------------------------
			//Style Section Start
		//---------------------------------------


	}

	protected function render() {

        $settings = $this->get_settings_for_display();
       
		if( $settings['layout_style'] == '1' ){
			if(!empty($settings['image1']['url'])){
				echo '<div class="img-box1">';
					echo '<div class="img1 custom-anim-left wow" data-wow-duration="1.5s" data-wow-delay="0.2s">';
						echo bame_img_tag( array(
							'url'   => esc_url( $settings['image1']['url'] ),
						));
					echo '</div>';
				echo '</div>';
			}

		}elseif( $settings['layout_style'] == '2' ){
			if(!empty($settings['image1']['url'])){
				echo '<div class="about-title-thumb custom-anim-top wow" data-wow-duration="1.5s" data-wow-delay="0.1s">';
					echo bame_img_tag( array(
						'url'   => esc_url( $settings['image1']['url'] ),
					));
				echo '</div>';
			}

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="img-box4">';
				if(!empty($settings['image1']['url'])){
					echo '<div class="custom-anim-left wow" data-wow-duration="1.5s" data-wow-delay="0.2s">';
						echo bame_img_tag( array(
							'url'   => esc_url( $settings['image1']['url'] ),
						));
					echo '</div>';
				}
				if(!empty($settings['image2']['url'])){
					echo '<div class="img2">';
						echo bame_img_tag( array(
							'url'   => esc_url( $settings['image2']['url'] ),
						));
					echo '</div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '4' ){
			if(!empty($settings['image1']['url'])){
				echo '<div class="img-box5">';
					echo '<div class="custom-anim-top wow" data-wow-duration="1.5s" data-wow-delay="0.2s">';
						echo bame_img_tag( array(
							'url'   => esc_url( $settings['image1']['url'] ),
						));
					echo '</div>';
				echo '</div>';
			}

		}



	}

}