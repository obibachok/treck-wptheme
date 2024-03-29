<?php

/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
global $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<!--Start Comment Box-->
	<div class="comment-box">
		<div class="comment">

			<div class="author-thumb">
				<?php echo get_avatar($comment, apply_filters('woocommerce_review_gravatar_size', '165'), ''); ?>
			</div>

			<div class="review-one__content">
				<div class="review-one__content-top">
					<div class="info">
						<h2><?php comment_author(); ?> <span><?php echo esc_html(get_comment_date(wc_date_format())); ?></span></h2>
					</div>
					<div class="reply-btn">
						<?php wc_get_template('single-product/review-rating.php'); ?>
					</div>
				</div>

				<div class="review-one__content-bottom">
					<?php comment_text() ?>
				</div>
			</div>
		</div>
	</div>
	<!--End Comment Box-->