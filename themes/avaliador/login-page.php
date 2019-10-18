<?php
/**
 * Template Name: Login
 *
 * The template for displaying pages with sidebar.
 *
 * @package marioernestoms
 */

global $current_user;
global $wp_roles;

get_header();

?>

<main role="main">
	<div class="container text-center">
		<?php if ( ! is_user_logged_in() ) : ?>
				
			<form id="login" action="login" method="post" style="margin: 0 30%; padding: 20vh 0; width: 40%;">
				<div class="form-group">
					<h2>Avaliador</h2>
					<h3 class="login-infos mb-5">Bem-Vindo(a)!</h3>
					<input id="username" class="form-control" type="text" name="username" placeholder="E-mail">
					<input id="password" class="form-control mt-3" type="password" name="password" placeholder="Senha">
					<p class="status mt-3"></p>
				</div>
				<div class="row">
					<div class="col-md-6 text-left">
						<a class="link" href="<?php echo wp_lostpassword_url(); ?>">Esqueceu sua senha?</a>
					</div>
					<div class="col-md-6 text-right">
						<input class="btn btn-outline-primary text-right" type="submit" value="Login" name="submit">
					</div>
				</div>
				<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			</form>

		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
