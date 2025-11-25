<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class bame_Counterup extends Widget_Base {

	public function get_name() {
		return 'bamecounterup';
	}
	public function get_title() {
		return __( 'Counter Up', 'bame' );
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
				'label' 	=> __( 'Counter Up', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One', 'Style Two', 'Style Three' ] ); 

		$repeater = new Repeater();

		$fields_to_include = [ 'title' => ['Number', 'After Prefix'], 'desc' => ['Description'], ];
		bame_repeater_fields( $this, 'counter_lists', 'Counter List', $fields_to_include, ['1', '2', '3'] );

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Number Style-------
		bame_common_style_fields($this, 'number', 'Number', '{{WRAPPER}} .counter-number');
		bame_common_style_fields($this, 'prefix', 'Prefix', '{{WRAPPER}} .num');
		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .tex');
		

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="counter-card-wrap">';
				foreach( $settings['counter_lists'] as $data ){
					echo '<div class="counter-card">';
						echo '<div class="media-body">';
							if(!empty($data['number'])){
								echo '<h2 class="box-number num"><span class="counter-number">'.wp_kses_post( $data['number'] ).'</span>'.wp_kses_post( $data['after_prefix'] ).'</h2>';
							}
							if(!empty($data['description'])){
								echo '<p class="box-text tex">'.wp_kses_post( $data['description'] ).'</p>';
							}
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="row gy-60">';
				foreach( $settings['counter_lists'] as $data ){
					echo '<div class="col-sm-6">';
						echo '<div class="counter-card">';
							echo '<div class="media-body">';
								if(!empty($data['number'])){
									echo '<h2 class="box-number num"><span class="counter-number">'.wp_kses_post( $data['number'] ).'</span>'.wp_kses_post( $data['after_prefix'] ).'</h2>';
								}
								if(!empty($data['description'])){
									echo '<p class="box-text tex">'.wp_kses_post( $data['description'] ).'</p>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="text-center">';
				echo '<div class="row gy-60 justify-content-lg-between justify-content-center">';
					foreach( $settings['counter_lists'] as $data ){
						echo '<div class="col-lg-auto col-6">';
							echo '<div class="counter-card">';
								echo '<div class="media-body">';
									if(!empty($data['number'])){
										echo '<h2 class="box-number"><span class="counter-number">'.wp_kses_post( $data['number'] ).'</span>'.wp_kses_post( $data['after_prefix'] ).'</h2>';
									}
									if(!empty($data['description'])){
										echo '<p class="box-text tex">'.wp_kses_post( $data['description'] ).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';

		}

	
	}

}