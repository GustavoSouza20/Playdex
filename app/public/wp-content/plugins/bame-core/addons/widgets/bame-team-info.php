<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Team Info Widget
 *
 */
class bame_Team_info extends Widget_Base{

	public function get_name() {
		return 'bameteaminfo';
	}
	public function get_title() {
		return esc_html__( 'Team Member Info', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'team_member_content',
			[
				'label'		=> esc_html__( 'Member Info','bame' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two'] );

		bame_media_fields( $this, 'image', 'Choose Image', ['1'] );
		bame_general_fields($this, 'name', 'Member Name', 'TEXT', 'Jonson Anderson', ['1']);
		bame_general_fields($this, 'designation', 'Designation', 'TEXT', 'Designation', ['1']);
		bame_general_fields($this, 'desc', 'Description', 'TEXTAREA', '', ['1']); 

		$repeater = new Repeater();

		bame_general_fields($repeater, 'label', 'Label', 'TEXT', 'Experience');
		bame_general_fields($repeater, 'content', 'Content', 'TEXTAREA', '22 Years');

		$this->add_control(
			'feature_lists',
			[
				'label' 		=> __( 'Feature Lists', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
						[
							'label' 		=> __( 'Experience', 'bame' ), 
						],
				],
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
		);

		bame_general_fields($this, 'social_title', 'Social Label', 'TEXT', 'Follow Us', ['1']);
		bame_social_fields($this, 'social_icon_list', 'Social Media', ['1']);

		bame_general_fields($this, 'title', 'Title', 'TEXT', 'About Me', ['2']);
		bame_general_fields($this, 'desc2', 'Description', 'TEXTAREA', '', ['2']);

		bame_general_fields($this, 'note', 'Wins, Draws & Loses width calculate 100%, Draw percentage will be calculated by subtracting  the summation of wins and lose from 100%.', 'HEADING', '', ['2']);
		$repeater = new Repeater();

		bame_general_fields($repeater, 'title', 'Title', 'TEXTAREA', 'ANGRY POWER');
		bame_general_fields($repeater, 'win_label', 'Win Label', 'TEXT', 'WINS');
		bame_general_fields($repeater, 'win_width', 'Win Width', 'TEXT', '45');
		bame_general_fields($repeater, 'lose_label', 'Lose Label', 'TEXT', 'LOSSES');
		bame_general_fields($repeater, 'lose_width', 'Lose Width', 'TEXT', '45');
		bame_general_fields($repeater, 'draw_label', 'Draw Label', 'TEXT', 'DRAWS');

		$this->add_control(
			'skill_lists',
			[
				'label' 		=> __( 'Skill Lists', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
						[
							'title' 		=> __( 'ANGRY POWER', 'bame' ), 
						],
				],
				'condition'	=> [
					'layout_style' => ['2']
				]
			]
		);

		bame_general_fields($this, 'title2', 'Title', 'TEXT', 'YouTube / Twitch Video', ['2']);
		$fields_to_include = [ 'image' => ['Choose Image'], 'title' => ['Icon'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'video_lists', 'Video Lists', $fields_to_include, [ '2' ] );

		$this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Name Style-------
		bame_common_style_fields( $this, 'name', 'Name', '{{WRAPPER}} .sec-title', ['1'] );
		//-------Designation Style-------
		bame_common_style_fields( $this, 'designation', 'Designation', '{{WRAPPER}} .sub-title', ['1'] );

		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .title', ['2'] );
		bame_common_style_fields( $this, 'title2', 'Title 2', '{{WRAPPER}} .title2', ['2'] );

		//-------Description Style-------
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .desc' );
		bame_common_style_fields( $this, 'features', 'Features', '{{WRAPPER}} .team-info-list ul li', ['1'] );
		bame_common_style_fields( $this, 'social_label', 'Social Label', '{{WRAPPER}} .label', ['1'] );


	}

	protected function render() {

	$settings = $this->get_settings_for_display(); 

		if( $settings['layout_style'] == '1' ){
			echo '<div class="row gy-80">';
				if(!empty($settings['image']['url'])){
					echo '<div class="col-xl-6">';
						echo '<div class="about-card-img">';
							echo bame_img_tag( array(
								'url'   => esc_url( $settings['image']['url'] ),
							));
						echo '</div>';
					echo '</div>';
				}
				echo '<div class="col-xl-6">';
					echo '<div class="team-about-card">';
						echo '<div class="title-area mb-0">';
							if(!empty($settings['designation'])){
								echo '<span class="sub-title">'.esc_html($settings['designation']).'</span>';
							}
							if(!empty($settings['name'])){
								echo '<h2 class="sec-title">'.esc_html($settings['name']).'</h2>';
							}
						echo '</div>';
						if(!empty($settings['desc'])){
							echo '<p class="about-card_text desc mt-30 mb-25">'.wp_kses_post($settings['desc']).'</p>';
						}
						echo '<div class="team-info-list">';
							echo '<ul>';
								foreach( $settings['feature_lists'] as $data ){
									echo '<li>'.esc_html($data['label']).' <span>'.wp_kses_post($data['content']).'</span></li>';
								}
							echo '</ul>';
						echo '</div>';
						echo '<div class="team-social mt-25">';
							if(!empty($settings['social_title'])){
								echo '<h5 class="fw-semibold label">'.wp_kses_post($settings['social_title']).'</h5>';
							}
							echo '<div class="th-social style-mask">';
								foreach( $settings['social_icon_list'] as $social_icon ){
									$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
									$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

									echo '<a class="'.esc_attr($social_icon['social_class']).'" '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

									\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

									echo '</a> ';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="row gy-80">';
				echo '<div class="col-xl-6">';
					if(!empty($settings['title'])){
						echo '<h3 class="title mt-n2 mb-20">'.wp_kses_post($settings['title']).'</h3>';
					}
					if(!empty($settings['desc2'])){
						echo '<p class="mb-30 desc">'.wp_kses_post($settings['desc2']).'</p>';
					}
					foreach( $settings['skill_lists'] as $data ){
						echo '<div class="skill-feature style3">';
							if(!empty($data['title'])){
								echo '<h3 class="skill-feature_title">'.wp_kses_post($data['title']).'</h3>';
							}
							echo '<div class="progress">';
								echo '<div class="progress-bar" role="progressbar" style="width: '.esc_html($data['win_width']).'%"></div>';
								echo '<div class="progress-bar lose" role="progressbar" style="width: '.esc_html($data['lose_width']).'%"></div>';
							echo '</div>';
							echo '<div class="progress-value-wrap">';
								echo '<div class="progress-value">'.esc_html($data['win_label']).' <span class="counter-number">'.esc_html($data['win_width']).'</span>%</div>';
								echo '<div class="progress-value draw">'.esc_html($data['draw_label']).' <span class="counter-number">25</span>%</div>';
								echo '<div class="progress-value lose">'.esc_html($data['lose_label']).' <span class="counter-number">'.esc_html($data['lose_width']).'</span>%</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';
				echo '<div class="col-xl-6">';
					echo '<div class="team-about-card">';
						if(!empty($settings['title2'])){
							echo '<h3 class="title2 mt-n2 mb-20">'.wp_kses_post($settings['title2']).'</h3>';
						}
						echo '<div class="video-grid-wrap">';
							foreach( $settings['video_lists'] as $data ){
								echo '<div class="th-video">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['choose_image']['url'] ),
									));
									echo '<a href="'.esc_url($data['link']['url']).'" class="play-btn popup-video style5">'.wp_kses_post($data['icon']).'</a>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';

			echo '</div>';
		}
		
	}
}