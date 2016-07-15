<?php
/*
 * @package Base 05
 * @author Ico-ono.com
 */

show_admin_bar( false );

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
	if (is_front_page()){ $headerClass = 'home'; }
  elseif (is_page()||is_404()){ $headerClass = 'page'; }
  elseif (is_single()){ $headerClass = 'single'; }
  elseif (is_category()){ $headerClass = 'category'; }
	if (is_page('grande-tradition')OR is_page('decouvertes')OR is_page('terre-de-forez')OR is_page('ptibaptiste')OR is_page('terres-d-ailleurs')){ $headerClass .=' page_produits'; }
  return $headerClass;
}




/* ==========================================================================
   Clean ups and enhancements, uncomment to use
   ========================================================================== */

// require_once('functions/wordpress_cleanup.php'); 		   	//admin cleanups
// require_once('functions/script_style_cleanups.php'); 		// javascript cleanups
// require_once ( 'functions/theme-options.php' );
// require_once('functions/custom_post_types.php'); 		    // boiler template for CPT
// require_once('functions/remove-comments-absolute.php'); 	//to remove comments completely
// remove emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/* ==========================================================================
   Permet de localiser le dossier de langue pour la trad. des plugins.
   ========================================================================== */
// load_theme_textdomain( 'themename', get_template_directory() . '/languages' );
//
// $locale = get_locale();
// $locale_file = get_template_directory() . "/languages/$locale.php";
// if ( is_readable( $locale_file ) )
// 	require_once( $locale_file );


/* ==========================================================================
   Personnaliser les onglets dans l'admin
   ========================================================================== */
// rajoute le menu dans apparence
add_theme_support( 'menus' );
// supprime le menu commentaires
function remove_menus(){ remove_menu_page( 'edit-comments.php' ); }
// supprime la barre d'admin quand on est loggé
add_action( 'admin_menu', 'remove_menus' );


/* ==========================================================================
   Hack wp-title empty home
   ========================================================================== */
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

/* ==========================================================================
   Register menu
   ========================================================================== */
function register_menu() {
	register_nav_menu('Primary', __('Main'));
}
add_action('init', 'register_menu');


/* ==========================================================================
   Activer l’option « Image à la une »
   ========================================================================== */
if (function_exists('add_theme_support')) {
 add_theme_support('post-thumbnails');
}
/* ==========================================================================
   Images sizes
   ========================================================================== */
add_image_size( 'actu', 750, 620, true, array( 'center', 'center' ));



/* ==========================================================================
   Meta box (mettre page ou post dans post_types)
   ========================================================================== */

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

  // check for a template type
	// $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  // if ($template_file == 'page_livre.php') {
	  add_filter( 'rwmb_meta_boxes', 'OneBlocMore_register_meta_boxes' );
	// }

function OneBlocMore_register_meta_boxes( $meta_boxes )
{
	 $prefix = 'rw_';
    // Home
    $meta_boxes[] = array(
        'id'			=> 'bloc1',
        'title'		=> 'bloc1',
        'post_types'	=> array('post'),
        'context'		=> 'normal',
        'priority'	=> 'high',
        'fields' => array(
            array(
                'id'    => $prefix . 'bloc1',
                'type'  => 'wysiwyg'
            ),
        )
    );

 	return $meta_boxes;
}
function TwoBlocMore_register_meta_boxes( $meta_boxes )
{
	 $prefix = 'rw_';
    // Home
    $meta_boxes[] = array(
        'id'			=> 'bloc1',
        'title'		=> 'bloc1',
        'post_types'	=> array('page'),
        'context'		=> 'normal',
        'priority'	=> 'high',
        'fields' => array(
            array(
                'id'    => $prefix . 'bloc1',
                'type'  => 'wysiwyg'
            ),
        )
    );
		$meta_boxes[] = array(
				'id'			=> 'bloc2',
				'title'		=> 'bloc2',
				'post_types'	=> array('page'),
				'context'		=> 'normal',
				'priority'	=> 'high',
				'fields' => array(
						array(
								'id'    => $prefix . 'bloc2',
								'type'  => 'wysiwyg'
						),
				)
		);

 	return $meta_boxes;
}

function ThreeBlocMore_register_meta_boxes( $meta_boxes )
{
	 $prefix = 'rw_';
    // Home
    $meta_boxes[] = array(
        'id'			=> 'bloc1',
        'title'		=> 'bloc1',
        'post_types'	=> array('page'),
        'context'		=> 'normal',
        'priority'	=> 'high',
        'fields' => array(
            array(
                'id'    => $prefix . 'bloc1',
                'type'  => 'wysiwyg'
            ),
        )
    );
		$meta_boxes[] = array(
				'id'			=> 'bloc2',
				'title'		=> 'bloc2',
				'post_types'	=> array('page'),
				'context'		=> 'normal',
				'priority'	=> 'high',
				'fields' => array(
						array(
								'id'    => $prefix . 'bloc2',
								'type'  => 'wysiwyg'
						),
				)
		);
		$meta_boxes[] = array(
				'id'			=> 'bloc3',
				'title'		=> 'bloc3',
				'post_types'	=> array('page'),
				'context'		=> 'normal',
				'priority'	=> 'high',
				'fields' => array(
						array(
								'id'    => $prefix . 'bloc3',
								'type'  => 'wysiwyg'
						),
				)
		);

 	return $meta_boxes;
}


