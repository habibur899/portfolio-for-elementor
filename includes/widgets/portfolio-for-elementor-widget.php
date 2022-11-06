<?php

use Elementor\Controls_Manager;
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

		$settings = $this->get_settings_for_display(); ?>
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
                                                data-filter="*"><?php echo esc_html__( $settings['category_all_text'], 'portfolio-for-elementor' ) ?></button>
									<?php } ?>
									<?php foreach ( $categorys as $category ) {
										printf( '<button data-filter=".%s">%s</button>', esc_attr( $category->slug ), esc_html__( $category->name, 'portfolio-for-elementor' ) );
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
										if ( $settings['portfolio_grid_style'] == 'grid' ) {
											$image_url = get_the_post_thumbnail_url( get_the_ID(), 'pfe-size' );
										} else {
											$image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
										}
										?>
                                        <div class="pf-item <?php echo esc_attr( $portfolio_category ) ?>">
                                            <div class="item-effect"><img
                                                        src="<?php echo esc_url( $image_url ) ?>"
                                                        alt="thumb">
                                                <div class="bottom-info">
                                                    <h4><?php the_title() ?></h4>
                                                    <a href="<?php echo esc_url( $image_url ) ?>"
                                                       class="item utf-popup-link"><i
                                                                class="fa fa-expand"></i></a> <a
                                                            href="<?php esc_url( the_permalink() ) ?>"><i
                                                                class="fas fa-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
										<?php
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