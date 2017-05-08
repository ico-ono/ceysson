<?php
/*
 * @package Base 05
 * @author Ico-ono.com
 * cf. header full si besoin (integration/html/header_wordpress)
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="lteie9 lteie8 lteie7 lteie6 ie6 no-js"> <![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="lteie9 lteie8 lteie7 ie7 no-js"> <![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="lteie9 lteie8 ie8 no-js"> <![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="lteie9 ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <html class="no-js" <?php language_attributes(); ?><![endif]-->

<html <?php //language_attributes(); ?>>
<head>
    <title><?php wp_title(''); ?></title>
    <!-- Meta -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="Ceysson édition">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"><!-- mobile setting -->
		<meta name="google" content="nositelinkssearchbox">  <!-- retire box google search dans les resultats de recherche -->
    <meta name="format-detection" content="telephone=no"/>    <!-- Convertir les numéros de téléphone en liens pour mobiles -->
    <?php /* Open graph : balise pour intégration info facebook : like facebook, partage twitter */?>
    <meta property="fb:admins" content="user_id_facebook"/>
    <?php /* Si c’est un article */
    if (is_single()){
       if (has_post_thumbnail()){
        $url_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
       }
       else{
        $url_thumbnail = 'http://tuto.lestutosdelucho.fr/wp-content/uploads/2013/10/logo.jpg';
       }
       $description = strip_tags(get_the_excerpt($post->ID)); ?> <!--On récupère dans une variable la description en fonction de l'ID de l'article -->
       <meta property="og:title" content="<?php echo get_the_title(); ?> - <?php echo bloginfo('name'); ?>" />
       <meta property="og:type" content="article" />
       <meta property="og:url" content="<?php echo the_permalink(); ?>" />
       <meta property="og:image" content="<?php echo $url_thumbnail; ?>" />
       <meta property="og:description" content="<?php echo $description; ?>" /> <!-- On affiche la variable -->
    <?php }
    else{ // Si ce n’est pas un article (page d’accueil, page, archive, tag…)
       $current_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
       <meta property="og:title" content="<?php echo bloginfo('name'); ?>" />
       <meta property="og:type" content="website" />
       <meta property="og:url" content="<?php echo $current_url; ?>" />
       <meta property="og:image" content="http://tuto.lestutosdelucho.fr/wp-content/uploads/2013/10/logo.jpg" />
       <meta property="og:description" content="<?php echo bloginfo('description'); ?>" />
    <?php } ?>
    <!-- CSS -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

    <!-- Script -->
      <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
 		<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.0.3.min.js"></script> -->

    <!-- html5 pour les versions ant à ie9 (head) -->
    <!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  <![endif]-->
    <!--[if IE]> <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/PIE.js"></script><![endif]-->
     <?php wp_head(); ?>
</head>


<body id="<?php echo header_id(); ?>" class="<?php echo header_class();?>">

    <div id="page-wrapper">
        <header>
            <div class="container">
                <a id="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.gif" alt="<?php wp_title('');?>"></a>
                <!-- navigation-->
              		<nav class="txtright">
                    <?php wp_nav_menu( array( 'menu' => 'nav-main2', 'container' => '', 'menu_id' => 'nav-main2', 'depth' => '2' ) ); ?>
                  </nav>
            </div>
        </header>
