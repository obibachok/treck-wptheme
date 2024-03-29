<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package treck
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-sidebar__single'); ?>>

	<?php treck_post_thumbnail(); ?>

	<div class="blog-sidebar__content">
		<ul class="blog-sidebar__meta list-unstyled ml-0">
			<li>
				<?php treck_posted_by(); ?>
			</li>
			<?php if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) : ?>
				<li><?php treck_comment_count(); ?></li>
			<?php endif; ?>
		</ul>
		<h3 class="blog-sidebar__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php $treck_excerpt_count = apply_filters('treck_excerpt_count', 41); ?>
		<p class="blog-sidebar__text"><?php treck_excerpt($treck_excerpt_count); ?></p>
		<div class="blog-sidebar__btn">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'treck'); ?></a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->