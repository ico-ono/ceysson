<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
?>

	<footer>
		<div class="container row">
		<div class="size-5 size-12-mobile">
			 © Ceysson éditions d’Art 2017
		</div>
		<div class="size-2 size-12-mobile">
			<?php echo qtranxf_generateLanguageSelectCode('text'); ?>
		</div>
		<div class="size-5 size-12-mobile txtright">
				  <?php if(get_locale() == "fr_FR"){ echo '<a href="'.site_url('/mentions-legales/').'">mentions légales</a>'; }
					else{ echo '<a href="'.site_url('/en/mentions-legales/').'">legal notices</a>'; } ?>
		</div>
		</div>
	</footer>
			<?php wp_footer();?>
        <!-- Script -->
				<!-- <script type="text/javascript" src="<?php //echo get_template_directory_uri(); ?>/js/all.min.js"></script> -->
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.6.2.min.js"></script>
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/skel.min.js"></script>
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/util.js"></script>
				<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.slicknav.min.js"></script> -->
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.js"></script>
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/skrollr.js"></script>
				<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/init.js"></script> -->
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/smooth_scroll.js"></script>

				<!-- Hammer pour le touch -->
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/hammer.js"></script>
				<!-- Lightbox -->
				<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightbox-plus-jquery-custom.min.js"></script>
				<!-- SLick slider   -->
				<script src="<?php echo get_template_directory_uri(); ?>/js/slick-modify.min.js" type="text/javascript" charset="utf-8"></script>
				<script src="<?php echo get_template_directory_uri(); ?>/js/slick_config.js" type="text/javascript" charset="utf-8"></script>

				<!-- Masonry -->
				<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js" type="text/javascript" charset="utf-8"></script>
				<script src="<?php echo get_template_directory_uri(); ?>/js/masonry_imagesloaded.pkgd.min.js" type="text/javascript" charset="utf-8"></script>
				<script src="<?php echo get_template_directory_uri(); ?>/js/masonry_spin.min.js" type="text/javascript" charset="utf-8"></script>
				<script src="<?php echo get_template_directory_uri(); ?>/js/masonry_cactus.min.js" type="text/javascript" charset="utf-8"></script> -->



</body>
</html>
