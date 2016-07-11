<?php
/*
 * @package Base
 * @author Ico-ono.com
 * Template Name: contact
 */
?>
<? get_header(); ?>

    <!-- section -->
	<section id="contact-01" class="block-center">
		<div class="row">
			<div class="size-6 txtcenter size-12-mobile">
				<div class="block-fonce">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="size-6 size-12-mobile">
				<?php echo rwmb_meta('rw_bloc1'); ?>
				<?php
				if(get_locale() == "fr_FR"){ echo do_shortcode( '[contact-form-7 id="100" title="Contact_fr"]' );}
				if(get_locale() == "en_US"){ echo do_shortcode( '[contact-form-7 id="249" title="Contact_en"]' );}
				?>
			</div>
		</div>
  </section>
	<section id="contact-02" class="half">
  </section>
	<section id="nav-transvers" class="">
		<div class="container row">
			<div class="size-4 size-12-mobile txtcenter">
					<a class="btn_hexa btn_hexa_grisf" href="<?php echo site_url('/nos-produits/grande-tradition') ?>"><span><?php if(get_locale() == "fr_FR") echo'Nos gammes'; ?><?php if(get_locale() == "en_US") echo'Our ranges'; ?></span></a>
			</div>
			<div class="size-4 size-12-mobile txtcenter">
					<a class="btn_hexa btn_hexa_grisf" href="<?php echo site_url('/nos-produits/notre-savoir-faire') ?>"><span><?php if(get_locale() == "fr_FR") echo'Notre savoir-faire'; ?><?php if(get_locale() == "en_US") echo'Our expertise'; ?></span></a>
			</div>
			<div class="size-4 size-12-mobile txtcenter">
					<a class="btn_hexa btn_hexa_grisc" href="<?php echo site_url('/category/actualites/') ?>"><span><?php if(get_locale() == "fr_FR") echo'Dernières<br>actualités'; ?><?php if(get_locale() == "en_US") echo'Last news'; ?></span></a>
			</div>
		</div>
	</section>
<?php get_footer(); ?>
