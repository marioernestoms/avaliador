<?php 
/**
 * Template Name: Publicações
 *
 * @package Divi-Child
 * @author marioernestoms
 */

get_header( 'dashboard' ); ?>

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

					<div class="col-lg-12">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Nova Publicação</h3>
							</div>

							<!-- NEW FORM -->

							<?php echo do_shortcode("[custom-post]"); ?>


						 	<!-- NEW FORM -->

				
						</div>
					</div>

				</div>
				
			</div>

		</div>
		
	</div>

<?php get_footer( 'dashboard' ); ?>
