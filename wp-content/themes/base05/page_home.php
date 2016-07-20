<?php
/*
 * @package Base
 * @author Ico-ono.com
 * Template Name: home
 */
?>
<? get_header(); ?>
<section class="center block-center">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
	<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
