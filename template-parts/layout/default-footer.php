<?php

/**
 * Template part for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package treck
 */
?>


<?php
$treck_page_id     = get_queried_object_id();
$treck_custom_footer_status = !empty(get_post_meta($treck_page_id, 'treck_custom_footer_status', true)) ? get_post_meta($treck_page_id, 'treck_custom_footer_status', true) : 'off';

$treck_custom_footer_id = '';
if ((is_page() && 'on' === $treck_custom_footer_status) || (is_singular('portfolio') && 'on' === $treck_custom_footer_status) || (is_singular('service') && 'on' === $treck_custom_footer_status) || (is_singular('team') && 'on' === $treck_custom_footer_status)) {
    $treck_custom_footer_id = get_post_meta($treck_page_id, 'treck_select_custom_footer', true);
} elseif ('yes' == get_theme_mod('footer_custom')) {
    $treck_custom_footer_id = get_theme_mod('footer_custom_post');
} else {
    $treck_custom_footer_id = 'default_footer';
}

$treck_dynamic_footer = isset($_GET['custom_footer_id']) ? $_GET['custom_footer_id'] : $treck_custom_footer_id;
?>


<?php if ('default_footer' == $treck_dynamic_footer) : ?>
    <footer class="site-footer default-footer">
        <div class="container">
            <div class="site-footer__inner">
                <div class="site-footer__bottom">
                    <div class="footer-one__bottom-inner-default text-center">
                        <div class="footer-one__bottom-text">
                            <p class="site-footer__bottom-text"><?php echo wp_kses(get_theme_mod('footer_copytext', esc_html__('&copy; All Copyright 2023 by Treck', 'treck')), 'treck_allowed_tags'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php else : ?>
    <?php echo do_shortcode('[treck-footer id="' . $treck_dynamic_footer . '"]');
    ?>
<?php endif; ?>