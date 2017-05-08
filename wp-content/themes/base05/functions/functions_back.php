<?php

  add_theme_support( 'menus' );																															// rajoute le menu dans apparence
  function remove_menus(){ remove_menu_page( 'edit-comments.php' ); }												// supprime le menu commentaires
  // add_action( 'admin_menu', 'remove_menus' );																								// supprime la barre d'admin quand on est loggé

?>
