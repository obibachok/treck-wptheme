<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package treck
 */

get_header();
?>

<main id="primary" class="site-main">

    <!--Error Page Start-->
    <section class="error-page">
        <?php if (!empty(get_theme_mod('error_bg_image'))) : ?>
            <div class="error-page__bg" style="background-image: url(<?php echo esc_url(get_theme_mod('error_bg_image')); ?>);"></div>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="error-page__inner">
                        <?php if (!empty(get_theme_mod('error_image'))) : ?>
                            <div class="error-page__img">
                                <img src="<?php echo esc_url(get_theme_mod('error_image')); ?>" alt="<?php esc_attr_e('Sorry, We Can\'t Find that Page!', 'treck'); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="error-page__title-box">
                            <?php if (!empty(get_theme_mod('error_page_shape'))) : ?>
                                <div class="error-page__title-shape-1">
                                    <img src="<?php echo esc_url(get_theme_mod('error_page_shape')); ?>" alt="<?php esc_attr_e('Not Found', 'treck'); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty(get_theme_mod('error_image'))) : ?>
                                <h2 class="error-page__title"><?php echo esc_html_e('4', 'treck'); ?> <span><?php echo esc_html_e('4', 'treck'); ?></span></h2>
                            <?php else : ?>
                                <h2 class="error-page__title"><?php echo esc_html_e('404', 'treck'); ?></h2>
                            <?php endif; ?>
                        </div>
                        <h3 class="error-page__tagline"><?php esc_html_e('Sorry We Can\'t Fnd that Page!', 'treck'); ?></h3>
                        <p class="error-page__text"><?php echo esc_html_e('The page you are looking for was never existed. ', 'treck'); ?></p>
                        <form class="error-page__form" method="get" action="<?php echo esc_url(home_url()); ?>">
                            <div class="error-page__form-input">
                                <input type="search" name="s" placeholder="<?php echo esc_attr('Search Here', 'treck'); ?>">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </div>
                        </form>
                        <div class="error-page__btn-box">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="thm-btn error-page__btn"><?php esc_html_e('Back to Home', 'treck'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Error Page End-->

</main><!-- #main -->

<?php
get_footer();
