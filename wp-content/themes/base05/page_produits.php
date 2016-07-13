<?php
/*
 * @package Base
 * @author Ico-ono.com
 * Template Name: produits
 */
?>
<? get_header(); ?>
<div id="nav-produits">
<?php wp_nav_menu( array( 'menu' => 'nav-produits', 'container' => '', 'menu_id' => '', 'depth' => '1' ) ); ?>
</div>
    <!-- section -->
	<section id="produits-01" class="">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
					<?php endwhile; endif; ?>
  </section>
	<section id="produits-02" class="">
		<div class="row">
			<div class="size-4 size-6-narrow size-12-mobile block-fonce txtcenter">
				<h2><strong><?php the_title(); ?></strong></h2>
				<?php echo rwmb_meta('rw_bloc1'); ?>
			</div>
			<div class="size-8 size-6-narrow size-12-mobile">
			</div>
		</div>

  </section>
	<?php if (is_page('grande-tradition')): ?>
	<section id="produits-03" class="">
		<div class="row">
			<div class="size-8 size-6-narrow size-12-mobile">&nbsp;
			</div>
			<div class="size-4 size-6-narrow size-12-mobile block-fonce txtcenter">
				<?php echo rwmb_meta('rw_bloc2'); ?>
			</div>
	</section>
<?php endif; ?>
<section id="nav-transvers" class="">
	<div class="container row">
		<div class="size-4 size-12-mobile txtcenter">
				<a class="btn_hexa btn_hexa_grisf" href="<?php echo site_url('/nos-produits/notre-savoir-faire') ?>"><span><?php if(get_locale() == "fr_FR") echo'Notre savoir-faire'; ?><?php if(get_locale() == "en_US") echo'Our expertise'; ?></span></a>
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