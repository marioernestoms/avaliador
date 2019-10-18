<?php 
/**
 * Template Name: Dashboard
 *
 * @package Divi-Child
 * @author marioernestoms
 */

acf_form_head();

if ( current_user_can( 'franquia' ) ) {

	get_header( 'franquia' );

} elseif ( current_user_can( 'e-commerce' ) ) {

	get_header( 'ecommerce' );

} elseif ( current_user_can( 'mandabem' ) ) {

	get_header( 'mandabem' );

}

global $current_user;
global $wp_roles;

?>

	<?php if ( is_user_logged_in() ) : ?>
		<?php if ( current_user_can( 'franquia' ) ) : ?>     
				
			<?php require( 'content-franquia.php' ) ?>

		<?php elseif ( current_user_can( 'e-commerce' ) ) : ?> 
				
			<?php require( 'content-ecommerce.php' ) ?>
			
		<?php elseif ( current_user_can( 'mandabem' ) ) : ?> 

			<?php require( 'content-mandabem.php' ) ?>

		<?php endif; ?> 
		
	<?php else : ?>

		<?php require( 'template-parts/login.php' ) ?>

	<?php endif ?>

	

<?php get_footer( 'dashboard' ); ?>
