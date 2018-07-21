<?php



function acf_tester_register_post_types() {
	register_post_type('book',array(
		'label'			=> 'Books',
		'public'		=> true,
		'has_archive'	=> true,
		'menu_position'	=> 25,
	));


	register_post_type('person',array(
		'label'			=> 'People',
		'public'		=> true,
		'has_archive'	=> true,
		'menu_position'	=> 30,
	));

	register_taxonomy('genre',array('book'),array(
		'public'	=> true,
		'labels'	=> array(
			'name'			=> 'Genres',
			'singular_name'	=> 'Genre',
		)
	));
	register_taxonomy('genre',array('book'),array(
		'public'	=> true,
		'labels'	=> array(
			'name'			=> 'Genres',
			'singular_name'	=> 'Genre',
		)
	));
	register_taxonomy('nastiness',array('book','person'),array(
		'public'	=> true,
		'labels'	=> array(
			'name'			=> 'Nastiness Levels',
			'singular_name'	=> 'Nastiness Level',
		)
	));



	register_post_type('submission',array(
		'label'			=> 'Submission',
		'public'		=> false,
		'has_archive'	=> false,
		'show_ui'		=> true,
		'menu_position'	=> 35,
		'supports'		=> false,
	));

}


add_action( 'init', 'acf_tester_register_post_types' );
