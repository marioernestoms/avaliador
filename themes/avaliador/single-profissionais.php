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
							<h5 class="mb-0 card-title">Profile Details</h5>
						</div>
						<div class="text-center card-body">
							<img src="http://placehold.it/120x120" alt="Stacie Hall" class="img-fluid rounded-circle mb-2" width="60" height="60">
							<h5 class="mb-0 card-title"><?php the_title(); ?></h5>
							<div class="text-muted mb-2"><?php the_field( 'cargo' ); ?></div>
							<div>
								<a class="mr-1 btn btn-primary btn-sm" href="#" data-target="#nova-avaliacao" data-toggle="modal"><i class="far fa-plus-square"></i> Avaliar</a>

								<?php include( 'includes/modal/modal-nova-avaliacao.php' ); ?>
							</div>
						</div>
						<hr class="my-0">
						<div class="card-body">
							<h5 class="card-title">Skills</h5>
							<span class="mr-1 my-1 badge badge-primary">HTML</span>
							<span class="mr-1 my-1 badge badge-primary">JavaScript</span>
							<span class="mr-1 my-1 badge badge-primary">Sass</span>
							<span class="mr-1 my-1 badge badge-primary">Angular</span>
							<span class="mr-1 my-1 badge badge-primary">Vue</span>
							<span class="mr-1 my-1 badge badge-primary">React</span>
							<span class="mr-1 my-1 badge badge-primary">Redux</span>
							<span class="mr-1 my-1 badge badge-primary">UI</span>
							<span class="mr-1 my-1 badge badge-primary">UX</span>
						</div>
						<hr class="my-0">
						<div class="card-body">
							<h5 class="card-title">About</h5>
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
							<h5 class="card-title">Elsewhere</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-1">
									<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16 fa-fw mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
									<a href="/dashboard/default">Twitter</a>
								</li>
								<li class="mb-1">
									<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook fa-w-16 fa-fw mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg>
									<a href="/dashboard/default">Facebook</a>
								</li>
								<li class="mb-1">
									<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14 fa-fw mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
									<a href="/dashboard/default">Instagram</a>
								</li>
								<li class="mb-1">
									<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin" class="svg-inline--fa fa-linkedin fa-w-14 fa-fw mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>
									<a href="/dashboard/default">LinkedIn</a>
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
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<strong><?php the_author_meta( 'display_name', $avaliacao->post_author ); ?></strong>
										</div>
										<div class="col-9">
											<div class="row">
												<p><?php the_field( 'comentario', $avaliacao ); ?></p>
											</div>

											<div class="row">
												<div class="col">
													<p>Avliação Profissional : </p>
													<p>
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
													</p>
												</div>
												<div class="col">
													<p>Avaliação Comportamental</p>
													<p>
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
													</p>
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
