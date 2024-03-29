<?php

/**
 * Template part for displaying Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package treck
 */

$treck_page_id     = get_queried_object_id();
$treck_custom_header_status = !empty(get_post_meta($treck_page_id, 'treck_custom_header_status', true)) ? get_post_meta($treck_page_id, 'treck_custom_header_status', true) : 'off';

$treck_custom_header_id = '';
if (is_page() && 'on' === $treck_custom_header_status) {
	$treck_custom_header_id = get_post_meta($treck_page_id, 'treck_select_custom_header', 'no');
} elseif ('yes' == get_theme_mod('header_custom')) {
	$treck_custom_header_id = get_theme_mod('header_custom_post');
} else {
	$treck_custom_header_id = 'default_header';
}

$treck_dynamic_header = isset($_GET['custom_header_id']) ? $_GET['custom_header_id'] : $treck_custom_header_id;
?>

<?php if ('default_header' == $treck_dynamic_header) : ?>

	<header class="main-header-two main-header-three default-header">
		<nav class="main-menu main-menu-two main-menu-three">
			<div class="main-menu-two__wrapper">
				<div class="container">

					<div class="main-menu-two__wrapper-inner">
						<div class="main-menu-two__left">
							<div class="main-menu-two__logo">
								<a href="<?php echo esc_url(home_url('/')); ?>">
									<?php
									$treck_logo_size = get_theme_mod('header_logo_width', 115);
									$treck_custom_logo_id = get_theme_mod('custom_logo');
									$treck_logo = wp_get_attachment_image_src($treck_custom_logo_id, 'full');
									if (has_custom_logo()) {
										echo '<img width="' . esc_attr($treck_logo_size) . '" src="' . esc_url($treck_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
									} else {
										echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
									}
									?>
								</a>
							</div>
							<div class="main-menu-two__main-menu-box">
								<a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'fallback_cb' => 'treck_menu_fallback_callback',
										'menu_class' => 'main-menu__list',
									)
								);
								?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>
	</header>

	<?php if (get_theme_mod('header_sticky_menu' == 'yes') && !is_admin_bar_showing()) : ?>
		<div class="stricky-header stricked-menu main-menu">
			<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
		</div><!-- /.stricky-header -->
	<?php endif; ?>

	<div class="mobile-nav__wrapper">
		<div class="mobile-nav__overlay mobile-nav__toggler"></div>
		<!-- /.mobile-nav__overlay -->
		<div class="mobile-nav__content">
			<span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

			<div class="logo-box">
				<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="logo image">
					<?php
					$treck_logo_size = get_theme_mod('header_logo_width', 115);
					$treck_mobile_logo = get_theme_mod('treck_mobile_menu_logo', '');
					if (!empty($treck_mobile_logo)) {
						echo '<img width="' . esc_attr($treck_logo_size) . '" src="' . esc_url($treck_mobile_logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
					} else {
						echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
					}
					?>
				</a>
			</div>
			<!-- /.logo-box -->
			<div class="mobile-nav__container"></div>
			<!-- /.mobile-nav__container -->

			<ul class="mobile-nav__contact list-unstyled ml-0">
				<?php $treck_mobile_menu_email = get_theme_mod('treck_mobile_menu_email'); ?>
				<?php if (!empty($treck_mobile_menu_email)) : ?>
					<li>
						<i class="fa fa-envelope"></i>
						<a href="mailto:<?php echo esc_attr($treck_mobile_menu_email); ?>"><?php echo esc_html($treck_mobile_menu_email); ?></a>
					</li>
				<?php endif; ?>
				<?php $treck_mobile_menu_phone = get_theme_mod('treck_mobile_menu_phone'); ?>
				<?php if (!empty($treck_mobile_menu_phone)) : ?>
					<li>
						<i class="fa fa-phone-alt"></i>
						<a href="tel:<?php echo esc_url(str_replace(' ', '-', $treck_mobile_menu_phone)); ?>"><?php echo esc_html($treck_mobile_menu_phone); ?></a>
					</li>
				<?php endif; ?>
			</ul><!-- /.mobile-nav__contact -->
			<div class="mobile-nav__top">
				<div class="mobile-nav__social">
					<?php if (!empty(get_theme_mod('facebook_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>"><i class="fab fa-facebook"></i></a>
					<?php endif; ?>
					<?php if (!empty(get_theme_mod('twitter_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>"><i class="fab fa-twitter"></i></a>
					<?php endif; ?>
					<?php if (!empty(get_theme_mod('linkedin_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>"><i class="fab fa-linkedin"></i></a>
					<?php endif; ?>
					<?php if (!empty(get_theme_mod('pinterest_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('pinterest_url')); ?>"><i class="fab fa-pinterest"></i></a>
					<?php endif; ?>
					<?php if (!empty(get_theme_mod('youtube_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('youtube_url')); ?>"><i class="fab fa-youtube"></i></a>
					<?php endif; ?>
					<?php if (!empty(get_theme_mod('dribble_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('dribble_url')); ?>"><i class="fab fa-dribbble"></i></a>
					<?php endif; ?>
					<?php if (!empty(get_theme_mod('instagram_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>"><i class="fab fa-instagram"></i></a>
					<?php endif; ?>
					<?php if (!empty(get_theme_mod('reddit_url'))) : ?>
						<a href="<?php echo esc_url(get_theme_mod('reddit_url')); ?>"><i class="fab fa-reddit"></i></a>
					<?php endif; ?>
				</div><!-- /.mobile-nav__social -->
			</div><!-- /.mobile-nav__top -->

		</div>
		<!-- /.mobile-nav__content -->
	</div>
	<!-- /.mobile-nav__wrapper -->

	<?php $treck_back_to_top_status = get_theme_mod('scroll_to_top', 'no'); ?>
	<?php if ('yes' === $treck_back_to_top_status) : ?>
		<span data-target="html" class="scroll-to-target scroll-to-top"><i class="fa <?php echo esc_attr(get_theme_mod('scroll_to_top_icon', 'fa-angle-up')); ?>"></i></span>

	<?php endif; ?>

<?php else : ?>
	<?php echo do_shortcode('[treck-header id="' . $treck_dynamic_header . '"]');
	?>
<?php endif; ?>