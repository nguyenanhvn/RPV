<?php
// SLIDER METABOX
add_filter( 'rwmb_meta_boxes', 'slider_meta_boxes' );
function slider_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_slider_";
	$meta_boxes[] = array(
		'title'      => 'Slider Option',
		'desc'       => 'Add Slide Item Into Slider',
		'post_types' => 'slider',
		'fields' => array(
			array(
				'name'       => 'Slider List',
				'id'         => $prefix . 'group',
				'type'       => 'group',
				'clone'      => true,
				'collapsible' => true,
				'default_state' => 'collapsed',
				'group_title' => 'Slide',
				'sort_clone' => true,
				'fields' => array(
					array(
						'name'             => 'Slider Image',
						'id'               => $prefix . 'image',
						'type'             => 'single_image',
					),
					array(
						'name'       => 'Slider Post',
						'type'       => 'post',
						'id'		 => $prefix . 'post',
						'post_type'	 => 'post',
						'ajax'		 => true,
						'multiple'	 => false,
					),	
				),
			),
		)
	);
	return $meta_boxes;
}
// HOME METABOX
add_filter( 'rwmb_meta_boxes', 'home_meta_boxes' );
function home_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_homepage_";
	$meta_boxes[] = array(
		'title'      => 'HomePage Option',
		'post_types' => 'page',
		'include'   => array(
			'template'    => array( 'template-home.php'),
		),
		'context' => 'after_title',
		'fields' => array(
			array(
				'name'       => "What's On Background Image",
				'id'               	=> $prefix . 'whatonbg',
				'type'				=> 'single_image',
			),
			array(
				'name'       => "What's On Description",
				'id'               	=> $prefix . 'whatondes',
				'type'				=> 'wysiwyg',
				'raw'     			=> false,
				'options' 			=> array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),
			array(
				'name'             => "What's On Button Text",
				'id'               => $prefix . 'whatonbtntext',
				'type'             => 'text',
			),
			array(
				'name'             => "What's On Button Link",
				'id'               => $prefix . 'whatonbtnlink',
				'type'             => 'text',
			),
			array(
				'name'       => "What's On Select Post",
				'type'       => 'post',
				'id'		 => $prefix . 'whaton',
				'post_type'	 => 'post',
				'ajax'		 => true,
				'multiple'	 => true,
			),
			array(
				'name'       => 'Why Exhibit',
				'id'         => $prefix . 'exhibit_h_group',
				'type'       => 'group',
				'clone'      => true,
				'sort_clone' => true,
				'max_clone' => 2,
				'fields' => array(
					array(
						'name'             => 'Exhibit Image',
						'id'               => $prefix . 'exhibit_h_image',
						'type'             => 'single_image',
					),
					array(
						'name'             => 'Exhibit title',
						'id'               => $prefix . 'exhibit_h_title',
						'type'             => 'text',
					),
					array(
						'name'             => 'Exhibit Tag',
						'id'               => $prefix . 'exhibit_h_des',
						'type'				=> 'wysiwyg',
						'raw'     			=> false,
						'options' 			=> array(
							'textarea_rows' => 4,
							'teeny'         => true,
						),
					),
					array(
						'name'             => 'Exhibit Link',
						'id'               => $prefix . 'exhibit_h_link',
						'type'    => 'text',
					),
				),
			),
		)
	);
	return $meta_boxes;
}
// EVENT METABOX
// add_filter( 'rwmb_meta_boxes', 'event_meta_boxes' );
// function event_meta_boxes( $meta_boxes ) {
// 	$prefix = "prefix_event-";
// 	$meta_boxes[] = array(
// 		'title'      => 'Event Option',
// 		'post_types' => 'post',
// 		'cat'	=> array(15,17),
// 		'fields' => array(
// 			array(
// 				'name'       => 'Locate',
// 				'id'         => $prefix . 'locate',
// 				'type'       => 'text',
// 			),
// 		)
// 	);
// 	return $meta_boxes;
// }
// E-BROCHURES METABOX
add_filter( 'rwmb_meta_boxes', 'brochure_meta_boxes' );
function brochure_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_brochure-";
	$meta_boxes[] = array(
		'title'      => 'E-Brochures Option',
		'post_types' => 'e-brochures',
		'context' => 'after_title',
		'fields' => array(
			array(
				'id'               => $prefix . 'file-type',
				'name'             => 'File Type',
				'type'             => 'text',
			),
			array(
				'id'               => $prefix . 'file-size',
				'name'             => 'File Size',
				'type'             => 'text',
			),
			array(
				'name'    => 'Content',
				'id'      => $prefix . 'paragraph',
				'type'    => 'wysiwyg',
				'raw'     => true,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),
			array(
				'id'               => $prefix . 'download',
				'name'             => 'Download Link',
				'type'             => 'text',
			),
		)
	);
	return $meta_boxes;
}
// BOOK A STAND METABOX
add_filter( 'rwmb_meta_boxes', 'bookastand_meta_boxes' );
function bookastand_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_bookastand-";
	$meta_boxes[] = array(
		'title'      => 'Book A Stand Option',
		'post_types' => 'bookastand',
		'context' => 'after_title',
		'fields' => array(
			array(
				'name'    => 'Content',
				'id'      => $prefix . 'paragraph',
				'type'    => 'wysiwyg',
				'raw'     => true,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),
		)
	);
	return $meta_boxes;
}
// TESTIMONIAL METABOX
add_filter( 'rwmb_meta_boxes', 'testimonial_meta_boxes' );
function testimonial_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_testimonial-";
	$meta_boxes[] = array(
		'title'      => 'Testimonial Profile',
		'post_types' => 'page',
		'context' => 'after_title',
		'include'   => array(
			'template'    => array( 'template-exhibiting.php'),
		),
		'fields' => array(
			array(
				'id'               => $prefix . 'head_title',
				'name'             => 'Head Title',
				'type'             => 'text',
			),
			array(
				'name'       => 'Group List',
				'id'         => $prefix . 'group',
				'type'       => 'group',
				'clone'      => true,
				'collapsible' => true,
				'default_state' => 'collapsed',
				'group_title' => 'Item',
				'sort_clone' => true,
				'max_clone' => 10,
				'fields' => array(
					array(
						'name'             => 'Avatar',
						'id'               => $prefix . 'avt',
						'type'             => 'single_image',
					),
					array(
						'name'             => 'Title',
						'id'               => $prefix . 'title',
						'type'             => 'text',
					),
					array(
						'name'             => 'Position',
						'id'               => $prefix . 'pos',
						'type'             => 'text',
					),
					array(
						'name'    => 'Information',
						'id'      => $prefix . 'paragraph',
						'type'    => 'wysiwyg',
						'raw'     => true,
						'options' => array(
							'textarea_rows' => 4,
							'teeny'         => true,
						),
					),
				),
			)
		)
	);
	return $meta_boxes;
}
// EXHIBIT TEMPLATE METABOX
add_filter( 'rwmb_meta_boxes', 'exhibit_meta_boxes' );
function exhibit_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_exhibit-";
	$meta_boxes[] = array(
		'title'      => 'Template Option',
		'post_types' => 'page',
		'context' => 'after_title',
		'include'   => array(
			'template'    => array( 'template-exhibiting.php'),
		),
		'fields' => array(
			array(
				'name'		=> 'Title',
				'id'		=> $prefix . 'whyexhibit_title',
				'type'		=> 'text',
			),
			array(
				'name'		=> 'Why Exhibit Image',
				'id'		=> $prefix . 'whyexhibit_img',
				'type'		=> 'single_image',
			),
			array(
				'name'		=> 'Why Exhibit background',
				'id'		=> $prefix . 'whyexhibit_bg',
				'type'		=> 'single_image',
			),
			array(
				'name'       => 'Group List',
				'id'         => $prefix . 'group',
				'type'       => 'group',
				'clone'      => true,
				'collapsible' => true,
				'max_clone' => 4,
				'default_state' => 'collapsed',
				'group_title' => 'Reason',
				'sort_clone' => true,
				'fields' => array(
					array(
						'name'             => 'Image',
						'id'               => $prefix . 'image',
						'type'             => 'single_image',
					),
					array(
						'name'             => 'Title',
						'id'               => $prefix . 'title',
						'type'             => 'text',
					),
					array(
						'name'    => 'Content',
						'id'      => $prefix . 'paragraph',
						'type'    => 'wysiwyg',
						'raw'     => true,
						'options' => array(
							'textarea_rows' => 4,
							'teeny'         => true,
						),
					),
				),
			),
			array(
				'name'		=> 'Exposure Title',
				'id'		=> $prefix . 'exposure_title',
				'type'		=> 'text',
			),
			array(
				'name'       => 'Exposure List',
				'id'         => $prefix . 'exposure_group',
				'type'       => 'group',
				'clone'      => true,
				'collapsible' => true,
				'default_state' => 'collapsed',
				'group_title' => 'Exposure',
				'sort_clone' => true,
				'fields' => array(
					array(
						'name'             => 'Image',
						'id'               => $prefix . 'image',
						'type'             => 'single_image',
					),
					array(
						'name'             => 'Title',
						'id'               => $prefix . 'title',
						'type'             => 'text',
					),
				),
			),
			array(
				'name'       => 'Be an Exhibitor / I am an Exhibitor Background',
				'id'         => $prefix . 'bae-iae-bg',
				'type'             => 'single_image',
			),
			array(
				'name'       => 'Be an Exhibitor / I am an Exhibitor',
				'id'         => $prefix . 'bae-iae',
				'type'       => 'group',
				'clone'      => true,
				'collapsible' => true,
				'default_state' => 'collapsed',
				'max_clone' => 2,
				'group_title' => 'Item',
				'sort_clone' => true,
				'fields' => array(
					array(
						'name'             => 'White Text',
						'id'               => $prefix . 'white_text',
						'type'             => 'text',
					),
					array(
						'name'             => 'Blue Text',
						'id'               => $prefix . 'blue_text',
						'type'             => 'text',
					),
					array(
						'name'             => 'Hyperlink 1 Text',
						'id'               => $prefix . 'hyperlink1_text',
						'type'             => 'text',
					),
					array(
						'name'             => 'Hyperlink 1',
						'id'               => $prefix . 'hyperlink1',
						'type'             => 'text',
					),
					array(
						'name'             => 'Hyperlink 2 Text',
						'id'               => $prefix . 'hyperlink2_text',
						'type'             => 'text',
					),
					array(
						'name'             => 'Hyperlink 2',
						'id'               => $prefix . 'hyperlink2',
						'type'             => 'text',
					),
				),
			),
		)
	);
	return $meta_boxes;
}
// APPLICATION FORM E-BROCHURE TEMPLATE METABOX
add_filter( 'rwmb_meta_boxes', 'appEBrochure_meta_boxes' );
function appEBrochure_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_appEBrochure-";
	$meta_boxes[] = array(
		'title'      => 'Template EB Option',
		'post_types' => 'page',
		'context' => 'after_title',
		'include'   => array(
			'template'    => array( 'template-applicationFormEB.php'),
		),
		'fields' => array(
			array(
				'name'             => 'Blue Text',
				'id'               => $prefix . 'blue_title',
				'type'             => 'text',
			),
			array(
				'name'             => 'Content',
				'id'               => $prefix . 'agree_text',
				'type'    => 'wysiwyg',
				'raw'     => true,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),
			array(
				'name'		=> 'Image Banner',
				'id'		=> $prefix . 'img_banner',
				'type'		=> 'single_image',
			),
			array(
				'name'             => 'Contact Form Shortcode',
				'id'               => $prefix . 'cf7_shortcode',
				'type'    => 'text',
			),
		)
	);
	return $meta_boxes;
}
// // APPLICATION FORM BOOK A STAND TEMPLATE METABOX
// add_filter( 'rwmb_meta_boxes', 'appBookAStand_meta_boxes' );
// function appBookAStand_meta_boxes( $meta_boxes ) {
// 	$prefix = "prefix_appBookAStand-";
// 	$meta_boxes[] = array(
// 		'title'      => 'Template BAS Option',
// 		'post_types' => 'page',
// 		'context' => 'after_title',
// 		'include'   => array(
// 			'template'    => array( 'template-applicationFormBAS.php'),
// 		),
// 		'fields' => array(
// 			array(
// 				'name'             => 'Blue Text',
// 				'id'               => $prefix . 'blue_title',
// 				'type'             => 'text',
// 			),
// 			array(
// 				'name'             => 'White Text',
// 				'id'               => $prefix . 'white_title',
// 				'type'             => 'text',
// 			),
// 			array(
// 				'name'             => 'Agree Text',
// 				'id'               => $prefix . 'agree_text',
// 				'type'    => 'wysiwyg',
// 				'raw'     => true,
// 				'options' => array(
// 					'textarea_rows' => 4,
// 					'teeny'         => true,
// 				),
// 			),
// 		)
// 	);
// 	return $meta_boxes;
// }
// ABOUT TEMPLATE METABOX
add_filter( 'rwmb_meta_boxes', 'ruleregulations_meta_boxes' );
function ruleregulations_meta_boxes( $meta_boxes ) {
	$prefix = "prefix_ruleregulations_";
	$meta_boxes[] = array(
		'title'      => 'Page Option',
		'post_types' => 'page',
		'include'   => array(
			'template'    => array( 'template-ruleandregulation.php'),
		),
		'context' => 'after_title',
		'fields' => array(
			array(
				'name'		=> 'Image Banner',
				'id'		=> $prefix . 'img_banner',
				'type'		=> 'single_image',
			),
			array(
				'name'		=> 'Descriptions',
				'id'      => $prefix . 'paragraph',
				'type'    => 'wysiwyg',
				'raw'     => true,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),
			array(
				'name'		=> 'Button Text',
				'id'		=> $prefix . 'btn_text',
				'type'		=> 'text',
			),
			array(
				'name'		=> 'Button Link',
				'id'		=> $prefix . 'btn_link',
				'type'		=> 'text',
			),
			array(
				'name'       => 'Collapse List',
				'id'         => $prefix . 'group',
				'type'       => 'group',
				'clone'      => true,
				'collapsible' => true,
				'default_state' => 'collapsed',
				'group_title' => 'Item',
				'sort_clone' => true,
				'fields' => array(
					array(
						'name'             => 'Title',
						'id'               => $prefix . 'title',
						'type'             => 'text',
					),						
					array(
						'name'    => 'Content',
						'id'      => $prefix . 'content',
						'type'    => 'wysiwyg',
						'raw'     => true,
						'options' => array(
							'textarea_rows' => 4,
							'teeny'         => true,
						),
					),
				),
			),
		)
	);
	return $meta_boxes;
}
// Press Coverage Template
add_filter( 'rwmb_meta_boxes', 'prefix_presscoverage_meta_boxes' );
function prefix_presscoverage_meta_boxes( $meta_boxes ){
	$prefix = "prefix_presscoverage-";
	$meta_boxes[] = array(
		'title'      => 'Get Your Media Pass',
		'taxonomies' => 'category',
		'fields' => array(
			array(
				'name' => 'Title',
				'id'   => $prefix . 'title',
				'type' => 'text',
			),
			array(
				'name' => 'Content',
				'id'   => $prefix . 'content',
				'type' => 'wysiwyg',
				'raw'     => true,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'prefix_presscoverage_featurethumb_meta_boxes' );
function prefix_presscoverage_featurethumb_meta_boxes( $meta_boxes ){
	$prefix = "prefix_presscoverage_featurethumb-";
	$meta_boxes[] = array(
		'title'      => 'Get Your Media Pass',
		'include' => array(
			'category' => 'Press Coverage',
		),
		'fields' => array(
			array(
				'name' => 'Vertical Thumbnail',
				'id'         => $prefix . 'thumb',
				'type'             => 'single_image',
			),
		),
	);
	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'prefix_ebrochure_featurethumb_meta_boxes' );
function prefix_ebrochure_featurethumb_meta_boxes( $meta_boxes ){
	$prefix = "prefix_ebrochure_featurethumb-";
	$meta_boxes[] = array(
		'title'      => 'Get Your Media Pass',
		'include' => array(
			'category' => 'E-Brochures',
		),
		'fields' => array(
			array(
				'name' => 'Vertical Thumbnail',
				'id'         => $prefix . 'thumb',
				'type'             => 'single_image',
			),
		),
	);
	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );

function your_prefix_register_meta_boxes( $meta_boxes ) {
	$prefix = 'prefix_seminar_tax-';

	$meta_boxes[] = array (
		'title' => esc_html__( 'Seminar Tax', 'text-domain' ),
		'id' => 'seminar-tax',
		'context' => 'after_title',
		'priority' => 'high',
		'fields' => array(
			array (
				'id' => $prefix . 'seminar_image',
				'type' => 'single_image',
				'name' => esc_html__( 'Background Image', 'text-domain' ),
			),
			array (
				'id' => $prefix . 'text_img',
				'type' => 'single_image',
				'name' => esc_html__( 'Text Image', 'text-domain' ),
			),
			array (
				'id' => $prefix . 'vertical_text',
				'type' => 'text',
				'name' => esc_html__( 'Vertical Title', 'text-domain' ),
			),
			array (
				'id' => $prefix . 'cat_title',
				'type' => 'text',
				'name' => esc_html__( 'Category Title', 'text-domain' ),
			),
			array (
				'id' => $prefix . 'head_title',
				'type' => 'text',
				'name' => esc_html__( 'Title', 'text-domain' ),
			),
			array (
				'id' => $prefix . 'hyperlink',
				'type' => 'url',
				'name' => esc_html__( 'Hyperlink', 'text-domain' ),
			),
			array (
				'id' => $prefix . 'button_text',
				'type' => 'text',
				'name' => esc_html__( 'Button Text', 'text-domain' ),
			),
		),
		'include' => array(
			'category' => array('new-media',"Tin Tức & Truyền Thông"),
		),
	);

	return $meta_boxes;
}