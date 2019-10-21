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
	<header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="/">Avaliador</a>

			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
					<a class="nav-link" href="/profissionais">Profissionais</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="/empresas">Empresas</a>
					</li>
				</ul>

				<div class="dropdown ml-4">
					<?php if ( ! is_user_logged_in() ) : ?>
						<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user mr-1" aria-hidden="true"></i> Login</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink mt-5">
							<form id="login" action="login" method="post" class="p-4">
								<div class="form-group">
									<h3 class="login-infos">Bem-Vindo(a)!</h3>
									<p class="login-infos">logar com </p>
									<input id="username" type="text" name="username" placeholder="E-mail">
									<input id="password" class="mt-3" type="password" name="password" placeholder="Senha">
									<p class="status"></p>
								</div>
								<a class="link" href="<?php echo wp_lostpassword_url(); ?>">Esqueceu sua senha?</a>
								<input class="btn btn-outline-primary" type="submit" value="Login" name="submit">

								<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
							</form>
						</div>

					<?php else : ?>
						<a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php
							if ( ( $current_user instanceof WP_User ) ) {

								echo get_avatar( $current_user->ID, 32 );
							}
							?>
							<?php echo $current_user->user_firstname; ?>
						</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="<?php echo wp_logout_url( home_url() . '/home' ); ?>">Sair</a>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</nav>
	</header>
