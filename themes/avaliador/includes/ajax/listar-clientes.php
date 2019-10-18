<?php

function listarClientes() {
	//$page = $_GET['page'];
	//$slug = $_GET['slug'];

	$args = [
		'role'    => 'E-Commerce',
	    'orderby' => 'user_nicename',
	    'order'   => 'ASC',
	];
	$users = get_users( $args );
	$total_pages = $posts->max_num_pages;
?>

	<ul>
<?php
foreach ( $users as $user ) : $c++ ?>

	<!-- Loop Item -->
	<div class="panel">
		<div class="coleta-box panel-heading">
			<h4 class="panel-title">
				<a data-parent="#coletas" data-toggle="collapse" href="#clientes-<?php echo esc_html( $c, 'mandabem' ); ?>" class="collapsed" aria-expanded="false">
				
					<div class="envio row">
						<div class="col-md-10">
							<div class="col-md-3">
								<h4 class="id-coleta mar-no"><?php echo esc_html( $user->display_name ) ?></h4>
							</div>
							<div class="sending-data col-md-9 text-center">
								<p class="coleta-text"><span class="text-small">Franquia:</span> Correios A54</p>
							</div>
						</div>
						<div class="col-md-2 text-right">
							<!--<a id="btn-edit-user" data-target="#edit-user" data-toggle="modal" class="btn-edit-user btn btn-primary coleta-quantidade" data-userid="<?php echo esc_html( $user->ID ) ?>">Editar</a>-->

                            <button type="button" class="btn btn-sm btn-primary coleta-quantidade btn-edit-user">Editar</button>

                            <!-- Modal Edit User -->
                            <?php 
                                $id = $_GET['userid'];
                                //$detalhes = get_post( $id );
                            ?>
                            <div class="modal fade" id="edit-user">
	                            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
                                            <h4 class="modal-title">Editar usuário</h4>
                                        </div>

                                        <!--Modal body-->
                                        <div class="modal-body">
                                                <?php echo $id; ?>
                                                <?php //echo esc_html( $user->display_name ) ?>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /Modal Edit User -->

						</div>

					</div>
				</a>
			</h4>
		</div>

		<div class="panel-collapse collapse" id="clientes-<?php echo esc_html( $c, 'mandabem' ); ?>" aria-expanded="false">
			<div class="panel-body">
				<?php include( 'cliente-detalhado.php' ); ?>
			</div>
		</div>
	<!-- End Loop Item -->
	<?php endforeach; ?>

    <!-- paginacao -->
			<?php if ( $total_pages > 0 ) ?>
				<section class="paginacao">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
								<li class="page-item <?php echo ( $i == $page )? 'active' : '' ?>"><span class="page-link"><?php echo $i;  ?></a></li>
							<?php endfor; ?>
						</ul>
					</nav>
				</section>
				<!-- fim paginacao -->

	<?php
		exit;
}

add_action( 'wp_ajax_listarClientes', 'listarClientes' );
add_action( 'wp_ajax_nopriv_listarClientes', 'listarClientes' );
