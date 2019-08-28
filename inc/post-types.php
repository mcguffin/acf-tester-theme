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
	register_taxonomy('nastiness',array('post','book','person'),array(
		'public'	=> true,
		'show_admin_column'	=> true,
		'labels'	=> array(
			'name'			=> 'Nastiness Levels',
			'singular_name'	=> 'Nastiness Level',
		)
	));

}


add_action( 'init', 'acf_tester_register_post_types' );
