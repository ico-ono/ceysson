/* ==========================================================================
   Clean ups and enhancements, uncomment to use
	 a cleaner
   ========================================================================== */

// require_once('functions/wordpress_cleanup.php'); 		   																//admin cleanups
// require_once('functions/script_style_cleanups.php'); 																	// javascript cleanups
// require_once ( 'functions/theme-options.php' );
// require_once('functions/custom_post_types.php'); 		    															// boiler template for CPT
// require_once('functions/remove-comments-absolute.php'); 																//to remove comments completely
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 														// remove emoji
remove_action( 'wp_print_styles', 'print_emoji_styles' );																	// remove emoji
// remove_filter( 'the_content', 'wpautop' );																								// remove p auto dans tiny

/* ==========================================================================
   Permet de localiser le dossier de langue pour la trad. des plugins.
   ========================================================================== */
// load_theme_textdomain( 'themename', get_template_directory() . '/languages' );
//
// $locale = get_locale();
// $locale_file = get_template_directory() . "/languages/$locale.php";
// if ( is_readable( $locale_file ) )
// 	require_once( $locale_file );
