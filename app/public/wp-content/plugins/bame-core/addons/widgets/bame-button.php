<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget 
 *
 */
class bame_Button extends Widget_Base {

	public function get_name() {
		return 'bamebutton';
	}
	public function get_title() {
		return __( 'Button', 'bame' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'bame' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'bame' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		bame_select_field( $this, 'layout_style', 'Layout Style',['Style One', 'Style Two', 'Style Three'] );

		bame_general_fields($this, 'button_text', 'Button Text', 'TEXT', 'Button Text');
		bame_url_fields($this, 'button_url', 'Button URL');
		bame_general_fields($this, 'button_icon', 'Button Icon Class', 'TEXT', '');

		$this->add_control(
			'button_icon_position',
			[
				'label' 	=> __( 'Button Icon Position', 'bame' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '2',
				'options' 	=> [
					'1'  		=> __( 'Before Text', 'bame' ),
					'2' 		=> __( 'After Text', 'bame' ),
				],
			]
		);

		$this->add_control(
			'button_space',
			[
				'label' => esc_html__( 'Button Icon Spacing (PX)', 'bame' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 8,
				],
				'selectors' => [
					'{{WRAPPER}} .th_btn i' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				'condition'	=> [
					'button_icon_position' => ['1']
				]	
			]
		);

		$this->add_control(
			'button_space2',
			[
				'label' => esc_html__( 'Button Icon Spacing (PX)', 'bame' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 8,
				],
				'selectors' => [
					'{{WRAPPER}} .th_btn i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition'	=> [
					'button_icon_position' => ['2']
				]	
			]
		);

        $this->add_responsive_control(
			'button_align',
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
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper' => 'text-align: {{VALUE}}',
                ],
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
		bame_general_fields($this, 'button_extra_class', 'Button Extra Class', 'TEXT', '');

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//------Button Style-------
		bame_button_style_fields($this, '10', 'Button Styling', '{{WRAPPER}} .th_btn', ['1'] );
		bame_button2_style_fields($this, '12', 'Button Styling', '{{WRAPPER}} .th_btn', ['2'] );
		bame_button3_style_fields($this, '13', 'Button Styling', '{{WRAPPER}} .th_btn', ['3'] );
		

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'button', 'class', 'th-btn th_btn' );
		$this->add_render_attribute( 'button', 'class', $settings['button_extra_class'] );
		

		$this->add_render_attribute( 'wrapper', 'class', 'btn-wrapper' );
		$this->add_render_attribute( 'wrapper', 'class', $settings['wrap_class'] );
		if(!empty($settings['show_animation'])){
			$this->add_render_attribute( 'wrapper', 'class', $settings['animation_effects'] );
			$this->add_render_attribute( 'wrapper', 'class', 'wow ' );
	
			if( ! empty( $settings['duration'] ) ) {
				$this->add_render_attribute( 'wrapper', 'data-wow-duration', esc_html( $settings['duration'] ).'s' );
			}
			if( ! empty( $settings['delay'] ) ) {
				$this->add_render_attribute( 'wrapper', 'data-wow-delay', esc_html( $settings['delay'] ).'s' );
			}
		}

        if( ! empty( $settings['button_url']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_url']['url'] ) );
        }
        if( ! empty( $settings['button_url']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
        if( ! empty( $settings['button_url']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

		echo '<div '.$this->get_render_attribute_string('wrapper').'>';
        	
			if( ! empty( $settings['button_text'] ) ) {
				echo '<a '.$this->get_render_attribute_string('button').'>';
					if( $settings['layout_style'] == '2' || $settings['layout_style'] == '3' ){
						echo '<span class="btn-border">';
					}
						if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '1'  ){
							echo wp_kses_post($settings['button_icon']);
						}

							echo esc_html( $settings['button_text'] );

						if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '2'  ){
							echo wp_kses_post($settings['button_icon']);
						}
					if( $settings['layout_style'] == '2' || $settings['layout_style'] == '3' ){
						echo '</span>';
					}
				echo '</a>';
			}

		echo '</div>';

	}

}