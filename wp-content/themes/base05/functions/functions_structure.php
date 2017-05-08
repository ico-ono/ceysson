<?php

/* ==========================================================================
   HEADER ID
   ========================================================================== */
function header_id() {
  if (is_page()||is_single()){
    if (is_front_page()){ $headerID = 'home'; }
    else{ $headerID = basename(get_permalink()); }
  }
  elseif(is_404()){ echo error; }
  else{ $category = get_queried_object(); $headerID = $category->name; }

  return $headerID;
}

/* ==========================================================================
   HEADER CLASS
   ========================================================================== */
function header_class() {
  if (is_front_page()||is_page("home")){ $headerClass = 'home'; }
  elseif (is_page()||is_404()){ $headerClass = 'page'; }
  elseif (is_single()){ $headerClass = 'single'; }
  elseif (is_category()){ $headerClass = 'category'; }

  // ex de personnalisation d'une classe pour des pages particulieres
  // if (is_page('grande-tradition')OR is_page('decouvertes')OR is_page('terre-de-forez')OR is_page('ptibaptiste')OR is_page('terres-d-ailleurs')){ $headerClass .=' page_produits'; }
  return $headerClass;
}

/* ==========================================================================
   Hack wp-title home / empty home
   ========================================================================== */
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return get_bloginfo( 'title' );
  }

  return $title;
}


?>
