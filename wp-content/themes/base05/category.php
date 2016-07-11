<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
 ?>
<? get_header(); ?>
    <?php if(have_posts()) : ?>
      <?php $i=1; while(have_posts()) : the_post(); if($i%2 == 1) :?>

        	<section id="actu-0<?php echo ($i++); ?>" class="row <?php echo('block-beige')?>">
              <div class="img size-5 push-0-narrower size-12-narrower">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="txt size-5 push-0-narrower size-12-narrower">
              <h3><?php the_title(); ?></h3>
              <?php the_content(); ?>
            </div>
          </section>
        <?php else : ?>
        <section id="actu-0<?php echo ($i++); ?>" class="row">
          <div class="txt push-1 size-5 push-0-narrower size-12-narrower">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
          </div>
            <div class="img push-1 size-5 push-0-narrower size-12-narrower txtright">
            <?php the_post_thumbnail(); ?>
          </div>
        </section>
	   <?php endif; ?>
     <?php endwhile; ?>
	   <?php endif; ?>
     <section id="nav-transvers" class="">
       <div class="container row">
   			<div class="size-4 size-12-mobile txtcenter">
   					<a class="btn_hexa btn_hexa_grisf" href="<?php echo site_url('/nos-produits/grande-tradition') ?>"><span><?php if(get_locale() == "fr_FR") echo'Nos gammes'; ?><?php if(get_locale() == "en_US") echo'Our ranges'; ?></span></a>
   			</div>
   			<div class="size-4 size-12-mobile txtcenter">
   					<a class="btn_hexa btn_hexa_grisc" href="<?php echo site_url('/category/actualites/') ?>"><span><?php if(get_locale() == "fr_FR") echo'Dernières<br>actualités'; ?><?php if(get_locale() == "en_US") echo'Last news'; ?></span></a>
   			</div>
   			<div class="size-4 size-12-mobile txtcenter">
   					<a class="btn_hexa btn_hexa_grisf" href="<?php echo site_url('/contact/') ?>"><span><?php if(get_locale() == "fr_FR") echo'Contactez-nous'; ?><?php if(get_locale() == "en_US") echo'Contact us'; ?></span></a>
   			</div>
   		</div>
   	</section>
<?php get_footer(); ?>
