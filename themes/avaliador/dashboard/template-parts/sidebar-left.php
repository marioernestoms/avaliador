<nav id="sidebar">
	<div class="sidebar-header">
		<img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/logo-mandabem.jpg' ?>" alt="">
		<strong>BS</strong>
	</div>

	<?php if ( is_user_logged_in() ) : ?>
		<?php if ( current_user_can( 'franquia' ) ) : ?> 
				
			<ul class="list-unstyled components">
				<li class="active">
					<a href="dashboard.php">
						<i class="glyphicon glyphicon-home"></i>
						Clientes
					</a>
				</li>

				<li>
					<a href="publication.php">
						<i class="glyphicon glyphicon-duplicate"></i>
						Coletas
					</a>
				</li>

				<li>
					<a href="my-publications.php">
						<i class="glyphicon glyphicon-briefcase"></i>
						Envios
					</a>
				</li>
				
				<li>
					<a href="#">
						<i class="glyphicon glyphicon-link"></i>
						Configurações
					</a>
				</li>
			</ul>

		<?php elseif ( current_user_can( 'e-commerce' ) ) : ?> 

			<div class="panel panel-colorful middle pad-all mar-top">
				<div class="media-body">
					<small>Total</small>
					<p class="text-2x mar-no text-semibold">R$ 78,00</p>
					<p class="mar-no">Vencimento 10 Nov</p>
				</div>
			</div>

			<?php
				wp_nav_menu( array(
					'menu'            => 'ecommerce',
					'items_wrap'      => '<ul class="fa-ul list-unstyled components">%3$s</ul>',
					'walker'          => '',
				) );
			?>
			
		<?php elseif ( current_user_can( 'mandabem' ) ) : ?> 

			<ul class="list-unstyled components">
				<li class="active">
					<a href="dashboard.php">
						<i class="glyphicon glyphicon-home"></i>
						Clientes
					</a>
				</li>

				<li>
					<a href="publication.php">
						<i class="glyphicon glyphicon-duplicate"></i>
						Coletas
					</a>
				</li>

				<li>
					<a href="my-publications.php">
						<i class="glyphicon glyphicon-briefcase"></i>
						Embalagens
					</a>
				</li>
				
				<li>
					<a href="#">
						<i class="glyphicon glyphicon-link"></i>
						Franquias
					</a>
				</li>

				<li>
					<a href="#">
						<i class="glyphicon glyphicon-link"></i>
						Pagamentos
					</a>
				</li>

				<li>
					<a href="#">
						<i class="glyphicon glyphicon-link"></i>
						Ajuda
					</a>
				</li>
			</ul>

		<?php endif; ?> 
	<?php endif ?>

	<!--<ul class="list-unstyled CTAs">
		<li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
		<li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>-->
	</ul>
</nav>
