<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
 ?>
<? get_header(); ?>

<!-- current categroy -->
<?php //foreach((get_the_category()) as $category) { $current = $category->category_nicename; } query_posts('category_name='.$current.'&orderby=post_date&order=ASC'); ?>

<!-- ordre -->
<?php  ?>

<section class="block-center center">
    <?php if(have_posts()) : ?>
      <?php $i=1; while(have_posts()) : the_post(); ?>
        <div id="actu-0<?php echo ($i++); ?>" class="thumb-wrapper">
          <a href="<?php the_permalink(); ?> ">
            <div class="titre"><?php the_title(); ?> </div>
            <div class="bg"></div>
            <div class="thumb"><?php the_post_thumbnail('thumbnail'); ?></div></a>
        </div>

     <?php endwhile; ?>
   <?php endif; ?>
   	</section>
<?php get_footer(); ?>
