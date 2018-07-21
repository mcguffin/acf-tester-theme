<?php



function acf_tester_register_post_types() {
	register_post_type('books',array(
		'label'			=> 'Books',
		'public'		=> true,
		'has_archive'	=> true,
		'menu_position'	=> 25,
	));


	register_post_type('people',array(
		'label'			=> 'People',
		'public'		=> true,
		'has_archive'	=> true,
		'menu_position'	=> 30,
	));


}


add_action( 'init', 'acf_tester_register_post_types' );
