<?php
/*
 * @package Base
 * @author Ico-ono.com
 *
 */
?>
<?php get_header(); ?>
<section>

	<div class="container">
			<h1 class="entry-title">Page introuvable</h1>
			<p><?php _e( 'Désolé, mais nous n\'avons pas pu trouvé cette page. <br>Veuillez sélectionner une rubrique du menu.'); ?></p>
			<?php //get_search_form(); ?>
	</div><!-- #container -->
	<!-- <script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script> -->
</section>
<?php get_footer(); ?>
