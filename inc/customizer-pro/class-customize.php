<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class GlowMag_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_template_directory() . '/inc/customizer-pro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'GlowMag_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new GlowMag_Customize_Section_Pro(
				$manager,
				'glowmag',
				array(
					'title'    => esc_html__( 'Premium Verison', 'glowmag' ),
					'pro_text' => esc_html__( 'Upgrade To Pro',  'glowmag' ),
					'pro_url'  => 'https://www.templatesell.com/item/glowmag-pro/',
					'priority' => 0
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		require_once get_template_directory() . '/inc/customizer-pro/section-pro.php';


		wp_enqueue_script( 'glowmag-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'glowmag-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/customizer-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
GlowMag_Customize::get_instance();

if ( ! class_exists( 'GlowMag_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class GlowMag_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About GlowMag', 'glowmag')?></h2>
			<p><?php esc_html_e('GlowMag is clean and minimal WordPress theme for blog website.', 'glowmag')?> </p>
			<p>
				<a href="<?php echo esc_url('http://demo.canyonthemes.com/glowmag/'); ?>" target="_blank"><?php esc_html_e( 'GlowMag Demo', 'glowmag' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'glowmag')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'glowmag')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.canyonthemes.com/glowmag/'); ?>" target="_blank"><?php esc_html_e( 'GlowMag Documentation', 'glowmag' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'glowmag')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'glowmag')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://www.canyonthemes.com/supports/'); ?>" target="_blank"><?php esc_html_e( 'GlowMag Support', 'glowmag' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'glowmag' ); ?></h3>
			<p><?php esc_html_e('If you like glowmag Kindly Rate this Theme', 'glowmag')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/glowmag/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'glowmag' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}