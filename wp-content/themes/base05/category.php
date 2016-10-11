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


<?php $current_category = single_cat_title("", false); if($current_category == 'IAC'):?>
  <section class="block-center center">
  <?php if(get_locale() == "fr_FR") { echo'<p>Les éditions IAC réalisent des catalogues d’exposition et de collections muséales en collaboration avec des institutions dans le but de faire découvrir les œuvres d’artistes contemporains ou classiques, mais aussi les ressources culturelles et patrimoniales d’un secteur.<br><br>Le travail s’effectue dans une dynamique contemporaine, accordant une attention particulière aux traitements graphique et typographique, à la pertinence des choix de format, de papier et de façonnage.<br><br>Les différentes disciplines artistiques abordées bénéficient d’un éclairage scientifique et critique précis. Le choix des contenus obéit à une exigence de qualité répondant de l’exception du livre d’art.<br><a href="http://www.ceysson.com/wp-content/uploads/2016/07/Catalogue-IAC.pdf">Télécharger le catalogue IAC</a></p>';}
  else{ echo'<p>Éditions IAC publish catalogues for exhibitions and museum collections in association with institutions. Their aim is to introduce the works of contemporary or classical artists, as well as the cultural and patrimonial resources of specific areas.<br><br>We work following a contemporary dynamic, with particular attention to graphic and typographic treatment, and focusing on a pertinent choice formats, papers, and manufacturing processes.<br><br>The various artistic disciplines featured are addressed with a precise scientific and critical perspective, and the choice of contents responds to the exceptional quality standards expected from art books. <br><a href="http://www.ceysson.com/wp-content/uploads/2016/07/Catalogue-IAC.pdf">Download IAC catalogue</a></p>'; } ?>
  </section>
<?php endif;?>

<section class="gallery block-center center">

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
