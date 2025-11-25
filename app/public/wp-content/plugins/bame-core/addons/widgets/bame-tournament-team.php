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
 * Tournament Team Widget .
 *
 */
class Bame_Tournament_Team extends Widget_Base {

	public function get_name() {
		return 'bametournamentteam';
	}
	public function get_title() {
		return __( 'Tournament Team', 'bame' );
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
				'label'		 	=> __( 'Tournament Team', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One' ] );

		bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', '', ['1'] );
		$fields_to_include = [ 'image' => ['Choose Image'], 'title' => ['Title'] ];
		bame_repeater_fields( $this, 'team_lists', 'Team Lists', $fields_to_include, [ '1' ] );

		bame_general_fields( $this, 'title2', 'Title 2', 'TEXTAREA2', '', ['1'] );
		$fields_to_include2 = [ 'image' => ['Choose Image'], 'title' => ['Title'] ];
		bame_repeater_fields( $this, 'team_lists2', 'Team Lists 2', $fields_to_include2, [ '1' ] );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title' );
		bame_common_style_fields( $this, 'name', 'Name', '{{WRAPPER}} .tournament-single-team' );
		
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

			if( $settings['layout_style'] == '1' ){
				echo '<div class="tournament-team-list">';
					echo '<ul class="tournament-single-team-list">';
						if(!empty($settings['title'])){
							echo '<li>';
								echo '<h3 class="page-subtitle title h5 fw-semibold mb-20">'.wp_kses_post($settings['title']).'</h3>';
							echo '</li>';
						}
						foreach( $settings['team_lists'] as $data ){
							echo '<li class="tournament-single-team">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['choose_image']['url'] ),
								));
								echo wp_kses_post($data['title']);
							echo '</li>';
						}
					echo '</ul>';
					echo '<ul class="tournament-single-team-list">';
						if(!empty($settings['title2'])){
							echo '<li>';
								echo '<h3 class="page-subtitle title h5 fw-semibold mb-20">'.wp_kses_post($settings['title2']).'</h3>';
							echo '</li>';
						}
						foreach( $settings['team_lists2'] as $data ){
							echo '<li class="tournament-single-team">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['choose_image']['url'] ),
								));
								echo wp_kses_post($data['title']);
							echo '</li>';
						}
					echo '</ul>';
				echo '</div>';
				
			}elseif( $settings['layout_style'] == '2' ){


			}

	}

}