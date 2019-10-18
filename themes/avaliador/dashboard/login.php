<?php 
/**
 * Template Name: Login
 *
 * @package Divi-Child
 * @author marioernestoms
 */

the_post();

get_header( 'dashboard' );
?>

	<div class="wrapper">

		<!-- Page Content Holder -->        
		<div class="container-full img-balloon" >

			<!-- LOGIN FORM -->
			<!--===================================================-->
			<div class="cls-content text-center">
				<div class="cls-content-sm panel">
					<div class="panel-body">
						<div class="login-img mar-ver pad-btm">
							<h1 class="h3"><img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/logo_mandabem_tradicional.jpg' ?>" alt="" class="mar-btm"></h1>
						</div>

						<form id="login" action="login" method="post">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon"><i class="fas fa-user"></i></div>
									<input id="username" class="form-control" type="text" name="username" placeholder="E-mail">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-lock"></i></div>
									<input id="password" class="form-control" type="password" name="password" placeholder="Senha">
								</div>
							</div>
							<p class="status"></p>
							<input class="btn-login btn btn-success text-uppercase" type="submit" value="Entrar" name="submit">

							<div class="pad-ver">
								<p>Não tem conta? Crie <a data-target="#nova-conta" data-toggle="modal"class="btn-link">sua conta</a>, é grátis! :)</p>
								<p>Esqueceu a senha? Sem problemas, <a class="link" href="<?php echo wp_lostpassword_url(); ?>">clique aqui</a>. </p>
							</div>

							<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
						</form>
						
					</div>
				</div>
				
			</div>
			<!--===================================================-->
			
		</div>
		<!--===================================================-->
			
		</div>
		
	</div>

<?php get_footer( 'dashboard' ); ?>

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

				<?php
				$err = '';
				$success = '';

				global $wpdb, $password_hash, $current_user, $user_ID;

				if ( isset( $_POST['task'] ) && $_POST['task'] == 'register' ) {


					$pwd1 = $wpdb->escape( trim( $_POST['pwd1'] ) );
					$pwd2 = $wpdb->escape( trim( $_POST['pwd2'] ) );
					$first_name = $wpdb->escape( trim( $_POST['first_name'] ) );
					$last_name = $wpdb->escape( trim( $_POST['last_name'] ) );
					$email = $wpdb->escape( trim( $_POST['email'] ) );
					$username = $wpdb->escape( trim( $_POST['username'] ) );

					if ( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
						$err = 'Please don\'t leave the required fields.';
					} elseif ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
						$err = 'Invalid email address.';
					} elseif ( email_exists( $email ) ) {
						$err = 'Email already exist.';
					} elseif( $pwd1 <> $pwd2 ) {
						$err = 'Password do not match.';
					} else {

						$user_id = wp_insert_user( 
							array (
								'first_name' => apply_filters( 'pre_user_first_name', $first_name ), 
								'last_name' => apply_filters( 'pre_user_last_name', $last_name ), 
								'user_pass' => apply_filters( 'pre_user_user_pass', $pwd1 ), 
								'user_login' => apply_filters( 'pre_user_user_login', $username ), 
								'user_email' => apply_filters( 'pre_user_user_email', $email ), 
								'role' => 'subscriber' 
								) 
						);
						if ( is_wp_error( $user_id ) ) {
							$err = 'Error on user creation.';
						} else {
							do_action( 'user_register', $user_id );

							$success = 'You\'re successfully register';
						}

					}

				}
				?>

					<!--display error/success message-->
				<div id="message">
					<?php
						if(! empty($err) ) :
							echo '<p class="error">'.$err.'';
						endif;
					?>

					<?php
						if(! empty($success) ) :
							echo '<p class="error">'.$success.'';
						endif;
					?>
				</div>

				<form method="post">

					<div id="step1">

						<h4>Dados de Acesso</h4>
					
						<div class="acf-field acf-field-number">
							<div class="acf-label">
								<label>Usuário <span class="acf-required">*</span></label>
							</div>
							<div class="acf-input">
								<div class="acf-input-wrap">
									<input type="text" value="" name="username" id="username" class="form-control" />
								</div>		
							</div>
						</div>

						<div class="acf-field acf-field-number">
							<div class="acf-label">
								<label>Senha <span class="acf-required">*</span></label>
							</div>
							<div class="acf-input">
								<div class="acf-input-wrap">
									<input type="password" value="" name="pwd1" id="pwd1" class="form-control" />
								</div>		
							</div>
						</div>

						<div class="acf-field acf-field-number">
							<div class="acf-label">
								<label>Confirme a Senha <span class="acf-required">*</span></label>
							</div>
							<div class="acf-input">
								<div class="acf-input-wrap">
									<input type="password" value="" name="pwd2" id="pwd2" class="form-control" />
								</div>		
							</div>
						</div>

						<div class="acf-field acf-field-number">
							<div class="acf-label">
								<label>E-mail <span class="acf-required">*</span></label>
							</div>
							<div class="acf-input">
								<div class="acf-input-wrap">
									<input type="text" value="" name="email" id="email" class="form-control" />
								</div>		
							</div>
						</div>
						
						<!--Modal footer-->
						<div class="modal-footer">
							<button id="btnEndStep1" class="btn btn-primary">Próximo</button>
						</div>	

					</div>
					<div id="step2" class="hideMe"> 

						<h4>Dados da Empresa</h4>

						<div class="acf-field acf-field-number acf-field-razao">
							<div class="acf-label">
								<label>Razão Social <span class="acf-required">*</span></label>
							</div>
							<div class="acf-input">
								<div class="acf-input-wrap">
									<input type="text" value="" name="first_name" id="first_name" class="form-control" />
								</div>		
							</div>
						</div>

						<?php do_action( 'register_form' ); ?>

						<!--Modal footer-->
						<div class="modal-footer">
							<div class="alignleft"><p><?php if($sucess != "") { echo $sucess; } ?> <?php if($err != "") { echo $err; } ?></p></div>
							<button type="submit" name="btnregister" class="btn btn-success" >Criar</button>
							<input type="hidden" name="task" value="register" />
						</div>						
					</div>

			</div>

			</form>
			<?php else : echo 'You are already logged in.'; endif; ?> 
		</div>
	</div>
</div>




<div id="sampleModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true" class="visible-xs">&times;</span>

                </button>
                 <h4 class="modal-title" id="myTitle">Modal Title</h4>

            </div>
            <div class="modal-body">
                <div id="step1"> <span>Do something for Step 1</span>

                    <input type="textbox" />
                    <button id="btnEndStep1">NEXT STEP</button>
                </div>
                <div id="step2" class="hideMe"> <span>Now select something for Step 2</span>

                    <select name="myList">
                        <option value=""></option>
                        <option value="This">This</option>
                        <option value="That">That</option>
                        <option value="Other">Other</option>
                    </select>
                    <button id="btnEndStep2">NEXT STEP</button>
                </div>
                <div id="step3" class="hideMe"> <span>Finally, type something for Step 3</span>

                    <input type="textbox" />
                    <button id="btnEndStep3">END</button>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>