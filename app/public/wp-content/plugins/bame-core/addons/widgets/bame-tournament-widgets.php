<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
/**
 * 
 * Tournament Widgets .
 *
 */
class Bame_Tournament_Widgets extends Widget_Base {

	public function get_name() {
		return 'bametournamentwidgets';
	}
	public function get_title() {
		return __( 'Tournament Widgets', 'bame' ); 
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}
	
	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label'     => __( 'Tournament Widget Style', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', ['Style One', 'Style Two', 'Style Three', 'Style Four'] );

		bame_general_fields( $this, 'title', 'Title', 'TEXT', 'Title', ['1', '2', '3'] );

        bame_media_fields( $this, 'image', 'Team Image 1', ['1', '2', '3'] );
        bame_media_fields( $this, 'image2', 'Team Image 2', ['1'] );

        bame_general_fields( $this, 'team_title', 'Team Title 1', 'TEXT', 'Assassin', ['1'] );
        bame_url_fields( $this, 'team_url', 'Team URL', [ '1' ] );
		bame_general_fields( $this, 'social_content', 'Social Content 1', 'TEXTAREA', '', ['1'] );

        bame_general_fields( $this, 'team_title2', 'Team Title 2', 'TEXT', 'Badgamer', ['1'] );
		bame_url_fields( $this, 'team_url2', 'Team URL 2', [ '1' ] );
		bame_general_fields( $this, 'social_content2', 'Social Content 2', 'TEXTAREA', '', ['1'] );

		bame_url_fields( $this, 'button_url', 'Button URL', [ '2' ] );
        bame_general_fields( $this, 'title2', 'Title', 'TEXT', 'Title', ['3'] );

        $repeater = new Repeater();

		bame_general_fields($repeater, 'year',  'Year', 'TEXT', '2015-2016');
		bame_media_fields($repeater, 'image', 'Choose Image');
		bame_general_fields($repeater, 'tag', 'Tournament Tag', 'TEXT', 'CHAMPION CUP');

		bame_media_fields($repeater, 'image1', 'Team Image 1');
        bame_general_fields($repeater, 'name',  'Team Name 1', 'TEXT', 'Pro Player');
        bame_general_fields($repeater, 'subtitle',  'Team Subtitle 1', 'TEXT', 'Runner Up Team');
		bame_url_fields($repeater, 'team_url', 'Team URL 1');

		bame_media_fields($repeater, 'image2', 'Team Image 2');
        bame_general_fields($repeater, 'name2',  'Team Name 2', 'TEXT', 'The Lion King');
        bame_general_fields($repeater, 'subtitle2',  'Team Subtitle 2', 'TEXT', 'Champion Team');
		bame_url_fields($repeater, 'team_url2', 'Team URL 2');

		$this->add_control(
			'history_slides',
			[
				'label' 		=> __( 'Tournament History', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'year' 	=> __( '2015-2016', 'bame' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['4']
				]
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------
        
		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .widget_title', ['1', '2', '3'] );
		bame_common_style_fields($this, 'year', 'Year', '{{WRAPPER}} .tournament-year', ['4'] );
		bame_common_style_fields($this, 'tag', 'Tag', '{{WRAPPER}} .tournament-tag', ['4'] );
		bame_common_style_fields($this, 'title3', 'Team Name', '{{WRAPPER}} .title a', ['1', '4'] );
		bame_common_style_fields($this, 'title2', 'Title 2', '{{WRAPPER}} .title', ['3'] );
		bame_common_style_fields($this, 'subtitle', 'Subtitle', '{{WRAPPER}} .tournament-card-subtitle', ['4'] );

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
            echo '<div class="widget">';
                if(!empty($settings['title'])){
                    echo '<h3 class="widget_title">'.wp_kses_post($settings['title']).'</h3>';
                }
                echo '<div class="widget-tournament-info">';
                    echo '<div class="next-match-list">';
                        echo '<div class="player-info">';
                            echo '<div class="player-logo">';
                                echo bame_img_tag( array(
                                    'url'   => esc_url( $settings['image']['url'] ),
                                ));
                            echo '</div>';
                            if(!empty($settings['team_title'])){
                                echo '<h4 class="player-title title"><a href="'.esc_url( $settings['team_url']['url'] ).'">'.wp_kses_post($settings['team_title']).'</a></h4>';
                            }
                            if(!empty($settings['social_content'])){
                                echo '<div class="player-social">'.wp_kses_post($settings['social_content']).'</div>';
                            }
                        echo '</div>';
                        echo '<h5 class="verses-tag">'.esc_html__('VS', 'bame').'</h5>';
                        echo '<div class="player-info">';
                            echo '<div class="player-logo">';
                                echo bame_img_tag( array(
                                    'url'   => esc_url( $settings['image2']['url'] ),
                                ));
                            echo '</div>';
                            if(!empty($settings['team_title'])){
                                echo '<h4 class="player-title title"><a href="'.esc_url( $settings['team_url2']['url'] ).'">'.wp_kses_post($settings['team_title2']).'</a></h4>';
                            }
                            if(!empty($settings['social_content2'])){
                                echo '<div class="player-social">'.wp_kses_post($settings['social_content2']).'</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="widget  ">';
                if(!empty($settings['title'])){
                    echo '<h3 class="widget_title">'.wp_kses_post($settings['title']).'</h3>';
                }
                echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="widget-advertise text-center">';
                    echo bame_img_tag( array(
                        'url'   => esc_url( $settings['image']['url'] ),
                    ));
                echo '</a>';
            echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
            echo '<div class="widget  ">';
                if(!empty($settings['title'])){
                    echo '<h3 class="widget_title">'.wp_kses_post($settings['title']).'</h3>';
                }
                echo '<div class="widget-banner text-center">';
                    echo '<div class="logo">';
                        echo bame_img_tag( array(
                            'url'   => esc_url( $settings['image']['url'] ),
                        ));
                    echo '</div>';
                    if(!empty($settings['title2'])){
                        echo '<h4 class="title mb-n2 mt-20">'.wp_kses_post($settings['title2']).'</h4>';
                    }
                echo '</div>';
            echo '</div>';

        }elseif( $settings['layout_style'] == '4' ){
            echo '<div class="row gy-30">';
                foreach( $settings['history_slides'] as $data ){
                    echo '<div class="col-12">';
                        echo '<div class="tournament-card style3">';
                            echo '<div class="tournament-card-content">';
                                echo '<div class="tournament-card-details">';
                                    if(!empty($data['year'])){
                                        echo '<p class="tournament-year">'.wp_kses_post($data['year']).'</p>';
                                    }
                                    echo bame_img_tag( array(
                                        'url'   => esc_url( $data['image']['url'] ),
                                    ));
                                    if(!empty($data['tag'])){
                                        echo '<p class="tournament-tag">'.wp_kses_post($data['tag']).'</p>';
                                    }
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="tournament-card-inner">';
                                echo '<div class="tournament-card-img">';
                                    echo bame_img_tag( array(
                                        'url'   => esc_url( $data['image1']['url'] ),
                                    ));
                                    echo '<div class="card-title-wrap">';
                                        if(!empty($data['name'])){
                                            echo '<h3 class="tournament-card-title title"><a href="'.esc_url( $data['team_url']['url'] ).'">'.wp_kses_post($data['name']).'</a></h3>';
                                        }
                                        if(!empty($data['subtitle'])){
                                            echo '<h6 class="tournament-card-subtitle">'.wp_kses_post($data['subtitle']).'</h6>';
                                        }
                                    echo '</div>';
                                echo '</div>';

                                echo '<div class="tournament-card-img">';
                                    echo '<div class="card-title-wrap text-md-end">';
                                        if(!empty($data['name2'])){
                                            echo '<h3 class="tournament-card-title title"><a href="'.esc_url( $data['team_url2']['url'] ).'">'.wp_kses_post($data['name2']).'</a></h3>';
                                        }
                                        if(!empty($data['subtitle2'])){
                                            echo '<h6 class="tournament-card-subtitle">'.wp_kses_post($data['subtitle2']).'</h6>';
                                        }
                                    echo '</div>';
                                    echo bame_img_tag( array(
                                        'url'   => esc_url( $data['image2']['url'] ),
                                    ));
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';

        }
	

	}
}
						