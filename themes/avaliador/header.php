<?php
/**
 * Header.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package marioernestoms
 */

global $current_user;
global $wp_roles;

?>
<!DOCTYPE html>

		<title></title>

	</head>

	<body>

<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0 !important;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php the_title(); ?></title>

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
