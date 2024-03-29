<?php

/**
 * Template part for displaying Page Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package treck
 */
?>
<!--Page Header Start-->
<section class="page-header">
	<div class="page-header-bg"></div>
	<div class="container">
		<div class="page-header__inner">
			<?php
			$treck_page_title_text = !empty(get_post_meta(get_the_ID(), 'treck_set_header_title', true)) ? get_post_meta(get_the_ID(), 'treck_set_header_title', true) : get_the_title();
			$treck_page_header_tag = apply_filters('treck_page_header_tag', 'h2');
			?>
			<<?php echo esc_attr($treck_page_header_tag); ?>>
				<?php if (!is_page()) : ?>
					<?php treck_page_title(); ?>
				<?php else : ?>
					<?php echo wp_kses($treck_page_title_text, 'treck_allowed_tags') ?>
				<?php endif; ?>
			</<?php echo esc_attr($treck_page_header_tag); ?>>

			<?php $treck_page_meta_breadcumb_status = empty(get_post_meta(get_the_ID(), 'treck_show_page_breadcrumb', true)) ? 'on' : get_post_meta(get_the_ID(), 'treck_show_page_breadcrumb', true); ?>
			<?php if (function_exists('bcn_display_list') && 'yes' == get_theme_mod('breadcrumb_opt', 'off') && 'on' == $treck_page_meta_breadcumb_status) : ?>
				<ul class="thm-breadcrumb list-unstyled ml-0">
					<?php bcn_display_list(); ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
<!--Page Header End-->