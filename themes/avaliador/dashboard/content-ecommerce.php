
	<div class="container mar-top">
		<section class="coletas">
			<div class="find-coletas container">
				<div class="panel-group">
					<div class="col-md-10">
						<form>
							<div class="search-coletas form-group">
							<input type="text" class="form-control" placeholder="Busque por nome">
							</div>
						</form>
					</div>
					<div class="col-md-2 text-right">
						<button data-target="#nova-coleta" data-toggle="modal" class="nova-coleta btn btn-primary btn-labeled"><i class="btn-label fas fa-map-marker-alt"></i> nova coleta</button>

						<div class="modal fade" id="nova-coleta" role="dialog" tabindex="-1" aria-labelledby="nova-coleta" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><i class="far fa-times-circle"></i></button>
										<h4 class="modal-title">Nova coleta</h4>
									</div>

									<!--Modal body-->
									<div class="modal-body">
										<form class="panel-body form-horizontal form-padding">

											<div class="form-group">
												<label class="col-md-3 control-label">ID Coleta</label>
												<div class="col-md-9"><p class="form-control-static">#MB01</p></div>
											</div>

											<!--Text Input-->
											<div class="form-group">
												<label class="col-md-3 control-label" for="demo-text-input">Data</label>
												<div class="col-md-9">
													<input type="date" id="demo-text-input" class="form-control" placeholder="Data da coleta">
												</div>
											</div>

											<!--Text Input-->
											<div class="form-group">
												<label class="col-md-3 control-label" for="demo-text-input">Envios</label>
												<div class="col-md-9">
													<select class="form-control">
														<option>Marcos Andre</option>
														<option>Gustavo Nunes</option>
													</select>
												</div>
											</div>
							
										</form>
									</div>

									<!--Modal footer-->
									<div class="modal-footer">
										<button class="btn btn-primary">Adicionar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="list-coletas container mar-top">
				<div class="panel-group accordion" id="coletas">

					<!-- Loop Item -->
					<div class="panel">
						<?php
						$c = 0; //set up counter variable

						$exec_query = new WP_Query( array(
						'post_type'      => 'coleta',
						'posts_per_page' => -1,
						) );

						if ( $exec_query->have_posts() ) { ?>

						<?php while ( $exec_query->have_posts() ): $exec_query->the_post(); $c++ ?>

						<div class="coleta-box panel-heading">
							<h4 class="panel-title">
								
								<a data-parent="#coletas" data-toggle="collapse" href="#coleta-<?php echo esc_html( $c, 'mandabem' ); ?>" class="collapsed" aria-expanded="false">


									<div class="envio row">
										<div class="col-md-10">
											<div class="col-md-6">
												<h4 class="id-coleta mar-no"><?php the_title();?></h4>
											</div>
											<div class="coleta-text col-md-3 text-center">
												<?php the_field('data_coleta'); ?>
											</div>
											<div class="col-md-3 text-center">
												<p class="coleta-price">R$00,00</p>
											</div>
										</div>
										<div class="col-md-2 text-right">
											<p class="btn btn-primary coleta-quantidade">00 Itens</p>
										</div>

									</div>
								</a>
							</h4>
						</div>

						<div class="panel-collapse collapse" id="coleta-<?php echo esc_html( $c, 'mandabem' ); ?>" aria-expanded="false">
							<div class="panel-body">
								 <div class="list-coletas mar-top">
									<div class="panel-group accordion" id="envios">
										<div class="panel">
											
											<?php 
											$i = 0; // Set up counter variable.

											if ( have_rows( 'envios_coleta' ) ) :
											?>

												<?php while ( have_rows( 'envios_coleta' ) ) : the_row(); $i++ ?>


													<?php $postobject = get_sub_field( 'envio_coleta' ); ?>

													<div class="envios-box panel-heading">
														<h4 class="panel-title">
															<a data-parent="#envios" data-toggle="collapse" href="#envio-<?php echo esc_html( $i, 'mandabem' ); ?>" class="collapsed" aria-expanded="false">
																<div class="envio row">
																	<div class="col-md-3">
																		<h4 class="client-name mar-no"><?php echo $postobject->post_title ?> <?php echo $numrows; ?></h4>
																	</div>
																	<div class="sending-data col-md-3 text-center"><span class="text-small">Buscador</span> <?php echo $postobject->rastreio_envio ?></div>
																	<div class="sending-price col-md-2">status <span class="btn btn-warning">Em aberto</span></div>
																	<div class="col-md-2">
																		R$ <?php 
																		   $valor_envio = $postobject->valor_do_envio;

																		   echo $valor_envio;
																		   ?>
																	</div>
																	<div class="col-md-2">
																		<div class="sending-plus"><i class="fa fa-plus" aria-hidden="true"></i></div>
																	</div>
																</div>
															</a>
														</h4>
													</div>

													<div class="panel-collapse collapse" id="envio-<?php echo esc_html( $i, 'mandabem' ); ?>" aria-expanded="false">
														<div class="envio-data panel-body">
															<div class="col-md-4">
																<p class="id-coleta"><span class=text-small><i class="fas fa-globe fa-2x"></i> Rastreio</span> <?php echo $postobject->rastreio_envio ?></p>
																<p class="id-coleta"><span class="text-small"><i class="fas fa-envelope fa-2x"></i> E-mail</span> <?php echo $postobject->email_do_envio ?></p>
															</div>
															<div class="col-md-4">
																<p class="coleta-text"><span class=text-small><i class="btn-label fas fa-map-marker-alt fa-2x"></i> Enviado</span> <?php echo $postobject->data_de_envio_envio ?></p>
																<p class="coleta-text"><span class=text-small><i class="btn-label fas fa-map-marker-alt fa-2x"></i> Recebido</span> <?php echo $postobject->data_de_recebimento_envio ?></p>
															</div>
															<div class="col-md-4">
																<p class="coleta-text"><span class=text-small><i class="far fa-clock fa-2x"></i> Tempo de envio</span> <?php echo $postobject->tempo_de_envio_envio ?> dias</p>
																<p class="coleta-text"><span class=text-small><i class="fas fa-cube fa-2x"></i> Tipo de pacote</span> Pack</p>
															</div>
														</div>
													</div>

												<?php endwhile; ?>

											<?php endif; ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); } ?>
				</div>
			</div>
		</section>
		

	</div> <!-- /container -->
