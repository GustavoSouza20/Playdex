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
 * Info Box Widget .
 *
 */
class bame_Info_Box extends Widget_Base {

	public function get_name() {
		return 'bameinfobox';
	}
	public function get_title() {
		return __( 'Info Box', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Info Box', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two'] );

		bame_media_fields( $this, 'image1', 'Choose Image' );
		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA', '', ['1', '2'] );
		bame_general_fields( $this, 'desc', 'Description', 'TEXTAREA', '', ['1'] );

        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title' );
		//-------Description Style-------
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc', ['1'] );
		

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

			if( $settings['layout_style'] == '1' ){
				echo '<div class="about-profile">';
					if(!empty($settings['image1']['url'])){
						echo '<div class="about-avater">';
							echo bame_img_tag( array(
								'url'   => esc_url( $settings['image1']['url'] ),
							));
						echo '</div>';
					}
					echo '<div class="media-body">';
						if(!empty($settings['title'])){
							echo '<h5 class="box-title mb-0 title">'.wp_kses_post($settings['title']).'</h5>';
						}
						if(!empty($settings['desc'])){
							echo '<p class="desig mb-0 desc">'.wp_kses_post($settings['desc']).'</p>';
						}
					echo '</div>';
				echo '</div>';
				
			}elseif( $settings['layout_style'] == '2' ){
				echo '<div class="about-text">';
					echo bame_img_tag( array(
						'url'   => esc_url( $settings['image1']['url'] ),
					));
					if(!empty($settings['title'])){
						echo '<p class="title">'.wp_kses_post($settings['title']).'</p>';
					}
				echo '</div>';

			}

	}

}