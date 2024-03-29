<?php

/**
 * treck functions for getting inline styles from theme customizer
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package treck
 */

if (!function_exists('treck_theme_customizer_styles')) :
	function treck_theme_customizer_styles()
	{

		// treck color option

		$treck_inline_style = '';
		$treck_inline_style .= ':root {
			--treck-primary: ' . get_theme_mod('theme_primary_color', sanitize_hex_color('#f2edeb')) . ';
			--treck-primary-rgb: ' . treck_hex_to_rgb(get_theme_mod('theme_primary_color', sanitize_hex_color('#f2edeb'))) . ';

			--treck-base: ' . get_theme_mod('theme_base_color', sanitize_hex_color('#e20935')) . ';
			--treck-base-rgb: ' . treck_hex_to_rgb(get_theme_mod('theme_base_color', sanitize_hex_color('#e20935'))) . ';

			--treck-black: ' . get_theme_mod('theme_black_color', sanitize_hex_color('#16171a')) . ';
			--treck-black-rgb: ' . treck_hex_to_rgb(get_theme_mod('theme_black_color', sanitize_hex_color('#16171a'))) . ';
		}';

		$treck_inner_banner_bg = get_theme_mod('page_header_bg_image');
		$treck_inline_style .= '.page-header-bg { background-image: url(' . $treck_inner_banner_bg . '); } ';

		$treck_preloader_icon = get_theme_mod('preloader_image');
		if ($treck_preloader_icon) {
			$treck_inline_style .= '.preloader .preloader__image { background-image: url(' . $treck_preloader_icon . '); } ';
		}

		if (is_page()) {


			$treck_page_primary_color = empty(get_post_meta(get_the_ID(), 'treck_primary_color', true)) ? get_theme_mod('theme_primary_color', sanitize_hex_color('#f2edeb')) : get_post_meta(get_the_ID(), 'treck_primary_color', true);

			$treck_page_base_color = empty(get_post_meta(get_the_ID(), 'treck_base_color', true)) ? get_theme_mod('theme_base_color', sanitize_hex_color('#e20935')) : get_post_meta(get_the_ID(), 'treck_base_color', true);

			$treck_page_black_color = empty(get_post_meta(get_the_ID(), 'treck_black_color', true)) ? get_theme_mod('theme_black_color', sanitize_hex_color('#16171a')) : get_post_meta(get_the_ID(), 'treck_black_color', true);

			$treck_inline_style .= ':root {
				--treck-primary: ' . $treck_page_primary_color . ';
				--treck-primary-rgb: ' . treck_hex_to_rgb($treck_page_primary_color) . ';
				--treck-base: ' . $treck_page_base_color . ';
				--treck-base-rgb: ' . treck_hex_to_rgb($treck_page_base_color) . ';
				--treck-black: ' . $treck_page_black_color . ';
				--treck-black-rgb: ' . treck_hex_to_rgb($treck_page_black_color) . ';
			}';

			$treck_page_header_bg = empty(get_post_meta(get_the_ID(), 'treck_set_header_image', true)) ? get_theme_mod('page_header_bg_image') : get_post_meta(get_the_ID(), 'treck_set_header_image', true);

			$treck_inline_style .= '.page-header-bg { background-image: url(' . $treck_page_header_bg . '); }';
		}

		if (is_singular('post')) {
			$treck_post_header_bg = empty(get_post_meta(get_the_ID(), 'treck_set_header_image', true)) ? get_theme_mod('page_header_bg_image') : get_post_meta(get_the_ID(), 'treck_set_header_image', true);

			$treck_inline_style .= '.page-header-bg  { background-image: url(' . $treck_post_header_bg . '); }';
		}


		wp_add_inline_style('treck-style', $treck_inline_style);
	}
endif;

add_action('wp_enqueue_scripts', 'treck_theme_customizer_styles');
