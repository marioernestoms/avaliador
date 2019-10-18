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
	<header class="ecommerce">
		<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php">Avaliador</a>
			</div>
			<div id="navbar" class="nav navbar-nav navbar-right navbar-collapse collapse">
				<a href="<?php the_permalink(); ?>login" class="btn-entrar">Entrar</a>
			</div><!--/.nav-collapse -->
		</div>
		</nav>
	</header>  