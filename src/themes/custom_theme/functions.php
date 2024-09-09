<?php

/**
 * Custom theme functions and definitions
 *
 * @package WordPress
 */

if (! function_exists('custom_theme_styles')) :

	/**
	 * Enqueue styles.
	 */
	function custom_theme_styles()
	{
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');

		$version_string = is_string($theme_version) ? $theme_version : false;
		wp_register_style(
			'custom_theme_style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style('custom_theme_styles');
	}

endif;

add_action('wp_enqueue_scripts', 'custom_theme_styles');