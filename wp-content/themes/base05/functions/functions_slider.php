<?php

/* ==========================================================================
   Retirer le css en ligne de la gallery
   ========================================================================== */
function remove_css_gal() {
        return "\n" . '<div class="gallery">';//ici vous pouvez changer de classe
}
add_filter( 'gallery_style', 'remove_css_gal', 9 );

/* ==========================================================================
   Ajout un champ link perso dans les gallery native
   ========================================================================== */
add_filter( 'attachment_fields_to_edit', 'apply_filter_attachment_fields_to_edit', null, 2 );
add_filter( 'attachment_fields_to_save', 'apply_filter_attachment_fields_to_save', null , 2 );
function apply_filter_attachment_fields_to_edit( $form_fields, $post )
{
    // Gallery Link URL field
    $form_fields['gallery_link_url'] = array(
        'label' => 'Gallery Link URL',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, '_gallery_link_url', true ),
    );
    return $form_fields;
}

function apply_filter_attachment_fields_to_save( $post, $attachment ) {
    // Save our custom meta fields
    if( isset( $attachment['gallery_link_url'] ) ) {
        update_post_meta( $post['ID'], '_gallery_link_url', $attachment['gallery_link_url'] );
    }
    return $post;
} // End function apply_filter_attachment_fields_to_save()



/* ==========================================================================
	 SLICK SLIDER
	 Modification du code des gallery native de wordpress
   ========================================================================== */
remove_shortcode('gallery');
add_shortcode('gallery', 'my_new_gallery_function');
function my_new_gallery_function($atts) {

	global $post;
	$pid = $post->ID;
	$gallery = "";

	if (empty($pid)) {$pid = $post['ID'];}

	if (!empty( $atts['ids'] ) ) {
	   	$atts['orderby'] = 'post__in';
	   	$atts['include'] = $atts['ids'];
	}

	extract(shortcode_atts(array('orderby' => 'menu_order', 'include' => '', 'id' => $pid, 'itemtag' => 'dl', 'icontag' => 'dt', 'captiontag' => 'dd', 'columns' => 1, 'size' => 'large', 'link' => 'file'), $atts));

	$args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'orderby' => 'menu_order');

	if (!empty($include)) {$args['include'] = $include;}
	else {
	  $args['post_parent'] = $id;
		$args['numberposts'] = -1;
	}

	if ($args['include'] == "") { $args['orderby'] = 'date'; $args['order'] = 'menu_order';}

	$images = get_posts($args);
  if (count($images) < 6){ $few = "fue"; }
  // $gallery .= "<div class='slider-wrapper'><div class='slider regular slick-slider'>";
  $gallery .= "<div class='regular slider'>";
	foreach ( $images as $image ) {
		//print_r($image); /*see available fields*/
    $image_gallery_original_size = wp_get_attachment_image_src($image->ID, 'grande');
		$image_gallery_original_size = $image_gallery_original_size[0];

		$image_gallery_medium_size = wp_get_attachment_image_src($image->ID, 'medium');
		$image_gallery_medium_size = $image_gallery_medium_size[0];

		// $image_src2 = wp_get_attachment_thumb_url($image->ID);

		$custom_url = get_post_meta( $image->ID, '_gallery_link_url', true );

		// fancy
		$gallery .= "<a class='example-image-link' href='".$image_gallery_original_size."' data-lightbox='example-set'><img class='example-image' src='".$image_gallery_medium_size."' /></a>";
		// lien dans l'image
		// $gallery .= "<div><img src='".$image_gallery_original_size."' /></div>";

	}
	$gallery .= "</div>";
	// $gallery .= "<div class='slider ".$few." regular-nav slick-slider'>";
	// foreach ( $images as $image ) {
	// 	//print_r($image); /*see available fields*/
  //
  //   // image thumb définit dans l'onglet media de l'admin (150x150)
	// 	$image_gallery_thumb_size = wp_get_attachment_thumb_url($image->ID);
  //
  //   // image thumb custom (functions_images)
  //   // $image_gallery_thumb_size = wp_get_attachment_image_src($image->ID, 'gallery_thumb');
  //   // $image_gallery_thumb_size = $image_gallery_thumb_size[0];
  //
	// 	// $gallery .= "<a class='fancybox image' href='".$image_src2."' target='_self' rel='lightbox[518]'><img src='".$image_src2."' data-thumb='".$image_src2."' /></a>";
	// 	$gallery .= "<a href='#'><img src='".$image_gallery_thumb_size."' /></a>";
  //
	// }
	//$gallery .= "</div>";

	return $gallery;
}

?>
