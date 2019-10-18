<?php
/**
 * Template Name: Profissionais
 *
 * The template for displaying pages with sidebar.
 *
 * @package marioernestoms
 */

global $current_user;
global $wp_roles;

get_header( 'dashboard' );

?>

<main role="main">
	<div class="container">
		<?php include( 'includes/loops/profissionais.php' ); ?>
	</div>
</main>

<?php get_footer( 'dashboard' ); ?>
