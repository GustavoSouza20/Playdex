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
 * Step Widget .
 *
 */
class bame_Step extends Widget_Base {

	public function get_name() {
		return 'bamestep';
	}
	public function get_title() {
		return __( 'Step/Process', 'bame' );
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
				'label'		 	=> __( 'Steps', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three'] );

		$fields_to_include = [ 'image' => ['Choose Icon'], 'title' => ['Number', 'Title'], 'desc' => ['Description'] ];
		bame_repeater_fields( $this, 'process_list', 'Process Lists', $fields_to_include, ['1', '2'] );

		$fields_to_include2 = [ 'title' => ['Number', 'Title'], 'desc' => ['Description'] ];
		bame_repeater_fields( $this, 'process_list_2', 'Process Lists', $fields_to_include2, ['3'] );

        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------
		
		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title' );
		//-------Description Style-------
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc' );
		//-------Number Style-------
		bame_common_style_fields( $this, 'num', 'Number', '{{WRAPPER}} .num', ['1'] );

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="step-wrap">';
				echo '<div class="process-line"></div>';
				echo '<div class="row gy-4 justify-content-center">';
					foreach( $settings['process_list'] as $key => $data ){
						$active = ($key == 1) ? 'active':'';
						echo '<div class="col-xl-4 col-md-6">';
							echo '<div class="process-card '.esc_html($active).'">';
								if(!empty($data['choose_icon']['url'])){
									echo '<div class="box-icon">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['choose_icon']['url'] ),
										));
									echo '</div>';
								}
								echo '<div class="box-content">';
									echo '<div class="box-top">';
										if(!empty($data['number'])){
											echo '<p class="box-number num">'.esc_html($data['number']).'</p>';
										}
										if(!empty($data['title'])){
											echo '<h3 class="box-title title">'.esc_html($data['title']).'</h3>';
										}
									echo '</div>';
									if(!empty($data['description'])){
										echo '<p class="box-text desc">'.esc_html($data['description']).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="row gy-4 justify-content-center">';
				foreach( $settings['process_list'] as $data ){
					echo '<div class="col-xl-3 col-md-6 process-box-wrap">';
						echo '<div class="process-box">';
							if(!empty($data['choose_icon']['url'])){
								echo '<div class="box-icon">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['choose_icon']['url'] ),
									));
									echo '<div class="icon-shape"></div>';
								echo '</div>';
							}
							if(!empty($data['number'])){
								echo '<p class="box-number num">'.esc_html($data['number']).'</p>';
							}
							if(!empty($data['title'])){
								echo '<h3 class="box-title title">'.esc_html($data['title']).'</h3>';
							}
							if(!empty($data['description'])){
								echo '<p class="box-text desc">'.esc_html($data['description']).'</p>';
							}
						echo '</div>';
					echo '</div>';
				}
            echo '</div>';
		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="feature-box_wrapper">';
				foreach( $settings['process_list_2'] as $data ){
					echo '<div class="feature-box">';
						if(!empty($data['number'])){
							echo '<div class="feature-box_step">';
								echo '<p class="box-number num">'.wp_kses_post($data['number']).'</p>';
							echo '</div>';
						}
						echo '<div class="media-body">';
							if(!empty($data['title'])){
								echo '<h3 class="box-title title">'.esc_html($data['title']).'</h3>';
							}
							if(!empty($data['description'])){
								echo '<p class="feature-box_text desc">'.esc_html($data['description']).'</p>';
							}
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}
	

	}

}