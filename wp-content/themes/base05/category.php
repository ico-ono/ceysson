<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
 ?>
<? get_header(); ?>
<section class="block-center center">
    <?php if(have_posts()) : ?>
      <?php $i=1; while(have_posts()) : the_post(); ?>
        <div id="actu-0<?php echo ($i++); ?>">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>

     <?php endwhile; ?>
   <?php endif; ?>
   	</section>
<?php get_footer(); ?>
