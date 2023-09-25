<?php

namespace ABCPTE\Inc\Widgets\ABCPricingTable;

use ABCPTE\Inc\Widgets\BaseWidget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;


class Main extends BaseWidget
{

    // define protected variables...
    protected $name = 'ABCPricingTable';
    protected $title = 'Pricing Table';
    protected $icon = 'eicon-price-table';
    protected $categories = [
        'basic'
    ];


    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'abc_elementor_pricingTable_header_section',
            [
                'label' => __('Pricing Header', ABCELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Pricing pacakge name
        $this->add_control(
            'abc_elementor_pricingTable_name',
            [
                'label' => __('Package Name', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Basic Plan', ABCELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
            ]
        );
        // Pricing package Price
        $this->add_control(
            'abc_elementor_pricingTable_price',
            [
                'label' => __('Price', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('$499', ABCELEMENTOR_TEXTDOMAIN),
            ]
        );
        // Pricing package Price period
        $this->add_control(
            'abc_elementor_pricingTable_price_period',
            [
                'label' => __('Period', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('/Monthly', ABCELEMENTOR_TEXTDOMAIN),
            ]
        );
        // Pricing package Recommended
        $this->add_control(
            'abc_elementor_pricingTable_recommended',
            [
                'label' => __('Recommended', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', ABCELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', ABCELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        // pacakge recommended position left or top
        $this->add_control(
            'abc_elementor_pricingTable_recommended_position',
            [
                'label' => __('Recommended Position', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'left' => __('Left', ABCELEMENTOR_TEXTDOMAIN),
                    'top' => __('Top', ABCELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'abc_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended text
        $this->add_control(
            'abc_elementor_pricingTable_recommended_text',
            [
                'label' => __('Recommended Text', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Recommended', ABCELEMENTOR_TEXTDOMAIN),
                'condition' => [
                    'abc_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );

        // end of Pricing header section
        $this->end_controls_section();

        // start of Pricing body section
        $this->start_controls_section(
            'abc_elementor_pricingTable_body_section',
            [
                'label' => __('Package Features', ABCELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Pricing body features list
        $repeater = new \Elementor\Repeater();

         // feature text
        $repeater->add_control(
			'abc_elementor_pricingTable_feature_text',           
            [                
                'label' => esc_html__('Text', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('5GB Disk Space', ABCELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
            ],
		);
        // feature icon
        $repeater->add_control(
            'abc_elementor_pricingTable_feature_icon',           
            [                
                'label' => esc_html__('Icon', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICONS,
            ],
        );
        // icon color
        $repeater->add_control(
            'abc_elementor_pricingTable_feature_icon_color',           
            [                
                'label' => esc_html__('Icon Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-body ul {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                ],
            ],
        );
        // Feature list
        $this->add_control(
			'abc_pricingTable_features_list',
			[
				'label' => esc_html__( 'Features List', ABCELEMENTOR_TEXTDOMAIN),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'abc_elementor_pricingTable_feature_text' => esc_html__( 'Title #1', ABCELEMENTOR_TEXTDOMAIN ),
					],
					[
						'abc_elementor_pricingTable_feature_text' => esc_html__( 'Title #2', ABCELEMENTOR_TEXTDOMAIN ),
					],
				],
				'title_field' => '{{{ abc_elementor_pricingTable_feature_text }}}',
			]
		);

        // end of Pricing body section
        $this->end_controls_section();

        // start of Pricing footer section
        $this->start_controls_section(
            'abc_elementor_pricingTable_footer_section',
            [
                'label' => __('Button', ABCELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Pricing footer button text
        $this->add_control(
            'abc_elementor_pricingTable_button_text',
            [
                'label' => __('Button Text', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'default' => __('Purchase Now', ABCELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
            ]
        );
        // Pricing footer button link
        $this->add_control(
            'abc_elementor_pricingTable_button_link',
            [
                'label' => __('Button Link', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', ABCELEMENTOR_TEXTDOMAIN),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        // pricing button icon
        $this->add_control(
            'abc_elementor_pricingTable_button_icon',
            [
                'label' => __('Button Icon', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-arrow-right',
                ],
            ]
        );

        // pricing button icon space
        $this->add_responsive_control(
            'abc_elementor_pricingTable_button_icon_space',
            [
                'label' => __('Icon Space', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-footer a i' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // end of Pricing footer section
        $this->end_controls_section();


        // start of Pricing table box full area style section
        $this->start_controls_section(
            'abc_elementor_pricingTable_box_style_section',
            [
                'label' => __('Box', ABCELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // box background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_box_bg',
                'types' => ['classic', 'gradient'],
                'label' => __('Background', ABCELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .abc-ele-pricing-table-area',
            ]
        );
        // pricing table box border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_box_border',
                'selector' => '{{WRAPPER}} .abc-ele-pricing-table-area',
            ]
        );

        // pricing table box border radius
        $this->add_responsive_control(
            'abc_elementor_pricingTable_box_border_radius',
            [
                'label' => __('Border Radius', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // end of Pricing table box full area style section


        // start of Pricing table header style section
        $this->start_controls_section(
            'abc_elementor_pricingTable_header_style_section',
            [
                'label' => __('Header', ABCELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge name typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_name_typography',
                'label' => __('Name Typography', ABCELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .abc-ele-pricing-pack-name h3',
            ]
        );
        // pacakge price typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_price_typography',
                'label' => __('Price Typography', ABCELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .abc-ele-pricing-pack-preiod h3',
            ]
        );
        // pacakge price period typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_price_period_typography',
                'label' => __('Period Typography', ABCELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .abc-ele-pricing-pack-preiod h3 sub',
            ]
        );
        // pacakge recommended typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_recommended_typography',
                'label' => __('Recommended Typography', ABCELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .abc-ele-pricing-recommended span',
                'condition' => [
                    'abc_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );


        // header normal and hover
        $this->start_controls_tabs(
            'abc_elementor_pricingTable_header_style_tabs'
        );
        // header normal tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_header_style_normal_tab',
            [
                'label' => esc_html__('Normal', ABCELEMENTOR_TEXTDOMAIN),
            ]
        );
        // header normal background color
        $this->add_control(
            'abc_elementor_pricingTable_header_normal_bg_color',
            [
                'label' => __('Background Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#448E08',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-header-bg svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        //header normal stroke color
        $this->add_control(
            'abc_elementor_pricingTable_header_normal_stroke_color',
            [
                'label' => __('Stroke Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#FD5009',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-header-strock svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // pacakge name color
        $this->add_control(
            'abc_elementor_pricingTable_name_color',
            [
                'label' => __('Name Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-pack-name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge name background color
        $this->add_control(
            'abc_elementor_pricingTable_name_bg_color',
            [
                'label' => __('Name Background Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-pack-name' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price color
        $this->add_control(
            'abc_elementor_pricingTable_price_color',
            [
                'label' => __('Price Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-pack-preiod h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price period color
        $this->add_control(
            'abc_elementor_pricingTable_price_period_color',
            [
                'label' => __('Period Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-pack-preiod h3 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge recommended color
        $this->add_control(
            'abc_elementor_pricingTable_recommended_color',
            [
                'label' => __('Recommended Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-recommended span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended background color
        $this->add_control(
            'abc_elementor_pricingTable_recommended_bg_color',
            [
                'label' => __('Recommended Background Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-recommended span' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );



        $this->end_controls_tab(); // end of header normal tab

        // header hover tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_header_style_hover_tab',
            [
                'label' => esc_html__('Hover', ABCELEMENTOR_TEXTDOMAIN),
            ]
        );
        // header hover background color
        $this->add_control(
            'abc_elementor_pricingTable_header_hover_bg_color',
            [
                'label' => __('Background Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-header-bg svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        //header hover stroke color
        $this->add_control(
            'abc_elementor_pricingTable_header_hover_stroke_color',
            [
                'label' => __('Stroke Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-header-strock svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        // pacakge name hover color
        $this->add_control(
            'abc_elementor_pricingTable_name_hover_color',
            [
                'label' => __('Name Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-pack-name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge name hover background color
        $this->add_control(
            'abc_elementor_pricingTable_name_hover_bg_color',
            [
                'label' => __('Name Background', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-pack-name' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price hover color
        $this->add_control(
            'abc_elementor_pricingTable_price_hover_color',
            [
                'label' => __('Price Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-pack-preiod h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge price period hover color
        $this->add_control(
            'abc_elementor_pricingTable_price_period_hover_color',
            [
                'label' => __('Period Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-pack-preiod h3 sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge recommended hover color
        $this->add_control(
            'abc_elementor_pricingTable_recommended_hover_color',
            [
                'label' => __('Recommended Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-recommended span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // pacakge recommended hover background color
        $this->add_control(
            'abc_elementor_pricingTable_recommended_hover_bg_color',
            [
                'label' => __('Recommended Background Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-recommended span' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'abc_elementor_pricingTable_recommended' => 'yes',
                ],
            ]
        );
        // end of header hover tab

        $this->end_controls_tab(); // end of header hover tab

        $this->end_controls_tabs(); // end of tabs for header


        //end of the header section
        $this->end_controls_section();

        // start of Pricing table body style section
        $this->start_controls_section(
            'abc_elementor_pricingTable_body_style_section',
            [
                'label' => __('Features', ABCELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge features typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_features_typography',
                'label' => __('Typography', ABCELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .abc-ele-pricing-table-body ul li',
            ]
        );
        // pacakge features color
        $this->add_control(
            'abc_elementor_pricingTable_features_color',
            [
                'label' => __('Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-body ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge features icon color
        $this->add_control(
            'abc_elementor_pricingTable_features_icon_color',
            [
                'label' => __('Icons Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-body ul i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // end of Pricing table body style section
        $this->end_controls_section();

        // start of Pricing table footer style section
        $this->start_controls_section(
            'abc_elementor_pricingTable_footer_style_section',
            [
                'label' => __('Button', ABCELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // pacakge button typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_button_typography',
                'label' => __('Typography', ABCELEMENTOR_TEXTDOMAIN),
                'selector' => '{{WRAPPER}} .abc-ele-pricing-table-footer a',
            ]
        );
        // package button padding
        $this->add_responsive_control(
            'abc_elementor_pricingTable_button_padding',
            [
                'label' => __('Padding', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-footer a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // pacakge button border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'abc_elementor_pricingTable_button_border',
                'selector' => '{{WRAPPER}} .abc-ele-pricing-table-footer a',
            ]
        );
        // pacakge button border radius
        $this->add_responsive_control(
            'abc_elementor_pricingTable_button_border_radius',
            [
                'label' => __('Border Radius', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-footer a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );
        // pacakge button tab normal and hover
        $this->start_controls_tabs(
            'abc_elementor_pricingTable_button_style_tabs'
        );
        // pacakge button normal tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_button_style_normal_tab',
            [
                'label' => esc_html__('Normal', ABCELEMENTOR_TEXTDOMAIN),
            ]
        );
        // pacakge button normal color
        $this->add_control(
            'abc_elementor_pricingTable_button_normal_color',
            [
                'label' => __('Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-footer a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button normal background color
        $this->add_control(
            'abc_elementor_pricingTable_button_normal_bg_color',
            [
                'label' => __('Background Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-footer a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // end of pacakge button normal tab
        $this->end_controls_tab();
        // pacakge button hover tab
        $this->start_controls_tab(
            'abc_ele_pricingTable_button_style_hover_tab',
            [
                'label' => esc_html__('Hover', ABCELEMENTOR_TEXTDOMAIN),
            ]
        );
        // pacakge button hover color
        $this->add_control(
            'abc_elementor_pricingTable_button_hover_color',
            [
                'label' => __('Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-table-footer a' => 'color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button hover background color
        $this->add_control(
            'abc_elementor_pricingTable_button_hover_bg_color',
            [
                'label' => __('Background Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-table-footer a' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // pacakge button hover border color
        $this->add_control(
            'abc_elementor_pricingTable_button_hover_border_color',
            [
                'label' => __('Border Color', ABCELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .abc-ele-pricing-table-area:hover .abc-ele-pricing-table-footer a' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        // end of pacakge button hover tab
        $this->end_controls_tab();
        // end of pacakge button tabs
        $this->end_controls_tabs();
        // end of pacakge button style section
        $this->end_controls_section();



    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()

    {
        //load render view to show widget output on frontend/website.
        include 'RenderView.php';
    }
}
