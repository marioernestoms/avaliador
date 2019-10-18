<!--NAVBAR-->
<!--===================================================-->
<header id="navbar">
	<div id="navbar-container" class="boxed">

		<!--Navbar Dropdown-->
		<!--================================-->
		<div class="navbar-content clearfix">
			<ul class="nav navbar-top-links col-md-6">

				<!--Navigation toogle button-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<li class="tgl-menu-btn">
					<a id="sidebarCollapse" class="mainnav-toggle" href="#">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</li>
				
				<?php if ( is_user_logged_in() ) : ?>
					<?php if ( current_user_can( 'franquia' ) ) : ?>     
							
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="dashboard.php">
									Envios
								</a>
							</li>

							<li>
								<a href="publication.php">
									Coletas
								</a>
							</li>

							<li>
								<a href="my-publications.php">
									Embalagens
								</a>
							</li>
						</ul>

					<?php elseif ( current_user_can( 'e-commerce' ) ) : ?> 
						<ul class="nav nav-tabs">
							<li class="tabs-areas active">
								<a data-toggle="tab" href="#demo-lft-tab-1" aria-expanded="true">Envios <span class="badge badge-purple">27</span></a>
							</li>
							<li class="tabs-areas">
								<a data-toggle="tab" href="#demo-lft-tab-2" aria-expanded="false">Coletas</a>
							</li>
							<li class="tabs-areas">
								<a data-toggle="tab" href="#demo-lft-tab-3" aria-expanded="false">Embalagens</a>
							</li>
						</ul>
						
					<?php elseif ( current_user_can( 'mandabem' ) ) : ?> 

						<?php require( 'template-parts/content-mandabem.php' ) ?>

					<?php endif; ?> 
				<?php endif ?>

			</ul>
			<ul class="user-info nav navbar-top-links text-right col-md-6">
				<?php if ( ! is_user_logged_in() ) : ?>

					<!--User dropdown-->
					<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
					<li id="dropdown-user" class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
							<div class="username hidden-xs"><i class="fa fa-user" aria-hidden="true"></i> Login</div>
						</a>


						<div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">
							<div class="panel-body">
								<p class="pad-btm">Faça login em sua conta</p>
								<form id="login" action="login" method="post">
									<div class="form-group">
									<h3 class="login-infos">Bem-Vindo(a)!</h3>
									<p class="login-infos">logar com </p>
									<button class="btn btn-facebook"> <i class="fa fa-facebook"></i> &nbsp; Facebook </button>
									<p class="login-infos">OU</p>
									<li role="separator" class="divider"></li>
									<input id="username" type="text" name="username" placeholder="E-mail">
									<input id="password" type="password" name="password" placeholder="Senha">
									<p class="status"></p>
									</div>
									<a class="link" href="<?php echo wp_lostpassword_url(); ?>">Esqueceu sua senha?</a>
									<input class="btn btn-sigin submit_button" type="submit" value="Login" name="submit">

									<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
								</form>
								<!--
								<form id="login" action="login" method="post">

									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-user"></i></div>
											<input type="text" class="form-control" name="username" placeholder="Usuário">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
											<input type="password" class="form-control" name="password" placeholder="Password">
										</div>
									</div>
									<div class="row">
										<div class="col-xs-8 text-left checkbox">
											<a class="link" href="<?php echo wp_lostpassword_url(); ?>">Esqueceu sua senha?</a>
										</div>
										<div class="col-xs-4">
											<div class="form-group text-right">
											<input class="btn btn-success text-uppercase" type="submit" value="Login" name="submit">
											</div>
										</div>
									</div>
									<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
								</form>-->
							</div>
								
						</div>
					</li>
					<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
					<!--End user dropdown-->

				<?php else : ?>
				
					<!--User dropdown-->
					<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
					<li id="dropdown-user" class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
							<span class="pull-right">
								<?php
								if ( ( $current_user instanceof WP_User ) ) {

									echo get_avatar( $current_user->ID, 32 );
								}
								?>
							</span>
							<div class="username hidden-xs">
								BEM VIND@
								<?php echo '<p><strong>' . $current_user->user_firstname . ' ' . $current_user->user_lastname . '</strong></p>';?>
							</div>
						</a>


						<div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">
						
								<!-- Dropdown heading  -->
								<div class="pad-all bord-btm">
									<p class="text-lg text-semibold mar-btm">750Gb of 1,000Gb Used</p>
									<div class="progress progress-sm">
										<div class="progress-bar" style="width: 70%;">
											<span class="sr-only">70%</span>
										</div>
									</div>
								</div>


								<!-- User dropdown menu -->
								<ul class="head-list">
									<li>
										<a href="#">
											<i class="pli-male icon-lg icon-fw"></i> Profile
										</a>
									</li>
									<li>
										<a href="#">
											<span class="badge badge-danger pull-right">9</span>
											<i class="pli-mail icon-lg icon-fw"></i> Messages
										</a>
									</li>
									<li>
										<a href="#">
											<span class="label label-success pull-right">New</span>
											<i class="pli-gear icon-lg icon-fw"></i> Settings
										</a>
									</li>
									<li>
										<a href="#">
											<i class="pli-information icon-lg icon-fw"></i> Help
										</a>
									</li>
									<li>
										<a href="#">
											<i class="pli-computer-secure icon-lg icon-fw"></i> Lock screen
										</a>
									</li>
								</ul>

								<!-- Dropdown footer -->
								<div class="pad-all text-right">
									<a class="btn btn-primary" href="<?php echo wp_logout_url( home_url() . '/dashboard' ); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
								</div>
							</div>
					</li>
					<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
					<!--End user dropdown-->
				<?php endif; ?>
			</ul>
		</div>
		<!--================================-->
		<!--End Navbar Dropdown-->

	</div>
</header>
<!--===================================================-->
<!--END NAVBAR-->