// function Post_register_meta_boxes( $meta_boxes )
// {
// 	 $prefix = 'rw_';
//     // single
//     $meta_boxes[] = array(
//         'id'			=> 'price',
//         'title'		=> 'price',
//         'post_types'	=> array('post'),
//         'context'		=> 'normal',
//         'priority'	=> 'high',
//         'fields' => array(
//             array(
//                 'id'    => $prefix . 'price',
//                 'type'  => 'wysiwyg'
//             ),
//         )
//     );
//     $meta_boxes[] = array(
//         'id'			=> 'price_info',
//         'title'		=> 'price_info',
//         'post_types'	=> array('post'),
//         'context'		=> 'normal',
//         'priority'	=> 'high',
//         'fields' => array(
//             array(
//                 'id'    => $prefix . 'price_info',
//                 'type'  => 'wysiwyg'
//             ),
//         )
//     );
//
//
//     $meta_boxes[] = array(
//         'id'			=> 'gallerie',
//         'title'		=> 'Gallerie',
//         'post_types'	=> array('post'),
//         'context'		=> 'normal',
//         'priority'	=> 'high',
//         'fields' => array(
//             array(
//                 'id'    => $prefix . 'gal',
//                 'type'  => 'wysiwyg',
// 								'raw'   => true
//             ),
//         )
//     );
// 		$meta_boxes[] = array(
//         'id'			=> 'img',
//         'title'		=> 'img',
//         'post_types'	=> array('post'),
//         'context'		=> 'normal',
//         'priority'	=> 'high',
//         'fields' => array(
//             array(
//                 'id'    => $prefix . 'img',
//                 'type'  => 'image',
// 								'width' => 163,
// 								'height'=> 233
//             ),
//         )
//     );
// 		$meta_boxes[] = array(
//         'id'			=> 'file',
//         'title'		=> 'file',
//         'post_types'	=> array('post'),
//         'context'		=> 'normal',
//         'priority'	=> 'high',
//         'fields' => array(
//             array(
//                 'id'    => $prefix . 'file',
//                 'type'  => 'file'
//             ),
//         )
//     );
//  	return $meta_boxes;
// }
/* ==========================================================================
   Compress HTML (mettre true sur les settings ci-dessous au besoin
   ========================================================================== */
class WP_HTML_Compression
{
    // Settings
    protected $compress_css = false;
    protected $compress_js = false;
    protected $info_comment = false;
    protected $remove_comments = false;

    // Variables
    protected $html;
    public function __construct($html)
    {
   	 if (!empty($html))
   	 {
   		 $this->parseHTML($html);
   	 }
    }
    public function __toString()
    {
   	 return $this->html;
    }
    protected function bottomComment($raw, $compressed)
    {
   	 $raw = strlen($raw);
   	 $compressed = strlen($compressed);

   	 $savings = ($raw-$compressed) / $raw * 100;

   	 $savings = round($savings, 2);

   	 return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
    }
    protected function minifyHTML($html)
    {
   	 $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
   	 preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
   	 $overriding = false;
   	 $raw_tag = false;
   	 // Variable reused for output
   	 $html = '';
   	 foreach ($matches as $token)
   	 {
   		 $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;

   		 $content = $token[0];

   		 if (is_null($tag))
   		 {
   			 if ( !empty($token['script']) )
   			 {
   				 $strip = $this->compress_js;
   			 }
   			 else if ( !empty($token['style']) )
   			 {
   				 $strip = $this->compress_css;
   			 }
   			 else if ($content == '<!--wp-html-compression no compression-->')
   			 {
   				 $overriding = !$overriding;

   				 // Don't print the comment
   				 continue;
   			 }
   			 else if ($this->remove_comments)
   			 {
   				 if (!$overriding && $raw_tag != 'textarea')
   				 {
   					 // Remove any HTML comments, except MSIE conditional comments
   					 $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
   				 }
   			 }
   		 }
   		 else
   		 {
   			 if ($tag == 'pre' || $tag == 'textarea')
   			 {
   				 $raw_tag = $tag;
   			 }
   			 else if ($tag == '/pre' || $tag == '/textarea')
   			 {
   				 $raw_tag = false;
   			 }
   			 else
   			 {
   				 if ($raw_tag || $overriding)
   				 {
   					 $strip = false;
   				 }
   				 else
   				 {
   					 $strip = true;

   					 // Remove any empty attributes, except:
   					 // action, alt, content, src
   					 $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);

   					 // Remove any space before the end of self-closing XHTML tags
   					 // JavaScript excluded
   					 $content = str_replace(' />', '/>', $content);
   				 }
   			 }
   		 }

   		 if ($strip)
   		 {
   			 $content = $this->removeWhiteSpace($content);
   		 }

   		 $html .= $content;
   	 }

   	 return $html;
    }

    public function parseHTML($html)
    {
   	 $this->html = $this->minifyHTML($html);

   	 if ($this->info_comment)
   	 {
   		 $this->html .= "\n" . $this->bottomComment($html, $this->html);
   	 }
    }

    protected function removeWhiteSpace($str)
    {
   	 $str = str_replace("\t", ' ', $str);
   	 $str = str_replace("\n",  '', $str);
   	 $str = str_replace("\r",  '', $str);

   	 while (stristr($str, '  '))
   	 {
   		 $str = str_replace('  ', ' ', $str);
   	 }

   	 return $str;
    }
}

function wp_html_compression_finish($html)
{
    return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
    ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
