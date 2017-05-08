<?php

  show_admin_bar( false );


  /* ==========================================================================
     Afficher la categorie courante (slug)
     ========================================================================== */
     function wt_get_category_current_slug() {
       $current_category = get_the_category($post->ID);
       return $current_category[0]->slug;
     }


  /* ==========================================================================
     Afficher le nombre de post
     1. Just call the function within The Loop and it will return the count of the first category within the current post.
     <?php echo wt_get_category_count(); ?>
     2. Use the function with an ID and it will return the count of the first category within the post ID.
     <?php echo wt_get_category_count(1); ?>
     3. Use the function with a slug / nicename and it will return the count of the first category within the post slug / nicename.
     <?php echo wt_get_category_count('hello-world'); ?>
     ========================================================================== */

  function wt_get_category_count($input = '') {
  	global $wpdb;
  	if($input == '')
  	{
  		$category = get_the_category();
  		return $category[0]->category_count;
  	}
  	elseif(is_numeric($input))
  	{
  		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
  		return $wpdb->get_var($SQL);
  	}
  	else
  	{
  		$SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
  		return $wpdb->get_var($SQL);
  	}
  }
?>
