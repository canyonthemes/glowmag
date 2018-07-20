<?php
/**
 * Recommended plugins
 *
 * @package GlowMag
 */
if ( ! function_exists( 'glowmag_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function glowmag_recommended_plugins() {
		$plugins = array(
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'glowmag' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'glowmag_recommended_plugins' );
