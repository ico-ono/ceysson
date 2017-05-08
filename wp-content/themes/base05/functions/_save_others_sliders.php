<?php


/* ==========================================================================
	 NIVO SLIDER
	 Modification du code des gallery native de wordpress
   ========================================================================== */
// remove_shortcode('gallery');
// add_shortcode('gallery', 'my_new_gallery_function');
// function my_new_gallery_function($atts) {
//
// 	global $post;
// 	$pid = $post->ID;
// 	$gallery = "";
//
// 	if (empty($pid)) {$pid = $post['ID'];}
//
// 	if (!empty( $atts['ids'] ) ) {
// 	   	$atts['orderby'] = 'post__in';
// 	   	$atts['include'] = $atts['ids'];
// 	}
//
// 	extract(shortcode_atts(array('orderby' => 'menu_order ASC, ID ASC', 'include' => '', 'id' => $pid, 'itemtag' => 'dl', 'icontag' => 'dt', 'captiontag' => 'dd', 'columns' => 1, 'size' => 'large', 'link' => 'file'), $atts));
//
// 	$args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'orderby' => $orderby);
//
// 	if (!empty($include)) {$args['include'] = $include;}
// 	else {
// 	  $args['post_parent'] = $id;
// 		$args['numberposts'] = -1;
// 	}
//
// 	if ($args['include'] == "") { $args['orderby'] = 'date'; $args['order'] = 'asc';}
//
// 	$images = get_posts($args);
// 	$gallery .= "<div class='slider-wrapper'><div id='slider' class='nivoSlider slider'>";
// 	foreach ( $images as $image ) {
// 		//print_r($image); /*see available fields*/
// 		$image_src = wp_get_attachment_image_src($image->ID, 'large');
// 		$image_src = $image_src[0];
//
// 		$image_src2 = wp_get_attachment_thumb_url($image->ID);
// 		$gallery .= "<a class='fancybox image' href='".$image_src."' target='_self' rel='lightbox[518]'><img src='".$image_src."' data-thumb='".$image_src2."' /></a>";
// 		// $gallery .= "<a class='fancybox image' href='".$image_src."'><img class='attachment-full size-full' src='".$image_src."'></a>";
//
//
// 	}
// 	$gallery .= "</div></div>";
// 	return $gallery;
// }

/* ==========================================================================
	 CAMERA SLIDER
	 Modification du code des gallery native de wordpress
   ========================================================================== */
// remove_shortcode('gallery');
// add_shortcode('gallery', 'my_new_gallery_function');
// function my_new_gallery_function($atts) {
//
// 	global $post;
// 	$pid = $post->ID;
// 	$gallery = "";
//
// 	if (empty($pid)) {$pid = $post['ID'];}
//
// 	if (!empty( $atts['ids'] ) ) {
// 	   	$atts['orderby'] = 'post__in';
// 	   	$atts['include'] = $atts['ids'];
// 	}
//
// 	extract(shortcode_atts(array('orderby' => 'menu_order ASC, ID ASC', 'include' => '', 'id' => $pid, 'itemtag' => 'dl', 'icontag' => 'dt', 'captiontag' => 'dd', 'columns' => 1, 'size' => 'large', 'link' => 'file'), $atts));
//
// 	$args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'orderby' => $orderby);
//
// 	if (!empty($include)) {$args['include'] = $include;}
// 	else {
// 	  $args['post_parent'] = $id;
// 		$args['numberposts'] = -1;
// 	}
//
// 	if ($args['include'] == "") { $args['orderby'] = 'date'; $args['order'] = 'asc';}
//
// 	$images = get_posts($args);
// 	$gallery .= "<div class='camera_wrap'>";
// 	foreach ( $images as $image ) {
// 		//print_r($image); /*see available fields*/
// 		$image_src = wp_get_attachment_image_src($image->ID, 'large');
// 		$image_src = $image_src[0];
//
// 		$image_src2 = wp_get_attachment_thumb_url($image->ID);
// 		// $gallery .= "<a class='fancybox image' href='".$image_src."' target='_self' rel='lightbox[518]'><img src='".$image_src."' data-thumb='".$image_src2."' /></a>";
// 		$gallery .= "<div data-src='".$image_src."' data-thumb='".$image_src2."'></div>";
//
//
// 	}
// 	$gallery .= "</div>";
// 	return $gallery;
// }

?>
