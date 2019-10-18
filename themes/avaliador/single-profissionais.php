<?php
/**
 *
 * Single de Profissionais
 *
 * @package marioernestoms
 */

global $current_user;
global $wp_roles;

get_header( 'dashboard' );

?>

<main role="main">
	<div class="container mt-5">
		<div class="p-0 container-fluid">
			<div class="row">
				<div class="col-md-4 col-xl-3">
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0 card-title">Perfil</h5>
						</div>
						<div class="text-left card-body">
							<h4 class="mb-0 card-title"><?php the_title(); ?></h4>
							<p class="text-muted mb-2"><?php the_field( 'cargo' ); ?></p>
							<div>
								<a class="mr-1 btn btn-primary btn-sm" href="#" data-target="#nova-avaliacao" data-toggle="modal"><i class="far fa-plus-square"></i> Avaliar</a>

								<?php include( 'includes/modal/modal-nova-avaliacao.php' ); ?>
							</div>
						</div>
						<hr class="my-0">
						<div class="card-body">
							<h5 class="card-title">Sobre</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> 
									Lives in <a href="/dashboard/default">San Francisco, SA</a>
								</li>
								<li class="mb-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> 
									Works at <a href="/dashboard/default">GitHub</a>
								</li>
								<li class="mb-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> 
									From <a href="/dashboard/default">Boston</a>
								</li>
							</ul>
						</div>
						<hr class="my-0">
						<div class="card-body">
							<h5 class="card-title">Onde encontrar</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-1">
									<a href="/dashboard/default"><i class="fab fa-facebook mr-1"></i> Facebook</a>
								</li>
								<li class="mb-1">
									<a href="/dashboard/default"> <i class="fab fa-instagram mr-1"></i>Instagram</a>
								</li>
								<li class="mb-1">
									<a href="/dashboard/default"><i class="fab fa-linkedin mr-1"></i> LinkedIn</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-xl-9">
					<div class="card mb-2">
						<div class="card-header">
							<h5 class="mb-0 card-title">Avaliações</h5>
						</div>
					</div>

					<?php
					$avaliacoes = get_posts(
						array(
							'post_type' => 'avaliacoes',
							'meta_query' => array(
								array(
									'key'     => 'profissional',
									'value'   => '"' . get_the_ID() . '"',
									'compare' => 'LIKE',
								),
							),
						)
					);

					?>
					<?php if ( $avaliacoes ) : ?>
						<?php foreach ( $avaliacoes as $avaliacao ): ?>

							<div class="card mb-3">
								<div class="row no-gutters p-3">
									<div class="col-md-3">
										<div class="card-body">
											<strong class="pt-4"><?php the_author_meta( 'display_name', $avaliacao->post_author ); ?></strong>
										</div>
									</div>
									<div class="col-md-9">
										<div class="card-body">
											<p class="card-text"><?php the_field( 'comentario', $avaliacao ); ?></p>
											<div class="card-text row" style="margin: 0 -10px;">
												<div class="col-md-6">
													Avaliação Profissional :
													<br>
													<?php
													$star_prof = get_field( 'avaliacao_profissional', $avaliacao );

													if ( ! empty( $star_prof ) ) {
														for ( $x = 1; $x <= $star_prof; $x++ ) {
															echo '<i class="fa fa-star text-warning" aria-hidden="true"></i>';
														}
														if ( strpos( $star_prof, '.' ) ) {
															echo '<i class="far fa-star"></i>';
															$x++;
														}
														while ( $x <= 5 ) {
															echo '<i class="far fa-star text-warning"></i>';
															$x++;
														}
													} else {
														echo '<small>sem avaliação</small>';
													}
													?>
												</div>

												<div class="col-md-6">
												Avaliação Comportamental
												<br>
												<?php
												$star_prof = get_field( 'avaliacao_comportamental', $avaliacao );

												if ( ! empty( $star_prof ) ) {
													for ( $x = 1; $x <= $star_prof; $x++ ) {
														echo '<i class="fa fa-star text-warning" aria-hidden="true"></i>';
													}
													if ( strpos( $star_prof, '.' ) ) {
														echo '<i class="far fa-star text-warning"></i>';
														$x++;
													}
													while ( $x <= 5 ) {
														echo '<i class="far fa-star text-warning"></i>';
														$x++;
													}
												} else {
													echo '<small>sem avaliação</small>';
												}
												?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php endforeach; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer( 'dashboard' ); ?>
