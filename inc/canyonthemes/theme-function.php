<?php

    // Load custom controls.
	require_once trailingslashit( get_template_directory() ) .  '/inc/canyonthemes/customizer/customizer-functions.php';

	// Sanitization.
	require_once trailingslashit( get_template_directory() ) .  '/inc/canyonthemes/customizer/sanitize-functions.php';

	/**
	 * Core Function
	 */
	require get_template_directory() . '/inc/canyonthemes/customizer/customizer-options.php';


