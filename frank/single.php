<?php
/**
 * @package WordPress
 * @subpackage Frank
 */
?>
<?php get_header(); ?>
<div id='content' class='span-12 last single clear'>
	<div id='content_primary' class='span-9 clear'>
		<?php while(have_posts()) : the_post(); ?>
		<article <?php post_class(); ?> class='clear'>
			<header><h1><?php the_title(); ?></h1></header>
			<?php if($post->post_excerpt) : ?>
				<div id='excerpt'><?php the_excerpt(); ?></div>
			<?php endif; ?>
			<div id='content_main' class='clear'>
				<div class='post-info span-2'>
					<ul class='metadata vertical'>
						<li class="date"><time datetime="<?php the_time('Y-m-d'); ?>" pubdate><?php the_time('F j, Y'); ?></time></li>
						<li class="author">By <?php the_author_link(); ?></li>
						<li class="categories"><?php the_category(', '); ?></li>
						<li class='comments'><?php comments_popup_link('No comments', '1 comment', '% comments'); ?></li>	
					</ul>
					<div class='previous'>
						<?php previous_post('%','<nav><span class="arrow">Previous Post</span></nav>', 'yes'); ?> 
					</div>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Left Aside') ) : ?>
					<?php endif; ?>
				</div>
			<section class='span-7 last'>
				<?php the_content(); ?>
			</section>
			</div>
			<footer>
				<?php wp_link_pages('before=<div class="page-links"><p>Pages:&after=</p></div>'); ?>
				<div id='post_footer' class='clear'>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Footer') ) : ?>
					<?php endif; ?>
				</div>
			</footer>
		</article>
		<?php endwhile; ?>
		<?php comments_template(); ?>
	</div>
<?php get_sidebar(); ?>	
</div>
<?php get_footer(); ?>