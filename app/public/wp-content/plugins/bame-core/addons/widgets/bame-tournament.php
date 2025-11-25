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
 * Tournament Widget .
 *
 */
class Bame_Tournament extends Widget_Base {

	public function get_name() {
		return 'bametournament';
	}
	public function get_title() {
		return __( 'Tournament', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tournament_section',
			[
				'label'     => __( 'Tournament', 'bame' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One', 'Style Two', 'Style Three', 'Style Four' ] );

		bame_general_fields( $this, 'subtitle', 'Subitle', 'TEXTAREA2', '# Game Streaming Battle', ['1'] );
        bame_general_fields( $this, 'title', 'Title', 'TEXTAREA2', 'Our Gaming Tournaments', ['1'] );

		$this->add_control(
			'tournament_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'bame' ), 
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'tournament', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'bame' )
			]
        );
        $this->add_control(
			'tournament_post_order',
			[
				'label' 	=> __( 'Order', 'bame' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','bame'),
                    'DESC'   	=> __('DESC','bame'),
                ],
                'default'  	=> 'DESC'
			]
        );
        $this->add_control(
			'tournament_post_order_by',
			[
				'label' 	=> __( 'Order By', 'bame' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'bame' ),
                    'author'    => __( 'Author', 'bame' ),
                    'title'    	=> __( 'Title', 'bame' ),
                    'date'    	=> __( 'Date', 'bame' ),
                    'rand'    	=> __( 'Random', 'bame' ),
                ],
                'default'  	=> 'ID'
			]
        );

		$this->add_control(
			'show_all',
			[
				'label' 		=> __( 'Show All Tab?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'bame' ),
				'label_off' 	=> __( 'Hide', 'bame' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'all_title',
			[
				'label' 		=> __( 'Filter All Button Text', 'bame' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'ALL MATCH', 'bame' ),
				'condition'		=> [ 
					'show_all' => [ 'yes' ] ,
				],
			]
		);

		$this->add_control(
			'bame_display_filter_texts',
			[
				'label' 		=> __( 'UPCOMING & FINISHED Text Change?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'bame' ),
				'label_off' 	=> __( 'Hide', 'bame' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'bame_tournament_upcoming',
			[
				'label' 		=> __( 'Filter Upcoming Text', 'bame' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Upcoming', 'bame' ),
				'condition'		=> [ 
					'bame_display_filter_texts' => [ 'yes' ] ,
				],
			]
		);
		$this->add_control(
			'bame_tournament_finished',
			[
				'label' 		=> __( 'Filter Upcoming Text', 'bame' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Finished', 'bame' ),
				'condition'		=> [ 
					'bame_display_filter_texts' => [ 'yes' ] ,
				],
			]
		);
		$this->add_control(
			'bame_tournament_extra_title',
			[
				'label' 		=> __( 'Filter Button Extra Text', 'bame' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'MATCH', 'bame' ),
			]
		);
		$this->add_control(
			'bame_tournament_button',
			[
				'label' 		=> __( 'Filter Item Button Text', 'bame' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'WATCH MATCH', 'bame' ),
				'condition'		=> [ 
					'layout_style' => ['3', '4']
				],
			]
		);

		bame_media_fields( $this, 'shape', 'Choose Background Shape', ['2', '4'] );
		bame_media_fields( $this, 'shape2', 'Choose Background Shape', ['4'] );
		bame_media_fields( $this, 'shape3', 'Choose Team Logo Shape', ['4'] );
		bame_media_fields( $this, 'vs_logo', 'Choose Team V/S Logo', ['4'] );

        $this->end_controls_section();

        //---------------------------------------
			// Style Section Start 
		//---------------------------------------

		//-------Section Subtitle, Title Style-------
		bame_common_style_fields( $this, 'subtitle', 'Section Subitle', '{{WRAPPER}} .sub-title', ['1'] );
		bame_common_style_fields( $this, 'title', 'Section Title', '{{WRAPPER}} .sec-title', ['1'] );
		//-------Tournament Style-------
		bame_common2_style_fields( $this, 'title2', 'Title', '{{WRAPPER}} .title a' );
		bame_common_style_fields( $this, 'desc', 'Description', '{{WRAPPER}} .sub' ); 

		bame_button3_style_fields($this, '13', 'Button Styling', '{{WRAPPER}} .th_btn', ['3'] ); 


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$text_change      = $settings['bame_display_filter_texts'];
		$upcoming_text    = $settings['bame_tournament_upcoming'];
		$finished_text    = $settings['bame_tournament_finished'];
		$extra_text       = $settings['bame_tournament_extra_title'];

		$args = array(
			'post_type'             => 'tournament',
			'posts_per_page'        => esc_attr( $settings['tournament_post_count'] ),
			'order'                 => esc_attr( $settings['tournament_post_order'] ),
			'orderby'               => esc_attr( $settings['tournament_post_order_by'] ),
			'ignore_sticky_posts'   => true,
		);

		$tournament = new WP_Query( $args );

		if ( $settings['layout_style'] == '1' ) {
			echo '<div class="row justify-content-between">';
				echo '<div class="col-lg-auto">';
					echo '<div class="title-area text-lg-start text-center custom-anim-left wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
						if(!empty($settings['subtitle'])){
							echo '<span class="sub-title">'.wp_kses_post($settings['subtitle']).'</span>';
						}
						if(!empty($settings['title'])){
							echo '<h2 class="sec-title">'.wp_kses_post($settings['title']).'</h2>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="col-lg-auto">';
					echo '<div class="sec-btn custom-anim-right wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
						echo '<div class="tournament-filter-btn filter-menu filter-menu-active">';
							if(!empty($settings['show_all'])){
								$active = '';
								if(!empty($settings['all_title'])){
									$title = $settings['all_title'];
								}else{
									$title = 'All Games';
								}
								echo '<button data-filter="*" class="tab-btn active" type="button">'.wp_kses_post($title).'</button>';
							}else{
								$active = 'active';
							}

							$unique_statuses = array(); // Array to store unique status values
                    
							while ($tournament->have_posts()){
								$tournament->the_post(); 
								$post_id = get_the_ID();
							
								// Replace $prefix with the actual prefix used in your CMB2 fields
								$prefix = '_tournament_';
								$status = get_post_meta($post_id, $prefix . 'status', true);
							
								// Check if the status is not in the unique_statuses array, then display a button
								if (!in_array($status, $unique_statuses)) {
									$unique_statuses[] = $status; // Add the current status to the array
									echo '<button data-filter=".' . strtolower($status) . '" class="tab-btn" type="button">';
										// Check if $text_change is true, print custom text, otherwise print the status
										if ($text_change) {
											if ($status === 'upcoming') {
												echo esc_html($upcoming_text) . ' ' . wp_kses_post($extra_text);
											} elseif ($status === 'finished') {
												echo esc_html($finished_text) . ' ' . wp_kses_post($extra_text);
											}
										} else {
											echo strtoupper(esc_html($status)) . ' ' . wp_kses_post($extra_text);
										}
									echo '</button>';
								}
							}  
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row gy-4 filter-active">';
				while ($tournament->have_posts()){
					$tournament->the_post(); 
					$post_id = get_the_ID();
			
					// Replace $prefix with the actual prefix used in your CMB2 fields
					$prefix = '_tournament_';
			
					$image_url = get_post_meta($post_id, $prefix . 'image1', true);
					$subtitle = get_post_meta($post_id, $prefix . 'subtitle1', true);
					$title = get_post_meta($post_id, $prefix . 'title1', true);
			
					$image_url2 = get_post_meta($post_id, $prefix . 'image2', true);
					$subtitle2 = get_post_meta($post_id, $prefix . 'subtitle2', true);
					$title2 = get_post_meta($post_id, $prefix . 'title2', true);
			
					$vs_image = get_post_meta($post_id, $prefix . 'vs_image', true);
					$status = get_post_meta($post_id, $prefix . 'status', true);
					$time = get_post_meta($post_id, $prefix . 'time', true);
					$date = get_post_meta($post_id, $prefix . 'date', true);
					$points = get_post_meta($post_id, $prefix . 'points', true);

					$social_lists = get_post_meta($post_id, $prefix . 'tournament_repeat_group', true);

					echo '<div class="col-12 filter-item '. strtolower($status).'">';
						echo '<div class="tournament-card gradient-border">';
							echo '<div class="tournament-card-img">';
								echo '<img src="'.esc_url($image_url).'" alt="'.esc_attr__('tournament image', 'bame').'">';
								echo '<img src="'.esc_url($vs_image).'" alt="'.esc_attr__('tournament image', 'bame').'">';
								echo '<img src="'.esc_url($image_url2).'" alt="'.esc_attr__('tournament image', 'bame').'">';
							echo '</div>';
							echo '<div class="tournament-card-content">';
								echo '<div class="tournament-card-details">';
									echo '<div class="tournament-card-meta">';
										echo '<span class="tournament-card-tag">'.esc_html(ucfirst($status)).'</span>';
										echo '<span class="tournament-card-score gradient-border">'.esc_html($points).'</span>';
									echo '</div>';
									echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html(get_the_title()).'</a></h3>';
									echo '<p class="tournament-card-date sub">'.esc_html($date).'<span class="text-theme">'.esc_html($time).'</span></p>';
									echo '<div class="th-social">';
										if ($social_lists) {
											foreach ($social_lists as $data) {
												$social_icon = esc_attr($data[$prefix . 'social_icon']);
												$social_name = esc_html($data[$prefix . 'social_name']);
												$social_url  = esc_url($data[$prefix . 'social_url']);
												if ($social_url) {
													echo '<a href="'.$social_url.'"><i class="'.$social_icon.'"></i>'.$social_name.'</a>';
												}
											}
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="row justify-content-between">';
				echo '<div class="col-lg-12 custom-anim-top wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
					echo '<div class="tournament-filter-btn2  filter-menu filter-menu-active">';
						if(!empty($settings['show_all'])){
							$active = '';
							if(!empty($settings['all_title'])){
								$title = $settings['all_title'];
							}else{
								$title = 'All Games';
							}
							echo '<button data-filter="*" class="tab-btn th-btn style-border3 active" type="button">';
								echo '<span class="btn-border">'.wp_kses_post($title).'</span>';
							echo '</button>';
						}else{
							$active = 'active';
						}

						$unique_statuses = array(); // Array to store unique status values
                    
						while ($tournament->have_posts()){
							$tournament->the_post(); 
							$post_id = get_the_ID();
						
							// Replace $prefix with the actual prefix used in your CMB2 fields
							$prefix = '_tournament_';
							$status = get_post_meta($post_id, $prefix . 'status', true);
						
							// Check if the status is not in the unique_statuses array, then display a button
							if (!in_array($status, $unique_statuses)) {
								$unique_statuses[] = $status; // Add the current status to the array
						
								echo '<button data-filter=".' . strtolower($status) . '" class="tab-btn th-btn style-border3" type="button">';
									echo '<span class="btn-border">';
									
									// Check if $text_change is true, print custom text, otherwise print the status
									if ($text_change) {
										if ($status === 'upcoming') {
											echo esc_html($upcoming_text) . ' ' . wp_kses_post($extra_text);
										} elseif ($status === 'finished') {
											echo esc_html($finished_text) . ' ' . wp_kses_post($extra_text);
										}
									} else {
										echo strtoupper(esc_html($status)) . ' ' . wp_kses_post($extra_text);
									}
							
									echo '</span>';
								echo '</button>';
							}
						}  
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row gy-40 filter-active">';
				while ($tournament->have_posts()){
					$tournament->the_post(); 
					$post_id = get_the_ID();
			
					// Replace $prefix with the actual prefix used in your CMB2 fields
					$prefix = '_tournament_';
			
					$image_url = get_post_meta($post_id, $prefix . 'image1', true);
					$subtitle = get_post_meta($post_id, $prefix . 'subtitle1', true);
					$title = get_post_meta($post_id, $prefix . 'title1', true);
			
					$image_url2 = get_post_meta($post_id, $prefix . 'image2', true);
					$subtitle2 = get_post_meta($post_id, $prefix . 'subtitle2', true);
					$title2 = get_post_meta($post_id, $prefix . 'title2', true);
			
					$vs_image = get_post_meta($post_id, $prefix . 'vs_image', true);
					$status = get_post_meta($post_id, $prefix . 'status', true);
					$time = get_post_meta($post_id, $prefix . 'time', true);
					$date = get_post_meta($post_id, $prefix . 'date', true);
					$points = get_post_meta($post_id, $prefix . 'points', true);

					echo '<div class="col-12 filter-item '. strtolower($status).'">';
						echo '<div class="tournament-card style2">';
							echo '<div class="tournament-card-img">';
								echo '<img src="'.esc_url($image_url).'" alt="'.esc_attr__('tournament image', 'bame').'">';
							echo '</div>';
							echo '<div class="tournament-card-versus">';
								echo '<img src="'.esc_url($vs_image).'" alt="'.esc_attr__('tournament image', 'bame').'">';
							echo '</div>';
							echo '<div class="tournament-card-content">';
								echo '<div class="tournament-card-details" data-mask-src="'.get_template_directory_uri().'/assets/img/bg/tournament-card2-bg.png">';
									echo '<div class="card-title-wrap text-md-end">';
										echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle).'</h6>';
										echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title).'</a></h3>';
									echo '</div>';

									echo '<div class="tournament-card-date-wrap">';
										echo '<h2 class="tournament-card-time">'.esc_html($time).'</h2>';
										echo '<p class="tournament-card-date">'.esc_html($date).'</p>';
									echo '</div>';
									echo '<div class="card-title-wrap">';
										echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle2).'</h6>';
										echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title2).'</a></h3>';
									echo '</div>';
								echo '</div>';
								echo '<div class="tournament-card-meta">';
									echo '<span class="tournament-card-tag gradient-border">'.esc_html(ucfirst($status)).'</span>';
									echo '<span class="tournament-card-score gradient-border">'.esc_html($points).'</span>';
								echo '</div>';
							echo '</div>';
							echo '<div class="tournament-card-img">';
								echo '<img src="'.esc_url($image_url2).'" alt="'.esc_attr__('tournament image', 'bame').'">';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		} elseif ( $settings['layout_style'] == '3' ){
			echo '<div class="row justify-content-center">';
				echo '<div class="col-lg-auto custom-anim-top wow">';
					echo '<div class="game-filter-btn filter-menu filter-menu-active">';
						if(!empty($settings['show_all'])){
							$active = '';
							if(!empty($settings['all_title'])){
								$title = $settings['all_title'];
							}else{
								$title = 'All Games';
							}
							echo '<button data-filter="*" class="tab-btn active" type="button">';
								echo '<span class="btn-border">'.wp_kses_post($title).'</span>';
							echo '</button>';
						}else{
							$active = 'active';
						}

						$unique_statuses = array(); // Array to store unique status values
					
						while ($tournament->have_posts()){
							$tournament->the_post(); 
							$post_id = get_the_ID();
						
							// Replace $prefix with the actual prefix used in your CMB2 fields
							$prefix = '_tournament_';
							$status = get_post_meta($post_id, $prefix . 'status', true);
						
							// Check if the status is not in the unique_statuses array, then display a button
							if (!in_array($status, $unique_statuses)) {
								$unique_statuses[] = $status; // Add the current status to the array
						
								echo '<button data-filter=".' . strtolower($status) . '" class="tab-btn" type="button">';
									echo '<span class="btn-border">';
									
									// Check if $text_change is true, print custom text, otherwise print the status
									if ($text_change) {
										if ($status === 'upcoming') {
											echo esc_html($upcoming_text) . ' ' . wp_kses_post($extra_text);
										} elseif ($status === 'finished') {
											echo esc_html($finished_text) . ' ' . wp_kses_post($extra_text);
										}
									} else {
										echo strtoupper(esc_html($status)) . ' ' . wp_kses_post($extra_text);
									}
							
									echo '</span>';
								echo '</button>';
							}
						}  
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row gy-30 filter-active">';
				while ($tournament->have_posts()){
					$tournament->the_post(); 
					$post_id = get_the_ID();
			
					// Replace $prefix with the actual prefix used in your CMB2 fields
					$prefix = '_tournament_';
			
					$image_url = get_post_meta($post_id, $prefix . 'image1', true);
					$subtitle = get_post_meta($post_id, $prefix . 'subtitle1', true);
					$title = get_post_meta($post_id, $prefix . 'title1', true);
			
					$image_url2 = get_post_meta($post_id, $prefix . 'image2', true);
					$subtitle2 = get_post_meta($post_id, $prefix . 'subtitle2', true);
					$title2 = get_post_meta($post_id, $prefix . 'title2', true);
			
					$vs_image = get_post_meta($post_id, $prefix . 'vs_image', true);
					$status = get_post_meta($post_id, $prefix . 'status', true);
					$time = get_post_meta($post_id, $prefix . 'time', true);
					$date = get_post_meta($post_id, $prefix . 'date', true);
					$points = get_post_meta($post_id, $prefix . 'points', true);

					$social_lists = get_post_meta($post_id, $prefix . 'tournament_repeat_group', true);
					
					echo '<div class="col-12 filter-item '. strtolower($status).'">';
						echo '<div class="tournament-card style4">';
							echo '<div class="tournament-player-wrap">';
								echo '<div class="card-title-wrap">';
									echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle).'</h6>';
									echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title).'</a></h3>';
								echo '</div>';
								echo '<div class="tournament-card-img">';
									echo '<img src="'.esc_url($image_url).'" alt="'.esc_attr__('tournament image', 'bame').'">';
								echo '</div>';
							echo '</div>';
							echo '<div class="tournament-card-content">';
								echo '<div class="tournament-card-meta">';
									echo '<span class="tournament-card-tag">'.esc_html(ucfirst($status)).'</span>';
								echo '</div>	';
								echo '<h6 class="tournament-card-date">'.esc_html($date).'<span class="tournament-card-time">'.esc_html($time).'</span></h6>';
								echo '<div class="th-social">';
									if ($social_lists) {
										foreach ($social_lists as $data) {
											$social_icon = esc_attr($data[$prefix . 'social_icon']);
											$social_name = esc_html($data[$prefix . 'social_name']);
											$social_url  = esc_url($data[$prefix . 'social_url']);
											if ($social_url) {
												echo '<a href="'.$social_url.'"><i class="'.$social_icon.'"></i>'.$social_name.'</a>';
											}
										}
									}
								echo '</div>';
								if(!empty($settings['bame_tournament_button'])){
								echo '<a href="'.esc_url( get_permalink() ).'" class="th-btn th_btn style-border3">';
									echo '<span class="btn-border">'.wp_kses_post($settings['bame_tournament_button']).'</span>';
								echo '</a>';
								}
							echo '</div>';
							echo '<div class="tournament-player-wrap2">';
								echo '<div class="card-title-wrap">';
									echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle2).'</h6>';
									echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title2).'</a></h3>';
								echo '</div>';
								echo '<div class="tournament-card-img">';
									echo '<img src="'.esc_url($image_url2).'" alt="'.esc_attr__('tournament image', 'bame').'">';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

		} elseif ( $settings['layout_style'] == '4' ){
			echo '<div class="row justify-content-center">';
				echo '<div class="col-lg-auto custom-anim-top wow">';
					echo '<div class="game-filter-btn style2 filter-menu filter-menu-active">';
						if(!empty($settings['show_all'])){
							$active = '';
							if(!empty($settings['all_title'])){
								$title = $settings['all_title'];
							}else{
								$title = 'All Games';
							}
							echo '<button data-filter="*" class="tab-btn active" type="button">';
								echo '<span class="btn-border">'.wp_kses_post($title).'</span>';
							echo '</button>';
						}else{
							$active = 'active';
						}

						$unique_statuses = array(); // Array to store unique status values
					
						while ($tournament->have_posts()){
							$tournament->the_post(); 
							$post_id = get_the_ID();
						
							// Replace $prefix with the actual prefix used in your CMB2 fields
							$prefix = '_tournament_';
							$status = get_post_meta($post_id, $prefix . 'status', true);
						
							// Check if the status is not in the unique_statuses array, then display a button
							if (!in_array($status, $unique_statuses)) {
								$unique_statuses[] = $status; // Add the current status to the array
						
								echo '<button data-filter=".' . strtolower($status) . '" class="tab-btn" type="button">';
									echo '<span class="btn-border">';
									
									// Check if $text_change is true, print custom text, otherwise print the status
									if ($text_change) {
										if ($status === 'upcoming') {
											echo esc_html($upcoming_text) . ' ' . wp_kses_post($extra_text);
										} elseif ($status === 'finished') {
											echo esc_html($finished_text) . ' ' . wp_kses_post($extra_text);
										}
									} else {
										echo strtoupper(esc_html($status)) . ' ' . wp_kses_post($extra_text);
									}
							
									echo '</span>';
								echo '</button>';
							}
						}  
					echo '</div>';
				echo '</div>';
			echo '</div>';

			echo '<div class="row gy-4 filter-active">';
				while ($tournament->have_posts()){
					$tournament->the_post(); 
					$post_id = get_the_ID();
			
					// Replace $prefix with the actual prefix used in your CMB2 fields
					$prefix = '_tournament_';
			
					$image_url = get_post_meta($post_id, $prefix . 'image1', true);
					$subtitle = get_post_meta($post_id, $prefix . 'subtitle1', true);
					$title = get_post_meta($post_id, $prefix . 'title1', true);
			
					$image_url2 = get_post_meta($post_id, $prefix . 'image2', true);
					$subtitle2 = get_post_meta($post_id, $prefix . 'subtitle2', true);
					$title2 = get_post_meta($post_id, $prefix . 'title2', true);
			
					$vs_image = get_post_meta($post_id, $prefix . 'vs_image', true);
					$status = get_post_meta($post_id, $prefix . 'status', true);
					$time = get_post_meta($post_id, $prefix . 'time', true);
					$date = get_post_meta($post_id, $prefix . 'date', true);
					$points = get_post_meta($post_id, $prefix . 'points', true);

					$social_lists = get_post_meta($post_id, $prefix . 'tournament_repeat_group', true);

					echo '<div class="col-lg-6 col-md-12 filter-item '. strtolower($status).' tour-all">';
						echo '<div class="tournament-card style5 style5-2">';
							echo '<div class="tournament-card-shape" data-bg-src="'.esc_url($settings['shape']['url']).'"></div>';
							echo '<div class="tournament-card-shape2" data-bg-src="'.esc_url($settings['shape2']['url']).'"></div>';
							echo '<div class="tournament-player-wrap">';
								echo '<div class="tournament-card-img" data-bg-src="'.esc_url($settings['shape3']['url']).'">';
									echo '<img src="'.esc_url($image_url).'" alt="'.esc_attr__('tournament image', 'bame').'">';
								echo '</div>';
								echo '<div class="card-title-wrap">';
									echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle).'</h6>';
									echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title).'</a></h3>';
								echo '</div>';
							echo '</div>';
							echo '<div class="tournament-card-versus">';
								if(!empty($settings['vs_logo']['url'])){
									echo bame_img_tag( array(
										'url'   => esc_url( $settings['vs_logo']['url'] ),
									));
								}else{
									echo '<img src="'.esc_url($vs_image).'" alt="'.esc_attr__('tournament image', 'bame').'">';
								}
							echo '</div>';
							echo '<div class="tournament-player-wrap style2">';
								echo '<div class="tournament-card-img" data-bg-src="'.esc_url($settings['shape3']['url']).'">';
									echo '<img src="'.esc_url($image_url2).'" alt="'.esc_attr__('tournament image', 'bame').'">';
								echo '</div>';
								echo '<div class="card-title-wrap">';
									echo '<h6 class="tournament-card-subtitle sub">'.esc_html($subtitle2).'</h6>';
									echo '<h3 class="tournament-card-title title"><a href="'.esc_url( get_permalink() ).'">'.esc_html($title2).'</a></h3>';
								echo '</div>';
							echo '</div>';
							echo '<div class="tournament-card-content">';
								echo '<div class="tournament-card-details">';
									echo '<h6 class="tournament-card-time">'.esc_html($time).'</h6>';
									echo '<p class="tournament-card-date">'.esc_html($date).'</p>';
								echo '</div>';
								if(!empty($settings['bame_tournament_button'])){
									echo '<div class="btn-wrap">';
										echo '<a href="'.esc_url( get_permalink() ).'" class="th-btn th_btn style-border3">';
											echo '<span class="btn-border">'.wp_kses_post($settings['bame_tournament_button']).'</span>';
										echo '</a>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
            echo '</div>';

		}

		?>

		<?php

	}
}