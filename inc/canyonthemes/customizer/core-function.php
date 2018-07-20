<?php

/**
 * Functions for get_theme_mod()
 *
 * @package Canyon Themes
 * @subpackage GlowMag
 */

if (!function_exists('glowmag_get_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function glowmag_get_option($key = '')
    {
        if (empty($key)) {
            return;
        }
        $glowmag_default_options = glowmag_get_default_theme_options();

        $default                   = (isset($glowmag_default_options[$key])) ? $glowmag_default_options[$key] : '';

        $theme_option              = get_theme_mod($key, $default);

        return $theme_option;

    }

endif;

