<div class="modal fade text-left" id="nova-empresa" role="dialog" tabindex="-1" aria-labelledby="nova-empresa" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title pull-left">Nova Empresa</h4>
				<button type="button" class="close pull-right" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
			</div>

			<?php
			$error   = '';
			$success = '';

			global $wpdb, $password_hash, $current_user, $user_ID;

			if ( isset( $_POST['task'] ) && $_POST['task'] == 'register' ) {

				$password1  = $wpdb->escape( trim( $_POST['password1'] ) );
				$password2  = $wpdb->escape( trim( $_POST['password2'] ) );
				$first_name = $wpdb->escape( trim( $_POST['first_name'] ) );
				//$last_name  = $wpdb->escape( trim( $_POST['last_name'] ) );
				$email      = $wpdb->escape( trim( $_POST['email'] ) );
				$username   = $wpdb->escape( trim( $_POST['username'] ) );

				if ( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $first_name == "" || $last_name == "") {
					$error = 'Preencha os campos obrigatórios.';
				} elseif ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
					$error = 'Invalid email address.';
				} elseif ( email_exists( $email ) ) {
					$error = 'Email already exist.';
				} elseif ( $password1 <> $password2 ) {
					$error = 'Password do not match.'; 
				} else {

					$user_id = wp_insert_user(
						array(
							'first_name' => apply_filters( 'pre_user_first_name', $first_name ),
							//'last_name'  => apply_filters( 'pre_user_last_name', $last_name ),
							'user_pass'  => apply_filters( 'pre_user_user_pass', $password1 ),
							'user_login' => apply_filters( 'pre_user_user_login', $username ),
							'user_email' => apply_filters( 'pre_user_user_email', $email ),
							'role'       => 'subscriber',
						)
					);

					if ( is_wp_error( $user_id ) ) {
						$error = 'Error on user creation.';
					} else {
						do_action( 'user_register', $user_id );

						$success = 'Profissional cadastrado com sucesso.';
					}
				}
			}
			?>

			<!--display error/success message-->
			<div id="message">
				<?php
				if ( ! empty( $err ) ) :
					echo '<p class="error">' . $err . '';
				endif;
				?>

				<?php
				if ( ! empty( $success ) ) :
					echo '<p class="error">' . $success . '';
				endif;
				?>
			</div>

			<!--Modal body-->
			<form method="post">
				<div class="modal-body">

					<div class="form-group">
						<input type="text" value="" name="username" id="username"  placeholder="Usuário" class="form-control" />
					</div>

					<div class="form-group">
						<input type="text" value="" name="first_name" id="first_name" placeholder="Nome Fantasia" class="form-control" />
					</div>

					<div class="form-group">
						<input type="text" value="" name="email" id="email"  placeholder="E-mail" class="form-control" />
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="password" value="" name="password1" id="password1"  placeholder="Senha" class="form-control" />
						</div>
						<div class="form-group col-md-6">
							<input type="password" value="" name="password2" id="password2"  placeholder="Confirmar senha" class="form-control" />
						</div>
					</div>

					<div class="alignleft">
						<small>
							<?php
							if ( $sucess != "" ) {
								echo $sucess;
							} elseif ( $error!= "" ) {
								echo $error;
							}
							?>
						</small>
					</div>

				</div>

				<!--Modal footer-->
				<div class="modal-footer">
					<button type="submit" name="btnregister" class="btn btn-primary" >Cadastrar</button>
					<input type="hidden" name="task" value="register" />
				</div>
			</form>
		</div>
	</div>
</div>