<?php

/**
Plugin Name: Visual Columns for WordPress
Plugin URI: http://plugins.righthere.com/visual-columns/
Description: No more messing around with shortcodes! Easily add columns to your WordPress powered website
with this 12-column responsive grid system.
Version: 1.0.5.58670
Author: Alberto Lau (RightHere LLC)
Author URI: http://plugins.righthere.com
 **/

define('RHCOL_VERSION',	'1.0.5'); 
define('RHCOL_PATH', 	plugin_dir_path(__FILE__) ); 
define("RHCOL_URL", 	plugin_dir_url(__FILE__) ); 
define("RHCOL_SLUG", 	plugin_basename( __FILE__ ) );

require RHCOL_PATH.'includes/class.plugin_rh_visual_columns.php';
new plugin_rh_visual_columns();


?>