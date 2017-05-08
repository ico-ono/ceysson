<?php

/* ==========================================================================
   Register menu
   ========================================================================== */
function register_menu() {
	register_nav_menu('Primary', __('Main'));
}
add_action('init', 'register_menu');

/* ==========================================================================
   Reconfiguration des class/ID du menu
   ========================================================================== */
	class IBenic_Walker extends Walker_Nav_Menu {


		function start_lvl( &$output, $item, $depth=0 ) {
		    // depth dependent classes
				$menu_order = $item->menu_order;
		    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		    $classes = array();


		    $class_names = implode( ' ', $classes );

		    // build html
		    $output .= "<ul class='sub-menu'>";
				// $output .= "<li id='nav-item-'>";

		}

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
				$classes = array();
				$menu_order = $item->menu_order;
				$title = $item->title;
				$permalink = $item->url;
				$main_nav = wp_get_nav_menu_object("main-nav");
				$count = $main_nav->count;
				if(in_array("current_page_item",$item->classes)){
					$classes[] = 'current ';
				}

				// first et last item
				if ($item->menu_order == 1) {
				   $classes[] = 'first ';
				}
				if ($item->menu_order >= $count) {
				   $classes[] = 'last ';
				}
				$depth_classes = array(
				        // ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				        // ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				        // ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				        'nivo-' . $depth
				    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
				$classes2  = esc_attr( implode( '  ', $classes ) );

				$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
				$output .= "<li id='nav-item-".$menu_order ."' class='" . $classes2."'>";
				$output .= '<a href="'.$item->url.'" class="'. $classes2.$depth_class_names.'">';
				$output .= $title;
				$output .= '</a>';
    }



}


?>
