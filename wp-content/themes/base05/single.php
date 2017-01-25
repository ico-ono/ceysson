<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
?>
<? get_header(); ?>

    <!-- section -->
	<section class="center block-center">
		<div class="container">
		<div class="row">
			<div class="size-5 txtcenter size-12-mobile">
				<?php echo do_shortcode( rwmb_meta('rw_bloc2') ); ?>
			</div>
			<div class="size-7 size-12-mobile">
				<div class="bloc1">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			    		<?php the_content(); ?>
					<?php endwhile; endif; ?></div>
				<div class="bloc2"><?php echo rwmb_meta('rw_bloc1'); ?></div>
			</div>
		</div>
	</div>
		
  </section>
<?php get_footer(); ?>
