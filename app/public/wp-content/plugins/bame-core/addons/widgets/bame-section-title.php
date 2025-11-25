<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Bame_Section_Title extends Widget_Base {

	public function get_name() {
		return 'bamesectiontitle';
	}
	public function get_title() {
		return __( 'Section Title', 'bame' );
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
				'label'		 	=> __( 'Section Title', 'bame' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style', [ 'Style One', 'Style Two', 'Style Three' ] );

		bame_general_fields($this, 'section_subtitle', 'Subtitle', 'TEXT', 'Subtitle');
		bame_general_fields($this, 'section_shadow_text', 'Shadow Text', 'TEXT', 'Section', ['3']);
		bame_general_fields($this, 'heading', 'Animation Disabled for Shadow Text work properly? use text-center wrap class for center', 'HEADING', 'Section', ['3']);
		bame_general_fields($this, 'section_title', 'Title', 'TEXTAREA', 'Title Here');
		
        $this->add_control(
			'section_title_tag', 
			[
				'label' 	=> __( 'Title Tag', 'bame' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'span'  => 'span',
				],
				'default' => 'h2',
			]
        );

		bame_general_fields($this, 'section_desc', 'Description', 'TEXTAREA', '');


        $this->add_responsive_control(
			'section_align',
			[
				'label' 		=> __( 'Alignment', 'bame' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'bame' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'bame' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'bame' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> '',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .title-area' => 'text-align: {{VALUE}};',
                ]
			]
		);

		$this->add_control(
			'show_animation',
			[
				'label' 		=> __( 'Animation?', 'bame' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enabled', 'bame' ),
				'label_off' 	=> __( 'Disabled', 'bame' ),
				'return_value' 	=> 'yes',
			]
		);
		$this->add_control(
			'animation_effects',
			[
				'label' 		=> __( 'Animation Effects?', 'bame' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'custom-anim-top'    	=> __( 'Animation Top', 'bame' ),
                    'custom-anim-right'    	=> __( 'Animation Right', 'bame' ),
                    'custom-anim-left'    	=> __( 'Animation Left', 'bame' ),
                    'custom-anim-bottom'    => __( 'Animation Bottom', 'bame' ),
                ],
                'default'  	=> 'custom-anim-left',
				'condition'		=> [ 
					'show_animation' => [ 'yes' ] ,
				],
			]
        );
		$this->add_control(
			'duration',
			[
				'label' 		=> __( 'Duration Time (Second)', 'bame' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> __( '1.5', 'bame' ),
				'condition'		=> [ 
					'show_animation' => [ 'yes' ] ,
				],
			]
		);
		$this->add_control(
			'delay',
			[
				'label' 		=> __( 'Delay Time (Second)', 'bame' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> __( '.2', 'bame' ),
				'condition'		=> [ 
					'show_animation' => [ 'yes' ] ,
				],
			]
		);

		bame_general_fields($this, 'wrap_class', 'Wraper Extra Class', 'TEXT', '');
		bame_general_fields($this, 'section_subtitle_class', 'Subtitle Extra Class', 'TEXT', '');
		bame_general_fields($this, 'section_desc_class', 'Description Class', 'TEXT', '');

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------General Style-----------------------//
        $this->start_controls_section(
			'general_style_section',
			[
				'label' => __( 'General Style', 'bame' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		bame_dimensions_fields($this, 'menu_margin', 'Margin', 'margin', '{{WRAPPER}} .title-area');

		$this->end_controls_section();

		//-------Subtitle Style-------
		bame_common_style_fields($this, 'subtitle', 'Subtitle', '{{WRAPPER}} .sub-title', '','--theme-color');
		//-------Title Style-------
		bame_common_style_fields($this, 'title', 'Title', '{{WRAPPER}} .sec-title');
		//-------Description Style-------
		bame_common_style_fields($this, 'desc', 'Description', '{{WRAPPER}} p');

	}

	protected function render() {

	$settings = $this->get_settings_for_display();


	$this->add_render_attribute( 'wrapper', 'class', 'title-area' );
	$this->add_render_attribute( 'wrapper', 'class', $settings['wrap_class'] );
	
	if(!empty($settings['show_animation'])){
		$this->add_render_attribute( 'wrapper', 'class', $settings['animation_effects'] );
		$this->add_render_attribute( 'wrapper', 'class', 'wow' );

		if( ! empty( $settings['duration'] ) ) {
			$this->add_render_attribute( 'wrapper', 'data-wow-duration', esc_html( $settings['duration'] ).'s' );
		}
		if( ! empty( $settings['delay'] ) ) {
			$this->add_render_attribute( 'wrapper', 'data-wow-delay', esc_html( $settings['delay'] ).'s' );
		}
	}

	$this->add_render_attribute( 'subtitle_args', 'class', 'sub-title '. $settings['section_subtitle_class'] );
	$this->add_render_attribute( 'title_args', 'class', 'sec-title' );

		echo '<div '.$this->get_render_attribute_string('wrapper').'>';
				if ( !empty($settings['section_subtitle' ]) ){
					echo '<span '.$this->get_render_attribute_string( 'subtitle_args' ).'>';
						if( $settings['layout_style'] == '2' || $settings['layout_style'] == '3' ){
							echo '<span class="sub-title-shape icon-masking">';
								echo '<span class="mask-icon" data-mask-src="'.BAME_ASSETS.'img/section-title-bg.svg"></span>';
							echo '</span>';
						}
						echo wp_kses_post( $settings['section_subtitle' ] );
					echo '</span>';
				}
			
				if ( !empty($settings['section_title' ]) ){
					printf( '<%1$s %2$s>%3$s</%1$s>',
					$settings['section_title_tag'],
					$this->get_render_attribute_string( 'title_args' ),
					wp_kses_post( $settings['section_title' ] )
					);
				}

				if( $settings['layout_style'] == '3' ){
					if ( !empty($settings['section_shadow_text' ]) ){
						echo '<div class="shadow-title">'.wp_kses_post( $settings['section_shadow_text'] ).'</div>';
					}
				}

				if( ! empty( $settings['section_desc'] ) ){
					echo bame_paragraph_tag( array(
						'text'	=> wp_kses_post( $settings['section_desc'] ),
						'class'	=> esc_attr($settings['section_desc_class']),
					) );
				}
		echo '</div>';

		
	}
}