<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Tab Builder Widget .
 *
 */
class bame_Tab_Builder extends Widget_Base {

	public function get_name() {
		return 'bametabbuilder';
	}
	public function get_title() {
		return __( 'Tab Builder', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
    public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tab_builder_section',
			[
				'label' 	=> __( 'Tab Builder', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two'] );

		$repeater = new Repeater();

		bame_general_fields($repeater, 'tab_builder_text', 'Tab Builder Title', 'TEXTAREA', 'Tab Title');

		$repeater->add_control(
			'bame_tab_builder_option',
			[
				'label'     => __( 'Tab Name', 'bame' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->bame_tab_builder_choose_option(),
				'default'	=> ''
			]
		);

		$this->add_control(
			'tab_builder_repeater',
			[
				'label' 		=> __( 'Tab', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_builder_text'    => __( 'Residential Pool Services', 'bame' ),
					],
					
				],
				'title_field' 	=> '{{{ tab_builder_text }}}',
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
		);

		$repeater = new Repeater();

		bame_media_fields($repeater, 'image', 'Choose Image');

		$repeater->add_control(
			'bame_tab_builder_option',
			[
				'label'     => __( 'Tab Name', 'bame' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->bame_tab_builder_choose_option(),
				'default'	=> ''
			]
		);

		$this->add_control(
			'tab_builder_repeater_2',
			[
				'label' 		=> __( 'Tab', 'bame' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'condition'	=> [
					'layout_style' => ['2']
				]
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

    }

	public function bame_tab_builder_choose_option(){

		$bame_post_query = new WP_Query( array(
			'post_type'				=> 'bame_tab_builder',
			'posts_per_page'	    => -1,
		) );

		$bame_tab_builder_title = array();
		$bame_tab_builder_title[''] = __( 'Select a Tab','Foodelio');

		while( $bame_post_query->have_posts() ) {
			$bame_post_query->the_post();
			$bame_tab_builder_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $bame_tab_builder_title;

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){
			echo '<div class="nav nav-tabs service-tabs" id="nav-tab" role="tablist">';
				$x = 0;
				foreach( $settings['tab_builder_repeater'] as $single_menu ){
					$x++;
					$active = $x == '1' ? 'active':'';
					echo '<button class="nav-link th-btn '.$active.'" id="nav-step'.esc_attr($x).'-tab" data-bs-toggle="tab" data-bs-target="#nav-step'.esc_attr($x).'" type="button">'.esc_html( $single_menu['tab_builder_text'] ).'</button>';
				}
			echo '</div>';

			echo '<div class="tab-content" id="nav-tabContent">';
				$x = 0;
				foreach( $settings['tab_builder_repeater'] as $single_menu ){
					$x++;
					$active = $x == '1' ? 'active show':'';
					echo '<div class="tab-pane fade '.$active.'" id="nav-step'.esc_attr($x).'" role="tabpanel">';
						$elementor = \Elementor\Plugin::instance();
						if( ! empty( $single_menu['bame_tab_builder_option'] ) ){
							echo $elementor->frontend->get_builder_content_for_display( $single_menu['bame_tab_builder_option'] );
						}
					echo '</div>';
				}
			echo '</div>';

		}elseif( $settings['layout_style'] == '2' ){
			echo '<ul class="nav nav-tabs team-tab custom-anim-top wow " data-wow-duration="1.5s" data-wow-delay="0.2s">';
				$x = 0;
				foreach( $settings['tab_builder_repeater_2'] as $data ){
					$x++;
					$active = $x == '3' ? 'active':'';
					echo '<li class="nav-item" role="presentation">';
						echo '<button class="nav-link '.$active.'" id="team-tab'.esc_attr($x).'" data-bs-toggle="tab" data-bs-target="#teamTab'.esc_attr($x).'" type="button" role="tab" aria-selected="false">';
							echo bame_img_tag( array(
								'url'   => esc_url( $data['image']['url'] ),
							));
						echo '</button>';
					echo '</li>';
				}
			echo '</ul>';

			echo '<div class="tab-content">';
				$x = 0;
				foreach( $settings['tab_builder_repeater_2'] as $data ){
					$x++;
					$active = $x == '1' ? 'show active':'';
					echo '<div class="tab-pane fade '.$active.'" id="teamTab'.esc_attr($x).'" role="tabpanel"  aria-labelledby="team-tab'.esc_attr($x).'">';
						$elementor = \Elementor\Plugin::instance();
						if( ! empty( $data['bame_tab_builder_option'] ) ){
							echo $elementor->frontend->get_builder_content_for_display( $data['bame_tab_builder_option'] );
						}
					echo '</div>';
				}
			echo '</div>';

		}

      
	}
}