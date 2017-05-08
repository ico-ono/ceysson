<?php


/* ==========================================================================
   Meta box (mettre page ou post dans post_types)
   ========================================================================== */

$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

  // check for a template type
	// $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  // if ($template_file == 'page_livre.php') {
	  add_filter( 'rwmb_meta_boxes', 'TwoBlocMore_register_meta_boxes' );
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
        'title'		=> 'texte en vert',
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
		$meta_boxes[] = array(
				'id'			=> 'bloc2',
				'title'		=> 'gallerie',
				'post_types'	=> array('post'),
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

 ?>
