<?php

add_action( 'customize_register', function($wp_customize){


	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'header_site_title', array(
          'selector' => '.site-title a',
          'settings' => array( 'blogname' ),
          'render_callback' => function() {
              return get_bloginfo( 'name', 'display' );
          },
    ) );

} );
