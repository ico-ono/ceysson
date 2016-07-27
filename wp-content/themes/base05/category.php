<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
 ?>
<? get_header(); ?>

<!--
tailles des thumbnail :
the_post_thumbnail('thumbnail');
the_post_thumbnail('medium');
the_post_thumbnail('large');
the_post_thumbnail( array(100,100) );
-->

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
