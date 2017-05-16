<?php

/* ==========================================================================
   Activer l’option « Image à la une »
   ========================================================================== */
if (function_exists('add_theme_support')) {
 add_theme_support('post-thumbnails');
}

/* ==========================================================================
   Images sizes (pour un champ image particulier)... variable que l'on met dans le templates
   Genere automatiquement une image de cette taille si taille est superieure
   ========================================================================== */
add_image_size( 'medium', 400);
add_image_size( 'grande', 1600);


/* ==========================================================================
  Images quality
   ========================================================================== */
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );
// define the wp_editor_set_quality callback
function filter_wp_editor_set_quality( $this_default_quality, $this_mime_type ) {
    // make filter magic happen here...
    return $this_default_quality;
};

// add the filter
add_filter( 'wp_editor_set_quality', 'filter_wp_editor_set_quality', 10, 2 ); 

/* ==========================================================================
   Images sizes (au moment de l'ajout des medias : ne marche que sur les nouveaux médias)
   ========================================================================== */
// if ( function_exists( 'add_image_size' ) ) {
// add_image_size( 'photo_couv', 900, 900, true, array( 'center', 'center' )); //(cropped)
// add_image_size( 'photo_inter', 1600, 1200, true, array( 'center', 'center' )); //(cropped)
// }
// add_filter('image_size_names_choose', 'my_image_sizes');
// function my_image_sizes($sizes) {
// $addsizes = array(
// "photo_couv" => __( "Photo couverture"),
// "photo_inter" => __( "Photo interieure"),
// );
// $newsizes = array_merge($sizes, $addsizes);
// return $newsizes;
// }

?>
