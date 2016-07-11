<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
?>
<?php get_header(); ?>

	<section id="maincontent" class="container">

		<div id="main" class="row inner-mobile">

		<!-- Start the loop -->
		<?php while ( have_posts() ) : the_post();?>
			<!-- Galerie  -->
			<div class="size-8-wide size-12-narrow" id="gallerie" class=""><?php echo do_shortcode(rwmb_meta('rw_gal')); ?></div>
			<!-- Info  -->
			<div id="produit-content-full" class="size-3-wide size-4-normal size-12-narrow">
				<!-- Etiquette  -->
				<?php if (in_category('promotions')) :?>
						<div id="price-info">
							<div id="etiquette">PRIX PUB</div>
							<div id="price"><?php echo rwmb_meta('rw_price'); ?></div>
							<div id="item-detail"><?php echo rwmb_meta('rw_price_info'); ?></div>
						</div>
				<?php endif; ?>
				<h2><?php the_title();?></h2>
				<?php the_content(); ?>
				<a class="button-dark scrollTo w300" href="#infos-technique">Découvrir les options</a>
				<?php if (in_category('promotions')) :?><div class="mentions"><sup>**</sup>Sous réserve d’acceptation de votre contrat de crédit par Beobank Belgium S.A., prêteur, bd Général Jacques 263G – 1050 Bruxelles (intermédiaire de crédit SPRL MEUBLES
ALBERT-D, rue de Namur 138 à 6041 Gosselies)</div><?php endif; ?>
			</div>
		<?php endwhile; ?>
		</div>

		<!-- INFOS TECHNIQUE -->
		<div id="infos-technique">
			<div class="container center row inner-narrow">
					<!-- combinaison -->
					<div class="size-6-wide size-12-narrow">
						<div id="combin" class="row inner-wide">
							<div class="size-4 hide(narrow)">
								<?php $images = rwmb_meta('rw_img','type=image&size=your_size');
								    foreach ( $images as $image ){
								      echo "<img id='fiche' src='{$image['url']}' width='163' height='233' alt='{$image['alt']}' />";
								    }
								?>
							</div>
							<div id="fiche-content" class="size-7-wide size-12-narrow">
								<h3>Combinaisons</h3>
								<p>
									Choisissez Rev’interieur et composez votre salon avec la combinaison qui s’adapte parfaitement à votre besoin.
								</p>
								<?php $files = rwmb_meta('rw_file','type=file');
										foreach ( $files as $info ){
			  							echo "<a class='button-dark w100' href='{$info['url']}' title='{$info['title']}'>Télécharger la fiche</a><br />";
										}
								?>
							</div>
						</div>
				</div>
				<!-- couleurs -->
				<div class="size-6-wide size-12-narrow">
						<div id="couleurs" class="row inner-wide">
							<div class="size-5 hide(narrow)">
								<img src="<?php echo bloginfo('template_directory'); ?>/images/nuancier.jpg" alt="couleurs">
							</div>
							<div class="size-7-wide size-12-narrow">
									<h3>Couleurs</h3>
									<p>Chez Rev’interieur, vous pouvez choisir le revêtement et le coloris de votre salon parmis un large choix.</p>
							</div>
						</div>
				</div>
				</div>
		</div>
		<div id="contact-mag">
			<a class="button-dark w400p center" href="<?php echo site_url('/a-propos/');?>#nosmag">Trouver le magasin le plus proche</a>
		</div>
	</section>

<?php get_footer(); ?>
