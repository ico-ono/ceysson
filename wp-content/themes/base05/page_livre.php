<?php
/*
 * @package Base
 * @author Ico-ono.com
 * Template Name: livre
 */
?>
<? get_header(); ?>

    <!-- section -->
	<section class="center block-center">
		<div class="row">
			<div class="size-4 txtcenter size-12-mobile">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    		<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
			<div class="size-8 size-12-mobile">
				<?php echo rwmb_meta('rw_bloc1'); ?>
			</div>
		</div>
  </section>
<?php get_footer(); ?>
