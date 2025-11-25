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
 * Arrows Widget .
 *
 */
class bame_Arrows extends Widget_Base {

	public function get_name() {
		return 'bamearrows';
	}
	public function get_title() {
		return __( 'Slider Arrow', 'bame' );
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
				'label'     => __( 'Slider Arrows', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One'] );

		bame_general_fields($this, 'arrow_id', 'Arrow ID', 'TEXT', 'serviceSlide');
		bame_general_fields($this, 'arrow_extra_class', 'Arrow Extra Class', 'TEXT', '');

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------


	}

	protected function render() {

    $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '2' ){

		}else{
			echo '<div class="icon-box '.esc_attr($settings['arrow_extra_class']).'">';
				echo '<button data-slick-prev="#'.esc_attr($settings['arrow_id']).'" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>';
				echo '<button data-slick-next="#'.esc_attr($settings['arrow_id']).'" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>';
			echo '</div>';
		}
			
	}
}