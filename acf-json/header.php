<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<section id="branding">
<div id="site-title"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?></div>
<div id="site-description"><?php bloginfo( 'description' ); ?></div>
</section>
<nav id="menu" role="navigation">
<div id="search">
<?php get_search_form(); ?>
</div>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>
</header>
<div id="container">
	<pre><?php var_dump(get_theme_mod('save_in_theme_mod')); ?></pre>
	<pre><?php var_dump(get_theme_mod('save_in_second_theme_mod')); ?></pre>

<div style="border:1px solid;#ccc;background:#fff;width:40%;float:left">
	<h2>Theme Mod <code>some_theme_mod</code></h2>
	<pre><?php the_field( 'test_checkbox', 'some_theme_mod' ); ?></pre>
	<pre><?php the_field( 'test_radio', 'some_theme_mod' ); ?></pre>
	<pre><?php the_field( 'test_select', 'some_theme_mod' ); ?></pre>
	<pre><?php the_field( 'test_true_false', 'some_theme_mod' ); ?></pre>
	<pre><?php the_field( 'test_button_group', 'some_theme_mod' ); ?></pre>
	<pre><?php the_field( 'cat_text', 'some_theme_mod' ); ?></pre>
	<pre><?php the_field( 'cat_color', 'some_theme_mod' ); ?></pre>
</div>

<div style="border:1px solid;#ccc;background:#fff;width:40%;float:left">
	<h2>Theme Mod <code>save_second_theme_mod</code></h2>
	<pre><?php the_field( 'test_checkbox', 'savesecondthememod' ); ?></pre>
	<pre><?php the_field( 'test_radio', 'savesecondthememod' ); ?></pre>
	<pre><?php the_field( 'test_select', 'savesecondthememod' ); ?></pre>
	<pre><?php the_field( 'test_true_false', 'savesecondthememod' ); ?></pre>
	<pre><?php the_field( 'test_button_group', 'savesecondthememod' ); ?></pre>
	<pre><?php the_field( 'cat_text', 'savesecondthememod' ); ?></pre>
	<pre><?php the_field( 'cat_color', 'savesecondthememod' ); ?></pre>
</div>

<div style="border:1px solid;#ccc;background:#fff;width:40%;float:left">
	<h2>Option <code>theme_options</code></h2>
	<pre><?php the_field( 'test_checkbox', 'theme_options' ); ?></pre>
	<pre><?php the_field( 'test_radio', 'theme_options' ); ?></pre>
	<pre><?php the_field( 'test_select', 'theme_options' ); ?></pre>
	<pre><?php the_field( 'test_true_false', 'theme_options' ); ?></pre>
	<pre><?php the_field( 'test_button_group', 'theme_options' ); ?></pre>
</div>
<hr style="clear:both;" />
<?php
the_field('test_checkbox',1241);
the_field('test_checkbox','post_1241');
?>
<hr style="clear:both;" />
