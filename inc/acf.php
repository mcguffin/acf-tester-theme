<?php

function acf_tester_init_customizer() {
	global $acf_tester_theme_mods;

	$acf_tester_theme_mods = array();

	if ( function_exists('acf_add_customizer_panel') && function_exists('acf_add_customizer_section') ) {
		$opt_panel = acf_add_customizer_panel( array(
			'id'			=> 'acf_options_panel',
			'title'			=> 'ACF Options',
			'description'	=> 'Some Settings brougt to you by ACF.',
			'priority'		=> 20,
		) );

		$mod_panel = acf_add_customizer_panel( array(
			'id'			=> 'acf_theme_mod_panel',
			'title'			=> 'ACF Theme Mods',
			'description'	=> 'Some Settings brougt to you by ACF.',
			'priority'		=> 20,
		) );

		$post_panel = acf_add_customizer_panel( array(
			'id'			=> 'acf_post_panel',
			'title'			=> 'ACF Post',
			'description'	=> 'Some Settings brougt to you by ACF.',
			'priority'		=> 20,
		) );

		$term_panel = acf_add_customizer_panel( array(
			'id'			=> 'acf_term_panel',
			'title'			=> 'ACF Term',
			'description'	=> 'Some Settings brougt to you by ACF.',
			'priority'		=> 20,
		) );





		acf_add_customizer_section( array(
			'title'			=> 'Current Post',
			'description'	=> 'Some ACF-Fields.',
			'storage_type'	=> 'post',
//			'panel'			=> $post_panel
		) );
		acf_add_customizer_section( array(
			'title'			=> 'Current Term',
			'description'	=> 'Some ACF-Fields.',
			'storage_type'	=> 'term',
//			'panel'			=> $term_panel
		) );




		$acf_tester_theme_mods[] = acf_add_customizer_section( array(
			'panel'			=> $mod_panel,
			'title'			=> 'Theme Mod',
			'description'	=> 'Some ACF-Fields.',
			'storage_type'	=> 'theme_mod',
			'post_id'		=> 'acf_theme_mod',
		) );


		$acf_tester_theme_mods[] = acf_add_customizer_section( array(
			'panel'			=> $mod_panel,
			'title'			=> 'Other Theme Mod',
			'description'	=> 'Some ACF-Fields.',
			'storage_type'	=> 'theme_mod',
			'post_id'		=> 'acf_other_theme_mod',
		) );


		acf_add_customizer_section( array(
			'panel'			=> $opt_panel,
			'title'			=> 'Option Basics',
			'description'	=> 'Some ACF-Fields.',
			'storage_type'	=> 'option',
			'post_id'		=> 'acf_option',
		) );

		acf_add_customizer_section( array(
			'panel'			=> $opt_panel,
			'title'			=> 'Option Repeatables',
			'description'	=> 'Some ACF-Fields.',
			'storage_type'	=> 'option',
			'post_id'		=> 'acf_option',
		) );


	}
}

