<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACF_Tester
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acf-tester' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$acf_tester_description = get_bloginfo( 'description', 'display' );
			if ( $acf_tester_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $acf_tester_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'acf-tester' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
<?php


if ( is_home() || is_front_page() ) {
	global $acf_tester_theme_mods;

	foreach ( array('acf_other_theme_mod','acf_option') as $acf_post_id ) {
		?>
		<pre><?php
			echo "// Post-ID: $acf_post_id\n";
			echo "// the_field: basic_text\n";
			the_field('basic_text',$acf_post_id );
			echo "\n";
			while ( have_rows('layout_repeater_simple',$acf_post_id) ) {
				the_row();

				echo "// the_sub_field: repeated_text\n";
				the_sub_field('repeated_text');
				echo "\n";

				echo "// the_sub_field: repeated_range\n";
				the_sub_field('repeated_range');
				echo "\n";
			}
		?></pre>
		<?php
	}

	foreach ( $acf_tester_theme_mods as $theme_mod ) {
		?>
			<div class="col-50">
				<pre>
	// Theme Mod: `<?php echo $theme_mod; ?>`
	<?php var_dump( get_theme_mod( $theme_mod ) ); ?>
				</pre>
			</div>
		<?php
	}

	?>
		<div class="col-100">
			<pre>
// Theme Mods
<?php var_dump( get_theme_mods() ); ?>
			</pre>
		</div>
	<?php


/*
	?>

		<div class="col-50">
			<pre>
	// get_field( 'basic_text', 'acf_option');
	<?php var_dump(get_field( 'basic_text', 'acf_option')); ?>

	// get_field( 'field_5b1fd7953daaf', 'acf_option');
	<?php var_dump(get_field( 'field_5b1fd7953daaf', 'acf_option')); ?>
			</pre>
		</div>

		<div class="col-50">
			<pre>
	// first field group
	// get_field( 'basic_text', 'acf_other_theme_mod');
	<?php var_dump(get_field( 'basic_text', 'acf_other_theme_mod')); ?>

	// get_field( 'field_5b1fd7953daaf', 'acf_other_theme_mod');
	<?php var_dump(get_field( 'field_5b1fd7953daaf', 'acf_other_theme_mod')); ?>

	// second field group
	// get_field( 'choice_checkbox', 'acf_other_theme_mod');
	<?php var_dump(get_field( 'choice_checkbox', 'acf_other_theme_mod')); ?>

	// get_field( 'field_5b1fd835a1ac9', 'acf_other_theme_mod');
	<?php var_dump(get_field( 'field_5b1fd835a1ac9', 'acf_other_theme_mod')); ?>
			</pre>
		</div>
<?php
*/
}

?>
<div id="content" class="site-content">
