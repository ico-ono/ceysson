<?php
/*
 * @package Base
 * @author Ico-ono.com
 * Template Name: home
 */
?>
<? get_header(); ?>
<?php
if(get_locale() == "fr_FR"){ echo masterslider(1);}
if(get_locale() == "en_US"){ echo masterslider(13);}
?>
    <!-- section -->
	<section id="home-01" class="half">
		<a href="<?php echo site_url('/notre-savoir-faire/') ?>">
			<div class="block-clair center txtcenter">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        	<?php the_content(); ?>
	    <?php endwhile; endif; ?>
			</div>
		</a>
  </section>
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
