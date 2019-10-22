<div class="modal fade" id="editar-empresa-<?php echo $empresa->ID; ?>" role="dialog" tabindex="-1" aria-labelledby="edit-empresa" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title pull-left">Editar Empresa</h4>
				<button type="button" class="close pull-right" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
			</div>
			<?php
			global $empresa, $wp_roles;
			$error = array();

			$id_empresa   = $empresa->ID;
			$edit_empresa = $id_empresa;

			if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) : ?>

				<?php
				$previous_name = the_author_meta( 'first_name', $id_empresa );

				if ( ! empty( $_POST['first-name'] ) ) {

					update_user_meta( $id_empresa, 'first_name', esc_attr( $_POST['first-name'] ), $previous_name );

				}

				if ( ! empty( $_POST['last-name'] ) )
				update_user_meta(
					$id_empresa,
					'last_name',
					esc_attr( $_POST['last-name'] )
				);


				if ( ! empty( $_POST['pass1'] ) && ! empty( $_POST['pass2'] ) ) {
					if ( $_POST['pass1'] == $_POST['pass2'] ) {
						wp_update_user(
							array(
								'ID'        => $id_empresa,
								'user_pass' => esc_attr( $_POST['pass1'] ),
							)
						);
					} else {
						$error[] = __( 'The passwords you entered do not match.  Your password was not updated.', 'avaliador' );
					}
				}

				if ( ! empty( $_POST['url'] ) )
					wp_update_user(
						array(
							'ID'       => $id_empresa,
							'user_url' => esc_url( $_POST['url'] ),
						)
					);

				if ( ! empty( $_POST['email'] ) ) {
					if ( ! is_email( esc_attr( $_POST['email'] ) ) )
						$error[] = __( 'The Email you entered is not valid.  please try again.', 'avaliador' );
					elseif ( email_exists( esc_attr( $_POST['email'] ) ) != $id_empresa )
						$error[] = __( 'This email is already used by another user.  try a different one.', 'avaliador' );
					else{
						wp_update_user(
							array (
								'ID'         => $id_empresa,
								'user_email' => esc_attr( $_POST['email'] ),
							)
						);
					}
				}

				if ( ! empty( $_POST['description'] ) )
					update_user_meta(
						$id_empresa,
						'description',
						esc_attr( $_POST['description'] )
					);

				if ( count( $error ) == 0 ) {

					do_action( 'edit_user_profile_update', $id_empresa );
					wp_redirect( get_permalink() );
					exit;
				}
				?>
			<?php endif; ?>

			<?php if ( ! is_user_logged_in() ) : ?>
					<p class="warning">
						<?php _e( 'You must be logged in to edit your profile.', 'avaliador' ); ?>
					</p><!-- .warning -->
			<?php elseif ( $edit_empresa == $id_empresa ) : ?>
				<?php if ( count( $error ) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>

					<form method="get" id="adduser" action="<?php the_permalink(); ?>">
						<div class="modal-body">

							<div class="form-group">
								<input type="text" name="first-name" id="first-name" value="<?php the_author_meta( 'first_name', $id_empresa ); ?>" class="form-control" />
							</div>

							<div class="form-group">
								<input type="text" value="<?php the_author_meta( 'user_email', $id_empresa ); ?>" name="email" type="text" id="email" class="form-control" />
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<input name="pass1" type="password" id="pass1" placeholder="Senha" class="form-control" />
								</div>
								<div class="form-group col-md-6">
									<input name="pass2" type="password" id="pass2" placeholder="Confirmar senha" class="form-control" />
								</div>
							</div>

						</div>

						<!--Modal footer-->
						<div class="modal-footer">

							<?php 
							//action hook for plugin and extra fields
							do_action( 'edit_user_profile', $empresa->user_nicename ); 
							?>

							<?php echo $referer; ?>
								<input name="updateuser" type="submit" id="updateuser" class="btn btn-primary" value="<?php _e( 'Update', 'avaliador' ); ?>" />
							<?php wp_nonce_field( 'update-user' ); ?>
							<input name="action" type="hidden" id="action" value="update-user" />
						</div>
					</form>

			<?php endif; ?>
		</div>
	</div>
</div>
