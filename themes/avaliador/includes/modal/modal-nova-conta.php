<div class="modal fade" id="nova-conta" role="dialog" tabindex="-1" aria-labelledby="nova-conta" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
				<h4 class="modal-title">Novo cliente</h4>
			</div>

			<!--Modal body-->
			<div class="modal-body">
				<?php if ( ! is_user_logged_in() ) : ?>
				<form name="form" action="<?php echo site_url( 'wp-login.php?action=register', 'login_post' ) ?>" method="post" class="panel-body form-horizontal form-padding">

					<!--Nome-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="demo-text-input">Nome</label>
						<div class="col-md-9">
							<input type="text" name="user_login" placeholder="Usuário" id="user_login" class="form-control" />
						</div>
					</div>

					<!--Email-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="demo-text-input">E-mail</label>
						<div class="col-md-9">
							<input type="text" name="user_email" placeholder="E-mail" id="user_email" class="form-control"  />
						</div>
					</div>

					<!--Senha-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="demo-text-input">Senha</label>
						<div class="col-md-9">
							<input type="password" name="user_password" placeholder="Senha" id="user_password" class="form-control"  />
						</div>
					</div>
					
					<?php do_action( 'register_form' ); ?>

			</div>

				<!--Modal footer-->
				<div class="modal-footer">
					<input type="hidden" name="redirect_to" value="/login" />
					<input type="submit" value="Novo Cliente" id="register" class="btn btn-primary" />
				</div>
			</form>
			<?php else : echo 'You are already logged in.'; endif; ?> 
		</div>
	</div>
</div>
