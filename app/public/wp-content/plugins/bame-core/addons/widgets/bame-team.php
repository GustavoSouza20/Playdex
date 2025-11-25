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
 * Team Widget .
 *
 */
class bame_Team extends Widget_Base {

	public function get_name() {
		return 'bameteam';
	}
	public function get_title() {
		return __( 'Team', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'team_section',
			[
				'label'     => __( 'Team Content', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three'] );

		$this->add_control(
			'show_load_more',
			[
				'label' 		=> __( 'Show Load More Option?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'bame' ),
				'label_off' 	=> __( 'Hide', 'bame' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'	=> [
					'layout_style' => ['3'],
				]
			]
		);
		$this->add_control(
			'team_item_count',
			[
				'label' 	=> __( 'No of Team to show', 'bame' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 16,
                'default'  	=> __( '8', 'bame' ),
				'condition'	=> [
					'layout_style' => ['3'],
					'show_load_more' => [ 'yes' ],
				]
			]
        );
		$this->add_control(
			'team_loop_item_count',
			[
				'label' 	=> __( 'No of Team Loop to show', 'bame' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 16,
                'default'  	=> __( '4', 'bame' ),
				'condition'	=> [
					'layout_style' => ['3'],
					'show_load_more' => [ 'yes' ],
				]
			]
        );

		$fields_to_include = [ 'image' => ['Team Image', 'Team Logo'], 'title' => ['Name'], 'url' => ['Profile URL'] ];
		bame_repeater_fields( $this, 'team_lists', 'Member Lists', $fields_to_include );

		// $fields_to_include = [ 'image' => ['Team Image'], 'title' => ['Name', 'Designation'], 'url' => ['Profile URL', 'Facebook URL', 'Twitter URL', 'Linkedin URL', 'Instagram URL'] ];
		// bame_repeater_fields( $this, 'team_lists', 'Member Lists', $fields_to_include );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Name Style-------
		bame_common2_style_fields($this, 'name', 'Name', '{{WRAPPER}} .box-title a');


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

			if( $settings['layout_style'] == '1' ){
				echo '<div class="slider-area team-slider1">';
					echo '<div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"}}}\'>';
						echo '<div class="swiper-wrapper">';
							foreach( $settings['team_lists'] as $data ){
								echo '<div class="swiper-slide">';
									echo '<div class="th-team team-card">';
										echo '<div class="team-card-corner team-card-corner1"></div>';
										echo '<div class="team-card-corner team-card-corner2"></div>';
										echo '<div class="team-card-corner team-card-corner3"></div>';
										echo '<div class="team-card-corner team-card-corner4"></div>';
										echo '<div class="img-wrap">';
											echo '<div class="team-img">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['team_image']['url']  ),
												));
											echo '</div>';
											echo bame_img_tag( array(
												'url'   => esc_url( $data['team_logo']['url']  ),
												'class' => 'game-logo',
											));
										echo '</div>';
										if($data['name']){
											echo '<div class="team-card-content">';
												echo '<h3 class="box-title"><a href="'.esc_url( $data['profile_url']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
					echo '<button data-slider-prev="#teamSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
					echo '<button data-slider-next="#teamSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
				echo '</div>';

			}elseif( $settings['layout_style'] == '2' ){
				echo '<div class="slider-area team-slider2">';
					echo '<div class="swiper th-slider has-shadow" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"}}}\'>';
						echo '<div class="swiper-wrapper">';
							foreach( $settings['team_lists'] as $data ){
								echo '<div class="swiper-slide">';
									echo '<div class="th-team team-card">';
										echo '<div class="team-card-corner team-card-corner1"></div>';
										echo '<div class="team-card-corner team-card-corner2"></div>';
										echo '<div class="team-card-corner team-card-corner3"></div>';
										echo '<div class="team-card-corner team-card-corner4"></div>';
										echo '<div class="img-wrap">';
											echo '<div class="team-img">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['team_image']['url']  ),
												));
											echo '</div>';
											echo bame_img_tag( array(
												'url'   => esc_url( $data['team_logo']['url']  ),
												'class' => 'game-logo',
											));
										echo '</div>';
										if($data['name']){
											echo '<div class="team-card-content">';
												echo '<h3 class="box-title"><a href="'.esc_url( $data['profile_url']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
											echo '</div>';
										}
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';

			}elseif( $settings['layout_style'] == '3' ){
				$team_item_count = $settings['team_item_count'];
				$team_loop_item_count = $settings['team_loop_item_count'];

				echo '<div class="row gy-4">';
					$x=0;
					foreach( $settings['team_lists'] as $data ){
						$x++;
						echo '<div class="col-lg-3 col-sm-6 th-team-loop">';
							echo '<div class="th-team team-card">';
								echo '<div class="team-card-corner team-card-corner1"></div>';
								echo '<div class="team-card-corner team-card-corner2"></div>';
								echo '<div class="team-card-corner team-card-corner3"></div>';
								echo '<div class="team-card-corner team-card-corner4"></div>';
								echo '<div class="img-wrap">';
									echo '<div class="team-img">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['team_image']['url']  ),
										));
									echo '</div>';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['team_logo']['url']  ),
										'class' => 'game-logo',
									));
								echo '</div>';
								if($data['name']){
									echo '<div class="team-card-content">';
										echo '<h3 class="box-title"><a href="'.esc_url( $data['profile_url']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					}
					if(!empty($settings['show_load_more'])){
						if($x > $team_item_count){
							echo '<div class="mt-5 pt-3 d-flex justify-content-center">';
								echo '<button id="load-more-btn" class="th-btn">Load More</button>';
							echo '</div>';
						}
					}
				echo '</div>';
				?>

<script>
	jQuery(document).ready(function($) {
		// Set the number of items to show initially and load on each click
		var itemsToShow = <?php echo $team_item_count; ?>;
		var itemsPerLoad = <?php echo $team_loop_item_count; ?>; 
		var currentIndex = itemsToShow;
	
		// Hide items beyond the initial count
		$('.th-team-loop').slice(itemsToShow).hide();      
	
		// Attach a click event to the "Load More" button
		$('#load-more-btn').on('click', function() {
			// Show the next batch of items
			$('.th-team-loop').slice(currentIndex, currentIndex + itemsPerLoad).fadeIn();
			
			// Update the current index
			currentIndex += itemsPerLoad;
	
			// Hide the "Load More" button if all items are displayed
			if (currentIndex >= $('.th-team-loop').length) {
				$('#load-more-btn').hide();
			}
		});
	});
</script>

			<?php
			}elseif( $settings['layout_style'] == '4' ){
				echo '<div class="row gy-30">';
					foreach( $settings['team_lists'] as $data ){
						$target = $data['profile_url']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $data['profile_url']['nofollow'] ? ' rel="nofollow"' : '';

						$f_target = $data['facebook_url']['is_external'] ? ' target="_blank"' : '';
						$f_nofollow = $data['facebook_url']['nofollow'] ? ' rel="nofollow"' : '';
						$t_target = $data['twitter_url']['is_external'] ? ' target="_blank"' : '';
						$t_nofollow = $data['twitter_url']['nofollow'] ? ' rel="nofollow"' : '';
						$l_target = $data['linkedin_url']['is_external'] ? ' target="_blank"' : '';
						$l_nofollow = $data['linkedin_url']['nofollow'] ? ' rel="nofollow"' : '';
						$i_target = $data['instagram_url']['is_external'] ? ' target="_blank"' : '';
						$i_nofollow = $data['instagram_url']['nofollow'] ? ' rel="nofollow"' : '';

						echo '<div class="col-xl-4 col-md-6">';
							echo '<div class="th-team team-grid">';
								echo '<div class="team-grid_wrapper">';
									echo '<div class="team-img">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['team_image']['url']  ),
										));
									echo '</div>';
									echo '<div class="plus-btn"><i class="fa-light fa-plus"></i></div>';
								echo '</div>';
								echo '<div class="team-content">';
									echo '<div class="media-body">';
										if($data['name']){
											echo '<h3 class="box-title"><a href="'.esc_url( $data['profile_url']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
										}
										if($data['designation']){
											echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
										}
									echo '</div>';
								echo '</div>';
								echo '<div class="th-social">';
									if( ! empty( $data['facebook_url']['url']) ){
										echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['facebook_url']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
									}
									if( ! empty( $data['twitter_url']['url']) ){
										echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_url']['url'] ).'"><i class="fab fa-twitter"></i></a>';
									}
									if( ! empty( $data['linkedin_url']['url']) ){
										echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_url']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
									}
									if( ! empty( $data['instagram_url']['url']) ){
										echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['instagram_url']['url'] ).'"><i class="fab fa-instagram"></i></a>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				echo '</div>';

			}
	
			
	}
}