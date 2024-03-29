<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package treck
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php treck_post_thumbnail(); ?>

	<div class="blog-details__content clearfix">
		<ul class="blog-details__meta list-unstyled ml-0">
			<li>
				<?php treck_posted_by(); ?>
			</li>
			<?php if (!post_password_required() && (comments_open() || get_comments_number())) : ?>
				<li><?php treck_comment_count(); ?></li>
			<?php endif; ?>
		</ul>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'treck'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'treck'),
				'after'  => '</div>',
			)
		);
		?>
	</div>
	<div class="blog-details__bottom">
		<?php treck_entry_footer(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->