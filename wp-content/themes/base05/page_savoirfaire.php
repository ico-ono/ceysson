<?php
/*
 * @package Base
 * @author Ico-ono.com
 * Template Name: savoirfaire
 */
?>
<? get_header(); ?>

    <!-- section -->
	<section id="savoirfaire-01" class="fonce block-center">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<?php the_content(); ?>
    <?php endwhile; endif; ?>
  </section>
	<section id="savoirfaire-02" class="clair min block-center">
		<div class="row">
			<div class="size-6 txtcenter size-12-mobile">
			<?php echo rwmb_meta('rw_bloc1'); ?>
			</div>
			<div class="size-6 size-12-mobile">
				<?php
				if(get_locale() == "fr_FR"){ echo masterslider(5);}
				if(get_locale() == "en_US"){ echo masterslider(15);}
					?>
			</div>
		</div>
  </section>
	<section id="savoirfaire-03" class="fonce block-center">
				<?php echo rwmb_meta('rw_bloc2'); ?>
  </section>
	<section id="savoirfaire-04" class="clair min block-center">
		<div class="row">
			<div class="size-6 txtcenter size-12-mobile">
			<?php echo rwmb_meta('rw_bloc3'); ?>
			</div>
			<div class="size-6 size-12-mobile">
				<?php
				if(get_locale() == "fr_FR"){ echo masterslider(12);}
				if(get_locale() == "en_US"){ echo masterslider(20);}

					?>
			</div>
		</div>
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
