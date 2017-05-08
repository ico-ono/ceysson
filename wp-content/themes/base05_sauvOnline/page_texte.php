<?php
/*
 * @package Base
 * @author Ico-ono.com
 * Template Name: texte
 */
?>
<? get_header(); ?>

    <!-- section -->
	<section class="center block-center">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
    <?php endwhile; endif; ?>
  </section>
<?php get_footer(); ?>
