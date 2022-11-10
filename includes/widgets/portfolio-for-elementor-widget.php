<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Portfolio for Elementor Widget.
 *
 * Elementor widget that inserts an animated headline content into the page, from any given text.
 *
 * @since 1.0.0
 */
class Portfolio_For_Elementor_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio for Elementor widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'portfolio-for-elementor';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Portfolio for Elementor widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'Portfolio for Elementor', 'portfolio-for-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Portfolio for Elementor widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @return string Widget help URL.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @return array Widget scripts dependencies.
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 */
	public function get_script_depends() {
		return [ 'portfolio-for-elementor-editor-js' ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Portfolio for Elementor widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_categories() {
		return [ 'portfolio-for-elementor-category' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the Portfolio for Elementor widget belongs to.
	 *
	 * @return array Widget keywords.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_keywords() {
		return [
			'portfolio',
			'gallery',
			'portfolio gallery',
			'portfolio for elementor'
		];
	}

	/**
	 * Category show
	 * */


	/**
	 * Register Portfolio for Elementor widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'basic_settings_section',
			[
				'label' => esc_html__( 'Basic Settings', 'portfolio-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'portfolio_for_elementor_style',
			[
				'label'   => esc_html__( 'Style', 'portfolio-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'design_1',
				'options' => [
					'design_1' => esc_html__( 'Design 1', 'portfolio-for-elementor' ),
					'design_2' => esc_html__( 'Design 2', 'portfolio-for-elementor' ),
				]
			]
		);
		$this->add_control(
			'portfolio_grid_style',
			[
				'label'   => esc_html__( 'Grid Style', 'portfolio-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid'    => esc_html__( 'Grid', 'portfolio-for-elementor' ),
					'masonry' => esc_html__( 'Masonry', 'portfolio-for-elementor' ),
				]
			]
		);
		$this->add_control(
			'number_of_column_show',
			[
				'label'   => esc_html__( 'Number of Column', 'portfolio-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2' => esc_html__( '2 Column', 'portfolio-for-elementor' ),
					'3' => esc_html__( '3 Column', 'portfolio-for-elementor' ),
					'4' => esc_html__( '4 Column', 'portfolio-for-elementor' ),
				]
			]
		);

		$this->add_control(
			'number_of_item_show',
			[
				'label'       => esc_html__( 'Number of Item Show', 'portfolio-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '9', 'portfolio-for-elementor' ),
				'placeholder' => esc_html__( '9', 'portfolio-for-elementor' ),
			]
		);

		$this->add_control(
			'grid_height',
			[
				'label'      => esc_html__( 'Item Height (px)', 'portfolio-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 1000,

					]
				],
				'default'    => [
					'unit' => 'px',
					'size' => 250,
				],
				'selectors'  => [
					'{{WRAPPER}} .box-height' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'portfolio_grid_style' => 'grid'
				]
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'category_settings_section',
			[
				'label' => esc_html__( 'Category Settings', 'portfolio-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'portfolio_show_category',
			[
				'label'        => esc_html__( 'Show Category', 'portfolio-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'show'         => esc_html__( 'Show', 'portfolio-for-elementor' ),
				'hide'         => esc_html__( 'Hide', 'portfolio-for-elementor' ),
				'return_value' => 'show',
				'default'      => 'show',
			]
		);

		$this->add_control(
			'portfolio_show_category_all_button',
			[
				'label'        => esc_html__( 'Show "All" Button', 'portfolio-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'show'         => esc_html__( 'Show', 'portfolio-for-elementor' ),
				'hide'         => esc_html__( 'Hide', 'portfolio-for-elementor' ),
				'return_value' => 'show',
				'default'      => 'show',
				'condition'    => [
					'portfolio_show_category' => 'show',
				]
			]
		);
		$this->add_control(
			'category_all_text',
			[
				'label'     => esc_html__( 'All Categories Button Text', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'All', 'portfolio-for-elementor' ),
				'condition' => [
					'portfolio_show_category'            => 'show',
					'portfolio_show_category_all_button' => 'show',
				]
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'category_style_section',
			[
				'label' => esc_html__( 'Category Style', 'portfolio-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'category_button_margin',
			[
				'label'      => esc_html__( 'Margin', 'portfolio-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .mix-item-menu.category-count button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'category_button_padding',
			[
				'label'      => esc_html__( 'Padding', 'portfolio-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .mix-item-menu.category-count button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'category_button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'portfolio-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .mix-item-menu.category-count button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'category_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'portfolio-for-elementor' ),
				'selector' => '{{WRAPPER}} .mix-item-menu.category-count button',
			]
		);

		$this->start_controls_tabs(
			'category_style_controls'
		);

		$this->start_controls_tab(
			'category_style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'portfolio-for-elementor' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'category_normal_content_typography',
				'selector' => '{{WRAPPER}} .mix-item-menu button',
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'category_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'portfolio-for-elementor' ),
			]
		);
		$this->add_control(
			'hover_category_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mix-item-menu button:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hover_category_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mix-item-menu button:hover' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'category_style_active_tab',
			[
				'label' => esc_html__( 'Active', 'portfolio-for-elementor' ),
			]
		);
		$this->add_control(
			'active_category_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .mix-item-menu button.active' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'active_category_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#c70039',
				'selectors' => [
					'{{WRAPPER}} .mix-item-menu button.active' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->end_controls_section();
		$this->start_controls_section(
			'portfolio_item_style_section',
			[
				'label' => esc_html__( 'Portfolio Item Style', 'portfolio-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'       => 'portfolio_item_overlay_opacity',
				'label'      => esc_html__( 'Overlay', 'portfolio-for-elementor' ),
				'types'      => [ 'classic' ],
				'show_label' => true,
				'exclude'    => [ 'image' ],
				'selector'   => '{{WRAPPER}} .utf-portfolio-area-item .pf-item .item-effect::after',
				'condition'  => [
					'portfolio_for_elementor_style' => 'design_1',
				]
			]
		);
		$this->add_control(
			'portfolio_item_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#c70039',
				'selectors' => [
					'{{WRAPPER}} .effect-slide-up h4'          => 'color: {{VALUE}}',
					'{{WRAPPER}} .item-effect .bottom-info h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .effect-slide-up:hover h4'    => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'portfolio_item_title_typography',
				'selector'  => '{{WRAPPER}} .item-effect .bottom-info h4',
				'condition' => [
					'portfolio_for_elementor_style' => 'design_1',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'portfolio_item_design2_title_typography',
				'selector'  => '{{WRAPPER}} .effect-slide-up h4',
				'condition' => [
					'portfolio_for_elementor_style' => 'design_2',
				]
			]
		);
		$this->add_control(
			'portfolio_item_category_color',
			[
				'label'     => esc_html__( 'Category Color', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#c70039',
				'selectors' => [
					'{{WRAPPER}} .effect-slide-up .category'      => 'color: {{VALUE}}',
					'{{WRAPPER}} .effect-slide-up .category span' => 'color: {{VALUE}}',
				],
				'condition' => [
					'portfolio_for_elementor_style' => 'design_2',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'portfolio_item_design2_cat_typography',
				'selector'  => '{{WRAPPER}} .effect-slide-up .category',
				'condition' => [
					'portfolio_for_elementor_style' => 'design_2',
				]
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'icon_style_section',
			[
				'label'     => esc_html__( 'Icon Style', 'portfolio-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_for_elementor_style' => 'design_1',
				]
			]
		);
		$this->add_control(
			'portfolio_zoom_icon',
			[
				'label'   => esc_html__( 'Zoom Icon', 'portfolio-for-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fa fa-expand',
					'library' => 'fa-solid',
				]
			]
		);
		$this->add_control(
			'portfolio_anchor_icon',
			[
				'label'   => esc_html__( 'Anchor Icon', 'portfolio-for-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fas fa-link',
					'library' => 'fa-solid',
				]
			]
		);
		$this->add_control(
			'portfolio_icon_normal_color',
			[
				'label'     => esc_html__( 'Icon Color', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .item-effect a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'portfolio_icon_background_color',
			[
				'label'     => esc_html__( 'Icon Background', 'portfolio-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#c70039',
				'selectors' => [
					'{{WRAPPER}} .item-effect a' => 'background: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();
	}

	/**
	 * Render Portfolio for Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		?>
        <!-- Start Portfolio Grid -->
        <div id="portfolio" class="utf-portfolio-area-item text-light default-padding">
            <div class="container">
                <div class="utf-portfolio-items-area">
                    <div class="row">
                        <div class="col-md-12 utf-portfolio-content">
							<?php if ( $settings['portfolio_show_category'] == 'show' ) {
								$categorys = get_terms( [
									'hide_empty' => true,
									'taxonomy'   => 'pfe_portfolio_category'
								] );
								?>
                                <div class="mix-item-menu category-count">
									<?php if ( $settings['portfolio_show_category_all_button'] == 'show' ) { ?>
                                        <button class="active"
                                                data-filter="*"><?php echo esc_html( $settings['category_all_text'] ) ?></button>
									<?php } ?>
									<?php foreach ( $categorys as $category ) {
										printf( '<button data-filter=".%s">%s</button>', esc_attr( $category->slug ), esc_html( $category->name) );
									} ?>

                                </div>
							<?php } ?>
                            <!-- End Mixitup Nav-->

                            <div class="row magnific-mix-gallery effect-up clean-text masonary text-light">
                                <div id="portfolio-grid"
                                     class="utf-portfolio-items col-<?php echo esc_attr( $settings['number_of_column_show'] ) ?>">

									<?php
									$portfolio = new WP_Query( [
										'posts_per_page' => $settings['number_of_item_show'],
										'post_type'      => 'pfe_portfolio',
										'post_status'    => 'publish',

									] );
									while ( $portfolio->have_posts() ) {
										$portfolio->the_post();
										$portfolio_category = $this->get_portfolio_category( get_the_ID() );
										$image_url          = get_the_post_thumbnail_url( get_the_ID() );
										if ( $settings['portfolio_for_elementor_style'] == 'design_1' ) {
											?>

                                            <div class="pf-item <?php echo esc_attr( $portfolio_category ) ?>">
                                                <div class="item-effect <?php if ( $settings['portfolio_grid_style'] == 'grid' ) {
													echo 'box-height';
												} ?>"><img
                                                            src="<?php echo esc_url( $image_url ) ?>"
                                                            alt="thumb">
                                                    <div class="bottom-info">
                                                        <h4><?php the_title() ?></h4>
                                                        <a href="<?php echo esc_url( $image_url ) ?>"
                                                           class="item utf-popup-link"><i
                                                                    class="<?php echo esc_attr( $settings['portfolio_zoom_icon']['value'] ) ?>"></i></a>
                                                        <a
                                                                href="<?php esc_url( the_permalink() ) ?>"><i
                                                                    class="<?php echo esc_attr( $settings['portfolio_anchor_icon']['value'] ) ?>"></i></a>
                                                    </div>
                                                </div>
                                            </div>
											<?php
										} elseif ( $settings['portfolio_for_elementor_style'] == 'design_2' ) {
											?>
                                            <div class="pf-item <?php echo esc_attr( $portfolio_category ) ?>">
                                                <div class="effect-slide-up <?php if ( $settings['portfolio_grid_style'] == 'grid' ) {
													echo 'box-height';
												} ?>">
                                                    <a href="<?php esc_url( the_permalink() ) ?>"> <img
                                                                src="<?php echo esc_url( $image_url ) ?>"
                                                                alt="<?php the_title() ?>">
                                                        <h4><?php the_title() ?></h4>
                                                        <div class="category">
															<?php
															$categories = get_the_terms( get_the_ID(), 'pfe_portfolio_category' );
															foreach ( $categories as $category ) {
																printf( '<span>%s</span>', esc_html( $category->name ) );
															}
															?>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
											<?php
										}
									}
									wp_reset_query();
									?>

                                </div>
                            </div>
                            <!-- End Portfoio Row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Portfolio Grid -->
		<?php

	}

	private function get_portfolio_category( $post_id ) {
		$categorys  = get_the_terms( $post_id, 'pfe_portfolio_category' );
		$_categorys = [];
		foreach ( $categorys as $category ) {
			$_categorys = [ $category->term_id = $category->slug ];
		}

		return join( ' ', $_categorys );
	}

}