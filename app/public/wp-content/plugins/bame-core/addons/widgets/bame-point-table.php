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
 * Point Table Widget . 
 *
 */
class Bame_Point_Table extends Widget_Base { 

	public function get_name() {
		return 'bamepointtable';
	}
	public function get_title() {
		return __( 'Point Table', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'point_table_section',
			[
				'label' 	=> __( 'Point Table', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One'] );    

		bame_general_fields( $this, 'subtitle', 'Point Lists first item use for Heading part. (Note: Image and Link not use heading part)', 'HEADING', '', ['1'] );

		$fields_to_include = [ 'image' => ['Choose Image'], 'title' => ['Serial', 'Team Name', 'Matches', 'Wins', 'Place PTS', 'Finishes', 'Total PTS'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'point_lists', 'Point Lists', $fields_to_include, [ '1' ] );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		$this->start_controls_section(
			'point_styling',
			[
				'label'     => __( 'Styling', 'bame' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		bame_color_fields( $this, 'bg', 'Heading Background', 'background', '{{WRAPPER}} .tournament-table thead');
		bame_color_fields( $this, 'color', 'Heading color', 'color', '{{WRAPPER}} .tournament-table thead th' );
		bame_typography_fields( $this, 'heading_font', 'Heading Trpography', '{{WRAPPER}} .tournament-table thead th' );
		bame_general_fields( $this, 'heading1', 'Item Number', 'HEADING', '', ['1'] );
		bame_color_fields( $this, 'bg2', 'Item Background', 'background', '{{WRAPPER}} .tournament-table tbody tr' );
		bame_color_fields( $this, 'color2', 'Item color', 'color', '{{WRAPPER}} .tournament-table tbody tr td, {{WRAPPER}} .tournament-table tbody tr th' );
		bame_typography_fields( $this, 'item_font', 'Item Trpography', '{{WRAPPER}} .tournament-table tbody tr td, {{WRAPPER}} .tournament-table tbody tr th' );
		bame_general_fields( $this, 'heading2', 'Item Name', 'HEADING', '', ['1'] );
		bame_color_fields( $this, 'color3', 'Item color', 'color', '{{WRAPPER}} .tournament-table tbody tr td a' );
		bame_typography_fields( $this, 'item_font2', 'Item Trpography', '{{WRAPPER}} .tournament-table tbody tr td a' );

		$this->end_controls_section();

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="table-responsive">';
                echo '<table class="table tournament-table">';
                   echo ' <thead>';
				   		foreach ($settings['point_lists'] as $key => $data) {
							if ($key === 0) {
								echo '<tr>';
									echo '<th scope="col">'.esc_html($data['serial']).'</th>';
									echo '<th scope="col">'.esc_html($data['team_name']).'</th>';
									echo '<th scope="col">'.esc_html($data['matches']).'</th>';
									echo '<th scope="col">'.esc_html($data['wins']).'</th>';
									echo '<th scope="col">'.esc_html($data['place_pts']).'</th>';
									echo '<th scope="col">'.esc_html($data['finishes']).'</th>';
									echo '<th scope="col">'.esc_html($data['total_pts']).'</th>';
								echo '</tr>';
							}
						}
                    echo '</thead>';
                    echo '<tbody>';
						foreach ($settings['point_lists'] as $key => $data) {
							if ($key > 0) {
								echo '<tr>';
									echo '<th scope="row">'.esc_html($data['serial']).'</th>';
									echo '<td><a href="'.esc_url($data['link']['url']).'">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['choose_image']['url'] ),
										));
										echo esc_html($data['team_name']);
										echo '</a></td>';
									echo '<td>'.esc_html($data['matches']).'</td>';
									echo '<td>'.esc_html($data['wins']).'</td>';
									echo '<td>'.esc_html($data['place_pts']).'</td>';
									echo '<td>'.esc_html($data['finishes']).'</td>';
									echo '<td>'.esc_html($data['total_pts']).'</td>';
								echo '</tr>';
							}
						}
                    echo '</tbody>';
                echo '</table>';
            echo '</div>';

		}


	}

}