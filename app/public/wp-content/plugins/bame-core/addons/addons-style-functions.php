<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;  

// Color field
// bame_color_fields($th, $id, $label, $property, $selector, $condition = null);
if (!function_exists('bame_color_fields')) {
    function bame_color_fields($th, $id, $label, $property, $selector, $condition = null) {
        $control_args = [
            'label'      => __( $label, 'bame' ),
            'type'       => Controls_Manager::COLOR,
            'selectors'  => [
                $selector => $property . ': {{VALUE}};',
            ],
        ];

        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }

        $th->add_control($id, $control_args);
    }
}

// Typography field
// bame_typography_fields($th, $id, $label, $selector, $condition = null);
if (!function_exists('bame_typography_fields')) {
    function bame_typography_fields($th, $id, $label, $selector, $condition = null) {
        $control_args = [
            'name' 		=> $id,
            'label'      => __( $label, 'bame' ),
            'selector' 	=>  $selector,
        ];

        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }

        $th->add_group_control(Group_Control_Typography::get_type(), $control_args);
    }
}

// Dimensions field - margin, padding, border-radious
// bame_dimensions_fields($th, $id, $label, $property, $selector, $condition = null);
if (!function_exists('bame_dimensions_fields')) {
    function bame_dimensions_fields($th, $id, $label, $property, $selector, $condition = null) {
        $control_args = [
            'label'      => __( $label, 'bame' ),
            'type' 			=> Controls_Manager::DIMENSIONS,
            'size_units' 	=> [ 'px', '%', 'em' ],
            'selectors' 	=> [
                $selector => $property . ': {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ];

        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }

        $th->add_responsive_control($id, $control_args);
    }
}

// Common Style fields - Color, Typography, Margin & padding
// bame_common_style_fields($th, $id, $label, $selector, $condition = null, $p = 'color');
if (!function_exists('bame_common_style_fields')) {
    function bame_common_style_fields($th, $id, $label, $selector, $condition = null, $p = 'color') {
       
        $control_args = [
            'label'      => __( $label, 'bame' ),
            'tab' 		=> Controls_Manager::TAB_STYLE,
        ];
        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }
        $th->start_controls_section($id.'title_style_section', $control_args);

		$th->add_control(
			$id.'color',
			[
				'label' 	=> __( 'Color', 'bame' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors'  => [
					$selector => $p . ': {{VALUE}}',
				],
			]
        );

		$th->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> $id.'typography',
				'label' 	=> __( 'Typography', 'bame' ),
				'selector' 	=> $selector
			]
		);

		$th->add_responsive_control(
			$id.'margin',
			[
				'label' 		=> __( 'Margin', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->add_responsive_control(
			$id.'padding',
			[
				'label' 		=> __( 'Padding', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->end_controls_section();

    }
}

// Common2 Style fields - Color, Hover Color, Typography, Margin & padding
// bame_common2_style_fields($th, $id, $label, $selector, $condition = null, $p = 'color', $p2 = 'color')
if (!function_exists('bame_common2_style_fields')) {
    function bame_common2_style_fields($th, $id, $label, $selector, $condition = null, $p = 'color', $p2 = 'color') {
       
        $control_args = [
            'label'      => __( $label, 'bame' ),
            'tab' 		=> Controls_Manager::TAB_STYLE,
        ];
        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }
        $th->start_controls_section($id.'title_style_section', $control_args);

		$th->add_control(
			$id.'color',
			[
				'label' 	=> __( 'Color', 'bame' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors'  => [
					$selector => $p . ': {{VALUE}}',
				],
			]
        );

		$th->add_control(
			$id.'hover_color',
			[
				'label' 	=> __( 'Hover Color', 'bame' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors'  => [
					$selector . ':hover' => $p2 . ': {{VALUE}}',
				],
			]
        );

		$th->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> $id.'typography',
				'label' 	=> __( 'Typography', 'bame' ),
				'selector' 	=> $selector
			]
		);

		$th->add_responsive_control(
			$id.'margin',
			[
				'label' 		=> __( 'Margin', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->add_responsive_control(
			$id.'padding',
			[
				'label' 		=> __( 'Padding', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->end_controls_section();

    }
}



// Button Style field
// bame_button_style_fields($th, $id, $label, $selector, $condition = null)
if (!function_exists('bame_button_style_fields')) {
    function bame_button_style_fields($th, $id, $label, $selector, $condition = null) {
       
        $control_args = [
            'label'      => __( $label, 'bame' ),
            'tab' 		=> Controls_Manager::TAB_STYLE,
        ];
        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }

        $th->start_controls_section($id.'button_style_section', $control_args);

		$th->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> $id.'button_typography',
				'label' 	=> __( 'Typography', 'bame' ),
				'selector' 	=> $selector
			]
		);

		$th->start_controls_tabs(
			$id.'style_tabs'
		);

			$th->start_controls_tab(
				$id.'first_style_tab',
				[
					'label' => esc_html__( 'Normal', 'bame' ),
				]
			);

			$th->add_control(
				$id.'button_color',
				[
					'label' 		=> __( 'Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector => 'color: {{VALUE}}',
					],
				]
			);
	
			$th->add_control(
				$id.'button_bg',
				[
					'label' 		=> __( 'Background Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector => 'background-color:{{VALUE}}',
					],
				]
			);

			$th->add_control(
				$id.'button_line_bg',
				[
					'label' 		=> __( 'Line Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':before' => 'background-color:{{VALUE}}',
						$selector. ':after' => 'background-color:{{VALUE}}',
					],
				]
			);

			$th->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => $id.'border',
					'selector' => $selector
				]
			);

			$th->end_controls_tab();

			//--------------------secound--------------------//
			$th->start_controls_tab(
				$id.'sec_style_tab',
				[
					'label' => esc_html__( 'Hover', 'bame' ),
				]
			);

			$th->add_control(
				$id.'button_h_color',
				[
					'label' 		=> __( 'Hover Color ', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
                        $selector . ':hover' => 'color:{{VALUE}} !important',
					],
				]
			);

			$th->add_control(
				$id.'button_hover_bg',
				[
					'label' 		=> __( 'Background Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' => [
                        $selector . ':hover' => 'background:{{VALUE}} !important',
                    ],
				]
			);

			$th->add_control(
				$id.'button_line_hover_bg',
				[
					'label' 		=> __( 'Line Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':hover:before' => 'background-color:{{VALUE}}',
						$selector. ':hover:after' => 'background-color:{{VALUE}}',
					],
				]
			);

			$th->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => $id.'border2',
					'selector' => $selector.':hover',
				]
			);

			$th->end_controls_tab();

		$th->end_controls_tabs();

		$th->add_control(
			$id.'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$th->add_responsive_control(
			$id.'button_margin',
			[
				'label' 		=> __( 'Margin', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->add_responsive_control(
			$id.'button_padding',
			[
				'label' 		=> __( 'Padding', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$th->add_responsive_control(
			$id.'button_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->end_controls_section();

    }
}


// Button border Style field
// bame_button2_style_fields($th, $id, $label, $selector, $condition = null)
if (!function_exists('bame_button2_style_fields')) {
    function bame_button2_style_fields($th, $id, $label, $selector, $condition = null) {
       
        $control_args = [
            'label'      => __( $label, 'bame' ),
            'tab' 		=> Controls_Manager::TAB_STYLE,
        ];
        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }

        $th->start_controls_section($id.'button_style_section', $control_args);

		$th->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> $id.'button_typography',
				'label' 	=> __( 'Typography', 'bame' ),
				'selector' 	=> $selector
			]
		);

		$th->start_controls_tabs(
			$id.'style_tabs'
		);

			$th->start_controls_tab(
				$id.'first_style_tab',
				[
					'label' => esc_html__( 'Normal', 'bame' ),
				]
			);

			$th->add_control(
				$id.'button_color2',
				[
					'label' 		=> __( 'Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ' .btn-border' => '--theme-color: {{VALUE}} !important',
					],
				]
			);
	
			$th->add_control(
				$id.'button_bg2',
				[
					'label' 		=> __( 'Background Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ' .btn-border' => '--title-color:{{VALUE}} !important',
					],
				]
			);

			$th->add_control(
				$id.'button_border_line_bg2',
				[
					'label' 		=> __( 'Border Line Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector  => '--white-color:{{VALUE}}',
					],
				]
			);

			$th->add_control(
				$id.'button_line_bg2',
				[
					'label' 		=> __( 'Line Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':before' => 'background-color:{{VALUE}}',
						$selector. ':after' => 'background-color:{{VALUE}}',
					],
				]
			);

			// $th->add_group_control(
			// 	\Elementor\Group_Control_Border::get_type(),
			// 	[
			// 		'name' => $id.'border',
			// 		'selector' => $selector
			// 	]
			// );

			$th->end_controls_tab();

			//--------------------secound--------------------//
			$th->start_controls_tab(
				$id.'sec_style_tab',
				[
					'label' => esc_html__( 'Hover', 'bame' ),
				]
			);

			$th->add_control(
				$id.'button_h_color22',
				[
					'label' 		=> __( 'Hover Color ', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ' .btn-border:hover' => '--theme-color: {{VALUE}} !important',
					],
				]
			);

			$th->add_control(
				$id.'button_hover_bg22',
				[
					'label' 		=> __( 'Background Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' => [
						$selector. ' .btn-border:hover' => '--title-color:{{VALUE}} !important',
                    ],
				]
			);

			$th->add_control(
				$id.'button_border_line_hover_bg22',
				[
					'label' 		=> __( 'Border Line Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':hover' => '--white-color:{{VALUE}}',
					],
				]
			);

			$th->add_control(
				$id.'button_line_hover_bg2',
				[
					'label' 		=> __( 'Line Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':hover:before' => 'background-color:{{VALUE}}',
						$selector. ':hover:after' => 'background-color:{{VALUE}}',
					],
				]
			);


			// $th->add_group_control(
			// 	\Elementor\Group_Control_Border::get_type(),
			// 	[
			// 		'name' => $id.'border2',
			// 		'selector' => $selector.':hover',
			// 	]
			// );

			$th->end_controls_tab();

		$th->end_controls_tabs();

		$th->add_control(
			$id.'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$th->add_responsive_control(
			$id.'button_margin',
			[
				'label' 		=> __( 'Margin', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->add_responsive_control(
			$id.'button_padding',
			[
				'label' 		=> __( 'Padding', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$th->add_responsive_control(
			$id.'button_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->end_controls_section();

    }
}

// Button border Style field
// bame_button3_style_fields($th, $id, $label, $selector, $condition = null)
if (!function_exists('bame_button3_style_fields')) {
    function bame_button3_style_fields($th, $id, $label, $selector, $condition = null) {
       
        $control_args = [
            'label'      => __( $label, 'bame' ),
            'tab' 		=> Controls_Manager::TAB_STYLE,
        ];
        if (!empty($condition)) {
            $control_args['condition'] = [
                'layout_style' => $condition,
            ];
        }

        $th->start_controls_section($id.'button_style_section', $control_args);

		$th->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> $id.'button_typography',
				'label' 	=> __( 'Typography', 'bame' ),
				'selector' 	=> $selector
			]
		);

		$th->start_controls_tabs(
			$id.'style_tabs'
		);

			$th->start_controls_tab(
				$id.'first_style_tab',
				[
					'label' => esc_html__( 'Normal', 'bame' ),
				]
			);

			$th->add_control(
				$id.'button_color2',
				[
					'label' 		=> __( 'Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ' .btn-border' => '--white-color: {{VALUE}} !important',
					],
				]
			);
	
			$th->add_control(
				$id.'button_bg2',
				[
					'label' 		=> __( 'Background Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ' .btn-border' => '--title-color:{{VALUE}} !important',
					],
				]
			);

			$th->add_control(
				$id.'button_border_line_bg2',
				[
					'label' 		=> __( 'Border Line Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector  => '--theme-color:{{VALUE}}',
					],
				]
			);

			$th->add_control(
				$id.'button_line_bg2',
				[
					'label' 		=> __( 'Line Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':before' => 'background-color:{{VALUE}}',
						$selector. ':after' => 'background-color:{{VALUE}}',
					],
				]
			);

			// $th->add_group_control(
			// 	\Elementor\Group_Control_Border::get_type(),
			// 	[
			// 		'name' => $id.'border',
			// 		'selector' => $selector
			// 	]
			// );

			$th->end_controls_tab();

			//--------------------secound--------------------//
			$th->start_controls_tab(
				$id.'sec_style_tab',
				[
					'label' => esc_html__( 'Hover', 'bame' ),
				]
			);

			$th->add_control(
				$id.'button_h_color22',
				[
					'label' 		=> __( 'Hover Color ', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ' .btn-border:hover' => '--white-color: {{VALUE}} !important',
					],
				]
			);

			$th->add_control(
				$id.'button_hover_bg22',
				[
					'label' 		=> __( 'Background Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' => [
						$selector. ' .btn-border:hover' => '--title-color:{{VALUE}} !important',
                    ],
				]
			);

			$th->add_control(
				$id.'button_border_line_hover_bg22',
				[
					'label' 		=> __( 'Border Line Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':hover' => '--theme-color:{{VALUE}}',
					],
				]
			);

			$th->add_control(
				$id.'button_line_hover_bg2',
				[
					'label' 		=> __( 'Line Hover Color', 'bame' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						$selector. ':hover:before' => 'background-color:{{VALUE}}',
						$selector. ':hover:after' => 'background-color:{{VALUE}}',
					],
				]
			);


			// $th->add_group_control(
			// 	\Elementor\Group_Control_Border::get_type(),
			// 	[
			// 		'name' => $id.'border2',
			// 		'selector' => $selector.':hover',
			// 	]
			// );

			$th->end_controls_tab();

		$th->end_controls_tabs();

		$th->add_control(
			$id.'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$th->add_responsive_control(
			$id.'button_margin',
			[
				'label' 		=> __( 'Margin', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->add_responsive_control(
			$id.'button_padding',
			[
				'label' 		=> __( 'Padding', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$th->add_responsive_control(
			$id.'button_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'bame' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					$selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$th->end_controls_section();

    }
}

