<?php 
/**
 * Template Name: Criar Jeitin
 *
 * @package Divi-Child
 * @author marioernestoms
 */

get_header( 'dashboard' );
global $current_user;
global $wp_roles;

?>

	<div class="wrapper">
		<!-- Sidebar Holder -->
		<?php require( 'template-parts/sidebar-left.php' ) ?>

		<!-- Page Content Holder -->
		<div id="content">

			<nav class="navbar">
				<div class="container-fluid">
						<?php require( 'template-parts/navbar-top.php' ) ?>
				</div>     
			</nav>

			<div class="col-lg-12">
				<div class="row">
					<?php require( 'template-parts/page-title.php' ) ?>
					
				</div>

				<div class="row">
					
					<?php if ( is_user_logged_in() ) : ?>
						<?php if ( current_user_can( 'franquia' ) ) : ?>     
								
							<?php require( 'template-parts/content-franquia.php' ) ?>

						<?php elseif ( current_user_can( 'e-commerce' ) ) : ?> 
								
							<?php require( 'template-parts/content-ecommerce.php' ) ?>
							
						<?php elseif ( current_user_can( 'mandabem' ) ) : ?> 

							<?php require( 'template-parts/content-mandabem.php' ) ?>

						<?php endif; ?> 
					<?php endif ?>

				</div>
				
			</div>

		</div>
		
	</div>

<?php get_footer( 'dashboard' ); ?>