function acf_tester_init_frontend_forms() {
	// same post
	$f = acf_register_form(array(
		/* (string) Unique identifier for the form. Defaults to 'acf-form' */
		'id'					=> 'acf-form-default',

		/* (int|string) The post ID to load data from and save data to. Defaults to the current post ID.
		Can also be set to 'new_post' to create a new post on submit */
		'post_id'				=> 'new_post',

		/* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
		The above 'post_id' setting must contain a value of 'new_post' */
		'new_post'				=> array(
			'post_title'	=> 'Submitted on ' . date(get_option( 'date_format' ) . ' '.get_option( 'time_format' )),
			'post_type'		=> 'submission',
		),

		/* (array) An array of field group IDs/keys to override the fields displayed in this form */
		'field_groups'			=> false,

		/* (array) An array of field IDs/keys to override the fields displayed in this form */
		'fields'				=> false,

		/* (boolean) Whether or not to show the post title text field. Defaults to false */
		'post_title'			=> false,

		/* (boolean) Whether or not to show the post content editor field. Defaults to false */
		'post_content'			=> false,

		/* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
		'form'					=> true,

		/* (array) An array or HTML attributes for the form element */
		'form_attributes'		=> array(),

		/* (string) The URL to be redirected to after the form is submit. Defaults to the current URL with a GET parameter '?updated=true'.
		A special placeholder '%post_url%' will be converted to post's permalink (handy if creating a new post) */
		'return'				=> '',

		/* (string) Extra HTML to add before the fields */
		'html_before_fields'	=> '',

		/* (string) Extra HTML to add after the fields */
		'html_after_fields'		=> '',

		/* (string) The text displayed on the submit button */
		'submit_value'			=> __("Submit", 'acf'),

		/* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
		'updated_message'		=> __("Post updated", 'acf'),

		/* (string) Determines where field labels are places in relation to fields. Defaults to 'top'.
		Choices of 'top' (Above fields) or 'left' (Beside fields) */
		'label_placement'		=> 'top',

		/* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'.
		Choices of 'label' (Below labels) or 'field' (Below fields) */
		'instruction_placement'	=> 'label',

		/* (string) Determines element used to wrap a field. Defaults to 'div'
		Choices of 'div', 'tr', 'td', 'ul', 'ol', 'dl' */
		'field_el'				=> 'div',

		/* (string) Whether to use the WP uploader or a basic input for image and file fields. Defaults to 'wp'
		Choices of 'wp' or 'basic'. Added in v5.2.4 */
		'uploader'				=> 'wp',

		/* (boolean) Whether to include a hidden input field to capture non human form submission. Defaults to true. Added in v5.3.4 */
		'honeypot'				=> true,

		/* (string) HTML used to render the updated message. Added in v5.5.10 */
		'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',

		/* (string) HTML used to render the submit button. Added in v5.5.10 */
		'html_submit_button'	=> '<input type="submit" class="acf-button button button-primary button-large" value="%s" />',

		/* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
		'html_submit_spinner'	=> '<span class="acf-spinner"></span>',

		/* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
		'kses'					=> true
	));

}

function acf_tester_init_options_page() {
	acf_add_options_sub_page( array(
		'page_title'	=> 'ACF Theme Options',
		'description'	=> 'Some more Settings brougt to you by ACF.',
		'post_id'		=> 'acf_option',
		'parent_slug'	=> 'themes.php',
	) );
}

add_action('init','acf_tester_init_customizer');

add_action('init','acf_tester_init_frontend_forms');

add_action('init','acf_tester_init_options_page');

// acf form shortcode
add_action('template_redirect',function(){
	if ( is_singular() && false !== strpos(get_queried_object()->post_content, '[acf_form') ) {
		acf_form_head();
	}
});
add_shortcode( 'acf_form', function($atts,$content){
	acf_form($atts['id']);
} );


add_filter('acf/fields/google_map/api',function($api){
	$api_key_file = get_template_directory().'/~gm-api-key.php';
	if ( file_exists($api_key_file) ) {
		$api['key'] = include $api_key_file;
	}
	return $api;
});




function acf_tester_dump_fields( $post_id, $fields = null ) {
	if ( is_numeric( $post_id ) ) {
		$field_group_filter = array(
			'post_id'		=> $post_id,
		);
	} else {
		$field_group_filter = array(
			'customizer'	=> $post_id,
			// 'taxonomy' => '',
			//
		);

		// options pages
		foreach ( acf_get_options_pages() as $page ) {
			if ( $page['post_id'] === $post_id ) {
				$field_group_filter['options_page'] = $page['menu_slug'];
				break;
			}
		}
	}

	?>
	<pre><?php
		printf( "<strong>Post-ID: %s\n%s</strong>\n\n", $post_id, str_repeat( '=', mb_strlen($post_id) + 9 ) );
		foreach ( acf_get_field_groups( $field_group_filter ) as $field_group ) {

			printf( "<strong>%s\n%s</strong>\n", $field_group['title'], str_repeat('-',mb_strlen($field_group['title'])) );

			$fields = acf_get_fields( $field_group['ID'] );
			foreach ( $fields as $field ) {
				if ( empty( $field['name'] ) ) {
					continue;
				}
				printf( '<strong>%s</strong> %s' . "\n", $field['name'], var_export( get_field( $field['key'], $post_id ), true ) );

			}
			echo "\n";
		}
	?></pre>
	<?php

}
