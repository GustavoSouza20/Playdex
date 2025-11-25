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
 * Game Widget .
 *
 */
class Bame_Game extends Widget_Base {

	public function get_name() {
		return 'bamegame';
	}
	public function get_title() {
		return __( 'Game', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'game_section',
			[
				'label'		 	=> __( 'Game', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', ['Style One', 'Style Two', 'Style Three', 'Style Four'] );

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
			'game_item_count',
			[
				'label' 	=> __( 'No of Game to show', 'bame' ),
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
			'game_loop_item_count',
			[
				'label' 	=> __( 'No of Game Loop to show', 'bame' ),
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
		
		// Layout Style 1
		$fields_to_include = [ 'image' => ['Choose Image', 'Choose Logo'], 'title' => ['Title', 'Label', 'Entry Fee'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'game_lists', 'Game Lists', $fields_to_include, [ '1' ] );
		
		$fields_to_include = [ 'image' => ['Choose Image', 'Choose Logo'], 'title' => ['Title', 'Label'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'game_lists_3', 'Game Lists', $fields_to_include, [ '4' ] );

		// Layout Style 2
		$fields_to_include2 = [ 'image' => ['Choose Image', 'Choose Logo'], 'title' => ['Title', 'Label', 'Entry Fee', 'Rating', 'Rating Count'], 'url' => ['Link'] ];
		bame_repeater_fields( $this, 'game_lists_2', 'Game Lists', $fields_to_include2, [ '2', '3' ] );

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------Title Style-------
		bame_common_style_fields( $this, 'title', 'Title', '{{WRAPPER}} .box-title' );
		//-------Content Style-------
		bame_common_style_fields( $this, 'desc', 'Label', '{{WRAPPER}} .desc' );
		bame_common_style_fields( $this, 'desc2', 'Entry Fee', '{{WRAPPER}} .desc2', ['1', '2'], '--theme-color' );

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="slider-area">';
				echo '<div class="swiper th-slider game-slider-1" id="gameSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['game_lists'] as $data ){
							echo '<div class="swiper-slide">';
								echo '<div class="game-card gradient-border">';
									echo '<div class="game-card-img">';
										if(!empty($data['choose_image']['url'])){
											echo '<a href="'.esc_url($data['link']['url']).'">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_image']['url'] ),
												));
											echo '</a>';
										}
										if(!empty($data['choose_logo']['url'])){
											echo '<div class="game-logo">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_logo']['url'] ),
												));
											echo '</div>';
										}
									echo '</div>';
									echo '<div class="game-card-details">';
										if( !empty($data['title']) ){
											echo '<h3 class="box-title"><a href="'.esc_url($data['link']['url']).'">'.esc_html($data['title']).'</a></h3>';
										}
										if( !empty($data['label']) || !empty($data['entry_fee']) ){
											echo '<p class="game-content desc">'.esc_html($data['label']).'<span class="text-theme desc2">'.esc_html($data['entry_fee']).'</span></p>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
					echo '<div class="slider-pagination"></div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="slider-area">';
				echo '<div class="swiper th-slider has-shadow" id="gameSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['game_lists_2'] as $data ){
							echo '<div class="swiper-slide">';
								echo '<div class="game-card style2">';
									echo '<div class="game-card-img">';
										if(!empty($data['choose_image']['url'])){
											echo '<a href="'.esc_url($data['link']['url']).'">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_image']['url'] ),
												));
											echo '</a>';
										}
										if(!empty($data['choose_logo']['url'])){
											echo '<div class="game-logo">';
												echo bame_img_tag( array(
													'url'   => esc_url( $data['choose_logo']['url'] ),
												));
											echo '</div>';
										}
									echo '</div>';
									echo '<div class="game-card-details">';
										echo '<div class="media-left">';
											if( !empty($data['title']) ){
												echo '<h3 class="box-title"><a href="'.esc_url($data['link']['url']).'">'.esc_html($data['title']).'</a></h3>';
											}
											if( !empty($data['label']) || !empty($data['entry_fee']) ){
												echo '<p class="game-content desc">'.esc_html($data['label']).'<span class="text-theme desc2">'.esc_html($data['entry_fee']).'</span></p>';
											}
										echo '</div>';
										echo '<div class="media-body">';
											if( !empty($data['rating']) ){
												echo '<span class="game-rating">'.wp_kses_post($data['rating']).'</span>';
											}
											if( !empty($data['rating_count']) ){
												echo '<span class="review-count">'.esc_html($data['rating_count']).'</span>';
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
			echo '</div>';

		}elseif( $settings['layout_style'] == '3' ){
			$game_item_count = $settings['game_item_count'];
			$game_loop_item_count = $settings['game_loop_item_count'];
			echo '<div class="row gy-4">';
				$x=0;
				foreach( $settings['game_lists_2'] as $data ){
					$x++;
					echo '<div class="col-lg-4 col-md-6 th-game-loop">';
						echo '<div class="game-card style2">';
							echo '<div class="game-card-img">';
								if(!empty($data['choose_image']['url'])){
									echo '<a href="'.esc_url($data['link']['url']).'">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['choose_image']['url'] ),
										));
									echo '</a>';
								}
								if(!empty($data['choose_logo']['url'])){
									echo '<div class="game-logo">';
										echo bame_img_tag( array(
											'url'   => esc_url( $data['choose_logo']['url'] ),
										));
									echo '</div>';
								}
							echo '</div>';
							echo '<div class="game-card-details">';
								echo '<div class="media-left">';
									if( !empty($data['title']) ){
										echo '<h3 class="box-title"><a href="'.esc_url($data['link']['url']).'">'.esc_html($data['title']).'</a></h3>';
									}
									if( !empty($data['label']) || !empty($data['entry_fee']) ){
										echo '<p class="game-content desc">'.esc_html($data['label']).'<span class="text-theme desc2">'.esc_html($data['entry_fee']).'</span></p>';
									}
								echo '</div>';
								echo '<div class="media-body">';
									if( !empty($data['rating']) ){
										echo '<span class="game-rating">'.wp_kses_post($data['rating']).'</span>';
									}
									if( !empty($data['rating_count']) ){
										echo '<span class="review-count">'.esc_html($data['rating_count']).'</span>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
				if(!empty($settings['show_load_more'])){
					if($x > $game_item_count){
						echo '<div class="mt-5 pt-3 d-flex justify-content-center">';
							echo '<button id="load-more-game-btn" class="th-btn">Load More</button>';
						echo '</div>';
					}
				}
			echo '</div>';
			?>

<script>
	jQuery(document).ready(function($) {
		// Set the number of items to show initially and load on each click
		var itemsToShow = <?php echo $game_item_count; ?>;
		var itemsPerLoad = <?php echo $game_loop_item_count; ?>; 
		var currentIndex = itemsToShow;
	
		// Hide items beyond the initial count
		$('.th-game-loop').slice(itemsToShow).hide();      
	
		// Attach a click event to the "Load More" button
		$('#load-more-game-btn').on('click', function() {
			// Show the next batch of items
			$('.th-game-loop').slice(currentIndex, currentIndex + itemsPerLoad).fadeIn();
			
			// Update the current index
			currentIndex += itemsPerLoad;
	
			// Hide the "Load More" button if all items are displayed
			if (currentIndex >= $('.th-game-loop').length) {
				$('#load-more-game-btn').hide();
			}
		});
	});
</script>

		<?php
		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="row gy-4">';
			foreach( $settings['game_lists_3'] as $data ){
				echo '<div class="col-lg-3 col-md-6">';
					echo '<div class="game-card style4">';
						echo '<div class="game-card-img" data-mask-src="'.BAME_ASSETS.'img/game_card4_img-shape.jpg">';
							if(!empty($data['choose_image']['url'])){
								echo '<a href="'.esc_url($data['link']['url']).'">';
									echo bame_img_tag( array(
										'url'   => esc_url( $data['choose_image']['url'] ),
									));
								echo '</a>';
							}
						echo '</div>';
						echo '<div class="game-card-details">';
							if( !empty($data['title']) ){
								echo '<h3 class="box-title"><a href="'.esc_url($data['link']['url']).'">'.esc_html($data['title']).'</a></h3>';
							}
							echo '<p class="game-content desc">';
								echo bame_img_tag( array(
									'url'   => esc_url( $data['choose_logo']['url'] ),
								));
								echo esc_html($data['label']);
							echo '</p>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		}


		

	}

}