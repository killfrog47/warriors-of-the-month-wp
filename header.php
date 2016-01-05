<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Warriors_of_the_month
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body>
	<header>
		<div class="hero-marquee">
			<img src="<?php echo(get_header_image()); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" class="logo">
		</div>
	</header>
	<?php if (function_exists(clean_custom_menus())) clean_custom_menus(); ?>
