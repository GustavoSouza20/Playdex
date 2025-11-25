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
 * Social Widget .
 *
 */
class Bame_Social extends Widget_Base { 

	public function get_name() {
		return 'bamesocial';
	}
	public function get_title() {
		return __( 'Social', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'social_section',
			[
				'label'     => __( 'Social', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One'] );
		
		//Social List
		bame_social_fields($this, 'social_icon_list', 'Social List');

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="th-social">';
				foreach( $settings['social_icon_list'] as $social_icon ){
					$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
					$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

					echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

					\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

					echo '</a> ';
				}
			echo '</div>';
		}


	}

}